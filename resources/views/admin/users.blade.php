@extends('layouts.app')
@section('title','User')
@section('content')
@php use Illuminate\Support\Str; @endphp

<!--Nav Bar-->
<nav class="navbar bg-light shadow">
  <div class="container-fluid">
    <div class="btn-group" role="group">
      <a href="admin" class="btn btn-outline-primary">Home</a>
      <a href="stationView" class="btn btn-outline-primary">View Stations</a>
      <a href="adminInput" class="btn btn-outline-success">Add User</a>
    </div>
  </div>
</nav>

<!--User Table-->
<div class="container mt-5 mb-5">
  @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
  @endif
  <div  class="p-1 mb-2">
      <form class="d-flex" role="search" action="users" method="get">
      <input class="form-control me-2 rounded-pill" type="search" name="search" placeholder="Search by...  Name or Role or Email" aria-label="Search" value="{{ @$search }}"/>
        <button class="btn btn-outline-success me-2 rounded-pill" type="submit">Search</button>
        <a href="users" class="btn btn-outline-secondary rounded-pill">Clear</a>
      </form>
    </div>

    <div class="mt-5 p-4 border border-secondary-subtle rounded-4 shadow" style="width:100%;">
    <h3 class="fw-medium mb-4 mt-2 fs-2 text-secondary-emphasis">User Records</h3>
    <div class="table-responsive">
    <table class="table table-striped table-bordered shadow table-hover text-center">
    <thead>
        <tr>
            <td style="background-color:#00538C;color:white;">ID</td>
            <td style="background-color:#00538C;color:white;">NAME</td>
            <td style="background-color:#00538C;color:white;">ROLE</td>
            <td style="background-color:#00538C;color:white;">OBSERVER ID</td>
            <td style="background-color:#00538C;color:white;">STATION ID</td>
            <td style="background-color:#00538C;color:white;">MOBILE</td>
            <td style="background-color:#00538C;color:white;">EMAIL</td>
            <td style="background-color:#00538C;color:white;">EDIT</td>
            <td style="background-color:#00538C;color:white;">DEACTIVATE</td>
        </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
          <tr @if(Str::startsWith($user->email,'deactivated.')) class="table-danger table-borderd" @endif">
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->role}}</td>
            <td>{{$user->observer_id}}</td>
            <td>{{$user->station_id}}</td>
            <td>{{$user->phone}}</td>
            <td>{{$user->email}}</td>
            <td><a href="{{ route('admin.edit.update',$user->id) }}" class="btn btn-outline-primary">EDIT</a></td>
            <td>
            <form action="{{ route('admin.users.deactivate', $user->id) }}" method="post" style="display:inline;" onsubmit="return confirm('Do you want to deactivate this employee?')">
              @csrf 
              @method('DELETE')
              <button type="submit" class="btn btn-outline-danger">DEACTIVATE</button>
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