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
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function approval()
    {
        return $this->hasOne(TicketApproval::class);
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
}
