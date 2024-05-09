<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\DetailTiket;
use App\Models\TicketApproval;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::all();
        return view('admin.pelanggan', compact('tickets'));
    }
    public function create()
    {
        return view('admin.create_tiket');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_tiket' => 'required|numeric',
            'kelas' => 'required|string',
            'harga' => 'required|numeric',
            'jumlah' => 'required|numeric',
            'subtotal' => 'required|numeric',
            'metode_pembayaran' => 'required|string',
        ]);

        DetailTiket::create($validatedData);

        return redirect()->route('admin.dashboard')->with('success', 'Detail Tiket berhasil ditambahkan');
    }
    public function informasi_tiket()
    {
        return view('admin.tabel_tiket');
    }
    public function showDetails()
    {
        $details = DetailTiket::all();

        return view('your_view_name', compact('details'));
    }
    public function approvalTiket()
    {
        $approvals = TicketApproval::all();
        return view('admin.approval_tiket', compact('approvals'));
    }
}
