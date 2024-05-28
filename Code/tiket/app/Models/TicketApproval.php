<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketApproval extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'email', 
        'kelas', 
        'subtotal', 
        'status', 
        'payment_id', 
        'created_at', 
        'updated_at'
    ];

    public function payment()
    {
        return $this->belongsTo(Payment::class, 'payment_id');
    }
}
