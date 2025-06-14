@extends('layouts.app')
@section('title','Observer')
@section('content')
    <nav class="navbar bg-light shadow">
        <div class="container-fluid">
        <span class="navbar-brand mb-0 h1">Dashboard</span>
        <div>
            <div>
                @include('observer.button')
            </div>
        </div>
    </nav>
    
    <div class="container p-4">
        <h3 class="mb-4 text-center">Enter Weather Records</h3>
        <form action="observersubmit" method="post">
            @csrf
            <div class="mb-3">
                <label for="observation_date" class="form-label fw-semibold">Date of Observation:</label><br> 
                <input type="date" class="form-control" name="observation_date" id="observation_date" value="{{ date('Y-m-d') }}"><br>    
            </div>
            <div class="mb-3">
                <label for="max_temperature" class="form-label fw-semibold">Maximum Temperature (°C):</label><br>
                <input type="decimal" class="form-control" name="max_temperature" id="max_temperature" placeholder="Maximum Temperature" min=0 max=80><br>
            </div>
            <div class="mb-3">
                <label for="min_temperature" class="form-label fw-semibold">Minimum Temperature (°C):</label><br>
                <input type="decimal" class="form-control" name="min_temperature" id="min_temperature" placeholder="Minimum Temperature" min=-50 max=80><br>
            </div>
            <div class="mb-3">
                <label for="rainfall" class="form-label fw-semibold">Rainfall (mm):</label><br>
                <input type="text" class="form-control" name="rainfall" id="rainfall" placeholder="Rainfall"><br>
            </div>

            <div class="d-grid mb-3">
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </div>
        </form>
    </div>

@endsection