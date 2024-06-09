<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log; 


class UserPaymentController extends Controller
{
    public function showForm($ticketId)
    {
        $user = Auth::user();
        $ticket = Ticket::find($ticketId);

        return view('users.bukti_pembayaran', [
            'email' => $user->email,
            'kelas' => $ticket->kelas,
            'subtotal' => $ticket->subtotal,
            'payment_method' => $ticket->metode_pembayaran
        ]);
    }

    public function store(Request $request)
    {
        $user = auth()->user();
        Log::info('User:', ['user' => $user]);

        if ($user) {
            $tickets = $user->tickets;
            Log::info('Tickets:', ['tickets' => $tickets]);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'amount' => 'required|numeric',
            'payment_method' => 'required|string|max:255',
            'payment_date' => [
                'required',
                'date',
                function ($attribute, $value, $fail) {
                    $user = auth()->user();
                    if ($user) {
                        $latest_ticket = $user->tickets()->latest()->first();
                        if ($latest_ticket) {
                            $tanggal_pemesanan = $latest_ticket->tanggal_pemesanan;
                            $tanggal_keberangkatan = $latest_ticket->tanggal_keberangkatan;

                            if ($value < $tanggal_pemesanan || $value > $tanggal_keberangkatan) {
                                $fail('Tanggal pembayaran harus setelah atau sama dengan tanggal pemesanan dan sebelum atau sama dengan tanggal keberangkatan.');
                            }
                        }
                    }
                },
            ],
            'payment_proof' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'ktp_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

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
            'user_id' => $ticket->user_id,
            'ticket_id' => $ticket->id,
            'name' => $request->name,
            'email' => $request->email,
            'kelas' => $request->kelas,
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
