@extends('layouts.app')

@section('content')
<div style="display: flex; gap: 40px; align-items: flex-start; flex-wrap: wrap;">
    <!-- FORM -->
    <div style="flex: 1.5; min-width: 350px;">
        <div class="form-card" style="margin: 0; max-width: 100%;">
            <h1 class="table-title" style="margin-bottom: 25px;">Edit Paket Catering 🍖</h1>
            
            <form action="/pakets/{{ $paket->id }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="nama_paket">Nama Paket</label>
                    <input type="text" name="nama_paket" id="nama_paket" class="form-control" value="{{ $paket->nama_paket }}" required>
                </div>

                <div class="form-grid-two" style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 0;">
                    <div class="form-group">
                        <label for="jenis">Jenis Paket</label>
                        <select name="jenis" id="jenis" class="form-control" required>
                            <option value="Prasmanan" {{ $paket->jenis == 'Prasmanan' ? 'selected' : '' }}>Prasmanan</option>
                            <option value="Box" {{ $paket->jenis == 'Box' ? 'selected' : '' }}>Box</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <select name="kategori" id="kategori" class="form-control" required>
                            <option value="Pernikahan" {{ $paket->kategori == 'Pernikahan' ? 'selected' : '' }}>Pernikahan</option>
                            <option value="Selamatan" {{ $paket->kategori == 'Selamatan' ? 'selected' : '' }}>Selamatan</option>
                            <option value="Ulang Tahun" {{ $paket->kategori == 'Ulang Tahun' ? 'selected' : '' }}>Ulang Tahun</option>
                            <option value="Studi Tour" {{ $paket->kategori == 'Studi Tour' ? 'selected' : '' }}>Studi Tour</option>
                            <option value="Rapat" {{ $paket->kategori == 'Rapat' ? 'selected' : '' }}>Rapat</option>
                        </select>
                    </div>
                </div>

                <div class="form-grid-two" style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 0;">
                    <div class="form-group">
                        <label for="jumlah_pax">Jumlah Pax (Porsi)</label>
                        <input type="number" name="jumlah_pax" id="jumlah_pax" class="form-control" value="{{ $paket->jumlah_pax }}" min="1" required>
                    </div>

                    <div class="form-group">
                        <label for="harga_paket">Harga Paket (Rupiah)</label>
                        <input type="number" name="harga_paket" id="harga_paket" class="form-control" value="{{ $paket->harga_paket }}" min="0" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="deskripsi">Deskripsi Paket</label>
                    <textarea name="deskripsi" id="deskripsi" class="form-control" rows="5" required>{{ $paket->deskripsi }}</textarea>
                </div>

                <div style="text-align: right; margin-top: 10px;">
                    <button type="submit" class="btn-pirate btn-gold" style="padding: 14px 40px;">
                        Update Menu Katering
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- PREVIEW BOX -->
    <div style="flex: 1; min-width: 300px;">
        <div class="form-card" style="margin: 0; max-width: 100%; text-align: center;">
            <img src="https://images.unsplash.com/photo-1555244162-803834f70033?q=80&w=600" alt="Catering" style="width: 100%; height: 260px; object-fit: cover; border-radius: 12px; border: 2px solid var(--gold); margin-bottom: 20px;">
            <h3 style="color: var(--primary); font-family: 'Pirata One', cursive; font-size: 28px; margin-bottom: 10px;">Update Logbook</h3>
            <p style="color: #94A3B8; font-size: 14px; line-height: 1.6;">Edit detail dari menu katering kargo Anda di sini. Pastikan detail masakan dan harga bounty sesuai untuk kru Anda!</p>
        </div>
    </div>
</div>
@endsection
