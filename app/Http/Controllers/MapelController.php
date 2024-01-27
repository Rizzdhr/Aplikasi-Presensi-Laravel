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

    /**
     * Menampilkan formulir untuk mengedit mapel.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
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
        $mapel = Mapel::findOrFail($id);
        $mapel->delete();

        return redirect()->route('mapels.index')->with(['success' => 'Mapel berhasil dihapus!']);
    }
}
