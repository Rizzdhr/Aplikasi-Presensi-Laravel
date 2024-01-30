<?php

namespace App\Http\Controllers;


// use App\Models\User;

//import Model "Jurusan

use App\Http\Requests\Kelas\KelasPostRequest;

use App\Models\Jurusan;

use App\Models\Siswa;

//import Model "Kelas
use App\Models\Kelas;

//return type View
use Illuminate\View\View;

//return type redirectResponse
use Illuminate\Http\RedirectResponse;

use Illuminate\Http\Request;

use Spatie\Permission\Exceptions\UnauthorizedException;


class KelasController extends Controller
{
    /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        //get kelass
        $kelass = Kelas::with('jurusan')->orderByDesc('tingkat_kelas')
            ->orderBy('jurusan_id')
            ->orderBy('nomor_kelas')
            ->get();

        // Menghitung nomor urut
        $counter = 1;

        //render view with kelass
        return view('kelass.kelas', compact('kelass', 'counter'));
    }

    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        $this->authorize('create_data');

        $jurusans = Jurusan::all(); // Mendapatkan semua jurusan untuk ditampilkan di form

        return view('kelass.create', compact('jurusans'));
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(KelasPostRequest $request): RedirectResponse
    {
        // // Debugging: Cek data dari form
        // dd($request->all());

        if (Kelas::where('tingkat_kelas', $request->tingkat_kelas)
            ->where('jurusan_id', $request->jurusan_id)
            ->where('nomor_kelas', $request->nomor_kelas)
            ->first()
        ) {
            return back()->with(['failed' => 'Data Sudah Ada']);
        }

        //create Kelas
        Kelas::create([
            'tingkat_kelas'  => $request->tingkat_kelas,
            'jurusan_id'   => $request->jurusan_id,
            'nomor_kelas' => $request->nomor_kelas,
            'walas'     => $request->walas
        ]);

        //redirect to index
        return redirect()->route('kelass.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    //show
    public function show(Kelas $kelas)
    {
        // Mendapatkan data siswa untuk kelas tertentu
        $siswas = Siswa::where('kelas_id', $kelas->id)->get();

        // Mengambil data kelas dengan relasi siswas
        // $kelasWithSiswas = Kelas::with('siswas')->find($kelas->id);

        // Menghitung nomor urut
        $counter = 1;

        return view('kelass.show', compact('kelas', 'siswas', 'counter'));
    }

    /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */
    public function edit(string $id): View
    {
        $this->authorize('edit_data');

        //get Kelas by ID
        $Kelas = Kelas::findOrFail($id);

        // Get the list of jurusans
        $jurusans = Jurusan::all();

        //render view with Kelas
        return view('kelass.edit', compact('Kelas', 'jurusans'));
    }

    // update
    public function update(Request $request, $id): RedirectResponse
    {
        //get Kelas by ID
        $Kelas = Kelas::findOrFail($id);

        // Validate form data
        $this->validate($request, [
            'tingkat_kelas' => 'required',
            'jurusan_id' => 'required',
            'nomor_kelas' => 'required',
            'walas' => 'required'
        ]);

        // Get Kelas by ID
        $Kelas = Kelas::findOrFail($id);

        if (Kelas::where('tingkat_kelas', $request->tingkat_kelas)
            ->where('jurusan_id', $request->jurusan_id)
            ->where('nomor_kelas', $request->nomor_kelas)
            ->where('id','!=', $id)
            ->first()
        ) {
            return back()->with(['failed' => 'Data Sudah Ada']);
        }
        // Update Kelas data with the new values
        $Kelas->update([
            'tingkat_kelas' => $request->tingkat_kelas,
            'jurusan_id' => $request->jurusan_id,
            'nomor_kelas' => $request->nomor_kelas,
            'walas' => $request->walas
        ]);

        // Redirect to the index with a success message
        return redirect()->route('kelass.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * destroy
     *
     * @param  mixed $Kelas
     * @return void
     */
    public function destroy($id): RedirectResponse
    {
        $this->authorize('delete_data');

        //get Kelas by ID
        $Kelas = Kelas::findOrFail($id);

        //delete Kelas
        $Kelas->delete();

        //redirect to index
        return redirect()->route('kelass.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
