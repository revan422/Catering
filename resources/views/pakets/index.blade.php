@extends('layouts.app')

@section('content')
<div class="table-card">
    <div class="table-header-flex">
        <h1 class="table-title">Daftar Paket Catering 🍖</h1>
        <a href="/pakets/create" class="btn-pirate btn-gold">
            + Tambah Paket Menu
        </a>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Paket</th>
                <th>Jenis</th>
                <th>Kategori</th>
                <th>Jumlah Pax</th>
                <th>Harga Paket</th>
                <th>Deskripsi</th>
                <th style="width: 180px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pakets as $paket)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td style="font-weight: 600; color: var(--primary);">{{ $paket->nama_paket }}</td>
                <td>
                    <span class="badge {{ $paket->jenis == 'Prasmanan' ? 'badge-success' : 'badge-process' }}">
                        {{ $paket->jenis }}
                    </span>
                </td>
                <td>{{ $paket->kategori }}</td>
                <td>{{ $paket->jumlah_pax }} Pax</td>
                <td style="font-weight: bold; color: var(--primary);">Rp {{ number_format($paket->harga_paket, 0, ',', '.') }}</td>
                <td>{{ $paket->deskripsi }}</td>
                <td>
                    <div style="display: flex; gap: 8px;">
                        <a href="/pakets/{{ $paket->id }}/edit" class="btn-pirate btn-marine btn-sm">
                            Edit
                        </a>
                        <form action="/pakets/{{ $paket->id }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus paket ini dari daftar bounty?')" style="margin: 0;">
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
                    Belum ada data paket katering.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
