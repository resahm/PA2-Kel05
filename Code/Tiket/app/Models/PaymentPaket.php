<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentPaket extends Model
{
    use HasFactory;

    protected $table = 'payment_paket'; // Sesuaikan dengan nama tabel yang digunakan
    protected $fillable = [
        'user_id',
        'paket_id',
        'nama_paket',
        'amount',
        'payment_method',
        'payment_date',
        'image',
    ];

    // Definisi relasi jika diperlukan
    // public function paket()
    // {
    //     return $this->belongsTo(Paket::class);
    // }
}
