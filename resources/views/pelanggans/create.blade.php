@extends('layouts.app')

@section('content')
<div class="form-card">
    <h1 class="table-title" style="margin-bottom: 25px; text-align: center;">Tambah Kru Pelanggan 👥</h1>
    
    <form action="/pelanggans" method="POST">
        @csrf

        <div class="form-group">
            <label for="nama_pelanggan">Nama Lengkap</label>
            <input type="text" name="nama_pelanggan" id="nama_pelanggan" class="form-control" placeholder="Nama kru / pelanggan..." required>
        </div>

        <div class="form-group">
            <label for="email">Alamat Email</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="email@kru.com" required>
        </div>

        <div class="form-group">
            <label for="telepon">No Telepon (Den Den Mushi)</label>
            <input type="text" name="telepon" id="telepon" class="form-control" placeholder="Nomor telepon aktif" required>
        </div>

        <div style="text-align: center; margin-top: 30px;">
            <button type="submit" class="btn-pirate btn-gold" style="padding: 14px 50px;">
                Daftarkan Kru Pelanggan
            </button>
        </div>
    </form>
</div>
@endsection
