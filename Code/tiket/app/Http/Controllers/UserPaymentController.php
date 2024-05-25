<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Ticket;
use Illuminate\Support\Facades\Storage;

class UserPaymentController extends Controller
{
    // Method untuk menampilkan form bukti pembayaran
    public function showForm()
    {
        return view('users.bukti_pembayaran');
    }

    // Method untuk menyimpan data bukti pembayaran
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'payment_method' => 'required|string|max:255',
            'payment_date' => 'required|date',
            'payment_proof' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'ktp_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Mengambil tiket terbaru
        $latestTicket = Ticket::latest()->first();

        if (!$latestTicket) {
            return redirect()->route('users.bukti_pembayaran')->withErrors(['error' => 'Tidak ada tiket yang tersedia.']);
        }

        // Mengambil subtotal dari tiket terbaru
        $amount = $latestTicket->subtotal;

        $paymentProofPath = $request->file('payment_proof')->store('payment_proofs', 'public');
        $ktpImagePath = $request->file('ktp_image')->store('ktp_images', 'public');

        try {
            Payment::create([
                'ticket_id' => $latestTicket->id,
                'name' => $request->name,
                'email' => $request->email,
                'amount' => $amount, // Menggunakan subtotal sebagai amount
                'payment_method' => $request->payment_method,
                'payment_date' => $request->payment_date,
                'payment_proof' => $paymentProofPath,
                'ktp_image' => $ktpImagePath,
            ]);
        } catch (\Exception $e) {
            return redirect()->route('users.bukti_pembayaran')->withErrors(['error' => $e->getMessage()]);
        }

        return redirect()->route('users.konfirmasi')->with('success', 'Bukti pembayaran berhasil diunggah.');
    }

    // Method untuk menampilkan halaman ulasan
    public function konfirmasi()
    {
        return view('users.konfirmasi');
    }
}
