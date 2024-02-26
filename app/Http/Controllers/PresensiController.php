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
        $siswas = Siswa::where('kelas_id', $kelas_id)->get();
        $users = User::all();
        $mapels = Mapel::all();

        return view('presensis.create', compact('kelas', 'siswas', 'users', 'mapels'));
    }

    // public function show(Request $request, $id): View
    // {
    //     $presensis = Kelas::findOrFail($id);
    //     $mapels = Mapel::all();

    //     return view('presensis.create', compact('mapels', 'presensis'));
    // }


    public function create(Request $request)
    {
        $kelas = Kelas::all();
        $siswas = Siswa::all();
        $mapel = Mapel::all();
        return view('presensis.create', compact('kelas', 'siswas', 'mapel'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'kelas_id'  => 'required',
            'siswa_id'  => 'required',
            'mapel_id'  => 'required',
            'user_id'   => 'required',
            'presensi'  => 'required|array',
            'presensi.*' => 'required|in:Hadir,Izin,Sakit,Alpha',
        ]);

        foreach ($request->presensi as $siswa_id => $presensi) {
            // Mencari atau membuat presensi berdasarkan kelas, siswa, user, dan tanggal
            $existingPresensi = Presensi::firstOrNew([
                'kelas_id'    => $request->kelas_id,
                'siswa_id'    => $siswa_id,
                'mapel_id'    => $request->mapel_id,
                'user_id'     => $request->user_id,
                'created_at'  => now()->format('Y-m-d'),
            ]);

            // Set nilai presensi
            $existingPresensi->presensi = $presensi;

            // Jika data baru, simpan
            if (!$existingPresensi->exists) {
                $existingPresensi->save();
            } else {
                // Jika data sudah ada, Anda dapat menangani kasus ini sesuai kebutuhan
                // Misalnya, tampilkan pesan kesalahan atau lakukan tindakan tertentu.
                return back()->with(['failed' => 'Presensi sudah ada untuk siswa ini pada hari ini dengan mapel yang sama.']);
            }
        }

        return redirect()->route('laporan')->with(['success' => 'Data Berhasil Ditambahkan']);
    }


    public function edit($id)
    {
        $presensi = Presensi::with('siswas', 'kelas')->findOrFail($id);
        $users = User::all();
        $kelas = Kelas::all();
        $siswas = Siswa::all();
        $mapel = Mapel::all();
        return view('presensis.edit', compact('presensi', 'users', 'kelas', 'siswas', 'mapel'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'siswa_id'  => 'required',
            'kelas_id'  => 'required',
            'user_id'   => 'required',
            'mapel_id'  => 'required',
            'presensi' => 'required|in:Hadir, Izin, Sakit, Alpha',
        ]);

        $presensi = Presensi::findOrFail($id);

        $presensi->update([
            'siswa_id'  => $request->siswa_id,
            'kelas_id'  => $request->kelas_id,
            'user_id'   => $request->user_id,
            'mapel_id'  => $request->mapel_id,
            'presensi' => $request->presensi,
        ]);
        return redirect()->route('laporan')->with(['success' => 'Data Berhasil Diubah']);
    }

    public function laporan()
    {
        $mapels = Mapel::all();
        $kelas = Kelas::all();
        $presensis = Presensi::with('kelas', 'siswas', 'mapels', 'users')->get();
        // dd($presensis); // Tambahkan ini untuk debugging
        return view('presensis.laporan', compact('presensis', 'kelas', 'mapels'));
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
