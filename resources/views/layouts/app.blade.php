@vite(['resources/scss/app.scss', 'resources/js/app.js'])


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','WeatherApp')</title>
  
</head>
<body>
      <div>
        @include('layouts.header')
    </div>
    <div>
        @yield('content')
    </div>
    <div>
        @include('layouts.footer')
    </div>
</body>
</html>