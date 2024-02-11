<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absensi;
use App\Models\Kelas;
use App\Models\Siswa;

class PresensiController extends Controller
{
    public function showPresensiForm($kelasId)
    {
        $kelas = Kelas::findOrFail($kelasId);
        $siswa = $kelas->siswa;

        return view('presensi.form', ['kelasId' => $kelasId], compact('kelas', 'siswa'));
    }

    public function storePresensi(Request $request)
    {
        $request->validate([
            'kelas' => 'required',
            'siswa' => 'required|array',
            'status' => 'required|array',
        ]);

        foreach ($request->siswa as $index => $siswaId) {
            Absensi::create([
                'kelas_id' => $request->kelas,
                'siswa_id' => $siswaId,
                'tanggal' => now(),
                'status' => $request->status[$index],
            ]);
        }

        return redirect()->route('dashboard')->with('success', 'Presensi berhasil disimpan.');
    }
}
