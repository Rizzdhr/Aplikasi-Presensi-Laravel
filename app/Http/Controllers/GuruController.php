<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mapel;
use App\Models\Guru;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class GuruController extends Controller
{
    /**
     * index
     *
     * @return View
     */

    public function index(): View
    {
        $gurus = Guru::orderBy('nama', 'asc')->get();

        $counter = 1;

        return view('gurus.guru', compact('gurus', 'counter'));
    }

    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        // $this->authorize('create_data');
        $mapels = Mapel::all();

        return view('gurus.create', compact('mapels'));
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
            'nip'   => 'required|unique:gurus,nip',
            'nama'     => 'required',
            'mapel_id'     => 'required',
            'jenis_kelamin'   => 'required',
        ]);

        //create Guru
        Guru::create([
            'nip'   => $request->nip,
            'nama'  => $request->nama,
            'mapel_id'   => $request->mapel_id,
            'jenis_kelamin'  => $request->jenis_kelamin,
        ]);

        //redirect to index
        return redirect()->route('gurus.index')->with(['success' => 'Data Berhasil Disimpan!']);
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
        //get guru by ID
        $guru = Guru::findOrFail($id);

        // Get the list of mapels
        $mapels = Mapel::all();

        //render view with guru
        return view('gurus.edit', compact('guru', 'mapels'));
    }

    // update
    public function update(Request $request, $id): RedirectResponse
    {
        // Validate form data
        $this->validate($request, [
            'nip'   => 'required|unique:gurus,nip,'  . $id,
            'nama'     => 'required',
            'mapel_id'     => 'required',
            'jenis_kelamin'   => 'required'
        ]);

        // Get guru by ID
        $guru = Guru::findOrFail($id);

        // Update guru data with the new values
        $guru->update([
            'nip'   => $request->nip,
            'nama'  => $request->nama,
            'mapel_id'   => $request->mapel_id,
            'jenis_kelamin'  => $request->jenis_kelamin,
        ]);

        // Redirect to the index with a success message
        return redirect()->route('gurus.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function show($id)
    {
        $guru = Guru::findOrFail($id);
        return view('gurus.show', compact('guru'));
    }


    /**
     * Menghapus guru dari database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        // $this->authorize('delete_data');
        $guru = Guru::findOrFail($id);

        // Periksa apakah guru masih memiliki kelas terkait
        if ($guru->kelas()->exists()) {
            return redirect()->route('gurus.index')->with(['failed' => 'Guru tidak dapat dihapus karena masih terkait dengan kelas.']);
        }

        // Periksa apakah guru masih memiliki user terkait
        if ($guru->User()->exists()) {
            return redirect()->route('gurus.index')->with(['failed' => 'Guru tidak dapat dihapus karena masih terkait dengan pengguna.']);
        }

        $guru->delete();


        return redirect()->route('gurus.index')->with(['success' => 'Data berhasil dihapus!']);
    }
}
