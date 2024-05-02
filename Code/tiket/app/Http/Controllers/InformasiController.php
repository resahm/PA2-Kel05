<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Informasi;
use Illuminate\Support\Facades\Storage;

class InformasiController extends Controller
{
    public function index()
    {
        $informasi = Informasi::all();
        return view('admin.informasi', compact('informasi'));
    }

    public function create()
    {
        return view('admin.informasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'tgl_publikasi' => 'required|date',
            'image' => 'required|image',
        ]);

        $informasi = new Informasi();
        $informasi->judul = $request->judul;
        $informasi->deskripsi = $request->deskripsi;
        $informasi->kategori = $request->kategori;
        $informasi->tanggal_publikasi = $request->tgl_publikasi;
        $informasi->admin_id = auth()->guard('admin')->user()->id;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/informasi');
            $informasi->image = Storage::url($imagePath);
        }

        $informasi->save();

        return redirect()->route('admin.informasi')->with('success', 'Informasi berhasil ditambahkan');
    }

    public function edit($id)
    {
        $informasi = Informasi::find($id);
        return view('admin.edit_informasi', compact('informasi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'tgl_publikasi' => 'required|date',
            'image' => 'sometimes|image',
        ]);

        $informasi = Informasi::find($id);
        $informasi->judul = $request->judul;
        $informasi->deskripsi = $request->deskripsi;
        $informasi->kategori = $request->kategori;
        $informasi->tanggal_publikasi = $request->tgl_publikasi;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/informasi');
            $informasi->image = Storage::url($imagePath);
        }

        $informasi->save();

        return redirect()->route('admin.informasi')->with('success', 'Informasi berhasil diperbarui');
    }

    public function destroy($id)
    {
        $informasi = Informasi::find($id);
        $informasi->delete();

        return redirect()->route('admin.informasi')->with('success', 'Informasi berhasil dihapus');
    }

    public function tabelInformasi()
    {
        $informasi = Informasi::all();
        return view('admin.tabel_informasi', ['informasi' => $informasi]);
    }
}
