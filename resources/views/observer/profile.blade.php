@php
    use Carbon\Carbon;
@endphp

<div class="d-flex flex-column p-3 bg-light" style="width: 100%; max-width: 250px; height: 100vh;">
    <h5 class="mb-3">Welcome, {{ Auth::user()->name }}</h5>
    <p class="mb-0">Designation: {{ Auth::user()->role }}</p>
    <p class="mb-0">Designation: {{ Auth::user()->email }}</p>
    <p class="mb-0">Designation: {{ Auth::user()->username }}</p>
    <p class="mb-0">Phone Number: {{ Auth::user()->phone }}</p>
     <p class="mb-0">Observer_id: {{ Auth::user()->observer_id }}</p>
        <p class="mb-0">Station_id: {{ Auth::user()->station_id }}</p>
    @if(Auth::user()->last_login_at)
        <p>Last login: {{ Carbon::parse(Auth::user()->last_login_at)->format('d M Y, h:i A') }}</p>
    @endif
       <form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" class="btn btn-outline-danger w-100">
        {{ __('Log Out') }}
    </button>
</form>

</div>
