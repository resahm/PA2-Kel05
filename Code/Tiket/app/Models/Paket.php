<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;


class Paket extends Model
{
    use HasFactory;

    protected $table = 'paket';

    protected $fillable = [
        'nama_paket',
        'berat',
        'harga',
        'kategori',
        'id_pengirim',
        'id_penerima',
        'deskripsi',
        'waktu_kedatangan',
        'waktu_keberangkatan',
    ];
    
    public function sender()
    {
        return $this->belongsTo(User::class, 'id_pengirim', 'users_id');
    }
}
