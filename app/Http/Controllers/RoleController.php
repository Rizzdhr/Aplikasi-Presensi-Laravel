<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class RoleController extends Controller
{
    /**
     * Menampilkan daftar role.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $roles = Role::orderBy('nama', 'asc')->get();
        $counter = 1;
        return view('roles.role', compact('roles', 'counter'));
    }

    /**
     * Menampilkan formulir untuk membuat jurusan baru.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // $this->authorize('create_data');
        return view('roles.create');
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
            'nama' => 'required|unique:roles,nama'
        ]);

        Role::create([
            'nama' => $request->nama
        ]);

        return redirect()->route('roles.index')->with(['success' => 'Role berhasil disimpan!']);
    }

    public function show($id)
    {
        $role = Role::findOrFail($id);
        return view('roles.show', compact('role'));
    }


    /**
     * Menampilkan formulir untuk mengedit jurusan.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        // $this->authorize('edit_data');
        $role = Role::findOrFail($id);
        return view('roles.edit', compact('role'));
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
            'nama' => 'required|unique:roles,nama,' . $id
        ]);

        $role = Role::findOrFail($id);
        $role->update([
            'nama' => $request->nama
        ]);

        return redirect()->route('roles.index')->with(['success' => 'Role berhasil diperbarui!']);
    }

    /**
     * Menghapus jurusan dari database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        // $this->authorize('delete_data');
        $role = Role::findOrFail($id);


        $role->delete();

        return redirect()->route('roles.index')->with(['success' => 'Role berhasil dihapus!']);
    }
}
