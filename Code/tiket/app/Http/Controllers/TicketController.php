<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DetailTiket;
use App\Models\TicketApproval;
use App\Models\Ticket;

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
            'asal_keberangkatan' => 'required|string',
            'tujuan_keberangkatan' => 'required|string',
            'kelas' => 'required|string',
            'harga' => 'required|numeric',
            'metode_pembayaran' => 'required|string',
        ], [
            'asal_keberangkatan.required' => 'Asal Keberangkatan harus diisi',
            'tujuan_keberangkatan.required' => 'Tujuan Keberangkatan harus diisi',
            'kelas.required' => 'Kelas harus diisi',
            'harga.required' => 'Harga harus diisi',
            'harga.numeric' => 'Harga harus berupa angka',
            'metode_pembayaran.required' => 'Metode Pembayaran harus diisi',
        ]);

        DetailTiket::create($validatedData);

        return redirect()->route('admin.tabel_tiket')->with('success', 'Detail Tiket berhasil ditambahkan');
    }

    public function informasi_tiket()
    {
        $details = DetailTiket::all();

        return view('admin.tabel_tiket', compact('details'));
    }

    public function approvalTiket()
    {
        $approvals = TicketApproval::all();
        return view('admin.approval_tiket', compact('approvals'));
    }

    // Fungsi untuk mengedit detail tiket
    public function edit($id)
    {
        $detail = DetailTiket::findOrFail($id);
        return view('admin.edit_tiket', compact('detail'));
    }

    // Fungsi untuk memperbarui detail tiket
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'asal_keberangkatan' => 'required|string',
            'tujuan_keberangkatan' => 'required|string',
            'kelas' => 'required|string',
            'harga' => 'required|numeric',
            'metode_pembayaran' => 'required|string',
        ], [
            'asal_keberangkatan.required' => 'Asal Keberangkatan harus diisi',
            'tujuan_keberangkatan.required' => 'Tujuan Keberangkatan harus diisi',
            'kelas.required' => 'Kelas harus diisi',
            'harga.required' => 'Harga harus diisi',
            'harga.numeric' => 'Harga harus berupa angka',
            'metode_pembayaran.required' => 'Metode Pembayaran harus diisi',
        ]);

        $detail = DetailTiket::findOrFail($id);
        $detail->update($validatedData);

        return redirect()->route('admin.tabel_tiket')->with('success', 'Detail Tiket berhasil diperbarui');
    }

    // Fungsi untuk menghapus detail tiket
    public function destroy($id)
    {
        $detail = DetailTiket::findOrFail($id);
        $detail->delete();

        return redirect()->route('admin.tabel_tiket')->with('success', 'Detail Tiket berhasil dihapus');
    }
}
