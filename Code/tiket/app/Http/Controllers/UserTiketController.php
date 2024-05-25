<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\DetailTiket;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserTiketController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('id_ticket')) {
            $id_ticket = $request->get('id_ticket');
            $tickets = Ticket::where('id', $id_ticket)->get();
        } else {
            $tickets = Ticket::all();
        }

        return view('users.info_pelanggan', compact('tickets'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal_pemesanan' => 'required|date',
            'tanggal_keberangkatan' => 'required|date',
            'asal_keberangkatan' => 'required|string',
            'tujuan_keberangkatan' => 'required|string',
            'jumlah_penumpang' => 'required|integer|max:11',
        ]);

        $ticket = Ticket::create([
            'user_id' => Auth::id(),
            'tanggal_pemesanan' => $request->tanggal_pemesanan,
            'tanggal_keberangkatan' => $request->tanggal_keberangkatan,
            'asal_keberangkatan' => $request->asal_keberangkatan,
            'tujuan_keberangkatan' => $request->tujuan_keberangkatan,
            'jumlah_penumpang' => $request->jumlah_penumpang,
        ]);

        return redirect()->route('users.info_pelanggan', ['id_ticket' => $ticket->id])
            ->with('success', 'Data tahap pertama berhasil disimpan. Silakan lanjutkan mengisi data selanjutnya.');
    }

    public function storeInfoPelanggan(Request $request)
    {
        Log::info('Data request storeInfoPelanggan:', $request->all());

        $request->validate([
            'waktu_keberangkatan' => 'required|date_format:H:i',
            'ticket_id' => 'required|exists:tickets,id'
        ]);

        $ticket_id = $request->input('ticket_id');
        $ticket = Ticket::find($ticket_id);

        if ($ticket) {
            $ticket->update([
                'waktu_keberangkatan' => $request->waktu_keberangkatan
            ]);
            Log::info('Tiket berhasil diperbarui:', $ticket->toArray());

            $jumlahPenumpang = $ticket->jumlah_penumpang;

            return redirect()->route('users.pilih_kursi')
                ->with('success', 'Data berhasil disimpan.')
                ->with('jumlah_penumpang', $jumlahPenumpang);
        } else {
            Log::error('Tiket tidak ditemukan dengan ID:', ['ticket_id' => $ticket_id]);
            return redirect()->back()->withErrors(['ticket_id' => 'Tiket tidak ditemukan.']);
        }
    }

    public function storePilihKursi(Request $request)
    {
        $request->validate([
            'nomor_kursi' => 'required|string',
            'nomor_kendaraan' => 'required|string',
            'kelas' => 'required|string',
        ]);

        $ticket = Ticket::find($request->ticket_id);

        if ($ticket) {
            // Ambil nomor kursi yang dikirim sebagai array
            $nomorKursiArray = explode(',', $request->nomor_kursi);

            // Periksa apakah kursi sudah dibooking oleh pengguna lain
            foreach ($nomorKursiArray as $kursi) {
                $existingBooking = Ticket::where('nomor_kursi', 'LIKE', "%$kursi%")
                    ->where('nomor_kendaraan', $request->nomor_kendaraan)
                    ->where('kelas', $request->kelas)
                    ->where('tanggal_keberangkatan', $ticket->tanggal_keberangkatan)
                    ->where('waktu_keberangkatan', $ticket->waktu_keberangkatan)
                    ->first();

                if ($existingBooking) {
                    return redirect()->back()->withErrors(['error' => "Kursi nomor $kursi sudah dibooking oleh pengguna lain."]);
                }
            }

            // Ambil tiket terakhir
            $lastTicket = Ticket::orderBy('id', 'desc')->first();
            $jumlahPenumpangMaksimum = $lastTicket ? $lastTicket->jumlah_penumpang : 0;

            $jumlahPenumpangTerdaftar = $ticket->jumlah_penumpang_terdaftar ?? 0;

            if ($jumlahPenumpangTerdaftar < $jumlahPenumpangMaksimum) {
                // Periksa apakah jumlah kursi yang dipilih tidak melebihi jumlah penumpang yang tersedia
                if (count($nomorKursiArray) + $jumlahPenumpangTerdaftar <= $jumlahPenumpangMaksimum) {
                    $ticket->update([
                        'nomor_kursi' => implode(',', $nomorKursiArray),
                        'nomor_kendaraan' => $request->nomor_kendaraan,
                        'kelas' => $request->kelas,
                        'jumlah_penumpang_terdaftar' => $jumlahPenumpangTerdaftar + count($nomorKursiArray)
                    ]);

                    Log::info('Tiket berhasil diperbarui:', $ticket->toArray());

                    return redirect()->route('users.terima_tiket')
                        ->with('success', 'Kursi berhasil dipilih.');
                } else {
                    return redirect()->back()->withErrors(['error' => 'Jumlah kursi yang dipilih melebihi kapasitas yang tersedia.']);
                }
            } else {
                return redirect()->back()->withErrors(['error' => 'Jumlah penumpang sudah mencapai kapasitas maksimum.']);
            }
        } else {
            return redirect()->back()->withErrors(['error' => 'Tiket tidak ditemukan.']);
        }
    }

    public function getLastTicketJumlahPenumpang()
    {
        $lastTicket = Ticket::orderBy('id', 'desc')->first();
        return response()->json(['jumlah_penumpang' => $lastTicket ? $lastTicket->jumlah_penumpang : 0]);
    }

    public function pilihKursi()
    {
        $latestTicket = DB::table('tickets')
            ->orderBy('id', 'desc')
            ->first();

        if ($latestTicket) {
            return view('users.pilih_kursi', ['latestTicket' => $latestTicket]);
        } else {
            return redirect()->back()->with('error', 'No tickets found.');
        }
    }

    public function terimaTiket()
    {
        $latestTicket = DB::table('tickets')
            ->orderBy('id', 'desc')
            ->first();

        if ($latestTicket) {
            return view('users.terima_tiket', ['latestTicket' => $latestTicket]);
        } else {
            return redirect()->back()->with('error', 'No tickets found.');
        }
    }

    public function showTicketInfo()
    {
        // Mendapatkan tiket terbaru
        $latestTicket = Ticket::latest()->first();

        if (!$latestTicket) {
            return redirect()->back()->with('error', 'Tidak ada tiket yang ditemukan.');
        }

        // Debugging: Tampilkan informasi tiket terbaru
        Log::info('Latest Ticket:', $latestTicket->toArray());

        // Dapatkan harga dari tabel detail_tiket berdasarkan asal, tujuan, dan kelas
        $detailTiket = DetailTiket::where('asal_keberangkatan', $latestTicket->asal_keberangkatan)
            ->where('tujuan_keberangkatan', $latestTicket->tujuan_keberangkatan)
            ->where('kelas', $latestTicket->kelas)
            ->first();

        // Debugging: Tampilkan detail tiket yang ditemukan
        if ($detailTiket) {
            Log::info('Detail Tiket:', $detailTiket->toArray());
            $hargaTiket = $detailTiket->harga;
            $metodePembayaran = $detailTiket->metode_pembayaran;
        } else {
            Log::warning('Detail Tiket tidak ditemukan untuk kelas: ' . $latestTicket->kelas);
            $hargaTiket = 0;
            $metodePembayaran = 'N/A'; // Atau Anda dapat menangani ini sesuai kebutuhan
        }

        $jumlahPenumpang = $latestTicket->jumlah_penumpang;
        $totalHarga = $hargaTiket * $jumlahPenumpang;

        // Update subtotal dan metode_pembayaran di tabel tickets
        $latestTicket->subtotal = $totalHarga;
        $latestTicket->metode_pembayaran = $metodePembayaran;
        $latestTicket->save();

        return view('users.konfirmasi', compact('latestTicket', 'hargaTiket', 'totalHarga', 'metodePembayaran'));
    }
    public function storeBuktiPembayaran(Request $request)
    {
        Log::info('Bukti Pembayaran Request:', $request->all());

        // Validasi input
        $validatedData = $request->validate([
            'ticket_id' => 'required|exists:tickets,id',
            'total_harga' => 'required|numeric',
            'metode_pembayaran' => 'required|string'
        ]);

        // Temukan tiket berdasarkan ID
        $ticket = Ticket::find($validatedData['ticket_id']);

        // Update kolom subtotal dan metode_pembayaran
        $ticket->subtotal = $validatedData['total_harga'];
        $ticket->metode_pembayaran = $validatedData['metode_pembayaran'];

        // Simpan perubahan
        $ticket->save();

        // Redirect atau respon sesuai kebutuhan
        return redirect()->route('users.bukti_pembayaran')->with('success', 'Bukti pembayaran berhasil disimpan.');
    }
}
