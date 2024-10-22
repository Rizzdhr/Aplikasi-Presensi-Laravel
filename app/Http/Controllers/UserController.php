<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Guru;
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
        $this->middleware('permission:create-user|edit-user|delete-user', ['only' => ['index', 'show']]);
        $this->middleware('permission:create-user', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit-user', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-user', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('users.index', [
            'users' => User::orderBy('username', 'asc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('users.create', [
            'dataGuru'  => Guru::all(),
            'roles' => Role::pluck('name')->all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request): RedirectResponse
    {
        // mengecek apakah guru yang di daftarkan itu ada datanya di table guru
        $guru = Guru::where('id', $request->validated('guru_id'))->first();

        $user = User::create([
            'guru_id' => $guru->id,
            'username' => $guru->nama,
            'email' => $request->validated('email'),
            'password' => Hash::make($request->validated('password'))
        ]);

        $user->assignRole($request->roles);


        return redirect()->route('users.index')
            ->withSuccess('User baru berhasil ditambahkan');
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
        // dd(Guru::where('id', '!=', $user->guru_id)->get());

        return view('users.edit', [
            'user' => $user,
            'roles' => Role::pluck('name')->all(),
            'userRoles' => $user->roles->pluck('name')->all(),
            'dataGuru' =>  Guru::all()
            // 'dataGuru' => Guru::find($user->guru_id)->where('id', '!=', $user->guru_id)->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user): RedirectResponse
    {

        $guru = Guru::where('id', $user->guru_id)->first();

        $userData = [
            'guru_id' => $guru->id,
            'username' => $guru->nama,
            'email' => $request->validated('email'),
        ];

        // Isi password hanya jika diinputkan
        if ($request->filled('password')) {
            $userData['password'] = Hash::make($request->validated('password'));
        }

        $user->update($userData);

        $user->syncRoles($request->roles);

        return redirect()->route('users.index')
            ->withSuccess('User berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user): RedirectResponse
    {

        $user->syncRoles([]);
        $user->delete();
        return redirect()->route('users.index')
            ->withSuccess('User berhasil di delete');
    }
}
