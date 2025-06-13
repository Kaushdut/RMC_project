@extends('layouts.app')
@section('title','Admin')
@section('content')
  <nav class="navbar bg-light shadow">
            <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">Dashboard</span>
           <div>
    <div>
        @include('admin.button')
    </div>

            </div>
        </nav>


      <div class="container my-5">
            <div class="p-5 shadow-lg text-center text-md-start">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h1 class="display-5 fw-bold mb-3">Welcome to the Admin Dashboard</h1>
                         <p class="lead mb-4">View data, Manage records, and Stay in control — all in one place</p>
                    </div>
                    <div class="col-md-4 text-center d-none d-md-block">
                        <img src="https://cdn-icons-png.flaticon.com/512/1163/1163661.png" alt="Weather Icon" class="img-fluid" style="max-height: 180px;">
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-sm-6 mb-5 mb-sm-3 mt-2">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">View Weather Records</h5>
                            <p class="card-text">View and download weather records.</p>
                            <a href="#" class="btn btn-primary">View Records</a>
                        </div>
                    </div>
                </div>


                <div class="col-sm-6 mt-2">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Manage User Records</h5>
                            <p class="card-text">View, add, delete and modify User records.</p>
                            <a href="users" class="btn btn-primary">View Records</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
</div>
@endsection
