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
        <h3 class="mb-4 text-center">Rainfall Observation</h3>
        <form action="observersubmit" method="post">
            @csrf
            <div class="mb-3">
                <label for="observation_date" class="form-label fw-semibold">Date of Observation:</label>
                <input type="date" class="form-control" name="observation_date" id="observation_date" value="{{ date('Y-m-d') }}" max="{{ date('Y-m-d') }}">   
            </div>

            <div class="container">
                <div class="row">
                    <div class="mb-3 col-6">
                        <label for="observer_id" class="form-label fw-semibold">Observer Id:</label>
                        <input type="number" class="form-control" name="observer_id" id="observer_id" value="{{Auth::user()->observer_id }}" readonly>   
                    </div>
                    <div class="mb-3  col-6">
                        <label for="station_id" class="form-label fw-semibold">Station Id:</label>
                        <input type="number" class="form-control" name="station_id" id="station_id" value="{{ Auth::user()->station_id }}" readonly>   
                    </div>
                </div>
            </div>
          
            <div class="mb-3">
                <label for="rainfall" class="form-label fw-semibold">Rainfall (mm):</label>
                <input type="number" step="any" class="form-control @error('rainfall') is-invalid @enderror" name="rainfall" id="rainfall" placeholder="Rainfall" required>
                @error('rainfall')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-grid mb-3">
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </div>
        </form>
    </div>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif


@endsection

@section('scripts')
<script>
    window.onload = function () {
        if (performance.navigation.type === 2) {
            document.querySelector("form").reset();
        }
    }
</script>
@endsection