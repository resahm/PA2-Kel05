<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function tabel_informasi()
    {
        return view('admin.tabel_informasi');
    }
    public function index()
    {
        $admin = Auth::guard('admin')->user();

        // Mengirim data admin ke view admin.profile
        return view('admin.profile', compact('admin'));
    }
}
