<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'ticket_id',
        'name',
        'email',
        'amount',
        'payment_method',
        'payment_date',
        'payment_proof',
        'ktp_image',
    ];

    public function ticketApproval()
    {
        return $this->hasOne(TicketApproval::class, 'payment_id', 'id');
    }
}
