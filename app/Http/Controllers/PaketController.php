<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paket;

class PaketController extends Controller
{
    /**
     * Tampilkan semua data paket
     */
    public function index()
    {
        $pakets = Paket::all();

        return view('pakets.index', compact('pakets'));
    }

    /**
     * Tampilkan form tambah paket
     */
    public function create()
    {
        return view('pakets.create');
    }

    /**
     * Simpan data paket baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_paket' => 'required',
            'jenis' => 'required',
            'kategori' => 'required',
            'jumlah_pax' => 'required',
            'harga_paket' => 'required',
            'deskripsi' => 'required',
        ]);

        Paket::create([
            'nama_paket' => $request->nama_paket,
            'jenis' => $request->jenis,
            'kategori' => $request->kategori,
            'jumlah_pax' => $request->jumlah_pax,
            'harga_paket' => $request->harga_paket,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect('/pakets')
            ->with('success', 'Data paket berhasil ditambahkan');
    }

    /**
     * Tampilkan form edit
     */
    public function edit($id)
    {
        $paket = Paket::findOrFail($id);

        return view('pakets.edit', compact('paket'));
    }

    /**
     * Update data paket
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_paket' => 'required',
            'jenis' => 'required',
            'kategori' => 'required',
            'jumlah_pax' => 'required',
            'harga_paket' => 'required',
            'deskripsi' => 'required',
        ]);

        $paket = Paket::findOrFail($id);

        $paket->update([
            'nama_paket' => $request->nama_paket,
            'jenis' => $request->jenis,
            'kategori' => $request->kategori,
            'jumlah_pax' => $request->jumlah_pax,
            'harga_paket' => $request->harga_paket,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect('/pakets')
            ->with('success', 'Data paket berhasil diupdate');
    }

    /**
     * Hapus data paket
     */
    public function destroy($id)
    {
        $paket = Paket::findOrFail($id);

        $paket->delete();

        return redirect('/pakets')
            ->with('success', 'Data paket berhasil dihapus');
    }
}
