<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Mapel;
use App\Models\Presensi;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class PresensiController extends Controller
{
    public function index(): View
    {
        $this->authorize('presensi');

        $presensis = Kelas::orderBy('tingkat_kelas')
            ->orderBy('jurusan_id')
            ->orderBy('nomor_kelas')
            ->get();

        return view('presensis.presensi', compact('presensis'));
    }

    public function show($kelas_id)
    {
        $this->authorize('presensi');

        $kelas = Kelas::where('id', $kelas_id)->get();
        $siswas = Siswa::where('kelas_id', $kelas_id)->orderBy('nama', 'asc')->get();
        $users = User::all();
        $mapels = Mapel::all();

        return view('presensis.create', compact('kelas', 'siswas', 'users', 'mapels'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'kelas_id'  => 'required',
            'siswa_id'  => 'required|array',
            'siswa_id.*'  => 'required|exists:siswas,id',
            'user_id'   => 'required',
            'mapel_id'  => 'required',
            'presensi'  => 'required|array',
            'presensi.*'    => 'required|in:Hadir,Izin,Sakit,Alpha',
        ]);

        foreach ($request->siswa_id as $siswa_id) {
            // Cari presensi berdasarkan kelas, siswa, dan tanggal
            $existingPresensi = Presensi::where([
                'kelas_id'    => $request->kelas_id,
                'siswa_id'    => $siswa_id,
                'mapel_id'    => $request->mapel_id,
                'created_at'  => now()->format('Y-m-d'),
            ])->first();

            // Jika presensi sudah ada
            if ($existingPresensi) {
                // Periksa apakah guru yang menyimpan sebelumnya sama dengan guru yang menyimpan sekarang
                if ($existingPresensi->user_id !== $request->user_id) {
                    // Guru yang berbeda mencoba menyimpan presensi
                    return back()->with(['failed' => 'Presensi sudah ada untuk hari ini dengan mapel yang sama']);
                }

                // Update nilai presensi jika perlu
                $existingPresensi->presensi = $request->presensi[$siswa_id];
                $existingPresensi->save();
            } else {
                // Buat entri baru
                Presensi::create([
                    'kelas_id'    => $request->kelas_id,
                    'siswa_id'    => $siswa_id,
                    'mapel_id'    => $request->mapel_id,
                    'user_id'     => $request->user_id,
                    'created_at'  => now()->format('Y-m-d'),
                    'presensi'    => $request->presensi[$siswa_id],
                ]);
            }
        }

        return redirect()->route('laporan')->with(['success' => 'Data Berhasil Ditambahkan']);
    }


    public function laporan()
    {
        $mapels = Mapel::all();
        $kelas = Kelas::all();
        $presensis = Presensi::with('kelas', 'siswas', 'mapels', 'users')
            // ->where('user_id', Auth::user()->id) // Filter berdasarkan user yang masuk
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

    public function edit($id)
    {
        $this->authorize('presensi');

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
            // 'kelas_id'  => 'required',
            // 'siswa_id'  => 'required',
            // 'user_id'   => 'required',
            // 'mapel_id'  => 'required',
            'presensi' => 'required',
        ]);

        $presensi = Presensi::findOrFail($id);

        $presensi->update([
            // 'kelas_id'  => $request->kelas_id,
            // 'siswa_id'  => $request->siswa_id,
            // 'user_id'   => $request->user_id,
            // 'mapel_id'  => $request->mapel_id,
            'presensi' => $request->presensi,
        ]);

        // dd($presensi);

        return redirect()->route('laporan')->with(['success' => 'Data Berhasil Diubah']);
    }


    public function destroy(string $id)
    {
        $this->authorize('presensi');

        $presensi = Presensi::where('user_id', Auth::user()->id)->findOrFail($id);

        $presensi->delete();

        return redirect()->route('laporan')->with(['success' => 'Data Berhasil Dihapus']);
    }
}
