
@extends('layouts.app')
@section('title','observations')
@section('content')
<nav class="navbar bg-light shadow">
  <div class="container-fluid">
  @if (Auth::user()->role === 'meteorologist')
    <div class="btn-group" role="group">
      <a href="meteorologist" class="btn btn-outline-primary">Home</a>
      <a href="meteorologistfilter1" class="btn btn-outline-success">Upload Records</a>
    </div>
    <!--<div class="d-flex justify-content-end" style="margin-right:15px;">
    <a href="{{ route('meteo.generateReport', ['start_date' => request('start_date') ,'station_id' => request('station_id'),'range_type' =>request('range_type')]) }}" class="btn btn-outline-success">
    Download CSV
    </a>-->
  @elseif (Auth::user()->role === 'admin')
      <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-primary">Home</a>
  @endif
  </div>
</nav>

<div class="container mt-5 mb-5">
<div class="container p-4 border rounded-4 mb-5">
<form method="get" action="meteorologistobservation">
    <div class="row g-3 justify-content-center align-items-end">
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
      <button type="submit" class="btn btn-primary rounded-pill">Apply</button>
    </div>
  </div>
</form>
</div>

<!--Table-->
  <div class="p-4 border border-secondary-subtle rounded-4 shadow" style="width:100%;">
  <div class="d-flex justify-content-between mb-4 mt-2">  
    <h3 class="fw-medium fs-3 text-secondary-emphasis">Final Report</h3>
    <a href="{{ route('meteo.generateReport', ['start_date' => request('start_date') ,'station_id' => request('station_id'),'range_type' =>request('range_type')]) }}" class="btn btn-secondary rounded-pill align-self-center">
    Download CSV</a>
  </div>

    <div class="table-responsive">
    <table class="table table-striped table-bordered shadow table-hover text-center">
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
     <tbody>
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
</div>
</div>
    @endsection