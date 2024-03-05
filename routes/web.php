<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\DahsboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

// Route::get('/', function () {
//     return view('auth.login');
// });

Route::group(['middleware' => 'guest'], function () {
    Route::get('/', [LoginController::class, 'index'])->name('login');
    Route::post('/login-proses', [LoginController::class, 'login_proses'])->name('login-proses');
});

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    //     Route::middleware(['Admin'])->group(function () {
    Route::prefix('Admin')->group(function () {
        // User
        Route::get('/user', [UserController::class, 'index'])->name('users.index');
        Route::get('/user/create', [UserController::class, 'create'])->name('users.create');
        Route::get('/user/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::post('/user', [UserController::class, 'store'])->name('users.store');
        Route::put('/user/{user}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/user/{user}', [UserController::class, 'destroy'])->name('users.destroy');
        // data kelas
        Route::get('/kelas/create', [KelasController::class, 'create'])->name('kelass.create');
        Route::post('/kelas', [KelasController::class, 'store'])->name('kelass.store');
        Route::get('/kelas/{kelas}', [KelasController::class, 'show'])->name('kelass.show');
        Route::get('/kelas/{kelas}/edit', [KelasController::class, 'edit'])->name('kelass.edit');
        Route::put('/kelas/{kelas}', [KelasController::class, 'update'])->name('kelass.update');
        Route::delete('/kelas/{kelas}', [KelasController::class, 'destroy'])->name('kelass.destroy');
        // data siswa
        Route::get('/siswa/create', [SiswaController::class, 'create'])->name('siswas.create');
        Route::post('/siswa', [SiswaController::class, 'store'])->name('siswas.store');
        Route::post('/siswa/import', [SiswaController::class, 'import'])->name('siswas.import');
        Route::get('/siswa/{siswa}', [SiswaController::class, 'show'])->name('siswas.show');
        Route::get('/siswa/{siswa}/edit', [SiswaController::class, 'edit'])->name('siswas.edit');
        Route::put('/siswa/{siswa}', [SiswaController::class, 'update'])->name('siswas.update');
        Route::delete('/siswa/{siswa}', [SiswaController::class, 'destroy'])->name('siswas.destroy');
        // data guru
        Route::get('/guru', [GuruController::class, 'index'])->name('gurus.index');
        Route::get('/guru/create', [GuruController::class, 'create'])->name('gurus.create');
        Route::post('/guru', [GuruController::class, 'store'])->name('gurus.store');
        Route::get('/guru/{guru}', [GuruController::class, 'show'])->name('gurus.show');
        Route::get('/guru/{guru}/edit', [GuruController::class, 'edit'])->name('gurus.edit');
        Route::put('/guru/{guru}', [GuruController::class, 'update'])->name('gurus.update');
        Route::delete('/guru/{guru}', [GuruController::class, 'destroy'])->name('gurus.destroy');
        // data mapel
        Route::get('/mapel', [MapelController::class, 'index'])->name('mapels.index');
        Route::get('/mapel/create', [MapelController::class, 'create'])->name('mapels.create');
        Route::post('/mapel', [MapelController::class, 'store'])->name('mapels.store');
        Route::get('/mapel/{mapel}', [MapelController::class, 'show'])->name('mapels.show');
        Route::get('/mapel/{mapel}/edit', [MapelController::class, 'edit'])->name('mapels.edit');
        Route::put('/mapel/{mapel}', [MapelController::class, 'update'])->name('mapels.update');
        Route::delete('/mapel/{mapel}', [MapelController::class, 'destroy'])->name('mapels.destroy');
        // data jurusan
        Route::get('/jurusan', [JurusanController::class, 'index'])->name('jurusans.index');
        Route::get('/jurusan/create', [JurusanController::class, 'create'])->name('jurusans.create');
        Route::post('/jurusan', [JurusanController::class, 'store'])->name('jurusans.store');
        Route::get('/jurusan/{jurusan}', [JurusanController::class, 'show'])->name('jurusans.show');
        Route::get('/jurusan/{jurusan}/edit', [JurusanController::class, 'edit'])->name('jurusans.edit');
        Route::put('/jurusan/{jurusan}', [JurusanController::class, 'update'])->name('jurusans.update');
        Route::delete('/jurusan/{jurusan}', [JurusanController::class, 'destroy'])->name('jurusans.destroy');

    });
    // });
    Route::get('/dashboard', [DahsboardController::class, 'dashboard'])->name('dashboard');

    Route::get('/kelas', [KelasController::class, 'index'])->name('kelass.index');
    Route::get('/siswa', [SiswaController::class, 'index'])->name('siswas.index');
    // presensi
    Route::get('/presensi', [PresensiController::class, 'index'])->name('presensis.index');
    Route::get('/presensi/create', [PresensiController::class, 'create'])->name('presensis.create');
    Route::post('/presensi/store', [PresensiController::class, 'store'])->name('presensis.store');
    Route::get('/presensi/{id}', [PresensiController::class, 'show'])->name('presensis.show');
    Route::get('/presensi/{id}/edit', [PresensiController::class, 'edit'])->name('presensis.edit');
    Route::put('/presensi/{id}', [PresensiController::class, 'update'])->name('presensis.update');
    Route::delete('/presensi/{id}', [PresensiController::class, 'destroy'])->name('presensis.destroy');

    Route::get('/laporan', [PresensiController::class, 'laporan'])->name('laporan');
    Route::post('/laporan/filter', [PresensiController::class, 'filter'])->name('laporan.filter');
    Route::get('/laporan/destroy-all', [PresensiController::class, 'destroyAll'])->name('laporan.destroy-all');

});
