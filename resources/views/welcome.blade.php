<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Page</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    <style>
        body {
            background-color: #005baa;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: #fff;
            text-align: center;
            padding: 1.5rem;
        }
        .logo {
            width: 180px;
            margin-bottom: 1.5rem;
        }
        header {
            position: absolute;
            top: 1.5rem;
            right: 1.5rem;
        }
        .btn-style {
            display: inline-block;
            padding: 0.5rem 1.25rem;
            background-color: white;
            color: #005baa;
            border: 2px solid #005baa;
            border-radius: 0.375rem;
            font-size: 0.9rem;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        .btn-style:hover {
            background-color: #005baa;
            color: white;
        }
        form button.btn-style {
            cursor: pointer;
            background-color: white;
        }
        form button.btn-style:hover {
            background-color: #005baa;
            color: white;
        }
    </style>
</head>
<body>

    <!-- Login / Register / Dashboard Links -->
    <header>
        @if (Route::has('login'))
            <nav class="flex items-center justify-end gap-3">
                @auth
              <a href="{{ url('/dashboard') }}" class="btn-style">Dashboard</a> 
                @else
           <!--         <a href="{{ route('login') }}" class="btn-style">Log in</a> -->
                    @if (Route::has('register'))
                <!--        <a href="{{ route('register') }}" class="btn-style">Register</a> -->
                    @endif
                @endauth
            </nav>
        @endif
    </header>

    <!-- Centered Content -->
     
    <main class="text-center">
    <img src="{{ asset('images/logo.png') }}" alt="App logo" class="logo mb-4" />

    @if(Auth::check())
        <p class="mb-3">Logged in as: {{ Auth::user()->name }}</p>
    @endif

    <div class="d-flex justify-content-center gap-3">
        @auth
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn-style">
                    {{ __('Log Out') }}
                </button>
            </form>
        @else
            <a href="{{ route('login') }}" class="btn-style">
                {{ __('Log in') }}
            </a>
        @endauth
    </div>
</main>

<div class="m-3 bg-secondary text-white text-center py-3">
  <h1 style="font-size: 25px;">Automatic Rainfall Submission System</h1>
</div>

<footer class="bg-secondary text-white text-center">
    Regional Meteorological Centre Kolkata
</footer> 

</body>
</html>
