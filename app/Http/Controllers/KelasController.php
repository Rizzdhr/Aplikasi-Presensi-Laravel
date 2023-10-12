<?php

namespace App\Http\Controllers;

//import Model "Kelas
use App\Models\Kelas;

//return type View
use Illuminate\View\View;

//return type redirectResponse
use Illuminate\Http\RedirectResponse;

use Illuminate\Http\Request;

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
        $kelass = Kelas::latest()->paginate(10);


        //render view with kelass
        return view('kelass.kelas', compact('kelass'));
    }

      /**
    * create
    *
    * @return View
    */
   public function create(): View
   {
       return view('kelass.create');
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
           'kelas'     => 'required',
           'jurusan'     => 'required',
       ]);


       //create Kelas
       Kelas::create([
            'kelas'  => $request->kelas,
            'jurusan'   => $request->jurusan,
        ]);

       //redirect to index
       return redirect()->route('kelass.index')->with(['success' => 'Data Berhasil Disimpan!']);
   }

   /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */
    public function edit(string $id): View
    {
        //get Kelas by ID
        $Kelas = Kelas::findOrFail($id);

        //render view with Kelas
        return view('kelass.edit', compact('Kelas'));
    }

    // update
    public function update(Request $request, $id): RedirectResponse
{
    // Validate form data
    $this->validate($request, [
        'kelas' => 'required',
        'jurusan' => 'required',
    ]);

    // Get Kelas by ID
    $Kelas = Kelas::findOrFail($id);

    // Update Kelas data with the new values
    $Kelas->update([
        'kelas' => $request->kelas,
        'jurusan' => $request->jurusan,
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
        //get Kelas by ID
        $Kelas = Kelas::findOrFail($id);

        //delete Kelas
        $Kelas->delete();

        //redirect to index
        return redirect()->route('kelass.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
