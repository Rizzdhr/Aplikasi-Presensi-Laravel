<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mapel;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class MapelController extends Controller
{
    /**
     * Menampilkan daftar Mapel.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $this->authorize('view-data');

        $mapels = Mapel::orderBy('nama_mapel', 'asc')->get();
        $counter = 1;
        return view('mapels.mapel', compact('mapels', 'counter'));
    }

    /**
     * Menampilkan formulir untuk membuat jurusan baru.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $this->authorize('create-data');

        return view('mapels.create');
    }

    /**
     * Menyimpan mapel baru ke dalam database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'nama_mapel' => 'required|unique:mapels,nama_mapel'
        ]);

        Mapel::create([
            'nama_mapel' => $request->nama_mapel
        ]);

        return redirect()->route('mapels.index')->with(['success' => 'Mapel berhasil disimpan!']);
    }

    public function show($id)
    {
        $mapel = Mapel::findOrFail($id);
        return view('mapels.show', compact('mapel'));
    }


    /**
     * Menampilkan formulir untuk mengedit mapel.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $this->authorize('edit-data');

        $mapel = Mapel::findOrFail($id);
        return view('mapels.edit', compact('mapel'));
    }

    /**
     * Memperbarui informasi mapel di dalam database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $this->validate($request, [
            'nama_mapel' => 'required|unique:mapels,nama_mapel,' . $id
        ]);

        $mapel = Mapel::findOrFail($id);
        $mapel->update([
            'nama_mapel' => $request->nama_mapel
        ]);

        return redirect()->route('mapels.index')->with(['success' => 'Jurusan berhasil diperbarui!']);
    }

    /**
     * Menghapus mapel dari database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $this->authorize('delete-data');

        $mapel = Mapel::findOrFail($id);

        // if ($mapel->guru()->exists()) {
        //     return redirect()->route('mapels.index')->with(['failed' => 'Mapel tidak dapat dihapus karena masih terkait dengan guru.']);
        // }
        $mapel->delete();

        return redirect()->route('mapels.index')->with(['success' => 'Mapel berhasil dihapus!']);
    }
}
