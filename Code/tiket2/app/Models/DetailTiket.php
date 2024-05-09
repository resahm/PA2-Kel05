<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTiket extends Model
{
    use HasFactory;

    protected $table = 'detail_tiket'; 

    protected $fillable = [
        'id_tiket',
        'kelas',
        'harga',
        'jumlah',
        'subtotal',
        'metode_pembayaran',
    ];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class, 'id_tiket');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_pengguna');
    }
}
