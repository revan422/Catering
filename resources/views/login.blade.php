<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - IwI Catering</title>
    
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

        /* CARD */
        .container {
            width: 900px;
            max-width: 100%;
            height: 550px;
            display: flex;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.6);
            border: 3px solid var(--gold);
        }

        /* LEFT FORM */
        .left {
            flex: 1.1;
            background-color: var(--card-bg);
            padding: 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
            background-image: radial-gradient(rgba(0, 0, 0, 0.03) 1px, transparent 0);
            background-size: 20px 20px;
            color: var(--wood-dark);
            border-right: 2px solid var(--gold);
        }

        .chef-hat-icon {
            width: 60px;
            position: absolute;
            top: 25px;
            right: 30px;
            filter: drop-shadow(0 2px 4px rgba(0,0,0,0.1));
            animation: float 4s infinite ease-in-out;
        }

        .left h1 {
            font-family: 'Pirata One', cursive;
            font-size: 48px;
            letter-spacing: 1px;
            color: var(--wood-dark);
            margin-bottom: 5px;
            line-height: 1.1;
        }

        .left p {
            font-size: 14px;
            color: #5C4B3C;
            margin-bottom: 30px;
            font-weight: 500;
        }

        .input-box {
            margin-bottom: 20px;
        }

        .input-box label {
            display: block;
            margin-bottom: 8px;
            color: var(--wood-dark);
            font-weight: 700;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .input-box input {
            width: 100%;
            padding: 14px 16px;
            border: 2px solid rgba(44, 27, 16, 0.2);
            background: rgba(255, 255, 255, 0.5);
            border-radius: 10px;
            outline: none;
            font-size: 14px;
            color: var(--wood-dark);
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .input-box input:focus {
            border-color: var(--secondary-hover);
            box-shadow: 0 0 10px rgba(231, 76, 60, 0.2);
            background: white;
        }

        .login-btn {
            margin-top: 10px;
            width: 100%;
            padding: 15px;
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

        .login-btn:hover {
            background: var(--secondary-hover);
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 6px 15px rgba(231, 76, 60, 0.3);
        }

        .bottom-text {
            margin-top: 25px;
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

        /* RIGHT PANEL */
        .right {
            flex: 0.9;
            background: 
                linear-gradient(135deg, rgba(11, 15, 25, 0.8), rgba(21, 31, 50, 0.95)),
                url('https://images.unsplash.com/photo-1546069901-ba9599a7e63c?q=80&w=1200') center/cover;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 40px;
            color: white;
        }

        .right-logo-svg {
            width: 100px;
            height: 100px;
            filter: drop-shadow(0 0 10px var(--primary));
            margin-bottom: 20px;
            animation: rotateLogo 20s linear infinite;
        }

        .right h2 {
            font-family: 'Pirata One', cursive;
            font-size: 40px;
            color: var(--primary);
            letter-spacing: 1.5px;
            margin-bottom: 10px;
        }

        .right p {
            font-size: 13px;
            color: #94A3B8;
            line-height: 1.6;
        }

        /* ERROR/ALERT */
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

        @keyframes float {
            0% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0); }
        }

        @keyframes rotateLogo {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        /* RESPONSIVE */
        @media(max-width: 800px) {
            .container {
                flex-direction: column;
                height: auto;
            }
            .right {
                display: none;
            }
            .left {
                padding: 40px 30px;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <!-- LEFT FORM -->
        <div class="left">
            <svg class="chef-hat-icon" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                <!-- Simple SVG chef hat outline -->
                <path d="M186 190c-15-5 5-55 35-40c5-25 45-35 55-10c20-25 55-15 45 15c25 5 25 35 10 45z" fill="#D4AF37" stroke="#2C1B10" stroke-width="8"/>
                <path d="M196 180h120v25H196z" fill="#E74C3C" stroke="#2C1B10" stroke-width="4"/>
            </svg>

            <h1>Log Masuk</h1>
            <p>Masuk ke geladak kapal untuk mengelola catering</p>

            @if(session('error'))
                <div class="alert-error">
                    🍖 {{ session('error') }}
                </div>
            @endif

            @if(session('success'))
                <div style="background: #D1FAE5; color: #065F46; border-left: 4px solid #10B981; padding: 12px; border-radius: 8px; font-size: 13px; margin-bottom: 20px; font-weight: 500;">
                    ⚓ {{ session('success') }}
                </div>
            @endif

            <form action="/login" method="POST">
                @csrf

                <div class="input-box">
                    <label for="email">Alamat Email</label>
                    <input type="email" name="email" id="email" placeholder="Masukkan alamat email..." required>
                </div>

                <div class="input-box">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Masukkan password rahasia..." required>
                </div>

                <button type="submit" class="login-btn">
                    Mulai Berlayar! ⚓
                </button>
            </form>

            <div class="bottom-text">
                Belum terdaftar sebagai kru? 
                <a href="/register">Daftar Kru Baru</a>
            </div>
        </div>

        <!-- RIGHT PANEL -->
        <div class="right">
            <!-- Jolly Roger SVG -->
            <svg class="right-logo-svg" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
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
            <p>Menyajikan hidangan bajak laut terlezat di seluruh lautan dari East Blue sampai Grand Line!</p>
        </div>
    </div>

</body>
</html>
