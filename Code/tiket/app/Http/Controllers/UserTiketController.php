<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;

class UserTiketController extends Controller
{
    public function index()
    {
        // Logika untuk mengambil data yang dibutuhkan dan menampilkan halaman
        return view('users.info_pelanggan');
    }
    public function submitTicket(Request $request)
    {
        // Validasi data formulir
        $request->validate([
            'tanggal_pemesanan' => 'required|date',
            'tanggal_keberangkatan' => 'required|date|after_or_equal:tanggal_pemesanan',
            'asal_keberangkatan' => 'required|string|max:255',
            'tujuan_keberangkatan' => 'required|string|max:255',
            'jumlah_penumpang' => 'required|integer|min:1'
        ]);

        // Simpan data formulir ke dalam database (opsional)
        $ticket = new Ticket();
        $ticket->tanggal_pemesanan = $request->input('tanggal_pemesanan');
        $ticket->tanggal_keberangkatan = $request->input('tanggal_keberangkatan');
        $ticket->asal_keberangkatan = $request->input('asal_keberangkatan');
        $ticket->tujuan_keberangkatan = $request->input('tujuan_keberangkatan');
        $ticket->jumlah_penumpang = $request->input('jumlah_penumpang');
        $ticket->save();

        // Redirect ke halaman users.info_pelanggan dengan pesan sukses
        return redirect()->route('users.info_pelanggan')->with('success', 'Ticket booking successfully submitted.');
    }
}
