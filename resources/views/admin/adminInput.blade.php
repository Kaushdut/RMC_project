@extends('layouts.app')
@section('title','Admin Input')
@section('content')
<nav class="navbar bg-body-tertiary shadow">
  <div class="container-fluid">
    <a href="admin" class="btn btn-outline-primary">Admin Dashboard</a>
  </div>
</nav>


<div class="container mt-4 p-4">
    <div class="card shadow p-4 w-100 w-sm-75 w-md-50">
    <h3 class="mb-4 text-center">Enter Employee Information</h3>    
    <form action="adminInput" method="post">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label fw-semibold">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" required>
        </div>

        <div class="mb-3">
            <label for="username" class="form-label fw-semibold">UserName</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Enter UserName" required>
        </div>

        <div class="mb-3">
            <label for="role" class="form-label fw-semibold">Designation</label>
            <input type="text" class="form-control" id="role" name="role" placeholder="Observer or Meteorologist" required>
        </div>

        <div class="mb-3">
            <label for="observer_id" class="form-label fw-semibold">Observer ID</label>
            <input type="number" class="form-control" id="observer_id" name="observer_id" placeholder="For Observer only">
        </div>

        <div class="mb-3">
            <label for="station_id" class="form-label fw-semibold">Station ID</label>
            <input type="number" class="form-control" id="station_id" name="station_id" placeholder="Enter Station ID">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label fw-semibold">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email">
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label fw-semibold">Mobile Number</label>
            <input type="phone" class="form-control" id="phone" name="phone" placeholder="Enter Mobile Number">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label fw-semibold">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Create Password">
        </div>

        <div>
            <button type="reset" class="btn btn-secondary mb-3 mt-3" name="reset">Reset</button>
        </div>

        <div class="d-grid mb-3">
            <button type="submit" class="btn btn-primary mb-3 mt-3" name="submit">Submit</button>
        </div>
    </form>
</div>
</div>

@endsection