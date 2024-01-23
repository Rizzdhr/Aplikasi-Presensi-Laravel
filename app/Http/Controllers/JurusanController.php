<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jurusan;
//return type View
use Illuminate\View\View;

class JurusanController extends Controller
{
    /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        // if(auth()->user()->can('view_kelas')){
        //get jurusans
        $jurusans = Jurusan::latest()->paginate(10);

        $jurusans = Jurusan::orderBy('nama_jurusan', 'asc')->get();

        // Menghitung nomor urut
        $counter = 1;

        //render view with jurusans
        return view('jurusans.jurusan', compact('jurusans', 'counter'));
    }


    // /**
    //  * Menampilkan daftar jurusan.
    //  *
    //  * @return \Illuminate\View\View
    //  */
    // public function index()
    // {
    //     $jurusans = Jurusan::all();
    //     return view('jurusans.index', compact('jurusans'));
    // }

    /**
     * Menampilkan formulir untuk membuat jurusan baru.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('jurusans.create');
    }

    /**
     * Menyimpan jurusan baru ke dalam database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_jurusan' => 'required|unique:jurusans,nama_jurusan'
        ]);

        Jurusan::create([
            'nama_jurusan' => $request->nama_jurusan
        ]);

        return redirect()->route('jurusans.index')->with(['success' => 'Jurusan berhasil disimpan!']);
    }

    /**
     * Menampilkan formulir untuk mengedit jurusan.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
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
    public function update(Request $request, $id)
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
    public function destroy($id)
    {
        $jurusan = Jurusan::findOrFail($id);
        $jurusan->delete();

        return redirect()->route('jurusans.index')->with(['success' => 'Jurusan berhasil dihapus!']);
    }
}
