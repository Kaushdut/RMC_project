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
                <label for="date" class="form-label fw-semibold">Date:</label><br> 
                <input type="date" class="form-control" name="date" id="date" value="{{ date('Y-m-d') }}"><br>    
            </div>
            <div class="mb-3">
                <label for="maxtemp" class="form-label fw-semibold">Maximum Temperature (°C):</label><br>
                <input type="number" class="form-control" name="maxtemp" id="maxtemp" placeholder="Maximum Temperature" min=0 max=80 required><br>
            </div>
            <div class="mb-3">
                <label for="mintemp" class="form-label fw-semibold">Minimum Temperature (°C):</label><br>
                <input type="number" class="form-control" name="mintemp" id="mintemp" placeholder="Minimum Temperature" min=-50 max=80 required><br>
            </div>
            <div class="mb-3">
                <label for="rain" class="form-label fw-semibold">Rainfall (mm):</label><br>
                <input type="text" class="form-control" name="rain" id="rain" placeholder="Rainfall" required><br>
            </div>

            <div class="d-grid mb-3">
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </div>
        </form>
    </div>

@endsection
