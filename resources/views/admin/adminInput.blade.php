@extends('layouts.app')
@section('title','Add Employee')
@section('content')
<nav class="navbar bg-body-tertiary shadow">
  <div class="container-fluid">
    <div class="btn-group" role="group">
      <a href="admin" class="btn btn-outline-primary">Admin Dashboard</a>
      <a href="users" class="btn btn-outline-primary">View Employee Records</a>
    </div>
  </div>
</nav>
<div class="container mt-4 p-4">
    <div class="card shadow p-4 w-100 w-sm-75 w-md-50">
    <h3 class="mb-4 text-center">Enter Employee Information</h3>    
    <form action="adminInput" method="post">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label fw-semibold">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter Name" value="{{ old('name') }}" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="container">
            <div class="row">
                <div class="mb-3 col-6">
                    <label for="username" class="form-label fw-semibold">UserName</label>
                    <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" placeholder="Enter UserName" value="{{ old('username') }}" required>
                    @error('username')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3 col-6">
                    <label for="role" class="form-label fw-semibold">Designation</label>
                    <select class="form-select" aria-label="User Role" id="role" name="role">
                    <option value="observer" {{ old('role')=='meteorologist' ? 'selected' : ''}}>Observer</option>
                    <option value="meteorologist" {{ old('role')=='meteorologist' ? 'selected' : ''}}>Meteorologist</option>
                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="mb-3 col-6">
                    <label for="observer_id" class="form-label fw-semibold">Observer ID</label>
                    <input type="number" class="form-control @error('observer_id') is-invalid @enderror" id="observer_id" name="observer_id" placeholder="For Observer only" value="{{ old('observer_id') }}">
                    @error('observer_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3 col-6">
                    <label for="station_id" class="form-label fw-semibold">Station ID</label>
                    <input type="number" class="form-control @error('station_id') is-invalid @enderror" id="station_id" name="station_id" placeholder="Enter Station ID" value="{{ old('station_id') }}">
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
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Enter Email" value="{{ old('email') }}">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3 col-6">
                    <label for="phone" class="form-label fw-semibold">Mobile Number</label>
                    <input type="phone" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="Enter Mobile Number" value="{{ old('phone') }}">
                    @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label fw-semibold">Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Create Password">
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-grid">
            <button type="submit" class="btn btn-primary mb-3 mt-3" name="submit">Submit</button>
        </div>
        <button type="reset" class="btn btn-secondary mb-3 mt-3" name="reset">Reset</button>
    </form>
</div>
</div>

@endsection