<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ulasan;

class UserUlasanController extends Controller
{
    public function index()
    {
        $ulasans = Ulasan::all();
        return view('users.cek_pesanan', compact('ulasans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'review_text' => 'required|string|max:255',
        ]);

        Ulasan::create([
            'name' => $request->name,
            'rating' => $request->rating,
            'isi_ulasan' => $request->review_text,
        ]);

        return redirect()->route('users.cek_pesanan')->with('success', 'Ulasan berhasil dikirim');
    }
}
