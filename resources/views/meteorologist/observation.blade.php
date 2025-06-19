
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

<form method="get" action="meteorologistobservation" class="mb-4" >
    <div class="row g-3 justify-content-center align-items-end" style="margin-top:10px;">
      <div class="col-md-4">
      <label for="station_id" class="form-label fw-semibold">Select Station</label>
      <select name="station_id"  class="form-select">
        <option value="" default>All stations</option>
        @foreach($allstations as $station)
       <option value="{{ $station->id }}" {{ request('station_id') == $station->id ? 'selected' : '' }}>
  {{ $station->station_name }}
   </option>
        @endforeach
      </select>

</div>
 <div class="col-md-3">
      <label for="range_type" class="form-label fw-semibold">Date Range</label>
      <select name="range_type" class="form-select">
        <option value="" default>None</option>
        <option value="daily" {{request('range_type')== 'daily' ? 'selected' : '' }}>Daily</option>
         <option value="weekly"  {{request('range_type')== 'weekly' ? 'selected' : '' }}>Weekly</option>
          <option value="monthly"  {{request('range_type')== 'monthly' ? 'selected' : '' }}>Monthly</option>

</select>
</div>
<div class="col-md-3">
      <label for="start_date" class="form-label fw-semibold">Start Date</label>
      <input type="date" name="start_date" value="{{request('start_date')}}" class="form-control"/>
</div>
<div class="col-md-2 d-grid">
      <button type="submit" class="btn btn-primary">Apply</button>
    </div>
  </div>
</form>

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