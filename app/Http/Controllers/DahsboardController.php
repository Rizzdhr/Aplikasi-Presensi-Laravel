<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Requests\Kelas\KelasPostRequest;

use App\Models\Jurusan;

use App\Models\Siswa;

//import Model "Kelas
use App\Models\Kelas;

use App\Models\Guru;

//return type View
use Illuminate\View\View;

//return type redirectResponse
use Illuminate\Http\RedirectResponse;


class DahsboardController extends Controller
{
    public function dashboard()
{
    // Hitung jumlah data untuk masing-masing model
    $kelasCount = Kelas::count();
    $siswaCount = Siswa::count();
    $guruCount = Guru::count();
    $jurusanCount = Jurusan::count();

    // Kirim data ke tampilan
    return view('dashboard', compact('kelasCount', 'siswaCount', 'guruCount', 'jurusanCount'));
}

}
