<?php

namespace App\Http\Controllers;

use App\Models\Kelas;

use App\Models\Jurusan;

use Maatwebsite\Excel\Facades\Excel;

use App\Exports\SiswaExport;

use App\Imports\SiswaImport;

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
        $siswas = Siswa::with('kelas')->orderBy('nama', 'asc')->get();

        // Menghitung nomor urut
        $counter = 1;

        //render view with siswas
        return view('siswas.siswa', compact('siswas', 'counter'));
        // }
        // return abort(403);
    }

    public function import(Request $request)
    {
        $file = $request->file('file');
        $namaFile = $file->getClientOriginalName();
        $file->move('DataSiswa', $namaFile);

        Excel::import(new SiswaImport, public_path('/DataSiswa/'.$namaFile));
        return redirect('siswas.index');
    }

    public function export()
    {
        return Excel::download(new SiswaExport, 'siswa.xlsx');
    }

    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        // $this->authorize('create_data');

        // $siswas = Siswa::all();
        $kelass = Kelas::all();

        return view('siswas.create', compact('kelass'));
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
            'nisn'     => 'required|unique:siswas,nisn',
            'nama'     => 'required',
            'kelas_id'  => 'required',
            'jenis_kelamin'  => 'required'
        ]);


        //create Siswa
        Siswa::create([
            'nisn'  => $request->nisn,
            'nama'   => $request->nama,
            'kelas_id'  => $request->kelas_id,
            'jenis_kelamin'   => $request->jenis_kelamin
        ]);

        //redirect to index
        return redirect()->route('siswas.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function show($id)
    {
        $siswa = Siswa::findOrFail($id);
        return view('siswas.show', compact('siswa'));
    }


    /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */
    public function edit(string $id): View
    {
        // $this->authorize('edit_data');

        //get siswa by ID
        $siswa = Siswa::findOrFail($id);
        $kelass = Kelas::all();

        //render view with siswa
        return view('Siswas.edit', compact('siswa', 'kelass'));
    }

    // update
    public function update(Request $request, $id): RedirectResponse
    {
        // Validate form data
        $this->validate($request, [
            'nisn' => 'required|unique:siswas,nisn,' . $id,
            'nama' => 'required',
            'kelas_id'  => 'required',
            'jenis_kelamin' => 'required'
        ]);

        // Get siswa by ID
        $siswa = Siswa::findOrFail($id);

        // Update siswa data with the new values
        $siswa->update([
            'nisn' => $request->nisn,
            'nama' => $request->nama,
            'kelas_id'  => $request->kelas_id,
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
        // $this->authorize('delete_data');

        //get siswa by ID
        $siswa = Siswa::findOrFail($id);

        //delete siswa
        $siswa->delete();

        //redirect to index
        return redirect()->route('siswas.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
