<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use App\Models\PaymentPaket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserPaketController extends Controller
{
    public function index()
    {
        return view('users.barang');
    }

    public function store(Request $request)
    {
        // Validasi data yang diterima dari formulir
        $validatedData = $request->validate([
            'nama_paket' => 'required|string|max:255',
            'berat' => 'required|numeric',
            'harga' => 'required|numeric',
            'kategori' => 'required|string|max:255',
            'id_pengirim' => 'required|numeric',
            'id_penerima' => 'required|numeric',
            'deskripsi' => 'required|string',
            'waktu_kedatangan' => 'nullable|date',
            'waktu_keberangkatan' => 'nullable|date',
        ]);

        // Simpan data paket ke dalam tabel paket
        $paket = new Paket();
        $paket->nama_paket = $validatedData['nama_paket'];
        $paket->berat = $validatedData['berat'];
        $paket->harga = $validatedData['harga'];
        $paket->kategori = $validatedData['kategori'];
        $paket->id_pengirim = $validatedData['id_pengirim'];
        $paket->id_penerima = $validatedData['id_penerima'];
        $paket->deskripsi = $validatedData['deskripsi'];
        $paket->waktu_kedatangan = $validatedData['waktu_kedatangan'];
        $paket->waktu_keberangkatan = $validatedData['waktu_keberangkatan'];
        $paket->save();

        // Redirect ke halaman users.pembayaran_paket
        return redirect()->route('users.pembayaran_paket');
    }

    public function storePembayaranPaket(Request $request)
    {
        // Proses penyimpanan data pembayaran
        // ...

        // Redirect ke halaman users.bukti_pembayaran
        return redirect()->route('users.bukti_pembayaran_paket');
    }

    public function pembayaran_paket()
    {
        $paket = Paket::orderBy('id', 'desc')->first();
        return view('users.pembayaran_paket', compact('paket'));
    }
    public function storeBuktiPembayaran(Request $request)
    {
        // Validasi data yang dikirim dari formulir
        $request->validate([
            'nama_paket' => 'required|string',
            'amount' => 'required|numeric',
            'payment_method' => 'required|string',
            'payment_date' => [
                'required',
                'date',
                function ($attribute, $value, $fail) use ($request) {
                    // Query the 'paket' table to get 'waktu_kedatangan' and 'waktu_keberangkatan'
                    $paket = Paket::where('nama_paket', $request->nama_paket)->first();

                    if ($paket) {
                        $waktu_kedatangan = $paket->waktu_kedatangan;
                        $waktu_keberangkatan = $paket->waktu_keberangkatan;

                        if ($value < $waktu_kedatangan || $value > $waktu_keberangkatan) {
                            $fail('Tanggal pembayaran harus setelah atau sama dengan waktu kedatangan dan sebelum atau sama dengan waktu keberangkatan.');
                        }
                    } else {
                        $fail('Paket tidak ditemukan.');
                    }
                },
            ],
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Ambil paket_id dari tabel paket berdasarkan nama_paket
        $paket = Paket::where('nama_paket', $request->nama_paket)->first();

        if (!$paket) {
            return redirect()->back()->withErrors(['nama_paket' => 'Paket tidak ditemukan.']);
        }

        // Upload gambar bukti pembayaran
        $imagePath = $request->file('image')->store('payment_images');

        // Simpan data ke dalam database
        $payment = new PaymentPaket();
        $payment->user_id = Auth::id(); // Set user_id from the authenticated user
        $payment->paket_id = $paket->id;  // Set paket_id dari hasil query
        $payment->nama_paket = $request->nama_paket;
        $payment->amount = $request->amount;
        $payment->payment_method = $request->payment_method;
        $payment->payment_date = $request->payment_date;
        $payment->image = $imagePath;
        $payment->save();

        // Redirect atau tampilkan pesan sukses
        return redirect()->route('users.konfirmasi_paket')->with('success', 'Bukti pembayaran telah berhasil disimpan.');
    }

    public function konfirmasiPaket()
    {
        return view('users.konfirmasi_paket');
    }

    public function bukti_paket()
    {
        return view('users.bukti_pembayaran_paket');
    }
}
