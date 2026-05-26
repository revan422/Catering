@extends('layouts.app')

@section('content')
<div class="form-card">
    <h1 class="table-title" style="margin-bottom: 25px; text-align: center;">Tambah Pengiriman Kargo 🚢</h1>
    
    <form action="/pengirimans" method="POST">
        @csrf

        <div class="form-grid-two" style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 0;">
            <div class="form-group">
                <label for="tgl_kirim">Tanggal Kirim</label>
                <input type="datetime-local" name="tgl_kirim" id="tgl_kirim" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="tgl_tiba">Tanggal Tiba (Estimasi)</label>
                <input type="datetime-local" name="tgl_tiba" id="tgl_tiba" class="form-control" required>
            </div>
        </div>

        <div class="form-group">
            <label for="status_kirim">Status Pengiriman</label>
            <select name="status_kirim" id="status_kirim" class="form-control" required>
                <option value="Sedang Dikirim">Sedang Dikirim</option>
                <option value="Tiba Ditujuan">Tiba Ditujuan</option>
            </select>
        </div>

        <div class="form-group">
            <label for="bukti_foto">Bukti Foto Link</label>
            <input type="text" name="bukti_foto" id="bukti_foto" class="form-control" placeholder="Contoh: https://link-foto.com/bukti.jpg" required>
        </div>

        <div class="form-grid-two" style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 0;">
            <div class="form-group">
                <label for="id_pesan">ID Pesanan</label>
                <input type="number" name="id_pesan" id="id_pesan" class="form-control" placeholder="Masukkan ID pesanan kargo..." min="1" required>
            </div>

            <div class="form-group">
                <label for="id_user">ID Kurir (User)</label>
                <input type="number" name="id_user" id="id_user" class="form-control" placeholder="Masukkan ID user kurir..." min="1" required>
            </div>
        </div>

        <div style="text-align: center; margin-top: 30px;">
            <button type="submit" class="btn-pirate btn-gold" style="padding: 14px 50px;">
                Simpan Log Pengiriman
            </button>
        </div>
    </form>
</div>
@endsection
