@extends('layouts.app')
@section('title','Admin Input')
@section('content')
<div class="container mt-4">
    <div class="m-4">
    <h3>Data</h3>
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

        <!--<div class="mb-3">
            <label for="station_id" class="form-label fw-semibold">Station ID</label>
            <input type="number" class="form-control" id="station_id" name="station_id" placeholder="Enter Station ID">
        </div>-->

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
        <button type="submit" class="btn btn-primary mb-3">Submit</button>
    </div>
    </form>
</div>


@endsection