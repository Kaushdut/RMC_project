@extends('layouts.app')
@section('title','Sucess Message')
@section('content')

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="row w-100">
        <div class="col-12 col-sm-10 col-md-8 col-lg-6 mx-auto">
            <div class="card text-center text-bg-success mb-3 p-3" style="width: 30rem;height:15rem;">
                <div class="card-body">
                    <h5 class="card-title mt-2">Successful</h5>
                    <p class="card-text mt-2">Observation Sucessfully Recorded.</p>
                    <a href="observer" class="btn btn-light mt-4">Back To Home Page</a>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection