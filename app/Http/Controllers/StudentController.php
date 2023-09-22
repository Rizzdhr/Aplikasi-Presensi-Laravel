<?php

namespace App\Http\Controllers;

//import Model "Student
use App\Models\Student;

//return type View
use Illuminate\View\View;

//return type redirectResponse
use Illuminate\Http\RedirectResponse;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        //get students
        $students = Student::latest()->paginate(5);

        //render view with students
        return view('students.siswa', compact('students'));
    }

      /**
    * create
    *
    * @return View
    */
   public function create(): View
   {
       return view('students.create');
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
           'nis'     => 'required',
           'nama'     => 'required',
           'no_hp'   => 'required',
           'email'  => 'required',
           'jenis_kelamin'  => 'required'
       ]);


       //create student
       Student::create([
           'nis'     => $request->nis,
           'nama'   => $request->nama,
           'no_hp'   => $request->no_hp,
           'email'   => $request->email,
           'jenis_kelamin'   => $request->jenis_kelamin
       ]);

       //redirect to index
       return redirect()->route('students.index')->with(['success' => 'Data Berhasil Disimpan!']);
   }

   /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */
    public function edit(string $id): View
    {
        //get student by ID
        $student = Student::findOrFail($id);

        //render view with student
        return view('students.edit', compact('student'));
    }

    // update
    public function update(Request $request, $id): RedirectResponse
{
    // Validate form data
    $this->validate($request, [
        'nis' => 'required',
        'nama' => 'required',
        'no_hp' => 'required',
        'email' => 'required',
        'jenis_kelamin' => 'required'
    ]);

    // Get student by ID
    $student = Student::findOrFail($id);

    // Update student data with the new values
    $student->update([
        'nis' => $request->nis,
        'nama' => $request->nama,
        'no_hp' => $request->no_hp,
        'email' => $request->email,
        'jenis_kelamin' => $request->jenis_kelamin,
    ]);

    // Redirect to the index with a success message
    return redirect()->route('students.index')->with(['success' => 'Data Berhasil Diubah!']);
}

    /**
     * destroy
     *
     * @param  mixed $student
     * @return void
     */
    public function destroy($id): RedirectResponse
    {
        //get student by ID
        $student = Student::findOrFail($id);

        //delete student
        $student->delete();

        //redirect to index
        return redirect()->route('students.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
