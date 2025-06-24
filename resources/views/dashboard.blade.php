@extends('layouts.app')
   @section('title','Dashboard')
@section('content')


<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4>Welcome, {{ Auth::user()->name }}</h4>
                </div>

                <div class="card-body">
                    <p>You are logged in as <strong>{{ Auth::user()->role }}</strong>.</p>

                    <div class="mt-3">
                        @if (Auth::user()->role === 'admin')
                            <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-primary">Go to Admin Dashboard</a>
                        @elseif (Auth::user()->role === 'meteorologist')
                            <a href="{{ route('meteo.dashboard') }}" class="btn btn-outline-success">Go to Meteorologist Dashboard</a>
                        @elseif (Auth::user()->role === 'observer')
                            <a href="{{ route('observer.dashboard') }}" class="btn btn-outline-warning">Go to Your Dashboard</a>
                       
                        @elseif(Auth::user()->role === 'multistationuser')
                            <a href="{{route('multistationuser.dashboard')}}" class="btn btn-outline-warning">Go to Your Dashboard</a>
                            @else
                            <p class="text-danger">Unauthorized role.</p>
                        @endif
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection