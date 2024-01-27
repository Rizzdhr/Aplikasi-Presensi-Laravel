<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jurusan;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class JurusanController extends Controller
{
    /**
     * Menampilkan daftar jurusan.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $jurusans = Jurusan::orderBy('nama_jurusan', 'asc')->get();
        $counter = 1;
        return view('jurusans.jurusan', compact('jurusans', 'counter'));
    }

    /**
     * Menampilkan formulir untuk membuat jurusan baru.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $this->authorize('create_data');
        return view('jurusans.create');
    }

    /**
     * Menyimpan jurusan baru ke dalam database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'nama_jurusan' => 'required|unique:jurusans,nama_jurusan'
        ]);

        Jurusan::create([
            'nama_jurusan' => $request->nama_jurusan
        ]);

        return redirect()->route('jurusans.index')->with(['success' => 'Jurusan berhasil disimpan!']);
    }

    public function show($id)
    {
        $jurusan = Jurusan::findOrFail($id);
        return view('jurusans.show', compact('jurusan'));
    }


    /**
     * Menampilkan formulir untuk mengedit jurusan.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $this->authorize('edit_data');
        $jurusan = Jurusan::findOrFail($id);
        return view('jurusans.edit', compact('jurusan'));
    }

    /**
     * Memperbarui informasi jurusan di dalam database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $this->validate($request, [
            'nama_jurusan' => 'required|unique:jurusans,nama_jurusan,' . $id
        ]);

        $jurusan = Jurusan::findOrFail($id);
        $jurusan->update([
            'nama_jurusan' => $request->nama_jurusan
        ]);

        return redirect()->route('jurusans.index')->with(['success' => 'Jurusan berhasil diperbarui!']);
    }

    /**
     * Menghapus jurusan dari database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $this->authorize('delete_data');
        $jurusan = Jurusan::findOrFail($id);
        $jurusan->delete();

        return redirect()->route('jurusans.index')->with(['success' => 'Jurusan berhasil dihapus!']);
    }
}
