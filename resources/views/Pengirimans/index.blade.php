@extends('layouts.app')

@section('content')
<div class="table-card">
    <div class="table-header-flex">
        <h1 class="table-title">Status Pengiriman Armada ⚓</h1>
        <a href="/pengirimans/create" class="btn-pirate btn-gold">
            + Tambah Log Pengiriman
        </a>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>ID Pengiriman</th>
                <th>Tanggal Kirim</th>
                <th>Tanggal Tiba</th>
                <th>Status</th>
                <th>Bukti Foto</th>
                <th>ID Pesanan</th>
                <th>ID Kurir</th>
                <th style="width: 180px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pengirimans as $kirim)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td><strong style="color: var(--primary);">#{{ $kirim->id }}</strong></td>
                <td>{{ date('d M Y, H:i', strtotime($kirim->tgl_kirim)) }}</td>
                <td>{{ date('d M Y, H:i', strtotime($kirim->tgl_tiba)) }}</td>
                <td>
                    <span class="badge {{ $kirim->status_kirim == 'Tiba Ditujuan' ? 'badge-success' : 'badge-process' }}">
                        {{ $kirim->status_kirim }}
                    </span>
                </td>
                <td>{{ $kirim->bukti_foto ?? '-' }}</td>
                <td>ID: {{ $kirim->id_pesan }}</td>
                <td>ID: {{ $kirim->id_user }}</td>
                <td>
                    <div style="display: flex; gap: 8px;">
                        <a href="/pengirimans/{{ $kirim->id }}/edit" class="btn-pirate btn-marine btn-sm">
                            Edit
                        </a>
                        <form action="/pengirimans/{{ $kirim->id }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data pengiriman armada ini?')" style="margin: 0;">
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
                <td colspan="9" style="text-align: center; padding: 30px; color: var(--gold);">
                    Belum ada armada pengiriman yang berlayar.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
