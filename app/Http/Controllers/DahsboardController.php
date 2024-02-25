<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Guru;
use App\Models\Mapel;

class DahsboardController extends Controller
{
    public function dashboard()
{
    // dd(auth()->user());
    // Hitung jumlah data untuk masing-masing model
    $kelasCount = Kelas::count();
    $siswaCount = Siswa::count();
    $guruCount = Guru::count();
    $jurusanCount = Jurusan::count();
    $mapelCount = Mapel::count();

    // Kirim data ke tampilan
    return view('dashboard', compact('kelasCount', 'siswaCount', 'guruCount', 'jurusanCount', 'mapelCount'));
}

}
