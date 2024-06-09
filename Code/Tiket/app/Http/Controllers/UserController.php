<?php

namespace App\Http\Controllers;

use App\Models\TicketApproval;
use App\Models\Ulasan;
use App\Models\History;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function pemesanan()
    {
        return view('users.pemesanan');
    }
    public function pembayaran()
    {
        return view('users.pembayaran');
    }
    public function history()
    {
        // Retrieve the user ID of the logged-in user
        $userId = Auth::id();

        // Retrieve the payment history based on the user ID
        $paymentHistory = History::where('user_id', $userId)->get();

        // Send data to the view
        return view('users.history', compact('paymentHistory'));
    }

    public function cekPesanan()
    {
        // Dapatkan user_id user yang sedang login
        $userId = Auth::id();

        // Ambil data ticket approvals berdasarkan user_id
        $ticketApprovals = TicketApproval::where('user_id', $userId)->get();

        // Ambil data ulasan berdasarkan user_id
        $ulasans = Ulasan::where('user_id', $userId)->get();

        // Ambil data dari tabel tickets berdasarkan tanggal_pemesanan dan tanggal_keberangkatan pada tabel ticket_approvals
        $tickets = Ticket::join('payments', 'tickets.id', '=', 'payments.ticket_id')
            ->join('ticket_approvals', 'payments.id', '=', 'ticket_approvals.payment_id')
            ->where('ticket_approvals.user_id', $userId)
            ->whereDate('tickets.tanggal_pemesanan', '>=', now()->toDateString())
            ->whereDate('tickets.tanggal_keberangkatan', '<=', now()->toDateString())
            ->select('tickets.*')
            ->get();

        // Kembalikan view dengan data yang sesuai
        return view('users.cek_pesanan', compact('ticketApprovals', 'ulasans', 'tickets'));
    }
}
