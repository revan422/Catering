@extends('layouts.app')

@section('content')
<div class="form-card">
    <h1 class="table-title" style="margin-bottom: 25px; text-align: center;">Edit Kru Pelanggan 👥</h1>
    
    <form action="/pelanggans/{{ $pelanggan->id }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nama_pelanggan">Nama Lengkap</label>
            <input type="text" name="nama_pelanggan" id="nama_pelanggan" class="form-control" value="{{ $pelanggan->nama_pelanggan }}" required>
        </div>

        <div class="form-group">
            <label for="email">Alamat Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $pelanggan->email }}" required>
        </div>

        <div class="form-group">
            <label for="telepon">No Telepon (Den Den Mushi)</label>
            <input type="text" name="telepon" id="telepon" class="form-control" value="{{ $pelanggan->telepon }}" required>
        </div>

        <div style="text-align: center; margin-top: 30px;">
            <button type="submit" class="btn-pirate btn-gold" style="padding: 14px 50px;">
                Update Data Pelanggan
            </button>
        </div>
    </form>
</div>
@endsection
