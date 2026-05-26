@extends('layouts.app')

@section('content')
<div class="form-card">
    <h1 class="table-title" style="margin-bottom: 25px; text-align: center;">Edit Metode Pembayaran 🪙</h1>
    
    <form action="/pembayarans/{{ $pembayaran->id }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="metode_pembayaran">Nama Metode Pembayaran</label>
            <input type="text" name="metode_pembayaran" id="metode_pembayaran" class="form-control" value="{{ $pembayaran->metode_pembayaran }}" required>
        </div>

        <div style="text-align: center; margin-top: 30px;">
            <button type="submit" class="btn-pirate btn-gold" style="padding: 14px 50px;">
                Update Metode Pembayaran
            </button>
        </div>
    </form>
</div>
@endsection
