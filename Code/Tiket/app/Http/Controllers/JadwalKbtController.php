<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JadwalKbt;
use Carbon\Carbon;

class JadwalKbtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jadwalKbts = JadwalKbt::all();
        return response()->view('admin.jadwal_kbt', compact('jadwalKbts'));
    }

    public function edit($id)
    {
        $jadwalKbt = JadwalKbt::findOrFail($id);
        return view('admin.edit_jadwal_kbt', compact('jadwalKbt'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'waktu_keberangkatan' => 'required',
        ]);

        $jadwalKbt = JadwalKbt::findOrFail($id);
        $jadwalKbt->waktu_keberangkatan = $validatedData['waktu_keberangkatan'];
        $jadwalKbt->save();

        return redirect()->route('admin.jadwal_kbt')
            ->with('success', 'Jadwal KBT berhasil diperbarui');
    }

    public function destroy($id)
    {
        $jadwalKbt = JadwalKbt::findOrFail($id);
        $jadwalKbt->delete();

        return redirect()->route('admin.jadwal_kbt.index')
            ->with('success', 'Jadwal KBT berhasil dihapus');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tanggal_keberangkatan' => 'required',
            'waktu_keberangkatan' => 'required',
            'kapasitas_kursi' => 'required|numeric',
        ]);

        // Mengambil tanggal keberangkatan dari input dan mengubah formatnya jika perlu
        $tanggal_keberangkatan = $request->input('tanggal_keberangkatan');

        // Contoh: Jika format tanggal adalah 'Y-m-d' (misalnya '2022-12-31'), gunakan kode berikut
        $tanggal_keberangkatan = Carbon::createFromFormat('Y-m-d', $tanggal_keberangkatan);

        $jadwalKbt = new JadwalKBT(); // Sesuaikan penamaan model dengan yang Anda gunakan
        $jadwalKbt->tanggal_keberangkatan = $tanggal_keberangkatan;
        $jadwalKbt->waktu_keberangkatan = $validatedData['waktu_keberangkatan'];
        $jadwalKbt->kapasitas_kursi = $validatedData['kapasitas_kursi']; // gunakan nilai dari validasi
        $jadwalKbt->save();

        return redirect()->route('admin.jadwal_kbt')
            ->with('success', 'Jadwal KBT berhasil ditambahkan');
    }
}
