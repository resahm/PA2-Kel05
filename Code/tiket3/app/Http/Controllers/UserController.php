<?php

namespace App\Http\Controllers;

use App\Models\TicketApproval;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('users.tiket');
    }
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
        return view('users.history');
    }
    public function cekPesanan()
    {
        $ticketApprovals = TicketApproval::all(); // Ambil semua data dari tabel ticket_approvals
        return view('users.cek_pesanan', compact('ticketApprovals'));
    }
}
