@extends('layouts.app')

@section('content')
<div class="table-card">
    <div class="table-header-flex">
        <h1 class="table-title">Metode Pembayaran 🪙</h1>
        <a href="/pembayarans/create" class="btn-pirate btn-gold">
            + Tambah Metode
        </a>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Metode Pembayaran</th>
                <th style="width: 180px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pembayarans as $pembayaran)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td style="font-weight: 600; color: var(--primary);">{{ $pembayaran->metode_pembayaran }}</td>
                <td>
                    <div style="display: flex; gap: 8px;">
                        <a href="/pembayarans/{{ $pembayaran->id }}/edit" class="btn-pirate btn-marine btn-sm">
                            Edit
                        </a>
                        <form action="/pembayarans/{{ $pembayaran->id }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus metode pembayaran ini?')" style="margin: 0;">
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
                <td colspan="3" style="text-align: center; padding: 30px; color: var(--gold);">
                    Belum ada metode pembayaran terdaftar.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
