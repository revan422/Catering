<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IwI Catering - Sajian Terkuat di Grand Line!</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bangers&family=Pirata+One&family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary: #FACC15; /* Straw Hat Gold */
            --primary-hover: #EAB308;
            --secondary: #E74C3C; /* Luffy Crimson */
            --secondary-hover: #C0392B;
            --dark-bg: #0B0F19; /* Night Ocean Deep */
            --card-bg: #151F32; /* Pirate Ship Deck Slate */
            --text-light: #F8FAFC;
            --text-dark: #1E293B;
            --parchment: #FAF5E6; /* Antique Map Parchment */
            --gold: #D4AF37;
            --wood-dark: #2C1B10;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
            scroll-behavior: smooth;
        }

        body {
            background-color: var(--dark-bg);
            background-image: 
                radial-gradient(circle at 10% 20%, rgba(250, 204, 21, 0.05) 0%, transparent 40%),
                radial-gradient(circle at 90% 80%, rgba(231, 76, 60, 0.05) 0%, transparent 40%);
            color: var(--text-light);
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* NAVBAR */
        .navbar {
            width: 100%;
            padding: 20px 8%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
            background: rgba(11, 15, 25, 0.95);
            backdrop-filter: blur(12px);
            border-bottom: 2px solid var(--gold);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.5);
        }

        .logo-container {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
        }

        .logo-svg {
            width: 45px;
            height: 45px;
            filter: drop-shadow(0 0 5px var(--primary));
            transition: transform 0.5s ease;
        }

        .logo-container:hover .logo-svg {
            transform: rotate(360deg);
        }

        .logo-text {
            font-family: 'Pirata One', cursive;
            font-size: 35px;
            color: var(--primary);
            letter-spacing: 2px;
            text-shadow: 0 0 10px rgba(250, 204, 21, 0.5);
        }

        .logo-text span {
            color: var(--secondary);
        }

        .menu {
            display: flex;
            gap: 30px;
            align-items: center;
        }

        .menu a {
            text-decoration: none;
            color: var(--text-light);
            font-weight: 600;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            transition: all 0.3s ease;
        }

        .menu a:hover {
            color: var(--primary);
        }

        .btn-login {
            background: linear-gradient(135deg, var(--primary), var(--primary-hover));
            color: var(--text-dark) !important;
            padding: 12px 28px;
            border-radius: 12px;
            font-weight: 700;
            box-shadow: 0 4px 15px rgba(250, 204, 21, 0.4);
            border: 2px solid var(--gold);
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(250, 204, 21, 0.6);
        }

        /* HERO SECTION */
        .hero {
            min-height: 90vh;
            background: 
                linear-gradient(rgba(11, 15, 25, 0.8), rgba(11, 15, 25, 0.95)),
                url('https://images.unsplash.com/photo-1555939594-58d7cb561ad1?q=80&w=1600&auto=format&fit=crop') center/cover;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 120px 8% 60px;
            position: relative;
            border-bottom: 3px solid var(--gold);
        }

        .hero-content {
            max-width: 900px;
            animation: fadeIn 1s ease;
        }

        .mini-badge {
            background: rgba(250, 204, 21, 0.1);
            color: var(--primary);
            border: 1px solid var(--gold);
            padding: 8px 20px;
            border-radius: 999px;
            font-family: 'Bangers', sans-serif;
            font-size: 18px;
            letter-spacing: 2px;
            display: inline-block;
            margin-bottom: 20px;
            text-shadow: 0 0 5px rgba(250, 204, 21, 0.3);
        }

        .hero h1 {
            font-family: 'Pirata One', cursive;
            font-size: 80px;
            color: var(--primary);
            line-height: 1.1;
            margin-bottom: 25px;
            letter-spacing: 3px;
            text-shadow: 0 4px 15px rgba(0, 0, 0, 0.8);
        }

        .hero h1 span {
            color: var(--secondary);
        }

        .hero p {
            font-size: 20px;
            line-height: 1.8;
            color: #CBD5E1;
            margin-bottom: 40px;
            text-shadow: 0 2px 5px rgba(0, 0, 0, 0.5);
        }

        .hero-btns {
            display: flex;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn-action {
            padding: 16px 40px;
            font-family: 'Bangers', sans-serif;
            font-size: 22px;
            letter-spacing: 1.5px;
            border-radius: 15px;
            text-decoration: none;
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            display: inline-block;
        }

        .btn-order {
            background: linear-gradient(135deg, var(--secondary), var(--secondary-hover));
            color: white;
            border: 2px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 6px 20px rgba(231, 76, 60, 0.4);
        }

        .btn-order:hover {
            transform: translateY(-4px) scale(1.05);
            box-shadow: 0 10px 25px rgba(231, 76, 60, 0.6);
        }

        .btn-secondary {
            background: rgba(255, 255, 255, 0.05);
            color: white;
            border: 2px solid rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(5px);
        }

        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: translateY(-4px);
        }

        /* LORE BANNER */
        .lore-section {
            background: var(--card-bg);
            padding: 60px 8%;
            display: flex;
            align-items: center;
            gap: 50px;
            border-bottom: 2px solid rgba(255, 255, 255, 0.05);
            flex-wrap: wrap;
        }

        .lore-img {
            flex: 1;
            min-width: 300px;
            height: 350px;
            background: 
                linear-gradient(rgba(21, 31, 50, 0.2), rgba(21, 31, 50, 0.4)),
                url('https://images.unsplash.com/photo-1547592180-85f173990554?q=80&w=800') center/cover;
            border-radius: 30px;
            border: 4px solid var(--gold);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.5);
            position: relative;
            overflow: hidden;
        }

        .lore-content {
            flex: 1.5;
            min-width: 300px;
        }

        .lore-content h2 {
            font-family: 'Pirata One', cursive;
            font-size: 50px;
            color: var(--primary);
            margin-bottom: 20px;
        }

        .lore-content p {
            color: #94A3B8;
            font-size: 16px;
            line-height: 1.8;
            margin-bottom: 25px;
        }

        .sanji-quote {
            border-left: 4px solid var(--secondary);
            padding-left: 20px;
            font-style: italic;
            color: #E2E8F0;
            font-size: 18px;
        }

        /* PACKAGES SECTION */
        .paket-section {
            padding: 100px 8%;
            background: var(--dark-bg);
        }

        .section-title {
            text-align: center;
            margin-bottom: 70px;
        }

        .section-title h2 {
            font-family: 'Pirata One', cursive;
            font-size: 60px;
            color: var(--primary);
            letter-spacing: 2px;
            text-shadow: 0 0 15px rgba(250, 204, 21, 0.2);
            margin-bottom: 10px;
        }

        .section-title p {
            color: #94A3B8;
            font-size: 16px;
        }

        .paket-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 40px;
        }

        /* WANTED POSTER CARD */
        .wanted-poster {
            background-color: var(--parchment);
            border-radius: 8px;
            padding: 24px;
            color: var(--wood-dark);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.6);
            border: 12px double var(--wood-dark);
            position: relative;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            display: flex;
            flex-direction: column;
            align-items: center;
            background-image: radial-gradient(rgba(0, 0, 0, 0.05) 1px, transparent 0);
            background-size: 24px 24px;
        }

        .wanted-poster::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: linear-gradient(135deg, rgba(0,0,0,0.05), transparent 60%);
            pointer-events: none;
            border-radius: 4px;
        }

        .wanted-poster:hover {
            transform: translateY(-15px) rotate(1deg);
            box-shadow: 0 25px 50px rgba(250, 204, 21, 0.15);
        }

        .wanted-header {
            font-family: 'Pirata One', cursive;
            font-size: 45px;
            letter-spacing: 8px;
            color: var(--wood-dark);
            text-align: center;
            font-weight: 900;
            line-height: 1;
            margin-bottom: 2px;
            border-bottom: 4px solid var(--wood-dark);
            width: 100%;
        }

        .wanted-subheader {
            font-family: 'Poppins', sans-serif;
            font-weight: 800;
            font-size: 11px;
            letter-spacing: 5px;
            color: var(--wood-dark);
            text-align: center;
            margin-bottom: 12px;
        }

        .wanted-image-container {
            width: 100%;
            height: 220px;
            border: 5px solid var(--wood-dark);
            background: #fff;
            position: relative;
            overflow: hidden;
            margin-bottom: 16px;
        }

        .wanted-image-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: sepia(0.3) contrast(1.1);
            transition: all 0.5s ease;
        }

        .wanted-poster:hover .wanted-image-container img {
            filter: sepia(0) contrast(1);
            transform: scale(1.05);
        }

        .wanted-body {
            width: 100%;
            text-align: center;
            display: flex;
            flex-direction: column;
            flex: 1;
        }

        .wanted-title {
            font-family: 'Pirata One', cursive;
            font-size: 32px;
            color: var(--wood-dark);
            line-height: 1.2;
            margin-bottom: 10px;
            min-height: 76px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-bottom: 2px dashed rgba(44, 27, 16, 0.3);
            padding-bottom: 5px;
        }

        .wanted-desc {
            font-size: 14px;
            line-height: 1.6;
            color: #4A3525;
            margin-bottom: 16px;
            flex: 1;
            font-weight: 500;
        }

        .wanted-bounty {
            font-family: 'Bangers', sans-serif;
            font-size: 26px;
            letter-spacing: 1px;
            color: var(--secondary-hover);
            margin-bottom: 15px;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 6px;
        }

        .wanted-bounty span {
            font-size: 20px;
            background: var(--wood-dark);
            color: var(--primary);
            padding: 2px 8px;
            border-radius: 4px;
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
        }

        .wanted-btn {
            width: 100%;
            padding: 14px;
            background: var(--wood-dark);
            color: var(--primary);
            font-family: 'Bangers', sans-serif;
            font-size: 18px;
            letter-spacing: 2px;
            border-radius: 6px;
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            border: 2px solid var(--gold);
        }

        .wanted-btn:hover {
            background: var(--secondary-hover);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(231, 76, 60, 0.4);
        }

        /* FOOTER */
        footer {
            background: rgba(11, 15, 25, 0.95);
            border-top: 2px solid var(--gold);
            padding: 50px 8%;
            text-align: center;
            color: #94A3B8;
        }

        footer h3 {
            font-family: 'Pirata One', cursive;
            font-size: 32px;
            color: var(--primary);
            margin-bottom: 12px;
            letter-spacing: 2px;
        }

        footer p span {
            color: var(--secondary);
            font-weight: 600;
        }

        /* KEYFRAMES */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* RESPONSIVE */
        @media(max-width: 900px) {
            .navbar {
                padding: 15px 4%;
                flex-direction: column;
                gap: 15px;
            }
            .menu {
                flex-wrap: wrap;
                justify-content: center;
                gap: 15px;
            }
            .hero h1 {
                font-size: 55px;
            }
            .hero p {
                font-size: 16px;
            }
            .lore-section {
                flex-direction: column;
                gap: 30px;
                padding: 40px 4%;
            }
        }
    </style>
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar">
        <a href="/" class="logo-container">
            <svg class="logo-svg" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                <g fill="#FACC15">
                    <path d="M432 80c-25-25-65-25-90 0l-55 55 55 55 55-55c25-25 25-65 0-90zM80 432c25 25 65 25 90 0l55-55-55-55-55 55c-25 25-25 65 0 90z"/>
                    <path d="M432 432c25-25 25-65 0-90l-55-55-55 55 55 55c25 25 65 25 90 0zM80 80c-25 25-25 65 0 90l55 55 55-55-55-55c-25-25-65-25-90 0z"/>
                    <circle cx="256" cy="280" r="100" fill="#FAF5E6" stroke="#D4AF37" stroke-width="8"/>
                    <circle cx="216" cy="260" r="18" fill="#0B0F19"/>
                    <circle cx="296" cy="260" r="18" fill="#0B0F19"/>
                    <path d="M256 285l-10 15h20z" fill="#0B0F19"/>
                    <path d="M206 320q50 40 100 0" fill="none" stroke="#0B0F19" stroke-width="6" stroke-linecap="round"/>
                    <path d="M226 325v12M256 328v12M286 325v12" stroke="#0B0F19" stroke-width="4"/>
                    <path d="M186 190c-15-5 5-55 35-40c5-25 45-35 55-10c20-25 55-15 45 15c25 5 25 35 10 45z" fill="#FAF5E6" stroke="#D4AF37" stroke-width="6"/>
                    <path d="M196 180h120v25H196z" fill="#E74C3C"/>
                </g>
            </svg>
            <div class="logo-text">IwI<span>Catering</span></div>
        </a>

        <div class="menu">
            <a href="/">Home</a>
            <a href="#paket">Paket Terkuat</a>
            <a href="/login" class="btn-login">Login</a>
        </div>
    </nav>

    <!-- HERO -->
    <div class="hero" id="home">
        <div class="hero-content">
            <div class="mini-badge">Dapur Sanji - Kapal Sunny Go</div>
            <h1>IwI <span>Catering</span></h1>
            <p>Sajian katering kelas dunia yang dimasak dengan gairah bajak laut sejati! Dibuat khusus menggunakan bahan-bahan segar dari seluruh pelosok East Blue hingga Grand Line untuk membangkitkan selera makan para raja bajak laut!</p>
            <div class="hero-btns">
                <a href="#paket" class="btn-action btn-order">Lihat Menu Bounty!</a>
                <a href="/login" class="btn-action btn-secondary">Mulai Petualangan</a>
            </div>
        </div>
    </div>

    <!-- LORE SECTION -->
    <div class="lore-section">
        <div class="lore-img"></div>
        <div class="lore-content">
            <h2>Kelezatan Terbaik Di Lautan</h2>
            <p>IwI Catering menyajikan masakan premium sekelas Restoran Terapung Baratie. Kami melayani katering pernikahan, pesta ulang tahun, syukuran, hingga rapat diplomatik antar wilayah. Makanan kami dijamin halal, higienis, dan memberikan asupan energi yang luar biasa bagi kru bajak laut Anda.</p>
            <div class="sanji-quote">
                "Bahkan di tengah pertempuran sengit di laut luas, perut yang lapar tidak boleh dibiarkan. Biarkan aku memasak makanan terbaik untukmu!" <br><strong>— Chef Sanji, IwI Chief Cook</strong>
            </div>
        </div>
    </div>

    <!-- PAKET SECTION -->
    <div class="section" id="paket">
        <div class="section-title">
            <h2>Wanted Catering Packages!</h2>
            <p>Paket Katering Terpopuler dengan Harga Bounty Terbaik!</p>
        </div>

        <div class="main-content" style="margin-top: 0; padding-top: 0;">
            <div class="paket-grid">
                @forelse($pakets as $paket)
                <div class="wanted-poster">
                    <div class="wanted-header">WANTED</div>
                    <div class="wanted-subheader">READY OR DELIVERED</div>
                    
                    <div class="wanted-image-container">
                        @if($paket->jenis == 'Prasmanan')
                            <img src="https://images.unsplash.com/photo-1547592180-85f173990554?q=80&w=1200&auto=format&fit=crop" alt="Prasmanan">
                        @else
                            <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?q=80&w=1200&auto=format&fit=crop" alt="Box">
                        @endif
                    </div>

                    <div class="wanted-body">
                        <div class="wanted-title">{{ $paket->nama_paket }}</div>
                        <div class="wanted-desc">{{ $paket->deskripsi }}</div>
                        <div class="wanted-bounty">
                            <span>Belly</span> ฿ {{ number_format($paket->harga_paket, 0, ',', '.') }}
                        </div>
                        <a href="/login" class="wanted-btn">Pesan Sekarang!</a>
                    </div>
                </div>
                @empty
                <div style="grid-column: 1/-1; text-align: center; padding: 40px; color: var(--gold);">
                    <h3>Belum ada paket katering yang terdaftar.</h3>
                </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <footer>
        <h3>IwI Catering</h3>
        <p>Sajian Terkuat di Seluruh Grand Line &copy; {{ date('Y') }}. Masakan Spesial Dari Dapur <span>Chef Sanji</span>.</p>
    </footer>

</body>
</html>
