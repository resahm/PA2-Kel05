<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            'email' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'required|string|max:255',
        ]);

        Ulasan::create([
            'user_id' => Auth::id(),
            'email' => $request->email,
            'rating' => $request->rating,
            'review' => $request->review,
        ]);

        return redirect()->route('users.cek_pesanan')->with('success', 'Ulasan berhasil dikirim');
    }
}
