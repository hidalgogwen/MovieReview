<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/icon.png') }}" />
    @section('title','Timely Films Review')

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body>

    @include('layouts.inc.user-navbar')

    <div class="banner-image">
        <div class="about-section">
            <h1>About Us</h1>
        </div>
        <h2 style="text-align:center">Our Team</h2>
        <div class="row">
            <div class="column" id="about-column">
                <div class="card" id="about-card">
                    <img src="{{ asset('assets/img/profile.webp') }}" alt="Gwen" style="width:100%">
                    <div class="container" id="about-container">
                        <h2>Louise Gwendolyn Hidalgo</h2>
                        <p class="title" id="about-title">Back-End Developer</p>
                        <p>louisegwendolyn@gmail.com</p>
                        <p><button class="button" id="about-button">Contact</button></p>
                    </div>
                </div>
            </div>

            <div class="column" id="about-column">
                <div class="card" id="about-card">
                    <img src="{{ asset('assets/img/profile.webp')  }}" alt="Marc" style="width:100%">
                    <div class="container" id="about-container">
                        <h2>Marc Joseph Lumba</h2>
                        <p class="title" id="about-title">Front-End Developer</p>
                        <p>marcjoseph@gmail.com</p>
                        <p><button class="button" id="about-button">Contact</button></p>
                    </div>
                </div>
            </div>

            <div class="column" id="about-column">
                <div class="card" id="about-card">
                    <img src="{{ asset('assets/img/profile.webp') }}" alt="Julie" style="width:100%">
                    <div class="container" id="about-container">
                        <h2>Julie Ann Sapla</h2>
                        <p class="title" id="about-title">Front-End Developer</p>
                        <p>julieann@gmail.com</p>
                        <p><button class="button" id="about-button">Contact</button></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.inc.footer')

    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
</body>
</html>