<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\JadwalKbt;
use App\Models\DetailTiket;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class UserTiketController extends Controller
{
    public function index(Request $request)
    {
        $latestTicket = Ticket::latest('id')->first();
        $waktuSekarang = Carbon::now();

        // Ambil tanggal keberangkatan dari tickets terbaru
        $tanggal_keberangkatan = Carbon::parse($latestTicket->tanggal_keberangkatan);

        // Jika tanggal keberangkatan adalah hari ini
        if ($tanggal_keberangkatan->isToday()) {
            // Filter jadwal yang belum lewat dari waktu sekarang
            $jadwal_kbt = JadwalKBT::where('tanggal_keberangkatan', $tanggal_keberangkatan->toDateString())
                ->where('waktu_keberangkatan', '>', $waktuSekarang->toTimeString())
                ->orderBy('waktu_keberangkatan')
                ->get();
        } else {
            // Tampilkan semua jadwal keberangkatan untuk tanggal yang diinput
            $jadwal_kbt = JadwalKBT::where('tanggal_keberangkatan', $tanggal_keberangkatan->toDateString())
                ->orderBy('waktu_keberangkatan')
                ->get();
        }

        return view('users.info_pelanggan', compact('latestTicket', 'jadwal_kbt'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'asal_keberangkatan' => 'required|string',
            'tujuan_keberangkatan' => 'required|string',
            'jumlah_penumpang' => 'required|integer|max:11',
        ]);

        $tanggalPemesanan = Carbon::now()->toDateString();
        $tanggalKeberangkatan = $request->input('tanggal_keberangkatan');

        $jumlahKursiDipesan = Ticket::where('tanggal_keberangkatan', $tanggalKeberangkatan)
            ->sum('jumlah_penumpang');

        if ($jumlahKursiDipesan + $request->input('jumlah_penumpang') > 11) {
            return redirect()->back()->withErrors('Jumlah penumpang melebihi kapasitas kursi yang tersedia.');
        }

        $ticket = Ticket::create([
            'user_id' => Auth::id(),
            'tanggal_pemesanan' => $tanggalPemesanan,
            'tanggal_keberangkatan' => $tanggalKeberangkatan,
            'asal_keberangkatan' => $request->input('asal_keberangkatan'),
            'tujuan_keberangkatan' => $request->input('tujuan_keberangkatan'),
            'jumlah_penumpang' => $request->input('jumlah_penumpang'),
        ]);

        return redirect()->route('users.info_pelanggan', ['id_ticket' => $ticket->id])
            ->with('success', 'Data tahap pertama berhasil disimpan. Silakan lanjutkan mengisi data selanjutnya.');
    }

    public function storeInfoPelanggan(Request $request)
    {
        Log::info('Data request storeInfoPelanggan:', $request->all());

        $request->validate([
            'waktu_keberangkatan' => 'required|date_format:H:i:s',
            'ticket_id' => 'required|exists:tickets,id'
        ]);

        $ticket_id = $request->input('ticket_id');
        $ticket = Ticket::find($ticket_id);

        if ($ticket) {
            $jumlahPenumpang = $ticket->jumlah_penumpang;
            $tanggalKeberangkatan = $ticket->tanggal_keberangkatan; // Tambahkan ini
            $jadwal = JadwalKBT::where('tanggal_keberangkatan', $tanggalKeberangkatan)
                ->where('waktu_keberangkatan', $request->waktu_keberangkatan)
                ->first();

            if ($jadwal) {
                // Memeriksa apakah jumlah penumpang tidak melebihi kapasitas kursi
                if ($jumlahPenumpang <= $jadwal->kapasitas_kursi) {
                    $jadwal->kapasitas_kursi -= $jumlahPenumpang;
                    $jadwal->save();
                } else {
                    return redirect()->back()->withErrors(['ticket_id' => 'Jumlah penumpang melebihi kapasitas kursi.']);
                }
            } else {
                return redirect()->back()->withErrors(['ticket_id' => 'Jadwal keberangkatan tidak ditemukan.']);
            }

            $ticket->waktu_keberangkatan = $request->waktu_keberangkatan;
            $ticket->save();
            Log::info('Tiket berhasil diperbarui:', $ticket->toArray());

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
            'kelas' => 'required|string',
        ]);

        $ticket = Ticket::find($request->ticket_id);

        if ($ticket) {
            $nomorKursiArray = explode(',', $request->nomor_kursi);

            $lastTicket = Ticket::orderBy('id', 'desc')->first();
            $jumlahPenumpangMaksimum = $lastTicket ? $lastTicket->jumlah_penumpang : 0;

            $jumlahPenumpangTerdaftar = $ticket->jumlah_penumpang_terdaftar ?? 0;

            if ($jumlahPenumpangTerdaftar < $jumlahPenumpangMaksimum) {
                if (count($nomorKursiArray) + $jumlahPenumpangTerdaftar <= $jumlahPenumpangMaksimum) {
                    $ticket->update([
                        'nomor_kursi' => implode(',', $nomorKursiArray),
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
        $latestTicket = Ticket::latest()->first();

        if (!$latestTicket) {
            return redirect()->back()->with('error', 'Tidak ada tiket yang ditemukan.');
        }

        Log::info('Latest Ticket:', $latestTicket->toArray());

        $detailTiket = DetailTiket::where('ticket_id', $latestTicket->id)->get();

        return view('users.detail_tiket', compact('latestTicket', 'detailTiket'));
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
        return redirect()->route('users.bukti_pembayaran', ['ticketId' => $ticket->id])->with('success', 'Bukti pembayaran berhasil disimpan.');
    }
}
