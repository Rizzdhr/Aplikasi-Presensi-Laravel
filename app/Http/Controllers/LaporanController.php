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

class LaporanController extends Controller
{
    public function index(): View
    {
        $laporans = Kelas::orderBy('tingkat_kelas')
            ->orderBy('jurusan_id')
            ->orderBy('nomor_kelas')
            ->get();

        return view('laporans.kelas', compact('laporans'));
    }
}
