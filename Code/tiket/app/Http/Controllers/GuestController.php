<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function pemesanan()
    {
        return view('guest.pemesanan');
    }
}
