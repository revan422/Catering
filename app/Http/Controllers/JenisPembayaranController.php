<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisPembayaran;

class JenisPembayaranController extends Controller
{
    public function index()
    {
        $pembayarans = JenisPembayaran::all();

        return view(
            'jenis_pembayarans.index',
            compact('pembayarans')
        );
    }

    public function create()
    {
        return view('jenis_pembayarans.create');
    }

    public function store(Request $request)
    {
        JenisPembayaran::create([
            'metode_pembayaran' => $request->metode_pembayaran
        ]);

        return redirect('/pembayarans');
    }

    public function edit($id)
    {
        $pembayaran = JenisPembayaran::findOrFail($id);

        return view(
            'jenis_pembayarans.edit',
            compact('pembayaran')
        );
    }

    public function update(Request $request, $id)
    {
        $pembayaran = JenisPembayaran::findOrFail($id);

        $pembayaran->update([
            'metode_pembayaran' => $request->metode_pembayaran
        ]);

        return redirect('/pembayarans');
    }

    public function destroy($id)
    {
        $pembayaran = JenisPembayaran::findOrFail($id);

        $pembayaran->delete();

        return redirect('/pembayarans');
    }
}
