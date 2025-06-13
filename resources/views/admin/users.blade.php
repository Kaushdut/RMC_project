@extends('layouts.app')
@section('title','User')
@section('content')
<div class="table-container table-responsive">
    <table class="table table-striped table-hover table-bordered border-black shadow text-center caption-top">
    <caption>User Table</caption>    
    <thead class="table-dark">
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Email</td>
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