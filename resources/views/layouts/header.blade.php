<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>WeatherApp</title>
  @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
  <header>
    <nav class="navbar navbar-expand-sm" style="background-color:#004e99;">
      <div class="container-fluid">
        <a class="navbar-brand fs-4 fs-sm-5 fs-md-4 text-wrap text-white fw-bold gap-2 d-flex" href="#">
          <img
            src="{{ asset('images/logo.png') }}"
            alt="Logo"
            width="30"
            height="50"
            class="d-inline-block"
          />
          Regional Meteorological Centre Kolkata
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
  <li class="nav-item">
    <a class="nav-link active text-white" aria-current="page" href="#">Home</a>
  </li>
  <li class="nav-item">
   <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                   class="nav-link active text-white" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
</li>
  <li class="nav-item date-time">
    <a class="nav-link active text-white" href="#">
      {{ \Carbon\Carbon::now()->format('d M Y') }}
    </a>
  </li>
</ul>
        </div>
      </div>
    </nav>
  </header>
</body>
</html>
<style>
  .navbar-nav .nav-item.date-time {
    margin-left: 15px; /* Adjust as needed */
  }
</style>