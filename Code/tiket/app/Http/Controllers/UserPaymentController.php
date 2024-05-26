<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Payment;
use Illuminate\Support\Facades\Storage;

class UserPaymentController extends Controller
{
    public function showForm()
    {
        return view('users.bukti_pembayaran');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'amount' => 'required|numeric',
            'payment_method' => 'required|string|max:255',
            'payment_date' => 'required|date',
            'payment_proof' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'ktp_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $ticket = Ticket::latest()->first();

        if (!$ticket) {
            return redirect()->back()->withErrors(['ticket_id' => 'Tiket tidak ditemukan.']);
        }

        // Menyimpan ID tiket ke dalam sesi
        session(['latest_ticket_id' => $ticket->id]);

        $paymentProofPath = $request->file('payment_proof')->store('public/payment_proofs');
        $ktpImagePath = $request->file('ktp_image')->store('public/ktp_images');

        // Perbaiki jalur penyimpanan gambar
        $paymentProofPath = str_replace('public/', 'storage/', $paymentProofPath);
        $ktpImagePath = str_replace('public/', 'storage/', $ktpImagePath);


        $payment = Payment::create([
            'ticket_id' => $ticket->id,
            'name' => $request->name,
            'email' => $request->email,
            'amount' => $request->amount,
            'payment_method' => $request->payment_method,
            'payment_date' => $request->payment_date,
            'payment_proof' => $paymentProofPath,
            'ktp_image' => $ktpImagePath,
        ]);

        return redirect()->route('users.konfirmasi')->with('success', 'Data berhasil disimpan.');
    }

    public function konfirmasi()
    {
        return view('users.konfirmasi');
    }
}
