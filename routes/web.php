<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\AksesController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\RiwayatPesananController;
use App\Http\Controllers\UsersController;

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
    // Barang
    Route::get('/barang', [BarangController::class, 'index'])->name('barang');
    Route::get('/barang/create', [BarangController::class, 'create'])->name('barang.create');
    Route::post('/barang/insert', [BarangController::class, 'store'])->name('barang.insert');
    Route::get('/barang/edit/{id_barang}', [BarangController::class, 'edit'])->name('barang.edit');
    Route::post('/barang/update', [BarangController::class, 'update'])->name('barang.update');
    Route::delete('/barang/delete/{id_barang}', [BarangController::class, 'delete']);
    // Hak Akses
    Route::get('/hak_akses', [AksesController::class, 'index'])->name('akses');
    Route::get('/hak_akses/create', [AksesController::class, 'create'])->name('akses.create');
    Route::post('/hak_akses/insert', [AksesController::class, 'store'])->name('akses.insert');
    Route::get('/hak_akses/edit/{id_akses}', [AksesController::class, 'edit'])->name('akses.edit');
    Route::post('/hak_akses/update', [AksesController::class, 'update'])->name('akses.update');
    Route::delete('/hak_akses/delete/{id_akses}', [AksesController::class, 'destroy']);
    // Users
    Route::get('/users', [UsersController::class, 'index'])->name('users');
    Route::get('/users/create', [UsersController::class, 'create'])->name('users.create');
    Route::post('/users/insert', [UsersController::class, 'store'])->name('users.insert');
    Route::get('/users/edit/{id_user}', [UsersController::class, 'edit'])->name('users.edit');
    Route::post('/users/update', [UsersController::class, 'update'])->name('users.update');
    Route::delete('/users/delete/{id_user}', [UsersController::class, 'destroy']);
    // Users
    Route::get('/pembelian', [PembelianController::class, 'index'])->name('pembelian');
    Route::get('/pembelian/create', [PembelianController::class, 'create'])->name('pembelian.create');
    Route::post('/pembelian/insert', [PembelianController::class, 'store'])->name('pembelian.insert');
    Route::get('/pembelian/edit/{id_pembelian}', [PembelianController::class, 'edit'])->name('pembelian.edit');
    Route::post('/pembelian/update', [PembelianController::class, 'update'])->name('pembelian.update');
    Route::delete('/pembelian/delete/{id_pembelian}', [PembelianController::class, 'destroy']);
    // History
    Route::get('/history', [AdminController::class, 'history'])->name('history');
});

//-------------------MEMBER-----------------//
Route::middleware(['auth', 'CheckRole:6'])->group(function () {
    Route::get('/member', [MemberController::class, 'index'])->name('member');
    Route::get('/member/riwayat', [RiwayatPesananController::class, 'index'])->name('member.riwayat');
    Route::get('/member/pesan/{id_barang}', [PenjualanController::class, 'create']);
    Route::post('/member/checkout', [PenjualanController::class, 'store'])->name('checkout');
    Route::get('/member/bayar', [PenjualanController::class, 'getVA'])->name('bayar');
});
