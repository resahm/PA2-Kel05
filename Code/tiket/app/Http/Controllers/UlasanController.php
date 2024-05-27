<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Ulasan;
use Illuminate\Http\Request;

class UlasanController extends Controller
{
    public function index()
    {
        $ulasans = Ulasan::all();
        return view('admin.dashboard', compact('ulasans'));
    }

    public function dashboard()
    {
        $ulasans = Ulasan::all();
        $ratings = [
            1 => $ulasans->where('rating', 1)->count(),
            2 => $ulasans->where('rating', 2)->count(),
            3 => $ulasans->where('rating', 3)->count(),
            4 => $ulasans->where('rating', 4)->count(),
            5 => $ulasans->where('rating', 5)->count(),
        ];

        return view('admin.dashboard', compact('ulasans', 'ratings'));
    }
}
