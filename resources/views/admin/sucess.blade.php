@extends('layouts.app')
@section('title','Sucess Message')
@section('content')

<nav class="navbar bg-body-tertiary shadow">
  <div class="container-fluid">
    <a href="admin" class="btn btn-outline-primary">Admin Dashboard</a>
  </div>
</nav>

<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="card text-center text-bg-success mb-3 p-3" style="width: 30rem;height:15rem;">
        <div class="card-body">
            <h5 class="card-title mt-2">Successful</h5>
            <p class="card-text mt-2">User has been added sucessfully.</p>
            <a href="adminInput" class="btn btn-light mt-4">Back To Insertion Page</a>
        </div>
    </div>
</div>

@endsection