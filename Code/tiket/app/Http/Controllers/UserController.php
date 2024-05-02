<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('users.tiket');
    }
    public function pemesanan()
    {
        return view('users.pemesanan');
    }
    public function pembayaran()
    {
        return view('users.pembayaran');
    }
    public function history()
    {
        return view('users.history');
    }
}
