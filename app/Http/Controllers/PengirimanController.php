<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengiriman;

class PengirimanController extends Controller
{
    public function index()
    {
        $pengirimans = Pengiriman::all();

        return view(
            'pengirimans.index',
            compact('pengirimans')
        );
    }

    public function create()
    {
        return view('pengirimans.create');
    }

    public function store(Request $request)
    {
        Pengiriman::create($request->all());

        return redirect('/pengirimans');
    }

    public function edit($id)
    {
        $pengiriman = Pengiriman::findOrFail($id);

        return view(
            'pengirimans.edit',
            compact('pengiriman')
        );
    }

    public function update(Request $request, $id)
    {
        $pengiriman = Pengiriman::findOrFail($id);

        $pengiriman->update($request->all());

        return redirect('/pengirimans');
    }

    public function destroy($id)
    {
        $pengiriman = Pengiriman::findOrFail($id);

        $pengiriman->delete();

        return redirect('/pengirimans');
    }
}
