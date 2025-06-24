@extends('layouts.app')
@section('title','Multi User Dashboard')

@section('content')
<nav class="navbar bg-light shadow">
        <div class="container-fluid">
        <span class="navbar-brand mb-0 h1">Dashboard</span>
        <div>
            <div>
                @include('multistationuser.button')
            </div>
        </div>
    </nav>

<div class="container mt-5 mb-5">
  @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
  @endif
  <div class="container mb-3 d-flex justify-content-between">
    <!--Filter-->
    <div class="flex-grow-1">
      <form action="multistationuser" method="get">
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
</div>
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
            <td style="background-color:#00538C;color:white;">STATION ID</td>
            <td style="background-color:#00538C;color:white;">STATION NAME</td>
            <td style="background-color:#00538C;color:white;">LATITUDE</td>
            <td style="background-color:#00538C;color:white;">LONGITUDE</td>
            <td style="background-color:#00538C;color:white;">RAINFALL (mm)</td>       
          </tr>
        </thead>
        <tbody>
         @foreach($stations as $station)
          @php
            $observation = $observations[$station->id] ?? null;
          @endphp
          <tr>
            <td>{{$date}}</td>
            <td>{{$station->id}}</td>
            <td>{{$station->station_name}}</td>
            <td>{{$station->latitude}}</td>
            <td>{{$station->longitude}}</td> 
            <td>
              <form action="{{$observation ? route('multistationuser.updateRainfall',$observation->id) : route('multistationuser.addRainfall')}}" method="post">
                @csrf
                @if($observation)
                <input type="hidden" name="_method" value="patch">
                @endif

                <input type="hidden" name="station_id" value="{{$station->id}}">
                <input type="hidden" name="observation_date" value="{{$date}}">

                <div class="d-flex flex-wrap gap-3 p-4v">
                  <div>
                    <input type="number" step="any" 
                      class="form-control {{ old('station_id') == $station->id && $errors->has('rainfall') ? 'is-invalid' : '' }}" 
                      name="rainfall" id="rainfall" placeholder="Rainfall" 
                      value="{{ old('station_id') == $station->id ? old('rainfall') : ($observation->rainfall ?? '') }}"  
                      required>
                    @if(old('station_id') == $station->id)
                      @error('rainfall')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    @endif
                  </div>
                  <div>
                    <button type="submit" class="btn btn-outline-success">Save</button>
                  </div>
                </div>
              </form>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection