@extends('layouts.app')
@section('title','Meteorologist')
@section('content')
  <nav class="navbar bg-light shadow">
            <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">Dashboard</span>
           <div>
    <div>
        @include('meteorologist.button')
    </div>

            </div>
        </nav>


      <div class="container my-5">
            <div class="p-5 shadow-lg text-center text-md-start">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h1 class="display-5 fw-bold mb-3">Welcome to the Meteorologist Dashboard</h1>
                         <p class="lead mb-4"> Analyze rainfall data, generate reports, and monitor trends— all in one place</p>
                    </div>
                    <div class="col-md-4 text-center d-none d-md-block">
                        <img src= "{{ asset('images/cloud.png') }}"  alt="Weather Icon" class="img-fluid" style="max-height: 180px;">
                    </div>
                </div>
            </div>
        </div>

    <div class="container">
        <div class="row row-cols-1 row-cols-md-2 g-4 mt-4">
        <!--Card 1-->
        <div class="col-sm-6 mt-2 mb-4">
            <div class="card shadow text-center">
                <div class="card-body">
                    <h5 class="card-title">View Weather Observations</h5>
                    <p class="card-text">View and download weather records.</p>
                    <a href="meteorologistobservation" class="btn btn-primary">View Records</a>
                </div>
            </div>
        </div>


        <!--Card 2-->
        <div class="col-sm-6 mt-2 mb-4">
            <div class="card shadow text-center">
                <div class="card-body">
                    <h5 class="card-title">Generate weather reports</h5>
                    <p class="card-text">Filter and download data as CSV or Excel</p>
                    <a href="meteorologistfilter1" class="btn btn-primary">Download Records</a>
                </div>
            </div>
        </div>

        <!--Card 3-->
        <div class="col-sm-6 mt-2 mb-4">
            <div class="card shadow text-center">
                <div class="card-body">
                    <h5 class="card-title">Weather Stations</h5>
                    <p class="card-text">View and Add rainfall stations.</p>
                    <a href="stationView" class="btn btn-primary">Stations</a>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection







       