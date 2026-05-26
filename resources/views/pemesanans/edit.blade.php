@extends('layouts.app')

@section('content')
<div class="form-card">
    <h1 class="table-title" style="margin-bottom: 25px; text-align: center;">Edit Pemesanan Kargo 📜</h1>
    
    <form action="/pemesanans/{{ $pemesanan->id }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="id_pelanggan">Pelanggan</label>
            <select name="id_pelanggan" id="id_pelanggan" class="form-control" required>
                @foreach($pelanggans as $p)
                    <option value="{{ $p->id }}" {{ $p->id == $pemesanan->id_pelanggan ? 'selected' : '' }}>
                        {{ $p->nama_pelanggan }} (Email: {{ $p->email }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="id_jenis_bayar">Metode Pembayaran</label>
            <select name="id_jenis_bayar" id="id_jenis_bayar" class="form-control" required>
                @foreach($jenisPembayarans as $item)
                    <option value="{{ $item->id }}" {{ $item->id == $pemesanan->id_jenis_bayar ? 'selected' : '' }}>
                        {{ $item->metode_pembayaran }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="no_resi">Nomor Resi</label>
            <input type="text" name="no_resi" id="no_resi" class="form-control" value="{{ $pemesanan->no_resi }}" required>
        </div>

        <div class="form-group">
            <label for="tgl_pesan">Tanggal Pesan</label>
            <input type="datetime-local" name="tgl_pesan" id="tgl_pesan" class="form-control" value="{{ date('Y-m-d\TH:i', strtotime($pemesanan->tgl_pesan)) }}" required>
        </div>

        <div class="form-group">
            <label for="status_pesan">Status Pesanan</label>
            <select name="status_pesan" id="status_pesan" class="form-control" required>
                <option value="Menunggu Konfirmasi" {{ $pemesanan->status_pesan == 'Menunggu Konfirmasi' ? 'selected' : '' }}>Menunggu Konfirmasi</option>
                <option value="Sedang Diproses" {{ $pemesanan->status_pesan == 'Sedang Diproses' ? 'selected' : '' }}>Sedang Diproses</option>
                <option value="Menunggu Kurir" {{ $pemesanan->status_pesan == 'Menunggu Kurir' ? 'selected' : '' }}>Menunggu Kurir</option>
            </select>
        </div>

        <div class="form-group">
            <label for="total_bayar">Total Bayar (Rupiah)</label>
            <input type="number" name="total_bayar" id="total_bayar" class="form-control" value="{{ $pemesanan->total_bayar }}" min="0" required>
        </div>

        <div style="text-align: center; margin-top: 30px;">
            <button type="submit" class="btn-pirate btn-gold" style="padding: 14px 50px;">
                Update Pemesanan
            </button>
        </div>
    </form>
</div>
@endsection
