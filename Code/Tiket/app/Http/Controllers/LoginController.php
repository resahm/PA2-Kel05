<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Mail\ResetPasswordMail;
use App\Models\User;


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

        // Login user atau admin berdasarkan guard yang sesuai
        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('admin.dashboard')->with('success', 'Login berhasil! Selamat datang di halaman Admin.'); // Redirect ke halaman dashboard admin
        } elseif (Auth::guard('web')->attempt($credentials)) {
            return redirect()->route('users.tiket')->with('success', 'Login berhasil! Selamat datang, di website pemesanan tiket KBT'); // Redirect ke halaman users.tiket
        }

        return back()->withErrors(['email' => 'Login gagal! Silahkan Daftar sekarang']);
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Logout dari semua guard
        return redirect('/');
    }

    // Show the forgot password form
    public function forgotPassword()
    {
        return view('guest.lupa_password');
    }

    // Generate and send reset password email
    public function sendResetPasswordEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'Email tidak ditemukan']);
        }

        // Generate token
        $token = Str::random(60);
        $user->update(['token' => $token]); // Save token to the 'token' column

        try {
            Mail::to($user->email)->send(new ResetPasswordMail($user, $token));
        } catch (\Exception $e) {
            return back()->withErrors(['email' => 'Gagal mengirim email reset password. Silakan coba lagi. Error: ' . $e->getMessage()]);
        }

        return redirect()->route('guest.check_email')->with('success', 'Email reset password telah dikirim. Silakan periksa kotak masuk Anda.');
    }

    // Halaman Reset Password
    public function showResetPasswordPage($token)
    {
        $user = User::where('token', $token)->first();

        if (!$user) {
            abort(404); // Show 404 page if token is not valid
        }

        // Save token to session
        session(['token' => $token]);

        return view('guest.ganti_password', compact('token'));
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])[A-Za-z0-9]{8,}$/',
            'new_password' => 'required|string|min:8|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])[A-Za-z0-9]{8,}$/|different:password',
            'password_confirmation' => 'required|string|min:8|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])[A-Za-z0-9]{8,}$/|same:new_password',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'Email tidak ditemukan']);
        }

        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors(['password' => 'Password lama salah']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('guest.login')->with('success', 'Password berhasil diubah. Silakan login dengan password baru Anda.');
    }

    public function gantiPassword()
    {
        return view('guest.ganti_password');
    }

    // Show check email form
    public function showCheckEmailForm()
    {
        return view('guest.check_email');
    }
}
