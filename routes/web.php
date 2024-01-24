<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
        return view('auth.login');
    });

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login-proses', [LoginController::class, 'login_proses'])->name('login-proses');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard')->middleware('auth');

// Route::group(['prefix' => 'admin', 'middleware' => ['auth'], 'as' => 'admin.'], function () {
//     Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard.index');
// });

// data kelas
Route::get('/kelass', [KelasController::class, 'index'])->name('kelass.index');
Route::get('/kelass/create', [KelasController::class, 'create'])->name('kelass.create');
Route::post('/kelass', [KelasController::class, 'store'])->name('kelass.store');
Route::get('/kelass/{kelas}', [KelasController::class, 'show'])->name('kelass.show');
Route::get('/kelass/{kelas}/edit', [KelasController::class, 'edit'])->name('kelass.edit');
Route::put('/kelass/{kelas}', [KelasController::class, 'update'])->name('kelass.update');
Route::delete('/kelass/{kelas}', [KelasController::class, 'destroy'])->name('kelass.destroy');

// data siswa
Route::get('/siswas', [SiswaController::class, 'index'])->name('siswas.index');
Route::get('/siswas/create', [SiswaController::class, 'create'])->name('siswas.create');
Route::post('/siswas', [SiswaController::class, 'store'])->name('siswas.store');
Route::get('/siswas/{siswa}/edit', [SiswaController::class, 'edit'])->name('siswas.edit');
Route::put('/siswas/{siswa}', [SiswaController::class, 'update'])->name('siswas.update');
Route::delete('/siswas/{siswa}', [SiswaController::class, 'destroy'])->name('siswas.destroy');

// data guru
Route::get('/gurus', [GuruController::class, 'index'])->name('gurus.index');
Route::get('/gurus/create', [GuruController::class, 'create'])->name('gurus.create');
Route::post('/gurus', [GuruController::class, 'store'])->name('gurus.store');
Route::get('/gurus/{guru}/edit', [GuruController::class, 'edit'])->name('gurus.edit');
Route::put('/gurus/{guru}', [GuruController::class, 'update'])->name('gurus.update');
Route::delete('/gurus/{guru}', [GuruController::class, 'destroy'])->name('gurus.destroy');

// data mapel
Route::get('/mapels', [MapelController::class, 'index'])->name('mapels.index');
Route::get('/mapels/create', [MapelController::class, 'create'])->name('mapels.create');
Route::post('/mapels', [MapelController::class, 'store'])->name('mapels.store');
Route::get('/mapels/{mapel}/edit', [MapelController::class, 'edit'])->name('mapels.edit');
Route::put('/mapels/{mapel}', [MapelController::class, 'update'])->name('mapels.update');
Route::delete('/mapels/{mapel}', [MapelController::class, 'destroy'])->name('mapels.destroy');

// data jurusan
Route::get('/jurusans', [JurusanController::class, 'index'])->name('jurusans.index');
Route::get('/jurusans/create', [JurusanController::class, 'create'])->name('jurusans.create');
Route::post('/jurusans', [JurusanController::class, 'store'])->name('jurusans.store');
Route::get('/jurusans/{jurusan}/edit', [JurusanController::class, 'edit'])->name('jurusans.edit');
Route::put('/jurusans/{jurusan}', [JurusanController::class, 'update'])->name('jurusans.update');
Route::delete('/jurusans/{jurusan}', [JurusanController::class, 'destroy'])->name('jurusans.destroy');







// // data kelas
// Route::resource('/kelass', KelasController::class);
// data siswa
// Route::resource('/students', StudentController::class);


// Route::get('/user', [HomeController::class, 'index']);

// Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard')->middleware('auth');

// Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

// data siswa

// data kelas




    // Route::middleware(['guest'])->group(function(){
    //     Route::get('/', [SesiController::class, 'index']);
    //     Route::get('/', [SesiController::class, 'login']);
    // });
    // Route::get('/home', function(){
    //     return redirect('/admin');
    // });

    // // auth
    // Route::get('/register', [AuthController::class,'register']);
    // Route::post('register', [AuthController::class,'registerpost'])->name('registerpost');

    // Route::get('/login', [AuthController::class,'login']);
    // Route::post('login', [AuthController::class,'loginpost'])->name('loginpost');

// Route::get('/logout', [AuthController::class,'logout'])->name('logout');
