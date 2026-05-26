@extends('layouts.app')

@section('content')
<div class="form-card">
    <h1 class="table-title" style="margin-bottom: 25px; text-align: center;">Profil Kru Bajak Laut 👤</h1>
    
    <form action="/profile/update" method="POST">
        @csrf

        <input type="hidden" name="id" value="{{ $user->id }}">

        <div class="form-group">
            <label for="nama">Nama Lengkap</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ $user->nama }}" required>
        </div>

        <div class="form-group">
            <label for="email">Alamat Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" required>
        </div>

        <div class="form-group">
            <label for="password">Password Baru</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Kosongkan jika tidak ingin mengganti password...">
        </div>

        <div style="text-align: center; margin-top: 30px; display: flex; justify-content: center; gap: 15px;">
            <button type="submit" class="btn-pirate btn-gold" style="padding: 14px 40px;">
                Simpan Perubahan
            </button>
            <a href="/logout" class="btn-pirate btn-crimson" style="padding: 14px 40px;">
                Log Out
            </a>
        </div>
    </form>
</div>
@endsection
