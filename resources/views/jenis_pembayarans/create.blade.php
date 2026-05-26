@extends('layouts.app')

@section('content')
<div class="form-card">
    <h1 class="table-title" style="margin-bottom: 25px; text-align: center;">Tambah Metode Pembayaran 🪙</h1>
    
    <form action="/pembayarans" method="POST">
        @csrf

        <div class="form-group">
            <label for="metode_pembayaran">Nama Metode Pembayaran</label>
            <input type="text" name="metode_pembayaran" id="metode_pembayaran" class="form-control" placeholder="Contoh: Transfer Bank Mandiri, GoPay, COD..." required>
        </div>

        <div style="text-align: center; margin-top: 30px;">
            <button type="submit" class="btn-pirate btn-gold" style="padding: 14px 50px;">
                Simpan Metode Pembayaran
            </button>
        </div>
    </form>
</div>
@endsection
