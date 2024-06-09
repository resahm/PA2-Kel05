<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = 'tickets';

    protected $fillable = [
        'jadwal_kbt_id',
        'user_id',
        'tanggal_pemesanan',
        'tanggal_keberangkatan',
        'waktu_keberangkatan',
        'asal_keberangkatan',
        'tujuan_keberangkatan',
        'jumlah_penumpang',
        'nomor_kursi',
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

    public function jadwalKbt()
    {
        return $this->belongsTo(JadwalKbt::class, 'jadwal_kbt_id');
    }
}
