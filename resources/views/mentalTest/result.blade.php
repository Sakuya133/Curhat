<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hasil Tes Mental</title>
    
    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('css/main/stats.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main/mentalTest.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/navbar.css') }}">

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #F1EDE7;
        }

        .content {
            padding: 40px;
            max-width: 800px;
            margin: 0 auto;
        }

        h1 {
            font-size: 32px;
            margin-bottom: 20px;
        }

        .result-box {
            background-color: #ffffff;
            border-radius: 16px;
            padding: 30px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        .result-box p {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .description {
            margin-top: 15px;
            font-size: 16px;
            color: #555;
        }

        .recommendations-title {
            font-size: 20px;
            font-weight: bold;
            margin-top: 30px;
            margin-bottom: 15px;
        }

        .recommendations-grid {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .recommendation-card {
            background-color: #fffefc;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.06);
            font-size: 16px;
            color: #333;
            line-height: 1.5;
        }

        nav {
            background-color: #ffffff;
            padding: 10px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }

        #logo-box {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        #logo-box h1 {
            font-size: 24px;
            color: #333;
        }

        .mobile-menu-button {
            display: none;
        }

        #profile-box {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        #xp-box {
            text-align: right;
        }

        #xp {
            font-weight: bold;
        }

        .badge-text {
            margin: 0;
            font-size: 14px;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav>
        <div id="logo-box">
            <img src="{{ asset('assets/mini_logo.png') }}" alt="mini_logo" id="mini-logo" />
            <h1>curhatorium</h1>
        </div>

        <button class="mobile-menu-button" aria-label="Toggle menu">
            <span></span>
            <span></span>
            <span></span>
        </button>

        <div id="profile-box">
            <div id="xp-box">
                <div id="badge-box">
                    <img class="badge-logo" src="{{ asset('assets/kindle.svg') }}" alt="badge" />
                    <p class="badge-text">Kindle</p>
                </div>
                <p id="xp">350 XP</p>
            </div>
            <p class="username">username</p>
            <img src="{{ asset('assets/profile_pict.svg') }}" alt="pict" id="pict" />
        </div>
    </nav>

    <!-- Main Content -->
    <br><br><br><br>
    <div class="content">
        <div class="result-box">
            <h1>Hasil Tes Mental</h1>
           

            <p>Nilai total Anda: {{ $totalScore }}</p>
            <p>Kategori: <strong>{{ $category }}</strong></p>

            <div class="description">
                <p><strong>Deskripsi:</strong> {{ $description }}</p>
            </div>

            @if (!empty($recommendations))
                <div class="recommendations-title">Rekomendasi Aktivitas:</div>
                <div class="recommendations-grid">
                    @foreach ($recommendations as $item)
                        <div class="recommendation-card">
                            {{ $item }}
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

</body>
</html>
