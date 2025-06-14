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

<!--User Table-->
<div class="container table-responsive mt-5 mb-5">
    <h3 style="text-align:center;">Employee Information</h3>
    <table class="table table-striped table-hover table-bordered border-black shadow text-center">
    <thead>
        <tr>
            <td style="background-color:#00538C;color:white;">ID</td>
            <td style="background-color:#00538C;color:white;">NAME</td>
            <td style="background-color:#00538C;color:white;">EMAIL</td>
        </tr>
    </thead>
    <tbody class="table-group-divider">
    @foreach($user as $users)
        <tr>
            <td>{{$users->id}}</td>
            <td>{{$users->name}}</td>
            <td>{{$users->email}}</td>
        </tr>
    @endforeach
    </tbody>
    </table>
    </div>
@endsection