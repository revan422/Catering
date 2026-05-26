@extends('layouts.app')

@section('content')
<div class="table-card">
    <div class="table-header-flex">
        <h1 class="table-title">Data Pelanggan (Kru Bajak Laut) 👥</h1>
        <a href="/pelanggans/create" class="btn-pirate btn-gold">
            + Tambah Kru Baru
        </a>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pelanggan</th>
                <th>Email</th>
                <th>Telepon (Den Den Mushi)</th>
                <th>Bergabung Pada</th>
                <th style="width: 180px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pelanggans as $pelanggan)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td style="font-weight: 600; color: var(--primary);">{{ $pelanggan->nama_pelanggan }}</td>
                <td>{{ $pelanggan->email }}</td>
                <td>{{ $pelanggan->telepon }}</td>
                <td>{{ $pelanggan->created_at ? date('d M Y', strtotime($pelanggan->created_at)) : '-' }}</td>
                <td>
                    <div style="display: flex; gap: 8px;">
                        <a href="/pelanggans/{{ $pelanggan->id }}/edit" class="btn-pirate btn-marine btn-sm">
                            Edit
                        </a>
                        <form action="/pelanggans/{{ $pelanggan->id }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data kru ini?')" style="margin: 0;">
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
                <td colspan="6" style="text-align: center; padding: 30px; color: var(--gold);">
                    Belum ada data pelanggan terdaftar.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
