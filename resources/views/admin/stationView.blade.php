@extends('layouts.app')
@section('title','Station Table')
@section('content')

<!--Nav Bar-->
<nav class="navbar bg-light shadow">
    <div class="container-fluid">
    @if (Auth::user()->role === 'admin')
    <div class="btn-group" role="group">
        <a href="admin" class="btn btn-outline-primary">Home</a>  
        <a href="users" class="btn btn-outline-primary">View Users</a>
        <a href="addStation" class="btn btn-success">Add Station</a>    
    </div>
    @elseif (Auth::user()->role === 'meteorologist')
      <a href="{{ route('meteo.dashboard') }}" class="btn btn-outline-primary">Home</a>
    @endif
    </div>
</nav>

<div class="container table-responsive mt-5 mb-5">
    <div class="p-1 mb-2">
        <form class="d-flex" role="search" action="stationView" method="get">
            <input class="form-control me-2 rounded-pill" type="search" placeholder="ID or Name or District" aria-label="Search" name="search" value="{{ @$search}}"/>
            <button class="btn btn-outline-success me-2 rounded-pill" type="submit">Search</button>
            <a href="stationView" class="btn btn-outline-secondary rounded-pill">Clear</a>
        </form>
    </div>

    <div class="mt-5 p-4 border border-secondary-subtle rounded-4 shadow" style="width:100%;">
    <h3 class="fw-medium mb-4 mt-2 fs-2 text-secondary-emphasis">Station Record</h3>
    <div class="table-responsive">
    <table class="table table-striped table-bordered shadow table-hover text-center">
    <thead>
        <tr>
            <td style="background-color:#00538C;color:white;">ID</td>
            <td style="background-color:#00538C;color:white;">STATION</td>
            <td style="background-color:#00538C;color:white;">DISTRICT</td>
            <td style="background-color:#00538C;color:white;">LATITUDE</td>
            <td style="background-color:#00538C;color:white;">LONGITUDE</td>
        </tr>
    </thead>

    <tbody>
        @foreach($stations as $station)
        <tr>
            <td>{{$station->id}}</td>
            <td>{{$station->station_name}}</td>
            <td>{{$station->district}}</td>
            <td>{{$station->latitude}}</td>
            <td>{{$station->longitude}}</td> 
        </tr> 
        @endforeach
    </tbody>
</table>
</div>
</div>
</div>
@endsection