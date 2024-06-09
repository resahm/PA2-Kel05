<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalKbt extends Model
{
    use HasFactory;

    protected $table = 'jadwal_kbt';

    protected $fillable = [
        'tanggal_keberangkatan',
        'waktu_keberangkatan',
        'kapasitas_kursi',
    ];

    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'jadwal_kbt_id');
    }
}
