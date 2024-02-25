<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;


class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create-role|edit-role|delete-role', ['only' => ['index','show']]);
        $this->middleware('permission:create-role', ['only' => ['create','store']]);
        $this->middleware('permission:edit-role', ['only' => ['edit','update']]);
        $this->middleware('permission:delete-role', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('roles.index', [
            'roles' => Role::orderBy('name','asc')->paginate(3)
        ]);


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('roles.create', [
            'permissions' => Permission::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoleRequest $request): RedirectResponse
    {
        $role = Role::create(['name' => $request->name]);

        $permissions = Permission::whereIn('id', $request->permissions)->get(['name'])->toArray();

        $role->syncPermissions($permissions);

        return redirect()->route('roles.index')
                ->withSuccess('New role is added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role): View
    {
        $rolePermissions = Permission::join("role_has_permissions","permission_id","=","id")
            ->where("role_id",$role->id)
            ->select('name')
            ->get();
        return view('roles.show', [
            'role' => $role,
            'rolePermissions' => $rolePermissions
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role): View
    {
        if($role->name=='Admin'){
            abort(403, 'ADMIN ROLE CAN NOT BE EDITED');
        }

        $rolePermissions = DB::table("role_has_permissions")->where("role_id",$role->id)
            ->pluck('permission_id')
            ->all();

        return view('roles.edit', [
            'role' => $role,
            'permissions' => Permission::get(),
            'rolePermissions' => $rolePermissions
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoleRequest $request, Role $role): RedirectResponse
    {
        $input = $request->only('name');

        $role->update($input);

        $permissions = Permission::whereIn('id', $request->permissions)->get(['name'])->toArray();

        $role->syncPermissions($permissions);

        return redirect()->route('roles.index')
                ->withSuccess('Role is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role): RedirectResponse
    {
        if($role->name=='Admin'){
            abort(403, 'ROLE CAN NOT BE DELETED');
        }
        if(auth()->User()->hasRole($role->name)){
            abort(403, 'CAN NOT DELETE SELF ASSIGNED ROLE');
        }
        $role->delete();
        return redirect()->route('roles.index')
                ->withSuccess('Role is deleted successfully.');

    }
}











// <?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Models\Role;
// use App\Models\User;
// use Illuminate\View\View;
// use Illuminate\Http\RedirectResponse;

// class RoleController extends Controller
// {
//     /**
//      * Menampilkan daftar role.
//      *
//      * @return \Illuminate\View\View
//      */
//     public function index(): View
//     {
//         $roles = Role::orderBy('nama', 'asc')->get();
//         $counter = 1;
//         return view('roles.role', compact('roles', 'counter'));
//     }

//     /**
//      * Menampilkan formulir untuk membuat jurusan baru.
//      *
//      * @return \Illuminate\View\View
//      */
//     public function create()
//     {
//         // $this->authorize('create_data');
//         return view('roles.create');
//     }

//     /**
//      * Menyimpan jurusan baru ke dalam database.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @return \Illuminate\Http\RedirectResponse
//      */
//     public function store(Request $request): RedirectResponse
//     {
//         $this->validate($request, [
//             'nama' => 'required|unique:roles,nama'
//         ]);

//         Role::create([
//             'nama' => $request->nama
//         ]);

//         return redirect()->route('roles.index')->with(['success' => 'Role berhasil disimpan!']);
//     }

//     public function show($id)
//     {
//         $role = Role::findOrFail($id);
//         return view('roles.show', compact('role'));
//     }


//     /**
//      * Menampilkan formulir untuk mengedit jurusan.
//      *
//      * @param  int  $id
//      * @return \Illuminate\View\View
//      */
//     public function edit($id)
//     {
//         // $this->authorize('edit_data');
//         $role = Role::findOrFail($id);
//         return view('roles.edit', compact('role'));
//     }

//     /**
//      * Memperbarui informasi jurusan di dalam database.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @param  int  $id
//      * @return \Illuminate\Http\RedirectResponse
//      */
//     public function update(Request $request, $id): RedirectResponse
//     {
//         $this->validate($request, [
//             'nama' => 'required|unique:roles,nama,' . $id
//         ]);

//         $role = Role::findOrFail($id);
//         $role->update([
//             'nama' => $request->nama
//         ]);

//         return redirect()->route('roles.index')->with(['success' => 'Role berhasil diperbarui!']);
//     }

//     /**
//      * Menghapus role dari database.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\RedirectResponse
//      */
//     public function destroy($id): RedirectResponse
//     {
//         // $this->authorize('delete_data');
//         $role = Role::findOrFail($id);

//         if ($role->user()->exists()) {
//             return redirect()->route('roles.index')->with(['failed' => 'Role tidak dapat dihapus karena masih terkait dengan user.']);
//         }

//         $role->delete();

//         return redirect()->route('roles.index')->with(['success' => 'Role berhasil dihapus!']);
//     }
// }
