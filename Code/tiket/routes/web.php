<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\UserPaketController;
use App\Http\Controllers\UserInformasiController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\UlasanController;
use App\Http\Controllers\UserTiketController;
use App\Http\Controllers\UserPaymentController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserUlasanController;
use App\Http\Controllers\TicketApprovalController;


Route::get('/', [LoginController::class, 'showLoginForm'])->name('guest.login');
Route::post('/', [LoginController::class, 'login'])->name('Login');

Route::get('/registrasi', [RegistrasiController::class, 'showRegistrationForm'])->name('registrasi');
Route::post('/registrasi', [RegistrasiController::class, 'register'])->name("Register");

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/pemesanan', [GuestController::class, 'pemesanan'])->name('guest.pemesanan');

Route::get('/pembayaran', [GuestController::class, 'pembayaran'])->name('guest.pembayaran');

Route::middleware(['auth'])->group(function () {
    Route::get('/users/tiket', [UserController::class, 'index'])->name('users.tiket'); // Corrected UserController for tiket route
    Route::get('/users/tiket', [UserInformasiController::class, 'informasi'])->name('users.tiket'); // Possible duplication, remove if not needed
    Route::get('/users/info_pelanggan', [UserTiketController::class, 'index'])->name('users.info_pelanggan');
    Route::post('/users/tickets/store', [UserTiketController::class, 'store'])->name('users.tickets.store');
    Route::post('/users/info_pelanggan/store', [UserTiketController::class, 'storeInfoPelanggan'])->name('users.store_info_pelanggan');
    Route::post('/users/pilih_kursi/store', [UserTiketController::class, 'storePilihKursi'])->name('users.store_pilih_kursi');
    Route::get('/users/pilih_kursi', [UserTiketController::class, 'pilihKursi'])->name('users.pilih_kursi');
    Route::get('/jumlah-penumpang-terakhir', [UserTiketController::class, 'getLastTicketJumlahPenumpang']);
    Route::get('/users/terima-tiket', [UserTiketController::class, 'terimaTiket'])->name('users.terima_tiket');
    Route::post('/bukti-pembayaran', [UserTiketController::class, 'storeBuktiPembayaran'])->name('users.store_bukti_pembayaran');
    Route::get('users/bukti-pembayaran', [UserPaymentController::class, 'showForm'])->name('users.bukti_pembayaran');
    Route::post('/store_payment', [UserPaymentController::class, 'store'])->name('users.store_payment');
    Route::get('users/konfirmasi', [UserPaymentController::class, 'konfirmasi'])->name('users.konfirmasi');
    Route::get('export-excel', [UserPaymentController::class, 'exportToExcel'])->name('export.excel');
    Route::get('/users/pemesanan', [UserController::class, 'pemesanan'])->name('users.pemesanan');
    Route::get('/users/pembayaran', [UserController::class, 'pembayaran'])->name('users.pembayaran');
    Route::get('users/cek_pesanan', [UserController::class, 'cekPesanan'])->name('users.cek_pesanan');
    Route::post('/ulasan/store', [UserUlasanController::class, 'store'])->name('users.store_ulasan');
    Route::get('/users/history', [UserController::class, 'history'])->name('users.history');
    Route::get('/user-profile', [UserProfileController::class, 'index'])->name('users.user-profile');
    Route::put('/profile/update', [UserProfileController::class, 'update'])->name('profile.update');
    Route::get('/users/barang', [UserPaketController::class, 'index'])->name('users.barang');
    Route::get('/users/barang/create', [UserPaketController::class, 'create'])->name('users.barang.create');
    Route::post('/users/barang', [UserPaketController::class, 'store'])->name('users.barang.store');
    Route::get('/users/barang/{paket}', [UserPaketController::class, 'show'])->name('users.barang.show');
    Route::get('/users/barang/{paket}/edit', [UserPaketController::class, 'edit'])->name('users.barang.edit');
    Route::put('/users/barang/{paket}', [UserPaketController::class, 'update'])->name('users.barang.update');
    Route::delete('/users/barang/{paket}', [UserPaketController::class, 'destroy'])->name('users.barang.destroy');
});

Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/profile', [AdminController::class, 'index'])->name('admin.profile');
    Route::get('/admin/tabel_informasi', [AdminController::class, 'tabel_informasi'])->name('admin.tabel_informasi');

    // Informasi Routes
    Route::get('/admin/informasi', [InformasiController::class, 'index'])->name('admin.informasi');
    Route::get('/admin/informasi/create', [InformasiController::class, 'create'])->name('admin.informasi.create');
    Route::post('/admin/informasi/store', [InformasiController::class, 'store'])->name('admin.informasi.store');
    Route::get('/admin/informasi/{id}/edit', [InformasiController::class, 'edit'])->name('admin.informasi.edit');
    Route::put('/admin/informasi/{id}/update', [InformasiController::class, 'update'])->name('admin.informasi.update');
    Route::delete('/admin/informasi/{id}/delete', [InformasiController::class, 'destroy'])->name('admin.informasi.destroy');
    Route::get('/admin/tabel_informasi', [InformasiController::class, 'tabelInformasi'])->name('admin.tabel_informasi');
    Route::get('/admin/edit_informasi/{id}', [InformasiController::class, 'edit'])->name('admin.edit_informasi');

    // Pelanggan Routes
    Route::get('/admin/dashboard', [TicketController::class, 'jumlah'])->name('admin.dashboard');
    Route::get('/admin/pelanggan', [TicketController::class, 'index'])->name('admin.pelanggan');
    Route::get('/admin/create_tiket', [TicketController::class, 'create'])->name('admin.create_tiket');
    Route::post('/admin/create_tiket/store', [TicketController::class, 'store'])->name('admin.detail_tiket.store');
    Route::get('/admin/tabel_tiket', [TicketController::class, 'informasi_tiket'])->name('admin.tabel_tiket');
    Route::get('/admin/edit_tiket/{id}', [TicketController::class, 'edit'])->name('admin.edit_tiket');
    Route::put('/admin/update_tiket/{id}', [TicketController::class, 'update'])->name('admin.update_tiket');
    Route::delete('/admin/tiket/{id}', [TicketController::class, 'destroy'])->name('admin.tiket.destroy');
    Route::get('/admin/ticket-approvals', [TicketApprovalController::class, 'index'])->name('admin.approval_tiket');
    Route::post('/admin/ticket-approvals/accept/{id}', [TicketApprovalController::class, 'acceptTicket'])->name('admin.accept_ticket');
    Route::post('/admin/ticket-approvals/reject/{id}', [TicketApprovalController::class, 'rejectTicket'])->name('admin.reject_ticket');
    Route::get('/admin/tabel_paket', [PaketController::class, 'index'])->name('admin.tabel_paket');
    Route::post('/admin/tabel_paket', [PaketController::class, 'store'])->name('admin.tabel_paket.store');
    Route::get('/admin/payment_paket', [PaketController::class, 'paymentPaket'])->name('admin.payment_paket');

    // Kendaraan Routes
    Route::get('/admin/kendaraan', [KendaraanController::class, 'index'])->name('admin.kendaraan_kbt');
    Route::post('/admin/kendaraan/book-seat', [KendaraanController::class, 'bookSeat'])->name('admin.bookSeat');
    Route::post('/admin/kendaraan/update-status/{id}/{status}', [KendaraanController::class, 'updateStatus'])->name('admin.updateStatus');
    Route::get('/sync-tickets', [KendaraanController::class, 'syncTicketsToDetailKendaraan']);

    // Payment Routes
    Route::get('admin/tabel_payments', [PaymentController::class, 'index'])->name('admin.tabel_payments');

    //Notifikasi
    Route::get('/notifications', [NotificationController::class, 'index'])->name('admin.header');
    Route::post('/notifications/notify-users', [NotificationController::class, 'notifyUsers'])->name('notifications.notifyUsers');

    //Ulasan
    Route::get('/admin/dashboard', [UlasanController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/ulasans', [UlasanController::class, 'index'])->name('admin.dashboard');
});
