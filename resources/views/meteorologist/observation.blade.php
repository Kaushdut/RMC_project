
@extends('layouts.app')
@section('title','observations')
@section('content')
<nav class="navbar bg-light shadow">
  <div class="container-fluid">
    <div class="btn-group" role="group">
      <a href="meteorologist" class="btn btn-outline-primary">Meteorologist dashboard</a>
      <a href="meteorologistfilter1" class="btn btn-outline-success">Download Records</a>
    </div>
    <div>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"/>
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

<div class="container table-responsive mt-5 mb-5">
    <h3 style="text-align:center;margin-bottom:2.5rem;">Observation Data</h3>
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
    @foreach($datas as $obdata)
          <tr>
            <td>{{$obdata->station_id}}</td>
            <td>{{$obdata->date}}</td>
            <td>{{$obdata->observation_date}}</td>
            <td>{{$obdata->station->station_name ?? 'N/A'}}</td>
            <td>{{$obdata->station->latitude ?? 'N/A'}}</td>
            <td>{{$obdata->station->longitude ?? 'N/A'}}</td>
            <td>{{$obdata->rainfall}}</td>
            
          </tr>
    @endforeach
    </tbody>

    </table>
    </div>
    @endsection