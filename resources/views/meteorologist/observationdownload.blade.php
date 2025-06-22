
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

@extends('layouts.app')
@section('title','observationsdownload')
@section('content')
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show mt-3 mx-3" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<nav class="navbar bg-light shadow">
  <div class="container-fluid">
    <div class="btn-group" role="group">
      <a href="meteorologist" class="btn btn-outline-primary">Home</a>
      <a href="meteorologistobservation" class="btn btn-outline-success">View Weather Records</a>
    </div>
    <!--
    <div>
      <form action="uploadfile" method="POST" enctype="multipart/form-data" class="row g-2 align-items-center">
      @csrf
        <div class="col-12 col-md-8">
          <input type="file" name="csv_file" class="form-control" accept=".csv" required>
        </div>
        <div class="col-12 col-md-4 d-grid">
          <button type="submit" class="btn btn-success">Upload File</button>
        </div>
      </form>
    </div>-->
  </div>
</nav>
  
<div class="container mt-5 mb-5">
  <div class="container mb-3 d-flex justify-content-between">
    <!--Filter-->
    <div class="flex-grow-1">
      <form action="meteorologistfilter1" method="get">
      @csrf
        <div class="d-flex flex-wrap gap-3 p-4">
          <div class="d-flex flex-column">
            <label for="filter_date" class="form-label fw-semibold">Filter By Date</label>
            <input type="date" id="filter_date" name="filter_date" class="form-control rounded-pill" value="{{ $date }}" required>
          </div>
          <div class="align-self-end">
            <button type="submit" class="btn btn-primary rounded-pill">Apply</button>
          </div>
        </div>
      </form>
    </div>
    <!--Upload-->
    <div class="align-self-center">
      <form action="uploadfile" method="POST" enctype="multipart/form-data" class="row g-2 align-items-center">
      @csrf
        <div class="col-12 col-md-8">
          <input type="file" name="csv_file" class="form-control" accept=".csv" required>
        </div>
        <div class="col-12 col-md-4">
          <button type="submit" class="btn btn-success rounded-pill">Upload File</button>
        </div>
      </form>
    </div>
  </div>

    <!--Table-->
  <div class="p-4 border border-secondary-subtle rounded-4 shadow" style="width:100%;">
    <div class="d-flex justify-content-between mb-4 mt-2">  
      <h3 class="fw-medium fs-3 text-secondary-emphasis">Rainfall Data</h3>
      <a href="{{ route('meteo.generatefile', ['filter_date' => $date]) }}" class="btn btn-secondary rounded-pill align-self-center">
      Download CSV</a>
    </div>  
    <div class="table-responsive">
      <table class="table table-striped table-bordered shadow table-hover text-center">
        <thead>
          <tr>
            <td style="background-color:#00538C;color:white;">STATION ID</td>
            <td style="background-color:#00538C;color:white;">DATE</td>

            <td style="background-color:#00538C;color:white;">STATION NAME</td>
            <td style="background-color:#00538C;color:white;">LATITUDE</td>
            <td style="background-color:#00538C;color:white;">LONGITUDE</td>
            <td style="background-color:#00538C;color:white;">RAINFALL</td>
            
          </tr>
        </thead>
        <tbody>
        @foreach($stations as $station)
          <tr>
            <td>{{$station->id}}</td>
            <td>{{$date}}</td>
            <td>{{$station->station_name}}</td>
            <td>{{$station->latitude}}</td>
            <td>{{$station->longitude}}</td> 
            <td>{{$observations[$station->id]->rainfall ?? 'Not Reported'}}</td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection