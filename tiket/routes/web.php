<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\TiketController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;


// Route untuk menampilkan form login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('guest.login');

// Route untuk proses login
Route::post('/login', [LoginController::class, 'login']);

// Route untuk menampilkan form registrasi
Route::get('/registrasi', [RegistrasiController::class, 'showRegistrationForm'])->name('guest.registrasi');

// Route untuk proses registrasi
Route::post('/registrasi', [RegistrasiController::class, 'register']);

// Route untuk proses logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Route untuk halaman pemesanan pada GuestController
Route::get('/pemesanan', [GuestController::class, 'pemesanan'])->name('guest.pemesanan');

// Route untuk halaman tiket bagi user yang sudah login
Route::middleware(['auth'])->group(function () {
    Route::get('/users/tiket', [UserController::class, 'index'])->name('users.tiket');
});

// Route untuk halaman dashboard dan pengelolaan tiket bagi admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});
