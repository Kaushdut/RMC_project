@extends('layouts.app')
@section('title','User')
@section('content')

<!--Search Bar-->
<nav class="navbar bg-light shadow">
  <div class="container-fluid">
    <a href="admin" class="btn btn-outline-primary">Admin Dashboard</a>
    <form class="d-flex" role="search">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"/>
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
  </div>
</nav>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<!--User Table-->
<div class="container table-responsive mt-5 mb-5">
    <h3 style="text-align:center;">Employee Information</h3>
    <table class="table table-striped table-hover table-bordered border-black shadow text-center">
    <thead>
        <tr>
            <td style="background-color:#00538C;color:white;">ID</td>
            <td style="background-color:#00538C;color:white;">NAME</td>
            <td style="background-color:#00538C;color:white;">ROLE</td>
            <td style="background-color:#00538C;color:white;">MOBILE</td>
            <td style="background-color:#00538C;color:white;">EMAIL</td>
            <td style="background-color:#00538C;color:white;">STATION ID</td>
            <td style="background-color:#00538C;color:white;">UPDATE</td>
            <td style="background-color:#00538C;color:white;">DELETE</td>
        </tr>
    </thead>
    <tbody class="table-group-divider">
    @foreach($users as $user)
          <tr>
            <td>{{$user->observer_id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->role}}</td>
            <td>{{$user->phone}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->station_id}}</td>
            <td><a href="#" class="btn btn-outline-primary">UPDATE</a></td>
            <td>
            <form action="{{ route('admin.users.destroy', $user->id) }}" method="post" style="display:inline;" onsubmit="return confirm('Do you want to delete this employee?')">
              @csrf 
              @method('DELETE')
              <button type="submit" class="btn btn-outline-danger">DELETE</button>
            </form>
            </td>
          </tr>
    @endforeach
    </tbody>
    </table>
    </div>
@endsection