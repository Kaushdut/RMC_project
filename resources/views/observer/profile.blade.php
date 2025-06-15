@php
    use Carbon\Carbon;
@endphp

<div class="d-flex flex-column p-3" style="height: 100vh;">
    <h5 class="mb-3"><strong>Welcome</strong> {{ Auth::user()->name }}</h5>

    <ul class="list-group list-group-flush mt-4 shadow">
    <li class="list-group-item"><p class="mb-0"><strong>Designation:</strong> {{ Auth::user()->role }}</p></li>
    <li class="list-group-item"><p class="mb-0"><strong>Email:</strong> {{ Auth::user()->email }}</p></li>
    <li class="list-group-item"><p class="mb-0"><strong>Username:</strong> {{ Auth::user()->username }}</p></li>
    <li class="list-group-item"><p class="mb-0"><strong>Phone Number:</strong> {{ Auth::user()->phone }}</p></li>
    <li class="list-group-item"><p class="mb-0"><strong>Observer_id:</strong> {{ Auth::user()->observer_id }}</p></li>
    <li class="list-group-item"><p class="mb-0"><strong>Station_id:</strong> {{ Auth::user()->station_id }}</p></li>
    <li class="list-group-item">
    @if(Auth::user()->last_login_at)
        <p><strong>Last login:</strong> {{ Carbon::parse(Auth::user()->last_login_at)->format('d M Y, h:i A') }}</p>
    @endif
    </li></ul>
    <form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" class="btn btn-outline-danger w-100 mt-5">
        {{ __('Log Out') }}
    </button>
    </form>

</div>