<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
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

// data siswa
Route::resource('/students', StudentController::class);

// auth
Route::get('/register', [AuthController::class,'register']);
Route::post('register', [AuthController::class,'registerpost'])->name('registerpost');

Route::get('/login', [AuthController::class,'login']);
Route::post('login', [AuthController::class,'loginpost'])->name('loginpost');

Route::get('/logout', [AuthController::class,'logout'])->name('logout');


