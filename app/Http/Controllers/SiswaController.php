<?php

namespace App\Http\Controllers;

use App\Models\Kelas;

use App\Models\Jurusan;

use Illuminate\Http\Request;

use App\Models\Siswa;

//return type View
use Illuminate\View\View;

//return type redirectResponse
use Illuminate\Http\RedirectResponse;


class SiswaController extends Controller
{
    /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        // if(auth()->user()->can('view_siswa')){
        //get siswas
        $siswas = Siswa::with('kelas','jurusan')->orderBy('nama', 'asc')->get();

        // Menghitung nomor urut
        $counter = 1;

        //render view with siswas
        return view('siswas.siswa', compact('siswas', 'counter'));
        // }
        // return abort(403);
    }

    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        $siswas = Siswa::all();
        $kelass = Kelas::all();
        $jurusans = Jurusan::all();

        return view('siswas.create', compact('siswas', 'kelass', 'jurusans'));
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'nisn'     => 'required',
            'nama'     => 'required',
            'kelas_id'   => 'required',
            'jurusan_id'   => 'required',
            'jenis_kelamin'  => 'required'
        ]);


        //create Siswa
        Siswa::create([
            'nisn'  => $request->nisn,
            'nama'   => $request->nama,
            'kelas_id'  => $request->kelas_id,
            'jurusan_id'   => $request->jurusan_id,
            'jenis_kelamin'   => $request->jenis_kelamin
        ]);

        //redirect to index
        return redirect()->route('siswas.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */
    public function edit(string $id): View
    {
        //get siswa by ID
        $siswa = Siswa::findOrFail($id);

        //render view with siswa
        return view('Siswas.edit', compact('siswa'));
    }

    // update
    public function update(Request $request, $id): RedirectResponse
    {
        // Validate form data
        $this->validate($request, [
            'nisn' => 'required',
            'nama' => 'required',
            'kelas_id' => 'required',
            'jurusan_id'   => 'required',
            'jenis_kelamin' => 'required'
        ]);

        // Get siswa by ID
        $siswa = Siswa::findOrFail($id);

        // Update siswa data with the new values
        $siswa->update([
            'nisn' => $request->nisn,
            'nama' => $request->nama,
            'kelas_id' => $request->kelas_id,
            'jurusan_id'   => $request->jurusan_id,
            'jenis_kelamin' => $request->jenis_kelamin,
        ]);

        // Redirect to the index with a success message
        return redirect()->route('siswas.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
    /**
     * destroy
     *
     * @param  mixed $siswa
     * @return void
     */
    public function destroy($id): RedirectResponse
    {
        //get siswa by ID
        $siswa = Siswa::findOrFail($id);

        //delete siswa
        $siswa->delete();

        //redirect to index
        return redirect()->route('siswas.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}