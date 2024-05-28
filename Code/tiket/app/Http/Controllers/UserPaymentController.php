<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Payment;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class UserPaymentController extends Controller
{
    public function showForm()
    {
        return view('users.bukti_pembayaran');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'amount' => 'required|numeric',
            'payment_method' => 'required|string|max:255',
            'payment_date' => 'required|date',
            'payment_proof' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'ktp_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $ticket = Ticket::latest()->first();

        if (!$ticket) {
            return redirect()->back()->withErrors(['ticket_id' => 'Tiket tidak ditemukan.']);
        }

        // Menyimpan ID tiket ke dalam sesi
        session(['latest_ticket_id' => $ticket->id]);

        $paymentProofPath = $request->file('payment_proof')->store('public/payment_proofs');
        $ktpImagePath = $request->file('ktp_image')->store('public/ktp_images');

        // Perbaiki jalur penyimpanan gambar
        $paymentProofPath = str_replace('public/', 'storage/', $paymentProofPath);
        $ktpImagePath = str_replace('public/', 'storage/', $ktpImagePath);


        $payment = Payment::create([
            'ticket_id' => $ticket->id,
            'name' => $request->name,
            'email' => $request->email,
            'kelas' => $request->kelas,
            'amount' => $request->amount,
            'payment_method' => $request->payment_method,
            'payment_date' => $request->payment_date,
            'payment_proof' => $paymentProofPath,
            'ktp_image' => $ktpImagePath,
        ]);

        return redirect()->route('users.konfirmasi')->with('success', 'Data berhasil disimpan.');
    }

    public function konfirmasi()
    {
        return view('users.konfirmasi');
    }

    public function exportToExcel(Request $request)
    {
        // Dapatkan ID tiket dari permintaan
        $ticketId = $request->query('id');

        // Ambil data tiket dari database berdasarkan ID
        $ticket = Ticket::find($ticketId);

        if (!$ticket) {
            return redirect()->back()->with('error', 'Tiket tidak ditemukan.');
        }

        // Buat instance dari Spreadsheet
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set header kolom
        $sheet->setCellValue('A1', 'ID Tiket');
        $sheet->setCellValue('B1', 'User ID');
        $sheet->setCellValue('C1', 'Tanggal Pemesanan');
        $sheet->setCellValue('D1', 'Tanggal Keberangkatan');
        $sheet->setCellValue('E1', 'Jumlah Penumpang');
        $sheet->setCellValue('F1', 'Asal Keberangkatan');
        $sheet->setCellValue('G1', 'Tujuan Keberangkatan');
        $sheet->setCellValue('H1', 'Waktu Keberangkatan');
        $sheet->setCellValue('I1', 'Nomor Kursi');
        $sheet->setCellValue('J1', 'Nomor Kendaraan');
        $sheet->setCellValue('K1', 'Kelas');
        $sheet->setCellValue('L1', 'Jumlah Penumpang Terdaftar');
        $sheet->setCellValue('M1', 'Subtotal');
        $sheet->setCellValue('N1', 'Metode Pembayaran');
        $sheet->setCellValue('O1', 'Status Pembayaran');

        // Isi data tiket ke dalam sheet
        $sheet->setCellValue('A2', $ticket->id);
        $sheet->setCellValue('B2', $ticket->user_id);
        $sheet->setCellValue('C2', $ticket->tanggal_pemesanan);
        $sheet->setCellValue('D2', $ticket->tanggal_keberangkatan);
        $sheet->setCellValue('E2', $ticket->jumlah_penumpang);
        $sheet->setCellValue('F2', $ticket->asal_keberangkatan);
        $sheet->setCellValue('G2', $ticket->tujuan_keberangkatan);
        $sheet->setCellValue('H2', $ticket->waktu_keberangkatan);
        $sheet->setCellValue('I2', $ticket->nomor_kursi);
        $sheet->setCellValue('J2', $ticket->nomor_kendaraan);
        $sheet->setCellValue('K2', $ticket->kelas);
        $sheet->setCellValue('L2', $ticket->jumlah_penumpang_terdaftar);
        $sheet->setCellValue('M2', $ticket->subtotal);
        $sheet->setCellValue('N2', $ticket->metode_pembayaran);
        $sheet->setCellValue('O2', $ticket->status_pembayaran);

        // Tentukan nama file dan jalur simpan
        $fileName = 'Tiket_' . $ticket->id . '.xlsx';
        $filePath = storage_path('app/public/' . $fileName);

        // Simpan file Excel
        $writer = new Xlsx($spreadsheet);
        $writer->save($filePath);

        // Kembalikan file Excel sebagai respons
        return response()->download($filePath)->deleteFileAfterSend(true);
    }
}
