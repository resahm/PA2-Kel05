<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegistrasiController extends Controller
{
    public function showRegistrationForm()
    {
        return view('guest.registrasi');
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'phone_number' => 'required|string',
            'gender' => 'required|in:laki-laki,perempuan',
            'identity_number' => 'required|string',
            'birthdate' => 'required|date',
            'password' => 'required|string|min:8',
        ]);

        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->phone_number = $validatedData['phone_number'];
        $user->gender = $validatedData['gender'];
        $user->identity_number = $validatedData['identity_number'];
        $user->birthdate = $validatedData['birthdate'];
        $user->password = Hash::make($validatedData['password']);
        $user->save();

        return redirect()->route('guest.login')->with('success', 'Registrasi berhasil! Silakan login untuk melanjutkan.');
    }
}
