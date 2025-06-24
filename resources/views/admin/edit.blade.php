@extends('layouts.app')
@section('title','Admin Edit User')
@section('content')
<nav class="navbar bg-body-tertiary shadow">
  <div class="container-fluid">
    <a href="/users" class="btn btn-danger">Cancel</a>
  </div>
</nav>
<div class="container mt-4 p-4">
    <div class="card shadow p-4 w-100 w-sm-75 w-md-50">
    <h3 class="mb-4 text-center">EDIT Employee Information</h3>    
    <form action="{{ route('admin.editUser.edit', $users->id) }}" method="post">
        @csrf

        <input type="hidden" name="_method" value="put">

        <div class="mb-3">
            <label for="name" class="form-label fw-semibold">Name</label>
            <input type="text" class="form-control" value="{{$users->name}}" id="name" name="name" placeholder="Enter Name" readonly>
        </div>

        <div class="container">
            <div class="row">
                <div class="mb-3 col-6">
                    <label for="username" class="form-label fw-semibold">UserName</label>
                    <input type="text" class="form-control @error('username') is-invalid @enderror" value="{{$users->username}}" id="username" name="username" placeholder="Enter UserName" required>
                    @error('username')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3 col-6">
                    <label for="role" class="form-label fw-semibold">Designation</label>
                    <input type="text" class="form-control" value="{{$users->role}}" id="role" name="role" placeholder="Observer or Meteorologist" readonly>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="mb-3 col-6">
                    <label for="observer_id" class="form-label fw-semibold">Observer ID</label>
                    <input type="number" class="form-control @error('observer_id') is-invalid @enderror" value="{{$users->observer_id}}" id="observer_id" name="observer_id" placeholder="For Observer only">
                    @error('observer_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 col-6">
                    <label for="station_id" class="form-label fw-semibold">Station ID</label>
                    <input type="number" class="form-control @error('station_id') is-invalid @enderror" value="{{$users->station_id}}" id="station_id" name="station_id" placeholder="Enter Station ID">
                    @error('station_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="mb-3 col-6">
                    <label for="email" class="form-label fw-semibold">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{$users->email}}" id="email" name="email" placeholder="Enter Email">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3 col-6">
                    <label for="phone" class="form-label fw-semibold">Mobile Number</label>
                    <input type="phone" class="form-control @error('phone') is-invalid @enderror" value="{{$users->phone}}" id="phone" name="phone" placeholder="Enter Mobile Number">
                    @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label fw-semibold">Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" value="{{$users->password}}" id="password" name="password" placeholder="Create Password">
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-grid mb-3">
            <button type="submit" class="btn btn-primary mb-3 mt-3" name="submit">Update</button>
        </div>
    </form>
</div>
</div>

@endsection