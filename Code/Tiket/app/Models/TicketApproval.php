<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketApproval extends Model
{
    use HasFactory;

    protected $table = 'ticket_approvals';

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'kelas',
        'subtotal',
        'status',
        'payment_id',
    ];

    // Relasi ke model Payment
    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }
}
