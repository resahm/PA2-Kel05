<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = 'tickets'; 

    protected $fillable = [
        'user_id',
        'tanggal_pemesanan',
        'tanggal_keberangkatan',
        'waktu_keberangkatan',
        'asal_keberangkatan',
        'tujuan_keberangkatan',
        'jumlah_penumpang',
        'nomor_kursi',
        'nomor_kendaraan',
        'kelas',
        'jumlah_penumpang_terdaftar',
        'subtotal',
        'metode_pembayaran',
        'status_pembayaran',
    ];

    // Definisikan relasi dengan model User
    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}

