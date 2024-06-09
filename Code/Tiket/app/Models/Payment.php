<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payments';
    protected $fillable = [
        'user_id',
        'ticket_id',
        'name',
        'email',
        'kelas',
        'amount',
        'payment_method',
        'payment_date',
        'payment_proof',
        'ktp_image',
        'status',
    ];

    public function ticketApproval()
    {
        return $this->hasOne(TicketApproval::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
