@extends('layouts.app')
@section('title','Multi User Dashboard')

@section('content')


<div class="container mt-5 mb-5">
  
    <!--Table-->
  <div class="p-4 border border-secondary-subtle rounded-4 shadow" style="width:100%;">
    <div class="d-flex justify-content-between mb-4 mt-2">  
      <h3 class="fw-medium fs-3 text-secondary-emphasis">Rainfall Data</h3>
      <a href="#" class="btn btn-secondary rounded-pill align-self-center">
      Download CSV</a>
    </div>  
    <div class="table-responsive">
      <table class="table table-striped table-bordered shadow table-hover text-center">
        <thead>
          <tr>
            <td style="background-color:#00538C;color:white;">DATE</td>
            <td style="background-color:#00538C;color:white;">STATION NAME</td>
            <td style="background-color:#00538C;color:white;">LATITUDE</td>
            <td style="background-color:#00538C;color:white;">LONGITUDE</td>
            <td style="background-color:#00538C;color:white;">RAINFALL</td>       
          </tr>
        </thead>
        <tbody>
        @foreach($observations as $observation)
          <tr>
            <td>{{$date}}</td>
            <td>{{$observation->station_name}}</td>
            <td>{{$observation->latitude}}</td>
            <td>{{$observation->longitude}}</td> 
            <td>{{$observation->rainfall}}</td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection