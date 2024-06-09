<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paket;
use App\Models\PaymentPaket;
use Illuminate\Support\Facades\Storage;

class PaketController extends Controller
{
    public function index()
    {
        // Ambil semua data paket dari tabel
        $packages = Paket::all();

        // Kirim data ke view 'admin.tabel_paket'
        return view('admin.tabel_paket', ['packages' => $packages]);
    }

    public function store(Request $request)
    {
        // Validasi data yang diterima dari form
        $request->validate([
            'nama_paket' => 'required',
            'berat' => 'required|numeric',
            'harga' => 'required|numeric',
            'kategori' => 'required',
            'pengirim_id' => 'required',
            'penerima_id' => 'required',
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

        // Redirect ke halaman admin.payment_paket dengan pesan sukses
        return redirect()->route('admin.payment_paket')->with('success', 'Paket berhasil dibuat.');
    }
    public function paymentPaket(Request $request)
    {
        // Validasi input jika diperlukan
        $request->validate([
            'payment_paket' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imageUrl = null; // Inisialisasi variabel $imageUrl

        if ($request->hasFile('payment_paket')) {
            $imagePath = $request->file('payment_paket')->store('payment_images');
            $imageUrl = 'storage/' . $imagePath; // Simpan URL gambar relatif ke 'public/storage'

            // Simpan path gambar ke database
            $paymentPaket = new PaymentPaket();
            $paymentPaket->paket_id = $request->input('paket_id');
            $paymentPaket->amount = $request->input('amount');
            $paymentPaket->payment_method = $request->input('payment_method');
            $paymentPaket->payment_date = $request->input('payment_date');
            $paymentPaket->image = $imageUrl; // Simpan URL gambar
            $paymentPaket->save();
        }

        $details = PaymentPaket::all();

        return view('admin.payment_paket', compact('details', 'imageUrl'));
    }
}
