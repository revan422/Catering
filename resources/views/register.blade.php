<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Kru Baru - IwI Catering</title>
    
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
            --card-bg: #FAF5E6; /* Antique Parchment */
            --wood-dark: #2C1B10;
            --gold: #D4AF37;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #0B0F19 0%, #1E293B 100%);
            background-image: 
                radial-gradient(circle at 10% 20%, rgba(250, 204, 21, 0.05) 0%, transparent 40%),
                radial-gradient(circle at 90% 80%, rgba(231, 76, 60, 0.05) 0%, transparent 40%);
            padding: 20px;
            overflow-x: hidden;
            position: relative;
        }

        /* CONTAINER */
        .container {
            width: 1000px;
            max-width: 100%;
            height: 650px;
            display: flex;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.6);
            border: 3px solid var(--gold);
        }

        /* LEFT PANEL (IMAGE LORE) */
        .left {
            flex: 0.9;
            background: 
                linear-gradient(135deg, rgba(11, 15, 25, 0.85), rgba(21, 31, 50, 0.95)),
                url('https://images.unsplash.com/photo-1546069901-ba9599a7e63c?q=80&w=1200') center/cover;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 40px;
            color: white;
            border-right: 2px solid var(--gold);
        }

        .left-logo-svg {
            width: 100px;
            height: 100px;
            filter: drop-shadow(0 0 10px var(--primary));
            margin-bottom: 20px;
            animation: rotateLogo 25s linear infinite;
        }

        .left h2 {
            font-family: 'Pirata One', cursive;
            font-size: 40px;
            color: var(--primary);
            letter-spacing: 1.5px;
            margin-bottom: 10px;
        }

        .left p {
            font-size: 13px;
            color: #94A3B8;
            line-height: 1.6;
        }

        /* RIGHT FORM */
        .right {
            flex: 1.2;
            background-color: var(--card-bg);
            padding: 40px 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            overflow-y: auto;
            position: relative;
            background-image: radial-gradient(rgba(0, 0, 0, 0.03) 1px, transparent 0);
            background-size: 20px 20px;
            color: var(--wood-dark);
        }

        .right h1 {
            font-family: 'Pirata One', cursive;
            font-size: 42px;
            letter-spacing: 1px;
            color: var(--wood-dark);
            margin-bottom: 5px;
        }

        .subtitle {
            font-size: 14px;
            color: #5C4B3C;
            margin-bottom: 25px;
            font-weight: 500;
        }

        .input-box {
            margin-bottom: 15px;
        }

        .input-box label {
            display: block;
            margin-bottom: 6px;
            color: var(--wood-dark);
            font-weight: 700;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .input-box input,
        .input-box textarea {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid rgba(44, 27, 16, 0.2);
            background: rgba(255, 255, 255, 0.5);
            border-radius: 10px;
            outline: none;
            font-size: 14px;
            color: var(--wood-dark);
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .input-box input:focus,
        .input-box textarea:focus {
            border-color: var(--secondary-hover);
            box-shadow: 0 0 10px rgba(231, 76, 60, 0.2);
            background: white;
        }

        .form-grid-two {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        .register-btn {
            margin-top: 15px;
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 12px;
            background: var(--wood-dark);
            color: var(--primary);
            font-family: 'Bangers', sans-serif;
            font-size: 20px;
            letter-spacing: 1.5px;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            border: 2px solid var(--gold);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
        }

        .register-btn:hover {
            background: var(--secondary-hover);
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 6px 15px rgba(231, 76, 60, 0.3);
        }

        .bottom-text {
            margin-top: 20px;
            text-align: center;
            color: #5C4B3C;
            font-size: 13px;
            font-weight: 500;
        }

        .bottom-text a {
            color: var(--secondary-hover);
            text-decoration: none;
            font-weight: 700;
        }

        .bottom-text a:hover {
            text-decoration: underline;
        }

        /* ERRORS ALERT */
        .alert-error {
            background: #FEE2E2;
            color: #991B1B;
            border-left: 4px solid #EF4444;
            padding: 12px;
            border-radius: 8px;
            font-size: 13px;
            margin-bottom: 20px;
            font-weight: 500;
        }

        @keyframes rotateLogo {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        /* RESPONSIVE */
        @media(max-width: 850px) {
            .container {
                flex-direction: column;
                height: auto;
            }
            .left {
                display: none;
            }
            .right {
                padding: 40px 30px;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <!-- LEFT PANEL -->
        <div class="left">
            <svg class="left-logo-svg" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
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
            <h2>IwI Catering</h2>
            <p>Bergabunglah dengan armada katering terkuat dan nikmati hidangan para raja bajak laut!</p>
        </div>

        <!-- RIGHT FORM -->
        <div class="right">
            <h1>Daftar Kru Baru</h1>
            <p class="subtitle">Daftarkan akun koki/pelanggan Anda di sini</p>

            @if(session('error'))
                <div class="alert-error">
                    🍖 {{ session('error') }}
                </div>
            @endif

            <form action="/register" method="POST">
                @csrf

                <div class="input-box">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" name="nama" id="nama" placeholder="Masukkan nama lengkap kru..." required>
                </div>

                <div class="form-grid-two">
                    <div class="input-box">
                        <label for="email">Alamat Email</label>
                        <input type="email" name="email" id="email" placeholder="email@kru.com" required>
                    </div>

                    <div class="input-box">
                        <label for="telepon">No Telepon (Den Den Mushi)</label>
                        <input type="text" name="telepon" id="telepon" placeholder="Nomor telepon..." required>
                    </div>
                </div>

                <div class="input-box">
                    <label for="alamat">Alamat Lengkap (Koordinat Kapal)</label>
                    <textarea name="alamat" id="alamat" rows="2" placeholder="Masukkan alamat lengkap..." style="resize: none;" required></textarea>
                </div>

                <div class="form-grid-two">
                    <div class="input-box">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" placeholder="Password rahasia..." required>
                    </div>

                    <div class="input-box">
                        <label for="password_confirmation">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Ulangi password..." required>
                    </div>
                </div>

                <button type="submit" class="register-btn">
                    Daftar Sekarang! 🚢
                </button>
            </form>

            <div class="bottom-text">
                Sudah terdaftar sebagai kru? 
                <a href="/login">Log Masuk</a>
            </div>
        </div>
    </div>

</body>
</html>
