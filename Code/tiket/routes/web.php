<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('guest.login');
Route::post('/login', [LoginController::class, 'login'])->name('Login');

Route::get('/registrasi', [RegistrasiController::class, 'showRegistrationForm'])->name('registrasi');
Route::post('/registrasi', [RegistrasiController::class, 'register'])-> name("Register");

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/pemesanan', [GuestController::class, 'pemesanan'])->name('guest.pemesanan');

Route::middleware(['auth'])->group(function () {
    Route::get('/users/tiket', [UserController::class, 'index'])->name('users.tiket');
});

Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});

