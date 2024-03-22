<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('guest.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Jika berhasil login
            $user = Auth::user();
            if ($user->hasRole('admin')) {
                return redirect()->intended('/admin/dashboard');
            } else {
                return redirect()->intended('/users/tiket');
            }
        }

        // Jika gagal login
        return back()->withErrors(['email' => 'Kombinasi email dan password tidak valid.']);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        return redirect('/');
    }
}
