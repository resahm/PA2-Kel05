<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|min:6',
        ]);

        $admin = new Admin();
        $admin->email = $request->input('email');
        $admin->password = Hash::make($request->input('password'));
        $admin->save();

        return Redirect::route('admin.dashboard')->with('success', 'Admin berhasil ditambahkan');
    }
}
