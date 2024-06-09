<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class History extends Model
{
    use HasFactory;

    protected $table = 'history';

    protected $fillable = [
        'user_id', // Tambahkan user_id ke fillable
        'name',
        'amount',
        'payment_method',
        'payment_date',
        'image',
        'ticket_id',
        'paket_id',
    ];

    // Definisikan relasi ke model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function getPaymentHistory()
    {
        // Retrieve the logged-in user ID
        $userId = Auth::id();

        // Retrieve data from Payment and PaymentPaket models
        $payments = Payment::where('user_id', $userId)->get();
        $paymentPakets = PaymentPaket::where('user_id', $userId)->get();

        // Create an empty collection for the combined data
        $paymentHistory = collect();

        // Merge data from Payment model
        foreach ($payments as $payment) {
            $paymentHistory->push(new self([
                'user_id' => $userId,
                'name' => $payment->name,
                'amount' => $payment->amount,
                'payment_method' => $payment->payment_method,
                'payment_date' => $payment->payment_date,
                'image' => $payment->payment_proof,
                'ticket_id' => $payment->ticket_id,
                'paket_id' => null, // Assuming paket_id is null for Payment model
            ]));
        }

        // Merge data from PaymentPaket model
        foreach ($paymentPakets as $paket) {
            $paymentHistory->push(new self([
                'user_id' => $userId,
                'name' => $paket->nama_paket,
                'amount' => $paket->amount,
                'payment_method' => $paket->payment_method,
                'payment_date' => $paket->payment_date,
                'image' => $paket->image,
                'ticket_id' => null, // Assuming ticket_id is null for PaymentPaket model
                'paket_id' => $paket->paket_id,
            ]));
        }

        return $paymentHistory;
    }

    public static function saveToHistory($name, $amount, $payment_method, $payment_date, $image, $ticket_id, $paket_id)
    {
        return self::create([
            'user_id' => Auth::id(), // Ambil user ID dari user yang sedang login
            'name' => $name,
            'amount' => $amount,
            'payment_method' => $payment_method,
            'payment_date' => $payment_date,
            'image' => $image,
            'ticket_id' => $ticket_id,
            'paket_id' => $paket_id,
        ]);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function paymentPakets()
    {
        return $this->hasMany(PaymentPaket::class);
    }
}
