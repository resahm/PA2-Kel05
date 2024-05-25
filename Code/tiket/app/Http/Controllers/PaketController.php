<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paket; 

class PaketController extends Controller
{
    public function index()
    {
        return view('admin.tabel_paket');
    }

    public function store(Request $request)
    {
        // Validasi data yang diterima dari form
        $request->validate([
            'nama_paket' => 'required',
            'berat' => 'required|numeric',
            'harga' => 'required|numeric',
            'kategori' => 'required',
            'name_pengirim' => 'required',
            'name_penerima' => 'required',
            'deskripsi' => 'required',
            'waktu_kedatangan' => 'nullable|date',
            'waktu_keberangkatan' => 'nullable|date',
        ]);

        // Buat objek Paket baru
        $paket = new Paket();
        $paket->nama_paket = $request->nama_paket;
        $paket->berat = $request->berat;
        $paket->harga = $request->harga;
        $paket->kategori = $request->kategori;
        $paket->pengirim_id = $request->pengirim_id;
        $paket->penerima_id = $request->penerima_id;
        $paket->deskripsi = $request->deskripsi;
        $paket->waktu_kedatangan = $request->waktu_kedatangan;
        $paket->waktu_keberangkatan = $request->waktu_keberangkatan;

        // Simpan data ke dalam tabel
        $paket->save();

        // Redirect kembali ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Paket berhasil dibuat.');
    }
}
