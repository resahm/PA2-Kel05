<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailKendaraan;

class KendaraanController extends Controller
{
    public function index()
    {
        $details = DetailKendaraan::all();
        return view('admin.kendaraan_kbt', compact('details'));
    }
}
