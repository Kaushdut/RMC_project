@extends('layouts.app')
@section('title','Add Station')
@section('content')
<nav class="navbar bg-body-tertiary shadow">
  <div class="container-fluid">
    <div class="btn-group" role="group">
      <a href="admin" class="btn btn-outline-primary">Admin Dashboard</a>
      <a href="stationView" class="btn btn-outline-primary">View Station Record</a>
    </div>
  </div>
</nav>
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="container mt-4 p-4">
    <div class="card shadow p-4 w-100 w-sm-75 w-md-50">
        <h3 class="mb-4 text-center">Enter Station Details</h3>    
        <form action="addStation" method="post">
            @csrf
            <div class="mb-3">
                <label for="id" class="form-label fw-semibold">Station ID</label>
                <input type="number" class="form-control @error('id') is-invalid @enderror" id="id" name="id" placeholder="Enter Station ID" required>
                @error('id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="staton_name" class="form-label fw-semibold">Station Name</label>
                <input type="text" class="form-control @error('station_name') is-invalid @enderror" id="station_name" name="station_name" placeholder="Enter Station Name" required>
                @error('station_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="district" class="form-label fw-semibold">Station District</label>
                <input type="text" class="form-control @error('district') is-invalid @enderror" id="district" name="district" placeholder="Enter District Name" required>
                @error('district')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
    
            <div class="container">
                <div class="row">
                    <div class="mb-3 col-6">
                        <label for="latitude" class="form-label fw-semibold">Latitude</label>
                        <input type="text" class="form-control @error('latitude') is-invalid @enderror" id="latitude" name="latitude" placeholder="Enter Station Latitude" required>               
                        @error('latitude')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3 col-6">
                        <label for="longitude" class="form-label fw-semibold">Longitude</label>
                        <input type="text" class="form-control @error('longitude') is-invalid @enderror" id="longitude" name="longitude" placeholder="Enter Station Latitude" required>               
                        @error('longitude')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary mb-3 mt-3" name="submit">Submit</button>
            </div>
            <button type="reset" class="btn btn-secondary mb-3 mt-3" name="reset">Reset</button>
        </form>
    </div>
</div>
@endsection