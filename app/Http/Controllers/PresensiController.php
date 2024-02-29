<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Mapel;
use App\Models\Presensi;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Exports\PresensiExport;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;


class PresensiController extends Controller
{
    public function index(): View
    {
        $presensis = Kelas::orderBy('tingkat_kelas')
            ->orderBy('jurusan_id')
            ->orderBy('nomor_kelas')
            ->get();

        return view('presensis.presensi', compact('presensis'));
    }

    public function show($kelas_id)
    {
        $kelas = Kelas::where('id', $kelas_id)->get();
        $siswas = Siswa::where('kelas_id', $kelas_id)->orderBy('nama', 'asc')->get();
        $users = User::all();
        $mapels = Mapel::all();

        return view('presensis.create', compact('kelas', 'siswas', 'users', 'mapels'));
    }

    public function create(Request $request)
    {
        $kelas = Kelas::all();
        $siswas = Siswa::all();
        $mapel = Mapel::all();
        return view('presensis.create', compact('kelas', 'siswas', 'mapel'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'kelas_id'  => 'required',
            'siswa_id'  => 'required',
            'user_id'   => 'required',
            'mapel_id'  => 'required',
            'presensi'  => 'required|array',
            'presensi.*'    => 'required|in:Hadir,Izin,Sakit,Alpha',
        ]);

        foreach ($request->presensi as $siswa_id => $presensi) {
            Presensi::create([
                'kelas_id' => $request->kelas_id,
                'siswa_id'  => $siswa_id,
                'user_id'   => $request->user_id,
                'mapel_id'  => $request->mapel_id,
                'presensi' => $presensi
            ]);
        }
        return redirect()->route('laporan')->with(['success' => 'Data Berhasil Ditambahkan']);
    }

    public function laporan()
    {
        $mapels = Mapel::all();
        $kelas = Kelas::all();
        $presensis = Presensi::with('kelas', 'siswas', 'mapels', 'users')
            ->whereDate('created_at', Carbon::today())
            ->get();
        // dd($presensis); // Tambahkan ini untuk debugging
        return view('presensis.laporan', compact('presensis', 'kelas', 'mapels'));
    }

    public function filter(Request $request)
    {
        $request->validate([
            'TanggalMulai'  => 'nullable|date',
            'TangglaSelesai'    => 'nullable|date|after_or_equal:TanggalMulai',
            'kelas_id'  => 'nullable|exists:kelas,id',
        ]);

        $TanggalMulai = $request->input('TanggalMulai');
        $TanggalSelesai = $request->input('TanggalSelesai');
        $kelas_id = $request->input('kelas_id');

        $siswas = Siswa::all();
        $kelas = Kelas::all();

        // Query untuk filter
        $presensiQuery = Presensi::with('siswas', 'kelas');

        if ($kelas_id) {
            $presensiQuery->whereHas('kelas', function ($query) use ($kelas_id) {
                $query->where('id', $kelas_id);
            });
        }

        if ($TanggalMulai) {
            $presensiQuery->whereDate('created_at', '>=', $TanggalMulai);
        }

        if ($TanggalSelesai) {
            $presensiQuery->whereDate('created_at', '<=', $TanggalSelesai);
        }

        $presensis = $presensiQuery
            ->orderBy('created_at')
            ->get();

        return view('presensis.laporan', compact('presensis', 'kelas'));
    }

    // public function export()
    // {
    //     return Excel::download(new PresensiExport(), 'presensi.xlsx');
    // }

    public function edit($id)
    {
        $presensi = Presensi::with('siswas', 'kelas')->where('user_id', Auth::user()->id)->findOrFail($id);
        $users = User::all();
        $kelas = Kelas::all();
        $siswas = Siswa::all();
        $mapel = Mapel::all();
        return view('presensis.edit', compact('presensi', 'users', 'kelas', 'siswas', 'mapel'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->presensi);
        $this->validate($request, [
            'kelas_id'  => 'required',
            'siswa_id'  => 'required',
            'user_id'   => 'required',
            'mapel_id'  => 'required',
            'presensi' => 'required',
        ]);

        $presensi = Presensi::findOrFail($id);

        $presensi->update([
            'kelas_id'  => $request->kelas_id,
            'siswa_id'  => $request->siswa_id,
            'user_id'   => $request->user_id,
            'mapel_id'  => $request->mapel_id,
            'presensi' => $request->presensi,
        ]);

        // dd($presensi);

        return redirect()->route('laporan')->with(['success' => 'Data Berhasil Diubah']);
    }


    public function destroy(string $id)
    {
        $presensi = Presensi::findOrFail($id);

        $presensi->delete();

        return redirect()->route('laporan')->with(['success' => 'Data Berhasil Dihapus']);
    }


    // public function filter(Request $request, $id)
    // {
    //     $tanggal = $request->input('tanggal');
    //     // $mapelId = $request->input('mapel_id');

    //     // Lakukan filter pada data presensi berdasarkan tanggal dan mapel
    //     $presensis = Presensi::when($tanggal, function ($query) use ($tanggal) {
    //         return $query->whereDate('tanggal', $tanggal);
    //     });
    //         // ->when($mapelId, function ($query) use ($mapelId) {
    //         //     return $query->where('mapel_id', $mapelId);
    //         // })
    //         // ->get();

    //     return view('presensis.show', compact('presensis'));
    // }


    // public function store(Request $request, $id)
    // {
    //     $presensis = Kelas::find($id);

    //     // Validasi form jika diperlukan
    //     $request->validate([
    //         'siswa_id' => 'required|exists:siswas,id',
    //         'mapel_id' => 'required',
    //         'keterangan' => 'required|in:Hadir,Izin,Sakit,Alpha',
    //     ]);

    //     // Simpan data presensi ke dalam database
    //     Presensi::create([
    //         'siswa_id' => $request->input('siswa_id'),
    //         'mapel_id' => $request->input('mapel_id'),
    //         'keterangan' => $request->input('keterangan'),
    //         // Tambahkan kolom lain sesuai kebutuhan
    //     ]);

    //     // Redirect atau berikan respons sesuai kebutuhan
    //     return redirect()->route('presensis.show', ['id' => $presensis->id] )->with('success', 'Data presensi berhasil disimpan.');
    // }
}
        // $request->validate([
        //     'tanggal' => 'required|date',
        //     'mapel_id' => 'required|exists:mapels,id',
        //     'status' => 'required|in:Hadir,Izin,Sakit,Alpha',
        // ]);

        // try {
        //     // Mulai transaksi database
        //     DB::beginTransaction();

        //     foreach ($request->siswa as $siswaData) {
        //         // Simpan data presensi untuk setiap siswa
        //         Presensi::updateOrCreate(
        //             [
        //                 'siswa_id' => $siswaData['id'],
        //                 'mapel_id' => $request->mapel_id,
        //                 'tanggal' => $request->tanggal,
        //             ],
        //             [
        //                 'status' => $siswaData['status'],
        //                 // Tambahkan field lain jika ada
        //             ]
        //         );
        //     }

        //     // Commit transaksi database
        //     DB::commit();

        //     return redirect()->route('presensis.index', $kelas_id)->with('success', 'Presensi berhasil disimpan');
        // } catch (\Exception $e) {
        //     // Rollback transaksi database jika terjadi kesalahan
        //     DB::rollBack();

        //     return redirect()->route('presensis.index', $kelas_id)->with('error', 'Gagal menyimpan presensi');
        // }

    // ...        }
