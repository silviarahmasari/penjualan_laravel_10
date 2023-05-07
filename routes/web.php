<?php

use App\Http\Controllers\RiwayatPesananController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MemberController;

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
    return view('login');
});

Route::get('/login', [LoginController::class, 'preLogin'])->name('login');
Route::post('/post_login', [LoginController::class, 'postLogin'])->name('post_login');
Route::get('/register', [LoginController::class, 'preRegister'])->name('register');
Route::post('/post_register', [LoginController::class, 'postRegister'])->name('post_register');
Route::get('/logout', [LoginController::class, 'Logout'])->name('logout');

//-------------------ADMIN-----------------//
Route::middleware(['auth', 'CheckRole:2'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/history', [AdminController::class, 'history'])->name('history');
});

//-------------------MEMBER-----------------//
Route::middleware(['auth', 'CheckRole:6'])->group(function () {
    Route::get('/member', [MemberController::class, 'index'])->name('member');
    Route::get('/member/riwayat', [RiwayatPesananController::class, 'index'])->name('member.riwayat');
});
