<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserPostRequest;
use App\Http\Requests\User\UserPutRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
use App\Models\RoleUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;


class UserController extends Controller
{
    public function index()
    {

        // membawa data user bersama rolenya
        $users = User::all();
        // dd($users);

        return  view('user.index', ['users' => $users]);
    }

    public function create()
    {
        // membawa data role
        $roles = Role::all();

        // membawa data guru
        $dataGuru = Guru::all();

        return view('user.create', ['dataGuru' => $dataGuru, 'roles' => $roles]);
    }

    public function store(UserPostRequest $request)
    {
        // mengecek apakah guru yang di daftarkan itu ada datanya di table guru
        $guru = Guru::where('id', $request->validated('guru_id'))->first();

        // mengecek bila tidak ada
        if (!$guru) {

            return back()->with('failed', 'Guru tidak tersedia');
        }

        // menambahkan/register user baru
        $createUser = User::create([
            'guru_id' => $guru->id,
            'username' => $guru->nama,
            'email' => $request->validated('email'),
            'password' => Hash::make($request->validated('password'))
        ]);

        // membuat role user yang dipilih
        foreach ($request->validated('roles') as $role) {
            $createRoleUser = DB::table('role_user')->insert([
                'user_id' => $createUser->id,
                'role_id' => $role
            ]);
        }

        // melakukan pengecekan menambah dan membuat role untuk user nya harus berhasil semua
        if ($createUser && $createRoleUser) {

            return redirect()->route('user.index')->with('success', 'Berhasil membuat user');
        }
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        $dataGuru = Guru::where('id', '!=', $user->guru_id)->get();

        return view('user.edit', ['dataGuru' => $dataGuru, 'roles' => $roles, 'user' => $user]);
    }

    public function update(User $user, UserPutRequest $request)
    {

        $guru = Guru::where('id', $user->guru_id)->first();

        if (!$guru) {

            return back()->with('failed', 'Guru tidak tersedia');
        }

        // menghapus data lama lalu membuat yang baru
        $deleteOldRoleUser = RoleUser::where('user_id', $user->id)->delete();

        $updateUser = $user->update([
            'guru_id' => $guru->id,
            'username' => $guru->nama,
            'email' => $request->validated('email'),
            'password'  => Hash::make($request->validated('password'))
        ]);

        $updateNewRoleUser =  null;
        foreach ($request->validated('roles') as $role) {
            $updateNewRoleUser = DB::table('role_user')->insert([
                'user_id' => $user->id,
                'role_id' => $role
            ]);
        }

        if ($updateUser && $updateNewRoleUser){

            return redirect()->route('user.index')->with('success', 'Berhasil mengupdate user');
        }
    }

    public function destroy(User $user)
    {

        if (Auth::user()->id == $user->id) {

            return redirect()->route('user.index')->with('failed', 'Anda tidak dapat menghapus akun anda sendiri');
        }

        $deleteRoleUser = RoleUser::where('user_id', $user->id)->delete();
        $deleteUser = $user->delete();

        if ($deleteRoleUser && $deleteUser) {

            return redirect()->route('user.index')->with('success', 'Berhasil menghapus user');
        }
    }
}
