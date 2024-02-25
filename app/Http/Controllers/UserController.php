<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Instantiate a new UserController instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create-user|edit-user|delete-user', ['only' => ['index','show']]);
        $this->middleware('permission:create-user', ['only' => ['create','store']]);
        $this->middleware('permission:edit-user', ['only' => ['edit','update']]);
        $this->middleware('permission:delete-user', ['only' => ['destroy']]);

    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('users.index', [
            'users' => User::latest('id')->paginate(3)
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('users.create', [
            'roles' => Role::pluck('name')->all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request): RedirectResponse
    {
        $input = $request->all();
        $input['password'] = Hash::make($request->password);

        $user = User::create($input);
        $user->assignRole($request->roles);


        return redirect()->route('users.index')
                ->withSuccess('New user is added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user): View
    {
        return view('users.show', [
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user): View
    {
        // Check Only Super Admin can update his own Profile
        if ($user->hasRole('Super Admin')){
            if($user->id != auth()->user()->id){
                abort(403, 'USER DOES NOT HAVE THE RIGHT PERMISSIONS');
            }
        }

        return view('users.edit', [
            'user' => $user,
            'roles' => Role::pluck('name')->all(),
            'userRoles' => $user->roles->pluck('name')->all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user): RedirectResponse
    {
        $input = $request->all();

        if(!empty($request->password)){
            $input['password'] = Hash::make($request->password);
        }else{
            $input = $request->except('password');
        }

        $user->update($input);

        $user->syncRoles($request->roles);

        return redirect()->back()
                ->withSuccess('User is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user): RedirectResponse
    {
        // About if user is Super Admin or User ID belongs to Auth User
        if ($user->hasRole('Super Admin') || $user->id == auth()->user()->id)
        {
            abort(403, 'USER DOES NOT HAVE THE RIGHT PERMISSIONS');
        }

        $user->syncRoles([]);
        $user->delete();
        return redirect()->route('users.index')
                ->withSuccess('User is deleted successfully.');
    }
}






// <?php

// namespace App\Http\Controllers;

// use App\Models\Guru;
// use App\Models\User;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Log;
// use App\Http\Controllers\Controller;
// use App\Http\Requests\User\UserPostRequest;
// use App\Http\Requests\User\UserPutRequest;
// use Illuminate\Support\Facades\Hash;
// use App\Models\Role;
// use App\Models\RoleUser;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\DB;
// use RealRashid\SweetAlert\Facades\Alert;


// class UserController extends Controller
// {
//     public function index()
//     {

//         // membawa data user bersama rolenya
//         $users = User::all();
//         // dd($users);

//         return  view('user.index', ['users' => $users]);
//     }

//     public function create()
//     {
//         // membawa data role
//         $roles = Role::all();

//         // membawa data guru
//         $dataGuru = Guru::all();

//         return view('user.create', ['dataGuru' => $dataGuru, 'roles' => $roles]);
//     }

//     public function store(UserPostRequest $request)
//     {
//         // mengecek apakah guru yang di daftarkan itu ada datanya di table guru
//         $guru = Guru::where('id', $request->validated('guru_id'))->first();

//         // mengecek bila tidak ada
//         if (!$guru) {

//             return back()->with('failed', 'Guru tidak tersedia');
//         }

//         // menambahkan/register user baru
//         $createUser = User::create([
//             'guru_id' => $guru->id,
//             'username' => $guru->nama,
//             'email' => $request->validated('email'),
//             'password' => Hash::make($request->validated('password'))
//         ]);

//         // membuat role user yang dipilih
//         foreach ($request->validated('roles') as $role) {
//             $createRoleUser = DB::table('role_user')->insert([
//                 'user_id' => $createUser->id,
//                 'role_id' => $role
//             ]);
//         }

//         // melakukan pengecekan menambah dan membuat role untuk user nya harus berhasil semua
//         if ($createUser && $createRoleUser) {

//             return redirect()->route('user.index')->with('success', 'Berhasil membuat user');
//         }
//     }

//     public function edit(User $user)
//     {
//         $roles = Role::all();
//         $dataGuru = Guru::where('id', '!=', $user->guru_id)->get();

//         return view('user.edit', ['dataGuru' => $dataGuru, 'roles' => $roles, 'user' => $user]);
//     }

//     public function update(User $user, UserPutRequest $request)
//     {

//         $guru = Guru::where('id', $user->guru_id)->first();

//         if (!$guru) {

//             return back()->with('failed', 'Guru tidak tersedia');
//         }

//         // menghapus data lama lalu membuat yang baru
//         $deleteOldRoleUser = RoleUser::where('user_id', $user->id)->delete();

//         $updateUser = $user->update([
//             'guru_id' => $guru->id,
//             'username' => $guru->nama,
//             'email' => $request->validated('email'),
//             'password'  => Hash::make($request->validated('password'))
//         ]);

//         $updateNewRoleUser =  null;
//         foreach ($request->validated('roles') as $role) {
//             $updateNewRoleUser = DB::table('role_user')->insert([
//                 'user_id' => $user->id,
//                 'role_id' => $role
//             ]);
//         }

//         if ($updateUser && $updateNewRoleUser){

//             return redirect()->route('user.index')->with('success', 'Berhasil mengupdate user');
//         }
//     }

//     public function destroy(User $user)
//     {

//         if (Auth::user()->id == $user->id) {

//             return redirect()->route('user.index')->with('failed', 'Anda tidak dapat menghapus akun anda sendiri');
//         }

//         $deleteRoleUser = RoleUser::where('user_id', $user->id)->delete();
//         $deleteUser = $user->delete();

//         if ($deleteRoleUser && $deleteUser) {

//             return redirect()->route('user.index')->with('success', 'Berhasil menghapus user');
//         }
//     }
// }
