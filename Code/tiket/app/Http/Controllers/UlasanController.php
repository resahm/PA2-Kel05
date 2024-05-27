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
        $ratings = $ulasans->pluck('rating')->toArray();

        return view('admin.dashboard', compact('ulasans', 'ratings'));
    }
}
