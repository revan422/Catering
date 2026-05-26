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
            --border-glow: rgba(250, 204, 21, 0.3);
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
                radial-gradient(circle at 20% 30%, rgba(250, 204, 21, 0.05) 0%, transparent 40%),
                radial-gradient(circle at 80% 70%, rgba(231, 76, 60, 0.05) 0%, transparent 40%);
            color: var(--text-light);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            overflow-x: hidden;
        }

        /* CUSTOM SCROLLBAR */
        ::-webkit-scrollbar {
            width: 10px;
        }
        ::-webkit-scrollbar-track {
            background: var(--dark-bg);
        }
        ::-webkit-scrollbar-thumb {
            background: var(--card-bg);
            border: 2px solid var(--dark-bg);
            border-radius: 5px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: var(--primary);
        }

        /* NAVBAR */
        .navbar {
            width: 100%;
            padding: 15px 8%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
            background: rgba(11, 15, 25, 0.9);
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
            font-size: 32px;
            color: var(--primary);
            letter-spacing: 2px;
            text-shadow: 0 0 10px rgba(250, 204, 21, 0.5);
        }

        .logo-text span {
            color: var(--secondary);
            text-shadow: 0 0 10px rgba(231, 76, 60, 0.5);
        }

        .menu {
            display: flex;
            gap: 20px;
            align-items: center;
        }

        .menu a {
            text-decoration: none;
            color: var(--text-light);
            font-weight: 500;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 8px 16px;
            border-radius: 8px;
            transition: all 0.3s ease;
            position: relative;
        }

        .menu a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 2px;
            background-color: var(--primary);
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }

        .menu a:hover::after, .menu a.active::after {
            width: 70%;
        }

        .menu a:hover {
            color: var(--primary);
            background: rgba(255, 255, 255, 0.05);
        }

        .btn-logout {
            background: linear-gradient(135deg, var(--secondary), var(--secondary-hover));
            color: white !important;
            border-radius: 8px;
            padding: 10px 20px !important;
            font-weight: 600 !important;
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 4px 10px rgba(231, 76, 60, 0.3);
        }

        .btn-logout:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(231, 76, 60, 0.5);
            background: var(--secondary-hover);
        }

        .btn-login {
            background: linear-gradient(135deg, var(--primary), var(--primary-hover));
            color: var(--text-dark) !important;
            border-radius: 8px;
            padding: 10px 20px !important;
            font-weight: 700 !important;
            box-shadow: 0 4px 10px rgba(250, 204, 21, 0.3);
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(250, 204, 21, 0.5);
        }

        /* MAIN CONTENT CONTAINER */
        .main-content {
            margin-top: 90px;
            padding: 40px 8%;
            flex: 1;
            display: flex;
            flex-direction: column;
            width: 100%;
        }

        /* THEMED TABLES (CRUD LISTS) */
        .table-card {
            background: var(--card-bg);
            border-radius: 20px;
            padding: 30px;
            border: 2px solid var(--gold);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            margin-top: 20px;
            overflow-x: auto;
        }

        .table-header-flex {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            flex-wrap: wrap;
            gap: 15px;
        }

        .table-title {
            font-family: 'Pirata One', cursive;
            font-size: 38px;
            color: var(--primary);
            letter-spacing: 1px;
            text-shadow: 0 0 10px rgba(250, 204, 21, 0.3);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table th {
            background: rgba(11, 15, 25, 0.8);
            color: var(--primary);
            font-family: 'Bangers', sans-serif;
            font-size: 18px;
            letter-spacing: 1px;
            padding: 16px;
            text-align: left;
            border-bottom: 3px solid var(--gold);
        }

        table td {
            padding: 16px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            color: #E2E8F0;
            font-size: 14px;
        }

        table tr:hover td {
            background: rgba(255, 255, 255, 0.02);
            color: white;
        }

        /* THEMED BUTTONS */
        .btn-pirate {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 12px 24px;
            font-family: 'Bangers', sans-serif;
            font-size: 16px;
            letter-spacing: 1px;
            border-radius: 12px;
            border: none;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }

        .btn-gold {
            background: linear-gradient(135deg, var(--primary), var(--primary-hover));
            color: var(--text-dark);
            border: 2px solid var(--gold);
        }

        .btn-gold:hover {
            transform: translateY(-3px) scale(1.03);
            box-shadow: 0 8px 20px rgba(250, 204, 21, 0.4);
        }

        .btn-crimson {
            background: linear-gradient(135deg, var(--secondary), var(--secondary-hover));
            color: white;
            border: 2px solid rgba(255, 255, 255, 0.1);
        }

        .btn-crimson:hover {
            transform: translateY(-3px) scale(1.03);
            box-shadow: 0 8px 20px rgba(231, 76, 60, 0.4);
        }

        .btn-marine {
            background: linear-gradient(135deg, #3B82F6, #1D4ED8);
            color: white;
            border: 2px solid rgba(255, 255, 255, 0.1);
        }

        .btn-marine:hover {
            transform: translateY(-3px) scale(1.03);
            box-shadow: 0 8px 20px rgba(59, 130, 246, 0.4);
        }

        .btn-sm {
            padding: 6px 14px;
            font-size: 13px;
            border-radius: 8px;
        }

        /* THEMED FORMS (CRUD INPUTS) */
        .form-card {
            background: var(--card-bg);
            border-radius: 20px;
            padding: 40px;
            border: 2px solid var(--gold);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            max-width: 750px;
            margin: 20px auto;
        }

        .form-group {
            margin-bottom: 22px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--primary);
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .form-control {
            width: 100%;
            padding: 14px 18px;
            background: rgba(11, 15, 25, 0.6);
            border: 2px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            color: white;
            outline: none;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 15px var(--border-glow);
            background: rgba(11, 15, 25, 0.9);
        }

        select.form-control {
            cursor: pointer;
        }

        select.form-control option {
            background: var(--card-bg);
            color: white;
        }

        textarea.form-control {
            resize: vertical;
            min-height: 120px;
        }

        /* NOTIFICATIONS & ALERTS */
        .alert-pirate {
            padding: 16px;
            border-radius: 12px;
            margin-bottom: 25px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 12px;
            border-left: 5px solid;
            animation: slideIn 0.4s ease;
        }

        .alert-success {
            background: rgba(16, 185, 129, 0.15);
            color: #A7F3D0;
            border-color: #10B981;
        }

        .alert-danger {
            background: rgba(239, 68, 68, 0.15);
            color: #FCA5A5;
            border-color: #EF4444;
        }

        @keyframes slideIn {
            from { transform: translateY(-20px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        /* BADGES */
        .badge {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 9999px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .badge-pending {
            background: rgba(245, 158, 11, 0.2);
            color: #FBBF24;
            border: 1px solid #F59E0B;
        }

        .badge-process {
            background: rgba(59, 130, 246, 0.2);
            color: #93C5FD;
            border: 1px solid #3B82F6;
        }

        .badge-success {
            background: rgba(16, 185, 129, 0.2);
            color: #A7F3D0;
            border: 1px solid #10B981;
        }

        /* FOOTER */
        footer {
            margin-top: auto;
            background: rgba(11, 15, 25, 0.95);
            border-top: 2px solid var(--gold);
            padding: 35px 8%;
            text-align: center;
            color: #94A3B8;
            font-size: 13px;
        }

        footer h4 {
            font-family: 'Pirata One', cursive;
            font-size: 24px;
            color: var(--primary);
            margin-bottom: 8px;
            letter-spacing: 1.5px;
        }

        footer p span {
            color: var(--secondary);
            font-weight: 600;
        }

        /* RESPONSIVE LAYOUT */
        @media(max-width: 900px) {
            .navbar {
                padding: 15px 4%;
                flex-direction: column;
                gap: 15px;
            }
            .menu {
                flex-wrap: wrap;
                justify-content: center;
                gap: 10px;
            }
            .main-content {
                margin-top: 140px;
                padding: 20px 4%;
            }
            .table-header-flex {
                flex-direction: column;
                align-items: flex-start;
            }
        }
    </style>
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar">
        <a href="{{ session('login') ? '/dashboard' : '/' }}" class="logo-container">
            <!-- Jolly Roger Chef Hat SVG -->
            <svg class="logo-svg" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                <g fill="#FACC15">
                    <!-- Crossed Spoons/Forks as bones background -->
                    <path d="M432 80c-25-25-65-25-90 0l-55 55 55 55 55-55c25-25 25-65 0-90zM80 432c25 25 65 25 90 0l55-55-55-55-55 55c-25 25-25 65 0 90z"/>
                    <path d="M432 432c25-25 25-65 0-90l-55-55-55 55 55 55c25 25 65 25 90 0zM80 80c-25 25-25 65 0 90l55 55 55-55-55-55c-25-25-65-25-90 0z"/>
                    <!-- Jolly Roger Center Skull -->
                    <circle cx="256" cy="280" r="100" fill="#FAF5E6" stroke="#D4AF37" stroke-width="8"/>
                    <!-- Eyes and Nose -->
                    <circle cx="216" cy="260" r="18" fill="#0B0F19"/>
                    <circle cx="296" cy="260" r="18" fill="#0B0F19"/>
                    <path d="M256 285l-10 15h20z" fill="#0B0F19"/>
                    <!-- Smile/Pirate Teeth -->
                    <path d="M206 320q50 40 100 0" fill="none" stroke="#0B0F19" stroke-width="6" stroke-linecap="round"/>
                    <path d="M226 325v12M256 328v12M286 325v12" stroke="#0B0F19" stroke-width="4"/>
                    <!-- Chef Hat on top -->
                    <path d="M186 190c-15-5 5-55 35-40c5-25 45-35 55-10c20-25 55-15 45 15c25 5 25 35 10 45z" fill="#FAF5E6" stroke="#D4AF37" stroke-width="6"/>
                    <path d="M196 180h120v25H196z" fill="#E74C3C"/>
                </g>
            </svg>
            <div class="logo-text">IwI<span>Catering</span></div>
        </a>

        <div class="menu">
            @if(session('login'))
                <a href="/dashboard">Dashboard</a>
                <a href="/pakets">Menu Paket</a>
                <a href="/pelanggans">Pelanggan</a>
                <a href="/pemesanans">Pemesanan</a>
                <a href="/pembayarans">Metode Bayar</a>
                <a href="/pengirimans">Pengiriman</a>
                <a href="/profile">Profile</a>
                <a href="/logout" class="btn-logout">Logout</a>
            @else
                <a href="/">Home</a>
                <a href="/#paket">Paket Terkuat</a>
                <a href="/login" class="btn-login">Login</a>
                <a href="/register" style="color: var(--primary)">Daftar Bajak Laut</a>
            @endif
        </div>
    </nav>

    <!-- CONTENT -->
    <main class="main-content">
        @if(session('success'))
            <div class="alert-pirate alert-success">
                <span>🍖</span> {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert-pirate alert-danger">
                <span>⚡</span> {{ session('error') }}
            </div>
        @endif

        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer>
        <h4>IwI Catering</h4>
        <p>Sajian Terkuat di Seluruh Grand Line &copy; {{ date('Y') }}. Masakan Spesial Dari Dapur <span>Chef Sanji</span>.</p>
    </footer>

</body>
</html>
