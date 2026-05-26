<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemesanan;
use App\Models\Pelanggan;
use App\Models\JenisPembayaran;

class PemesananController extends Controller
{
    public function index()
    {
        $pemesanans = Pemesanan::all();

        return view('pemesanans.index', compact('pemesanans'));
    }

    public function create()
    {
        $pelanggans = Pelanggan::all();

        $jenisPembayarans = JenisPembayaran::all();

        return view(
            'pemesanans.create',
            compact(
                'pelanggans',
                'jenisPembayarans'
            )
        );
    }

    public function store(Request $request)
    {
        Pemesanan::create($request->all());

        return redirect('/pemesanans');
    }

    public function edit($id)
    {
        $pemesanan = Pemesanan::findOrFail($id);

        $pelanggans = Pelanggan::all();

        $jenisPembayarans = JenisPembayaran::all();

        return view(
            'pemesanans.edit',
            compact(
                'pemesanan',
                'pelanggans',
                'jenisPembayarans'
            )
        );
    }

    public function update(Request $request, $id)
    {
        $pemesanan = Pemesanan::findOrFail($id);

        $pemesanan->update($request->all());

        return redirect('/pemesanans');
    }

    public function destroy($id)
    {
        $pemesanan = Pemesanan::findOrFail($id);

        $pemesanan->delete();

        return redirect('/pemesanans');
    }
}
