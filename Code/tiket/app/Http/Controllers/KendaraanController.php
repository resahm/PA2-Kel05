<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailKendaraan;
use App\Models\Ticket;
use Illuminate\Support\Facades\DB;

class KendaraanController extends Controller
{
    public function index()
    {
        $details = DetailKendaraan::all();
        return view('admin.kendaraan_kbt', compact('details'));
    }

    public function updateStatus($id, $status)
    {
        $detail = DetailKendaraan::find($id);
        if (!$detail) {
            return response()->json(['success' => false]);
        }

        $detail->status = $status;
        $detail->save();

        return response()->json(['success' => true]);
    }

    public function bookSeat($seatNumber)
    {
        $detail = DetailKendaraan::where('nomor_kursi', $seatNumber)->first();
        if (!$detail) {
            return response()->json(['success' => false]);
        }

        // Handle booking logic here, e.g., update status or store booking info
        // For simplicity, we'll just update the status to 'booked'
        $detail->status = 'booked';
        $detail->save();

        return response()->json(['success' => true]);
    }
    public function syncTicketsToDetailKendaraan()
    {
        // Ambil semua tiket
        $tickets = Ticket::all();

        foreach ($tickets as $ticket) {
            // Pisahkan nomor kursi jika ada lebih dari satu
            $nomor_kursi_array = explode(',', $ticket->nomor_kursi);

            foreach ($nomor_kursi_array as $nomor_kursi) {
                // Periksa apakah sudah ada detail_kendaraan untuk tiket ini
                $existingDetail = DetailKendaraan::where('nomor_kendaraan', $ticket->nomor_kendaraan)
                    ->where('nomor_kursi', $nomor_kursi)
                    ->first();

                if (!$existingDetail) {
                    // Jika tidak ada, buat detail_kendaraan baru
                    DetailKendaraan::create([
                        'user_id' => $ticket->user_id,
                        'nomor_kendaraan' => $ticket->nomor_kendaraan,
                        'nomor_kursi' => $nomor_kursi, // Gunakan nomor kursi yang dipisahkan
                        'total_kursi' => $ticket->jumlah_penumpang, // Sesuaikan jumlah total kursi dengan data yang sebenarnya
                        'kelas' => $ticket->kelas,
                        'status' => 'pending' // Set status awal sebagai available
                    ]);
                }
            }
        }

        // Redirect kembali ke halaman sebelumnya dengan pesan sukses
        return redirect()->route('admin.kendaraan_kbt')->with('success', 'Tickets synced to detail_kendaraan successfully');
    }
}
