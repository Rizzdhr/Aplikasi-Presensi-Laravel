<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Mapel;
use App\Models\Presensi;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PresensiController extends Controller
{
    public function index(): View
    {
        $presensis = Kelas::orderBy('tingkat_kelas')
            ->orderBy('jurusan_id')
            ->orderBy('nomor_kelas')
            ->get();

        return view('presensis.kelas', compact('presensis'));
    }

    public function show(Request $request, $id): View
    {
        $presensis = Kelas::findOrFail($id);
        $mapels = Mapel::all();

        return view('presensis.siswa', compact('mapels', 'presensis'));
    }

    public function filter(Request $request, $id)
    {
        $tanggal = $request->input('tanggal');
        // $mapelId = $request->input('mapel_id');

        // Lakukan filter pada data presensi berdasarkan tanggal dan mapel
        $presensis = Presensi::when($tanggal, function ($query) use ($tanggal) {
            return $query->whereDate('tanggal', $tanggal);
        });
            // ->when($mapelId, function ($query) use ($mapelId) {
            //     return $query->where('mapel_id', $mapelId);
            // })
            // ->get();


        return view('presensis.show', compact('presensis'));
    }

    public function store(Request $request, $id)
    {
        $presensis = Kelas::find($id);

        // Validasi form jika diperlukan
        $request->validate([
            'siswa_id' => 'required|exists:siswas,id',
            'mapel_id' => 'required',
            'keterangan' => 'required|in:Hadir,Izin,Sakit,Alpha',
        ]);

        // Simpan data presensi ke dalam database
        Presensi::create([
            'siswa_id' => $request->input('siswa_id'),
            'mapel_id' => $request->input('mapel_id'),
            'keterangan' => $request->input('keterangan'),
            // Tambahkan kolom lain sesuai kebutuhan
        ]);

        // Redirect atau berikan respons sesuai kebutuhan
        return redirect()->route('presensis.show', ['id' => $presensis->id] )->with('success', 'Data presensi berhasil disimpan.');
    }
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
