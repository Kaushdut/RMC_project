@vite(['resources/scss/app.scss', 'resources/js/app.js'])
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<meta name="viewport" content="width=device-width, initial-scale=1">

<style>
    body {
        background-color: #005baa;
    }

    .btn-custom-blue {
        background-color: #005baa;
        color: white;
    }

    .btn-custom-blue:hover {
        background-color: #004b90;
    }

    .input-group-text {
        background-color: #f0f0f0;
    }

    .form-control:focus {
        box-shadow: none;
        border-color: #005baa;
    }
</style>

<div class="container d-flex align-items-center justify-content-center vh-100">
    <div class="card bg-white shadow p-4" style="width: 100%; max-width: 400px;">
        <div class="text-center mb-4">
            <h3 class="fw-bold">Login</h3>
            <img src="{{ asset('images/logo.png') }}" alt="App logo" width="100" class="my-3" />
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-3 text-danger text-center" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email / Username -->
            <div class="mb-3">
                <label for="email" class="form-label text-dark">Email</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus autocomplete="Email" class="form-control" placeholder="Enter your Email">
                </div>
                <x-input-error :messages="$errors->get('email')" class="text-danger mt-1"/>
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label for="password" class="form-label text-dark">Password (Phone number for observer)</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                    <input type="password" name="password" id="password" required autocomplete="current-password" class="form-control" placeholder="Enter your password">
                    <span class="input-group-text" onclick="togglePassword()" style="cursor: pointer;">
                        <i class="bi bi-eye-fill" id="toggleIcon"></i>
                    </span>
                </div>
                <x-input-error :messages="$errors->get('password')" class="text-danger mt-1"/>
            </div>

            <!-- Remember Me -->
            <div class="form-check mb-3">
                <input type="checkbox" name="remember" id="remember_me" class="form-check-input">
                <label class="form-check-label text-dark" for="remember_me">
                    {{ __('Remember me') }}
                </label>
            </div>

            <!-- Buttons -->
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-2">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-sm text-decoration-underline text-secondary">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <button type="submit" class="btn btn-custom-blue px-4 w-100 w-md-auto">
                    {{ __('Login') }}
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function togglePassword() {
        const password = document.getElementById('password');
        const icon = document.getElementById('toggleIcon');
        if (password.type === 'password') {
            password.type = 'text';
            icon.classList.replace('bi-eye-fill', 'bi-eye-slash-fill');
        } else {
            password.type = 'password';
            icon.classList.replace('bi-eye-slash-fill', 'bi-eye-fill');
        }
    }
</script>
