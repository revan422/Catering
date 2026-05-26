<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | DASHBOARD
    |--------------------------------------------------------------------------
    */

    public function index()
    {

        $pelanggans = DB::table('pelanggans')->get();

        $pakets = DB::table('pakets')->get();

        $pemesanans = DB::table('pemesanans')->get();

        $pengirimans = DB::table('pengirimans')->get();

        $jenisPembayarans = DB::table('jenis_pembayarans')->get();

        return view('dashboard', [

            'pelanggans' => $pelanggans,

            'pakets' => $pakets,

            'pemesanans' => $pemesanans,

            'pengirimans' => $pengirimans,

            'jenisPembayarans' => $jenisPembayarans,

            'totalPelanggan' => $pelanggans->count(),

            'totalPaket' => $pakets->count(),

            'totalPemesanan' => $pemesanans->count(),

            'totalKurir' => $pengirimans->count()

        ]);

    }

    /*
    |--------------------------------------------------------------------------
    | CHECKOUT WEBSITE
    |--------------------------------------------------------------------------
    |*/

    public function checkout(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'telepon' => 'required',
            'alamat' => 'required',
            'id_paket' => 'required',
            'jumlah_pax' => 'required|integer|min:1',
            'id_jenis_bayar' => 'required',
            'tgl_kirim' => 'required',
            'tgl_tiba' => 'required',
        ]);

        /*
        |--------------------------------------------------------------------------
        | FETCH PAKET & CALCULATE TOTAL
        |--------------------------------------------------------------------------
        */
        $paket = DB::table('pakets')->where('id', $request->id_paket)->first();
        if (!$paket) {
            return redirect()->back()->with('error', 'Paket tidak ditemukan');
        }

        $totalBayar = $paket->harga_paket * $request->jumlah_pax;

        /*
        |--------------------------------------------------------------------------
        | INSERT PELANGGAN
        |--------------------------------------------------------------------------
        */

        $idPelanggan = DB::table('pelanggans')->insertGetId([

            'nama_pelanggan' => $request->nama,

            'email' => $request->email,

            'telepon' => $request->telepon,

            'alamat1' => $request->alamat,

            'created_at' => now(),

            'updated_at' => now()

        ]);

        /*
        |--------------------------------------------------------------------------
        | INSERT PEMESANAN
        |--------------------------------------------------------------------------
        */

        $idPemesanan = DB::table('pemesanans')->insertGetId([

            'id_pelanggan' => $idPelanggan,

            'id_jenis_bayar' => $request->id_jenis_bayar,

            'no_resi' => 'IWI-' . rand(100000,999999),

            'tgl_pesan' => now(),

            'status_pesan' => 'Menunggu Konfirmasi',

            'total_bayar' => $totalBayar,

            'created_at' => now(),

            'updated_at' => now()

        ]);

        /*
        |--------------------------------------------------------------------------
        | INSERT DETAIL PEMESANAN
        |--------------------------------------------------------------------------
        */
        DB::table('detail_pemesanans')->insert([
            'id_pemesanan' => $idPemesanan,
            'id_paket' => $request->id_paket,
            'subtotal' => $totalBayar,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        /*
        |--------------------------------------------------------------------------
        | INSERT PENGIRIMAN
        |--------------------------------------------------------------------------
        */

        $courier = DB::table('users')->where('level', 'kurir')->first();
        $idCourier = $courier ? $courier->id : 1;

        DB::table('pengirimans')->insert([

            'tgl_kirim' => $request->tgl_kirim,

            'tgl_tiba' => $request->tgl_tiba,

            'status_kirim' => 'Sedang Dikirim',

            'bukti_foto' => '-',

            'id_pesan' => $idPemesanan,

            'id_user' => $idCourier,

            'created_at' => now(),

            'updated_at' => now()

        ]);

        return redirect('/dashboard')
            ->with('success', 'Pesanan catering IwI berhasil dibuat!');

    }
}
