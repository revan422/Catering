@extends('layouts.app')

@section('content')
<div class="form-card">
    <h1 class="table-title" style="margin-bottom: 25px; text-align: center;">Tambah Pemesanan Manual 📜</h1>
    
    <form action="/pemesanans" method="POST">
        @csrf

        <div class="form-group">
            <label for="id_pelanggan">Pelanggan</label>
            <select name="id_pelanggan" id="id_pelanggan" class="form-control" required>
                @foreach($pelanggans as $p)
                    <option value="{{ $p->id }}">{{ $p->nama_pelanggan }} (Email: {{ $p->email }})</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="id_jenis_bayar">Metode Pembayaran</label>
            <select name="id_jenis_bayar" id="id_jenis_bayar" class="form-control" required>
                @foreach($jenisPembayarans as $item)
                    <option value="{{ $item->id }}">{{ $item->metode_pembayaran }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="no_resi">Nomor Resi</label>
            <input type="text" name="no_resi" id="no_resi" class="form-control" value="IWI-{{ rand(100000, 999999) }}" required>
        </div>

        <div class="form-group">
            <label for="tgl_pesan">Tanggal Pesan</label>
            <input type="datetime-local" name="tgl_pesan" id="tgl_pesan" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="status_pesan">Status Pesanan</label>
            <select name="status_pesan" id="status_pesan" class="form-control" required>
                <option value="Menunggu Konfirmasi">Menunggu Konfirmasi</option>
                <option value="Sedang Diproses">Sedang Diproses</option>
                <option value="Menunggu Kurir">Menunggu Kurir</option>
            </select>
        </div>

        <div class="form-group">
            <label for="total_bayar">Total Bayar (Rupiah)</label>
            <input type="number" name="total_bayar" id="total_bayar" class="form-control" placeholder="Masukkan total nominal..." min="0" required>
        </div>

        <div style="text-align: center; margin-top: 30px;">
            <button type="submit" class="btn-pirate btn-gold" style="padding: 14px 50px;">
                Simpan Pemesanan
            </button>
        </div>
    </form>
</div>
@endsection
