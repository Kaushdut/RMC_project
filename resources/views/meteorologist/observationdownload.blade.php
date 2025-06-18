
@extends('layouts.app')
@section('title','observationsdownload')
@section('content')
<nav class="navbar bg-light shadow">
  <div class="container-fluid">
    <a href="meteorologist" class="btn btn-outline-primary">Meteorologist Dashboard</a>
    <form class="d-flex" role="search">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"/>
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
   
  </div>
</nav>
  <h3 style="text-align:center;" class="mt-4">Observation Data</h3>
<form action="meteorologistfilter1" method="POST" class="mt-1">
     @csrf
  <div class="container">
    <div class="row g-3 justify-content-center align-items-end">
      
      <div class="col-12 col-sm-6 col-md-4">
        <label for="filter_date" class="form-label fw-semibold">Filter by Date</label>
        <input type="date" id="filter_date" name="filter_date" class="form-control" value="{{ request('filter_date') }}" required>
      </div>

      <div class="col-6 col-sm-3 col-md-2 d-grid">
        <button type="submit" class="btn btn-primary">Filter</button>
      </div>

      <div class="col-6 col-sm-3 col-md-2 d-grid">
        <a href="meteorologistobservationdownload" class="btn btn-secondary">Reset</a>
      </div>
      
    </div>
  </div>
</form>


<div class="container table-responsive mt-5 mb-5">
  
    <table class="table table-striped table-hover table-bordered border-black shadow text-center">
    <thead>
        <tr>
            <td style="background-color:#00538C;color:white;">STATION ID</td>
            <td style="background-color:#00538C;color:white;">DATE</td>
            <td style="background-color:#00538C;color:white;">DATE OF OBSERVATION</td>
            <td style="background-color:#00538C;color:white;">STATION NAME</td>
            <td style="background-color:#00538C;color:white;">LATITUDE</td>
            <td style="background-color:#00538C;color:white;">LONGITUDE</td>
            <td style="background-color:#00538C;color:white;">RAINFALL</td>
            
        </tr>
    </thead>
   <tbody class="table-group-divider">
@foreach($obsdata as $station)
    @if($station->observations->isEmpty())
        <tr>
            <td>{{ $station->id }}</td>
            <td>N/A</td>
            <td>N/A</td>
            <td>{{ $station->station_name }}</td>
            <td>{{ $station->latitude }}</td>
            <td>{{ $station->longitude }}</td>
            <td>N/A</td>
        </tr>
    @else
        @foreach($station->observations as $obdata)
            <tr>
                <td>{{ $station->id }}</td>
                <td>{{ $obdata->date ?? 'N/A' }}</td>
                <td>{{ $obdata->observation_date ?? 'N/A' }}</td>
                <td>{{ $station->station_name }}</td>
                <td>{{ $station->latitude }}</td>
                <td>{{ $station->longitude }}</td>
                <td>{{ $obdata->rainfall ?? 'N/A' }}</td>
            </tr>
        @endforeach
    @endif
@endforeach
</tbody>



    </table>
    </div>
    @endsection