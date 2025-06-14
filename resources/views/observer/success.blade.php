@extends('layouts.app')
@section('title','Sucess Message')
@section('content')

<div class="card text-center mb-3" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Successful</h5>
    <p class="card-text">Your observation has been sucessfully entered.</p>
    <a href="weather.observer" class="btn btn-primary">Back</a>
  </div>
</div>

@endsection