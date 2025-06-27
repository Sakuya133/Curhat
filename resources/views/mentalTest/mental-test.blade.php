<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Mental Test</title>
    <link rel="stylesheet" href="{{ asset('css/main/stats.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main/mentalTest.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/navbar.css') }}">

    <style>
        body {
            margin: 0;
            font-family: sans-serif;
        }

        .latar {
            background-color: #F1EDE7;
            min-height: 100vh;
            padding: 40px;
            display: flex;
            justify-content: flex-start;
            align-items: flex-start;
            gap: 40px;
        }

        .layout {
            margin-top: 30px;
            width: 750px;
            border-radius: 12px;
            background: #FFFFFF;
            padding: 40px 30px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
        }

        .layout h2 {
            color: #595959;
            text-align: center;
            font-family: Figtree, sans-serif;
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .question {
            margin-bottom: 50px;
        }

        .options {
            display: flex;
            justify-content: center;
            gap: 14px;
            margin-top: 10px;
        }

        .option-wrapper {
            display: flex;
            flex-direction: column;
            align-items: center;
            font-size: 13px;
            color: #444;
            font-weight: 500;
            width: 32px;
        }

        .option-label {
            cursor: pointer;
        }

        .option-label svg {
            width: 28px;
            height: 28px;
        }

        .option-label svg circle {
            fill: #D9D9D9;
            transition: fill 0.2s ease;
        }

        input[type="radio"]:checked + label svg circle {
            fill: #FFCD2D;
        }

        input[type="radio"] {
            display: none;
        }

        .maskot {
            width: 200px;
            height: auto;
            display: block;
            margin-top: 80px;
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #fff;
            padding: 10px 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        #logo-box {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        #logo-box h1 {
            font-size: 18px;
            margin: 0;
        }

        #profile-box {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        #xp-box {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .badge-logo {
            width: 20px;
        }

        .username {
            margin: 0;
        }

        .mobile-menu-button {
            background: none;
            border: none;
            cursor: pointer;
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            width: 24px;
            height: 24px;
            padding: 0;
        }

        .mobile-menu-button span {
            display: block;
            width: 100%;
            height: 3px;
            background-color: #333;
            border-radius: 2px;
        }
    </style>
</head>
<body>
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
            <p class="username">Username</p>
            <img src="{{ asset('assets/profile_pict.svg') }}" alt="pict" id="pict" />
        </div>
    </nav>

    <br>
    <br>
    <br>
    <br>
   
    <div class="latar">
        <img src="{{ asset('assets/maskot.png') }}" alt="Maskot" class="maskot" />

        <div class="layout">

            @php
                $questions = [
                    "Seberapa sering dalam sebulan kamu merasa senang",
                    "Seberapa sering dalam sebulan kamu merasa tertarik dalam hidup",
                    "Seberapa sering dalam sebulan kamu merasa puas dengan hidup",
                    "Seberapa sering dalam sebulan kamu merasa memiliki sesuatu penting untuk diberikan kepada masyarakat?",
                    "Seberapa sering dalam sebulan kamu merasa menjadi bagian dalam masyarakat?",
                    "Seberapa sering dalam sebulan kamu merasa masyarakat adalah tempat yang baik, atau akan menjadi lebih baik untuk semua orang?",
                    "Seberapa sering dalam sebulan kamu merasa bahwa orang-orang pada dasarnya baik?",
                    "Seberapa sering dalam sebulan kamu merasa kamu bisa menerima/memahami cara kerja masyarakat sekitar?",
                    "Seberapa sering dalam sebulan kamu merasa kamu menyukai sebagian besar dari kepribadianmu?",
                    "Seberapa sering dalam sebulan kamu merasa mampu mengelola tanggung jawab sehari-hari?",
                    "Seberapa sering dalam sebulan kamu merasa kamu memiliki hubungan yang hangat dan saling percaya dengan orang lain?",
                    "Seberapa sering dalam sebulan kamu merasa memiliki pengalaman yang menantangmu untuk menjadi orang yang lebih baik?",
                    "Seberapa sering dalam sebulan kamu merasa percaya diri untuk berpikir atau mengeskpresikan ide dan opinimu?",
                    "Seberapa sering dalam sebulan kamu merasa bahwa hidupmu memiliki tujuan dan bermakna?",
                ];
            @endphp

            <form action="{{ route('mental-test.submit') }}" method="POST">
                @csrf

                @foreach ($questions as $index => $question)
                    <div class="question">
                        <h2>{{ $question }}</h2>
                        <div class="options">
                            @for ($i = 1; $i <= 6; $i++)
                                <div class="option-wrapper">
                                    <input type="radio" id="q{{ $index }}_{{ $i }}" name="q{{ $index }}" value="{{ $i }}">
                                    <label class="option-label" for="q{{ $index }}_{{ $i }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 26 26" fill="none">
                                            <circle cx="13" cy="13" r="13"/>
                                        </svg>
                                    </label>
                                    <span>{{ $i }}</span>
                                </div>
                            @endfor
                        </div>
                    </div>
                @endforeach

                <button type="submit" style="
                    align-self: flex-end;
                    background-color: #B3E6E0;
                    padding: 10px 24px;
                    border: none;
                    border-radius: 20px;
                    font-weight: bold;
                    font-size: 15px;
                    cursor: pointer;
                ">
                    Kumpulkan
                </button>
            </form>

        </div>
    </div>

    <script src="{{ asset('js/navbar.js') }}"></script>
</body>
</html>
