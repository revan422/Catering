@extends('layouts.app')

@section('content')
<div class="table-card">
    <div class="table-header-flex">
        <h1 class="table-title">Data Pemesanan Kargo 📜</h1>
        <a href="/pemesanans/create" class="btn-pirate btn-gold">
            + Tambah Pemesanan Manual
        </a>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nomor Resi</th>
                <th>ID Pelanggan</th>
                <th>Metode Bayar</th>
                <th>Tanggal Pesan</th>
                <th>Status</th>
                <th>Total Bayar</th>
                <th style="width: 180px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pemesanans as $pemesanan)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td><strong style="color: var(--primary);">{{ $pemesanan->no_resi }}</strong></td>
                <td>{{ $pemesanan->id_pelanggan }}</td>
                <td>ID: {{ $pemesanan->id_jenis_bayar }}</td>
                <td>{{ date('d M Y, H:i', strtotime($pemesanan->tgl_pesan)) }}</td>
                <td>
                    @if($pemesanan->status_pesan == 'Menunggu Konfirmasi')
                        <span class="badge badge-pending">Menunggu Konfirmasi</span>
                    @elseif($pemesanan->status_pesan == 'Sedang Diproses')
                        <span class="badge badge-process">Sedang Diproses</span>
                    @else
                        <span class="badge badge-success">{{ $pemesanan->status_pesan }}</span>
                    @endif
                </td>
                <td style="font-weight: bold; color: var(--primary);">Rp {{ number_format($pemesanan->total_bayar, 0, ',', '.') }}</td>
                <td>
                    <div style="display: flex; gap: 8px;">
                        <a href="/pemesanans/{{ $pemesanan->id }}/edit" class="btn-pirate btn-marine btn-sm">
                            Edit
                        </a>
                        <form action="/pemesanans/{{ $pemesanan->id }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus manifest pemesanan ini?')" style="margin: 0;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-pirate btn-crimson btn-sm">
                                Hapus
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="8" style="text-align: center; padding: 30px; color: var(--gold);">
                    Belum ada data pemesanan.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
