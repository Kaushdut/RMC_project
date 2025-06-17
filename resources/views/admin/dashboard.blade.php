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
    </div>
</nav>

<!--Admin Welcome Card-->
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
    <div class="row row-cols-1 row-cols-md-2 g-4 mt-4">
        <!--Card 1-->
        <div class="col-sm-6 mt-2 mb-4">
            <div class="card shadow text-center">
                <div class="card-body">
                    <h5 class="card-title">View Weather Records</h5>
                    <p class="card-text">View and download weather records.</p>
                    <a href="#" class="btn btn-primary">View Records</a>
                </div>
            </div>
        </div>
        <!--Card 2-->
        <div class="col-sm-6 mt-2 mb-4">
            <div class="card shadow text-center">
                <div class="card-body">
                    <h5 class="card-title">Manage User Records</h5>
                    <p class="card-text">View, delete and modify User records.</p>
                    <a href="users" class="btn btn-primary">View Records</a>
                </div>
            </div>
        </div>
        <!--Card 3-->
        <div class="col-sm-6 mt-2 mb-4">
            <div class="card shadow text-center">
                <div class="card-body">
                    <h5 class="card-title">Add Users</h5>
                    <p class="card-text">Add New Users to the Database</p>
                    <a href="adminInput" class="btn btn-primary">Add Records</a>
                </div>
            </div>
        </div>
        <!--Card 4-->
        <div class="col-sm-6 mt-2 mb-4">
            <div class="card shadow text-center">
                <div class="card-body">
                    <h5 class="card-title">Weather Stations</h5>
                    <p class="card-text">View rainfall stations.</p>
                    <a href="#" class="btn btn-primary">View Records</a>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
