<?php

namespace App\Http\Controllers;

use App\Models\TicketApproval;
use Illuminate\Http\Request;
use App\Models\DetailTiket;
use GuzzleHttp\Client;

class UserController extends Controller
{
    public function ticket()
    {
        $token = session('token');
        $client = new Client();

        $response = $client->get('http://localhost:8080/api/user/tickets', [
            'headers' => [
                'Authorization' => 'Bearer ' . $token
            ]
        ]);

        $data = json_decode($response->getBody(), true);

        return view('users.ticket', ['tickets' => $data]);
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
