<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserPostRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\User\UserPutRequest;
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
        //
        try {
            // mengecek apakah guru yang di daftarkan itu ada datanya di table guru
            $guru = Guru::where('id', $request->validated('guru_id'))->first();

            // mengecek bila tidak ada
            if (!$guru) {

                Alert::error('error', 'Guru tidak tersedia');
                return redirect()->route('user');
            }

            // menambahkan/register user baru
            $createUser = User::create([
                'guru_id' => $guru->id,
                'username' => $guru->nama,
                'email' => $request->validated('email'),
                'password' => Hash::make($request->validated('password'))
            ]);

            // membuat role user yang dipilih
            foreach ($request->validated('roles') as $role){
                $createRoleUser = DB::table('role_user')->insert([
                    'user_id' => $createUser->id,
                    'role_id' => $role
                ]);
            }

            // melakukan pengecekan menambah dan membuat role untuk user nya harus berhasil semua
            if ($createUser && $createRoleUser) {

                return redirect()->route('user.index')->with('success', 'Berhasil membuat user');
                // toast('Berhasil membuat user', 'success' );
            }
        } catch (\Throwable $th) {

            // jika terjadi kesalahan/error akan membuat sebuah pesan log kesalahan nya
            Alert::error('error', 'Terjadi kesalahan');
            Log::error('Error Create User: ' . $th->getMessage());
        }

        return redirect()->route('user.index');
    }

}
