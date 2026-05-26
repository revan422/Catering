@extends('layouts.app')

@section('content')

<!-- HERO / ADVENTURE BANNER -->
<section class="hero-dashboard">
    <div class="hero-left">
        <span class="adventure-badge">Kru Bajak Laut: {{ session('nama') }} (Level: {{ ucfirst(session('level')) }})</span>
        <h1>IwI Catering Logbook</h1>
        <p>Selamat datang di kapal utama IwI Catering! Di sini Anda dapat mengelola bounty, pesanan catering, memantau pengiriman barang oleh kurir kami, serta memasak menu terkuat untuk kru bajak laut Anda.</p>
        <div class="hero-buttons">
            <a href="#checkout" class="btn-pirate btn-gold">Pesan Baru!</a>
            <a href="#pemesanan" class="btn-pirate btn-crimson">Pantau Pengiriman</a>
        </div>
    </div>
    <div class="hero-right">
        <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?q=80&w=1200" alt="Culinary">
    </div>
</section>

<!-- TREASURE STATISTICS -->
<section class="statistik-grid">
    <a href="/pelanggans" class="stat-card">
        <div class="stat-icon">👥</div>
        <div class="stat-info">
            <h2>{{ $totalPelanggan }}</h2>
            <p>Total Pelanggan</p>
        </div>
    </a>
    <a href="/pakets" class="stat-card">
        <div class="stat-icon">🍖</div>
        <div class="stat-info">
            <h2>{{ $totalPaket }}</h2>
            <p>Total Paket Menu</p>
        </div>
    </a>
    <a href="/pemesanans" class="stat-card">
        <div class="stat-icon">📜</div>
        <div class="stat-info">
            <h2>{{ $totalPemesanan }}</h2>
            <p>Total Pemesanan</p>
        </div>
    </a>
    <a href="/pengirimans" class="stat-card">
        <div class="stat-icon">⚓</div>
        <div class="stat-info">
            <h2>{{ $totalKurir }}</h2>
            <p>Kurir Aktif</p>
        </div>
    </a>
</section>

<!-- WANTED POSTERS PACKAGES -->
<section class="dashboard-section" id="paket">
    <div class="section-title-dash">
        <h2>Wanted Catering Packages!</h2>
        <p>Pilih paket menu terkuat dari koki andalan kami</p>
    </div>

    <div class="paket-cards-grid">
        @foreach($pakets as $paket)
        <div class="wanted-poster">
            <div class="wanted-header">WANTED</div>
            <div class="wanted-subheader">READY OR DELIVERED</div>
            <div class="wanted-image-container">
                @if($paket->jenis == 'Prasmanan')
                    <img src="https://images.unsplash.com/photo-1547592180-85f173990554?q=80&w=1200" alt="Prasmanan">
                @else
                    <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?q=80&w=1200" alt="Box">
                @endif
            </div>
            <div class="wanted-body">
                <div class="wanted-title">{{ $paket->nama_paket }}</div>
                <p class="wanted-desc">{{ $paket->deskripsi }}</p>
                <div class="wanted-bounty">
                    <span>Belly</span> ฿ {{ number_format($paket->harga_paket, 0, ',', '.') }}
                </div>
                <button onclick="selectPackage({{ $paket->id }}, {{ $paket->harga_paket }})" class="wanted-btn">Pilih Paket</button>
            </div>
        </div>
        @endforeach
    </div>
</section>

<!-- CHECKOUT / ORDER FORM -->
<section class="dashboard-section" id="checkout">
    <div class="section-title-dash">
        <h2>Form Pemesanan Catering</h2>
        <p>Isi manifest kapal untuk melakukan order catering</p>
    </div>

    <div class="form-card-themed">
        <form action="/checkout" method="POST" id="checkoutForm">
            @csrf
            <div class="form-grid-three">
                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama kru/pelanggan" required>
                </div>
                <div class="form-group">
                    <label for="email">Alamat Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="email@kru.com" required>
                </div>
                <div class="form-group">
                    <label for="telepon">No Telepon (Den Den Mushi)</label>
                    <input type="text" name="telepon" id="telepon" class="form-control" placeholder="Nomor telepon" required>
                </div>
            </div>

            <div class="form-grid-three">
                <div class="form-group">
                    <label for="tgl_kirim">Tanggal Kirim</label>
                    <input type="datetime-local" name="tgl_kirim" id="tgl_kirim" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="tgl_tiba">Estimasi Tiba (Tujuan)</label>
                    <input type="datetime-local" name="tgl_tiba" id="tgl_tiba" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="id_jenis_bayar">Metode Pembayaran</label>
                    <select name="id_jenis_bayar" id="id_jenis_bayar" class="form-control" required>
                        @foreach($jenisPembayarans as $bayar)
                            <option value="{{ $bayar->id }}">{{ $bayar->metode_pembayaran }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-grid-two">
                <div class="form-group">
                    <label for="id_paket">Paket Catering</label>
                    <select name="id_paket" id="id_paket" class="form-control" required>
                        <option value="" data-harga="0" selected disabled>-- Pilih Menu Paket --</option>
                        @foreach($pakets as $paket)
                            <option value="{{ $paket->id }}" data-harga="{{ $paket->harga_paket }}">
                                {{ $paket->nama_paket }} (฿ {{ number_format($paket->harga_paket, 0, ',', '.') }})
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="jumlah_pax">Jumlah Pax (Porsi)</label>
                    <input type="number" name="jumlah_pax" id="jumlah_pax" class="form-control" placeholder="Porsi katering" min="1" value="1" required>
                </div>
            </div>

            <div class="form-group">
                <label for="alamat">Alamat Pengiriman (Koordinat Grand Line)</label>
                <textarea name="alamat" id="alamat" class="form-control" placeholder="Tulis alamat lengkap atau lokasi bersandar kapal..." required></textarea>
            </div>

            <div class="bounty-calc-box">
                <div class="bounty-label">BOUNTY ESTIMATION (TOTAL):</div>
                <div class="bounty-value" id="bounty-total">฿ 0</div>
                <div class="bounty-rupiah" id="rupiah-total">Rp 0</div>
            </div>

            <div style="text-align: center; margin-top: 20px;">
                <button type="submit" class="btn-pirate btn-gold" style="padding: 16px 50px; font-size: 20px;">
                    Kirim Kargo Catering! 🚢
                </button>
            </div>
        </form>
    </div>
</section>

<!-- TABLE: DATA PEMESANAN -->
<section class="dashboard-section" id="pemesanan">
    <div class="section-title-dash">
        <h2>Data Pemesanan Kargo</h2>
        <p>Manifest kargo katering yang sedang diproses di lautan</p>
    </div>

    <div class="table-card">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nomor Resi</th>
                    <th>Status</th>
                    <th>Bounty Total</th>
                    <th>Tanggal Pesan</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pemesanans as $pemesanan)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><strong style="color: var(--primary);">{{ $pemesanan->no_resi }}</strong></td>
                    <td>
                        @if($pemesanan->status_pesan == 'Menunggu Konfirmasi')
                            <span class="badge badge-pending">Menunggu Konfirmasi</span>
                        @elseif($pemesanan->status_pesan == 'Sedang Diproses')
                            <span class="badge badge-process">Sedang Diproses</span>
                        @else
                            <span class="badge badge-success">{{ $pemesanan->status_pesan }}</span>
                        @endif
                    </td>
                    <td style="color: var(--primary); font-weight: 600;">Rp {{ number_format($pemesanan->total_bayar, 0, ',', '.') }}</td>
                    <td>{{ date('d M Y, H:i', strtotime($pemesanan->tgl_pesan)) }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" style="text-align: center; padding: 25px; color: var(--gold);">Kargo katering kosong.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</section>

<!-- CARDS: DATA PENGIRIMAN -->
<section class="dashboard-section" id="pengiriman">
    <div class="section-title-dash">
        <h2>Status Pengiriman Armada</h2>
        <p>Posisi pengiriman logistik catering di Grand Line</p>
    </div>

    <div class="delivery-cards-grid">
        @forelse($pengirimans as $kirim)
        <div class="delivery-card">
            <div class="ship-badge">🚢 {{ $kirim->status_kirim }}</div>
            <h3>Kargo Pemesanan #{{ $kirim->id_pesan }}</h3>
            <div class="ship-details">
                <p><strong>Berlayar:</strong> {{ date('d M Y, H:i', strtotime($kirim->tgl_kirim)) }}</p>
                <p><strong>Estimasi Tiba:</strong> {{ date('d M Y, H:i', strtotime($kirim->tgl_tiba)) }}</p>
            </div>
            <div class="photo-proof">
                <strong>Bukti Pengiriman:</strong>
                <span>{{ $kirim->bukti_foto ?? '-' }}</span>
            </div>
        </div>
        @empty
        <div style="grid-column: 1/-1; text-align: center; padding: 40px; color: var(--gold);">
            <h3>Belum ada armada pengiriman yang berlayar.</h3>
        </div>
        @endforelse
    </div>
</section>

<!-- CHAT DEN DEN MUSHI (WHATSAPP SNAIL) -->
<a href="https://wa.me/6283170793687" class="den-den-mushi" target="_blank" title="Hubungi Den Den Mushi Kami!">
    <div class="snail-shell">🐌</div>
    <div class="snail-bubble">RING RING RING!</div>
</a>

<!-- STYLES -->
<style>
    /* HERO */
    .hero-dashboard {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 40px;
        background: var(--card-bg);
        border: 2px solid var(--gold);
        border-radius: 30px;
        padding: 45px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
        margin-bottom: 50px;
        flex-wrap: wrap;
    }

    .hero-left {
        flex: 1.2;
        min-width: 300px;
    }

    .adventure-badge {
        background: rgba(231, 76, 60, 0.15);
        color: var(--secondary);
        border: 1px solid var(--secondary);
        padding: 6px 16px;
        border-radius: 999px;
        font-size: 13px;
        font-weight: 600;
        display: inline-block;
        margin-bottom: 20px;
    }

    .hero-left h1 {
        font-family: 'Pirata One', cursive;
        font-size: 60px;
        color: var(--primary);
        letter-spacing: 2px;
        margin-bottom: 15px;
    }

    .hero-left p {
        color: #94A3B8;
        line-height: 1.8;
        font-size: 15px;
        margin-bottom: 30px;
    }

    .hero-buttons {
        display: flex;
        gap: 15px;
        flex-wrap: wrap;
    }

    .hero-right {
        flex: 0.8;
        min-width: 250px;
    }

    .hero-right img {
        width: 100%;
        border-radius: 20px;
        border: 3px solid var(--gold);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
    }

    /* STATS CARDS */
    .statistik-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 25px;
        margin-bottom: 60px;
    }

    .stat-card {
        background: var(--card-bg);
        border: 2px solid rgba(250, 204, 21, 0.2);
        padding: 25px;
        border-radius: 20px;
        display: flex;
        align-items: center;
        gap: 20px;
        text-decoration: none;
        color: white;
        transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    .stat-card:hover {
        transform: translateY(-8px);
        border-color: var(--primary);
        box-shadow: 0 8px 25px rgba(250, 204, 21, 0.2);
    }

    .stat-icon {
        font-size: 40px;
        background: rgba(250, 204, 21, 0.1);
        padding: 12px;
        border-radius: 15px;
        border: 1px solid rgba(250, 204, 21, 0.2);
    }

    .stat-info h2 {
        font-size: 32px;
        color: var(--primary);
        font-family: 'Bangers', sans-serif;
        line-height: 1;
        margin-bottom: 5px;
    }

    .stat-info p {
        color: #94A3B8;
        font-size: 13px;
    }

    /* SECTIONS */
    .dashboard-section {
        margin-bottom: 70px;
    }

    .section-title-dash {
        margin-bottom: 35px;
    }

    .section-title-dash h2 {
        font-family: 'Pirata One', cursive;
        font-size: 45px;
        color: var(--primary);
        letter-spacing: 1.5px;
        text-shadow: 0 0 10px rgba(250, 204, 21, 0.2);
    }

    .section-title-dash p {
        color: #94A3B8;
        font-size: 15px;
    }

    /* CARD PACKETS GRID */
    .paket-cards-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 30px;
    }

    /* FORMS */
    .form-card-themed {
        background: var(--card-bg);
        border: 2px solid var(--gold);
        border-radius: 25px;
        padding: 40px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
    }

    .form-grid-three {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 20px;
    }

    .form-grid-two {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }

    @media(max-width: 600px) {
        .form-grid-two {
            grid-template-columns: 1fr;
        }
    }

    /* BOUNTY ESTIMATION */
    .bounty-calc-box {
        margin-top: 30px;
        background: rgba(11, 15, 25, 0.8);
        border: 2px dashed var(--gold);
        padding: 25px;
        border-radius: 15px;
        text-align: center;
    }

    .bounty-label {
        font-family: 'Bangers', sans-serif;
        font-size: 16px;
        color: var(--primary);
        letter-spacing: 1.5px;
    }

    .bounty-value {
        font-family: 'Pirata One', cursive;
        font-size: 45px;
        color: var(--secondary);
        text-shadow: 0 0 10px rgba(231, 76, 60, 0.3);
        margin: 5px 0;
    }

    .bounty-rupiah {
        color: #94A3B8;
        font-size: 16px;
        font-weight: 600;
    }

    /* DELIVERY CARDS */
    .delivery-cards-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 25px;
    }

    .delivery-card {
        background: var(--card-bg);
        border: 2px solid rgba(255, 255, 255, 0.05);
        padding: 30px;
        border-radius: 20px;
        position: relative;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }

    .delivery-card h3 {
        font-family: 'Pirata One', cursive;
        font-size: 26px;
        color: var(--primary);
        margin: 15px 0 10px;
        letter-spacing: 1px;
    }

    .ship-badge {
        position: absolute;
        top: 15px;
        right: 15px;
        background: rgba(250, 204, 21, 0.15);
        border: 1px solid var(--primary);
        color: var(--primary);
        padding: 4px 12px;
        border-radius: 8px;
        font-size: 12px;
        font-weight: 600;
        text-transform: uppercase;
    }

    .ship-details p {
        font-size: 14px;
        color: #CBD5E1;
        margin-bottom: 6px;
    }

    .photo-proof {
        margin-top: 15px;
        border-top: 1px solid rgba(255, 255, 255, 0.05);
        padding-top: 12px;
        font-size: 13px;
        color: #94A3B8;
    }

    /* CHAT SNAIL (DEN DEN MUSHI) */
    .den-den-mushi {
        position: fixed;
        bottom: 30px;
        right: 30px;
        width: 80px;
        height: 80px;
        background: var(--card-bg);
        border: 3px solid var(--gold);
        border-radius: 50%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-decoration: none;
        z-index: 999;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.5);
        transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .den-den-mushi:hover {
        transform: scale(1.1) rotate(-5deg);
        box-shadow: 0 12px 30px rgba(250, 204, 21, 0.4);
    }

    .snail-shell {
        font-size: 36px;
        line-height: 1;
    }

    .snail-bubble {
        font-family: 'Bangers', sans-serif;
        font-size: 9px;
        color: var(--primary);
        letter-spacing: 0.5px;
        margin-top: 2px;
    }
</style>

<!-- INTERACTIVE SCRIPTS -->
<script>
    const idPaketSelect = document.getElementById('id_paket');
    const jumlahPaxInput = document.getElementById('jumlah_pax');
    const bountyTotalDisplay = document.getElementById('bounty-total');
    const rupiahTotalDisplay = document.getElementById('rupiah-total');

    function calculateTotal() {
        if (!idPaketSelect || !jumlahPaxInput) return;
        const selectedOption = idPaketSelect.options[idPaketSelect.selectedIndex];
        if (!selectedOption) return;

        const harga = parseInt(selectedOption.getAttribute('data-harga')) || 0;
        const pax = parseInt(jumlahPaxInput.value) || 0;
        const total = harga * pax;

        bountyTotalDisplay.innerText = '฿ ' + total.toLocaleString('id-ID');
        rupiahTotalDisplay.innerText = 'Rp ' + total.toLocaleString('id-ID');
    }

    if (idPaketSelect && jumlahPaxInput) {
        idPaketSelect.addEventListener('change', calculateTotal);
        jumlahPaxInput.addEventListener('input', calculateTotal);
    }

    function selectPackage(paketId, harga) {
        if (!idPaketSelect) return;
        idPaketSelect.value = paketId;
        calculateTotal();
        
        const formSection = document.getElementById('checkout');
        if (formSection) {
            formSection.scrollIntoView({ behavior: 'smooth' });
        }
    }
</script>

@endsection
