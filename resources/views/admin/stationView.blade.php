@extends('layouts.app')
@section('title','Station Table')
@section('content')

<!--Search Bar-->
<nav class="navbar bg-light shadow">
  <div class="container-fluid">
    <div class="btn-group" role="group">
      <a href="admin" class="btn btn-outline-primary">Admin Dashboard</a>
      <a href="users" class="btn btn-outline-primary">View Users</a>
      <a href="addStation" class="btn btn-success">Add Station</a>    
    </div>
    <div>
        <form class="d-flex" role="search" action="stationView" method="get">
            <input class="form-control me-2" type="search" placeholder="ID or Name or District" aria-label="Search" name="search" value="{{ @$search}}"/>
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
    </div>
  </div>
</nav>

<div class="container table-responsive mt-5 mb-5">
    <h3 style="text-align:center;margin-bottom:2.5rem;">Station Record</h3>
    <table class="table table-striped table-hover table-bordered border-black shadow text-center">
    <thead>
        <tr>
            <td style="background-color:#00538C;color:white;">ID</td>
            <td style="background-color:#00538C;color:white;">STATION</td>
            <td style="background-color:#00538C;color:white;">DISTRICT</td>
            <td style="background-color:#00538C;color:white;">LATITUDE</td>
            <td style="background-color:#00538C;color:white;">LONGITUDE</td>
        </tr>
    </thead>

    <tbody class="table-group-divider">
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
@endsection