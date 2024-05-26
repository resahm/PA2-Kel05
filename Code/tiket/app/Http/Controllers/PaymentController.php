<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use Illuminate\Support\Facades\Storage;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::all(); // Mengambil semua data dari tabel payments
        return view('admin.tabel_payments', ['payments' => $payments]);
    }
}
