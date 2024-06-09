<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DetailTiket;
use App\Models\TicketApproval;
use App\Models\Ticket;
use App\Models\Payment;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::all();
        return view('admin.pelanggan', compact('tickets'));
    }

    public function jumlah()
    {
        $jumlah_pelanggan = DB::table('tickets')->distinct()->count('user_id');
        return view('admin.dashboard', compact('jumlah_pelanggan'));
    }

    public function create()
    {
        return view('admin.create_tiket');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'asal_keberangkatan' => 'required|string',
            'tujuan_keberangkatan' => 'required|string',
            'kelas' => 'required|string',
            'harga' => 'required|numeric',
            'metode_pembayaran' => 'required|string',
        ], [
            'asal_keberangkatan.required' => 'Asal Keberangkatan harus diisi',
            'tujuan_keberangkatan.required' => 'Tujuan Keberangkatan harus diisi',
            'kelas.required' => 'Kelas harus diisi',
            'harga.required' => 'Harga harus diisi',
            'harga.numeric' => 'Harga harus berupa angka',
            'metode_pembayaran.required' => 'Metode Pembayaran harus diisi',
        ]);

        DetailTiket::create($validatedData);

        return redirect()->route('admin.tabel_tiket')->with('success', 'Detail Tiket berhasil ditambahkan');
    }

    public function informasi_tiket()
    {
        $details = DetailTiket::all();
        return view('admin.tabel_tiket', compact('details'));
    }


    public function edit($id)
    {
        $detail = DetailTiket::findOrFail($id);
        return view('admin.edit_tiket', compact('detail'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'asal_keberangkatan' => 'required|string',
            'tujuan_keberangkatan' => 'required|string',
            'kelas' => 'required|string',
            'harga' => 'required|numeric',
            'metode_pembayaran' => 'required|string',
        ], [
            'asal_keberangkatan.required' => 'Asal Keberangkatan harus diisi',
            'tujuan_keberangkatan.required' => 'Tujuan Keberangkatan harus diisi',
            'kelas.required' => 'Kelas harus diisi',
            'harga.required' => 'Harga harus diisi',
            'harga.numeric' => 'Harga harus berupa angka',
            'metode_pembayaran.required' => 'Metode Pembayaran harus diisi',
        ]);

        $detail = DetailTiket::findOrFail($id);
        $detail->update($validatedData);

        return redirect()->route('admin.tabel_tiket')->with('success', 'Detail Tiket berhasil diperbarui');
    }

    public function destroy($id)
    {
        $detail = DetailTiket::findOrFail($id);
        $detail->delete();

        return redirect()->route('admin.tabel_tiket')->with('success', 'Detail Tiket berhasil dihapus');
    }

    public function exportAllToExcel()
    {
        // Ambil semua data tiket dari database
        $tickets = Ticket::all();

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

        // Isi data tiket ke dalam sheet
        $row = 2;
        foreach ($tickets as $ticket) {
            $sheet->setCellValue('A' . $row, $ticket->id);
            $sheet->setCellValue('B' . $row, $ticket->user_id);
            $sheet->setCellValue('C' . $row, $ticket->tanggal_pemesanan);
            $sheet->setCellValue('D' . $row, $ticket->tanggal_keberangkatan);
            $sheet->setCellValue('E' . $row, $ticket->jumlah_penumpang);
            $sheet->setCellValue('F' . $row, $ticket->asal_keberangkatan);
            $sheet->setCellValue('G' . $row, $ticket->tujuan_keberangkatan);
            $sheet->setCellValue('H' . $row, $ticket->waktu_keberangkatan);
            $sheet->setCellValue('I' . $row, $ticket->nomor_kursi);
            $sheet->setCellValue('K' . $row, $ticket->kelas);
            $sheet->setCellValue('L' . $row, $ticket->jumlah_penumpang_terdaftar);
            $sheet->setCellValue('M' . $row, $ticket->subtotal);
            $sheet->setCellValue('N' . $row, $ticket->metode_pembayaran);
            $row++;
        }

        // Tentukan nama file dan jalur simpan
        $fileName = 'Semua_Tiket.xlsx';
        $filePath = storage_path('app/public/' . $fileName);

        // Simpan file Excel
        $writer = new Xlsx($spreadsheet);
        $writer->save($filePath);

        // Kembalikan file Excel sebagai respons
        return response()->download($filePath)->deleteFileAfterSend(true);
    }
}
