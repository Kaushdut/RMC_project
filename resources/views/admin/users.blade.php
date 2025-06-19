@extends('layouts.app')
@section('title','User')
@section('content')
@php use Illuminate\Support\Str; @endphp

<!--Search Bar-->
<nav class="navbar bg-light shadow">
  <div class="container-fluid">
    <div class="btn-group" role="group">
      <a href="admin" class="btn btn-outline-primary">Admin Dashboard</a>
      <a href="stationView" class="btn btn-outline-primary">View Stations</a>
      <a href="adminInput" class="btn btn-outline-success">Add Employee</a>
    </div>
    <!--Search-->
    <div>
      <form class="d-flex" role="search" action="users" method="get">
        <input class="form-control me-2" type="search" name="search" placeholder="Name or Role or Email" aria-label="Search" value="{{ @$search }}"/>
        <button class="btn btn-outline-success me-2" type="submit">Search</button>
        <a href="users" class="btn btn-outline-secondary">Clear</a>
      </form>
    </div>
  </div>
</nav>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<!--User Table-->
<div class="container table-responsive mt-5 mb-5">
    <h3 style="text-align:center;margin-bottom:2.5rem;">Employee Records</h3>
    <table class="table table-striped table-hover table-bordered border-black shadow text-center">
    <thead>
        <tr>
            <td style="background-color:#00538C;color:white;">ID</td>
            <td style="background-color:#00538C;color:white;">NAME</td>
            <td style="background-color:#00538C;color:white;">ROLE</td>
            <td style="background-color:#00538C;color:white;">STATION ID</td>
            <td style="background-color:#00538C;color:white;">MOBILE</td>
            <td style="background-color:#00538C;color:white;">EMAIL</td>
            <td style="background-color:#00538C;color:white;">EDIT</td>
            <td style="background-color:#00538C;color:white;">DEACTIVATE</td>
        </tr>
    </thead>
    <tbody class="table-group-divider">
    @foreach($users as $user)
          <tr @if(Str::startsWith($user->email,'deactivated.')) class="table-danger table-borderd border-dark" @endif">
            <td>{{$user->observer_id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->role}}</td>
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
@endsection