<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Mapel;

use App\Models\Guru;

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
        $gurus = Guru::with('mapel')->orderBy('nama', 'asc')->get();

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
            'nama'     => 'required',
            'mapel_id'     => 'required',
            'jenis_kelamin'   => 'required',
        ]);

        //create Guru
        Guru::create([
            'nama'  => $request->nama,
            'mapel_id'   => $request->mapel_id,
            'jenis_kelamin'  => $request->jenis_kelamin,
        ]);

        //redirect to index
        return redirect()->route('gurus.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
}
