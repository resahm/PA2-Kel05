<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Payment;
use App\Models\TicketApproval;

class MigratePaymentDataSeeder extends Seeder
{
    public function run()
    {
        // Ambil semua data dari tabel payments
        $payments = Payment::all();

        // Loop melalui setiap data payment dan pindahkan ke tabel ticket_approval
        foreach ($payments as $payment) {
            // Periksa apakah data payment sudah ada di tabel ticket_approval
            $existingApproval = TicketApproval::where('payment_id', $payment->id)->first();

            // Jika belum ada, migrasikan data
            if (!$existingApproval) {
                TicketApproval::create([
                    'name' => $payment->name,
                    'email' => $payment->email,
                    'kelas' => $payment->kelas,
                    'subtotal' => $payment->amount,
                    'status' => $payment->status ?? 'pending', // Default nilai jika null
                    'created_at' => $payment->created_at,
                    'updated_at' => $payment->updated_at,
                    'payment_id' => $payment->id,
                ]);
            }
        }
    }
}
