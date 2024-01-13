<?php

use App\Http\Controllers\AuthController;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\KelasController;
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


Route::get('/login',[LoginController::class, 'index'])->name('login');
Route::post('/login-proses',[LoginController::class, 'login_proses'])->name('login-proses');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// data siswa
Route::resource('/students', StudentController::class);

// data kelas
Route::resource('/kelass', KelasController::class);


// Route::get('/', function () {
//     return view('auth.login');
// });

// // auth
// Route::get('/register', [AuthController::class,'register']);
// Route::post('register', [AuthController::class,'registerpost'])->name('registerpost');

// Route::get('/login', [AuthController::class,'login']);
// Route::post('login', [AuthController::class,'loginpost'])->name('loginpost');

// Route::get('/logout', [AuthController::class,'logout'])->name('logout');


