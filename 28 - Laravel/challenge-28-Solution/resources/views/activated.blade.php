@extends('layout.layout')

@section('title', 'confirmation')

@section('content')

    <div class="container-fluid py-5 min-height bg-grey">
        <div class="row justify-content-center">
                <div class="col-12 col-md-6">
                    <div class="alert alert-success" role="alert">
                        <p class="mb-0">Your account is activated.</p>
                        <p class="mb-0">Go to <a href="{{route('login')}}">Login Page</a> to login into the web site.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
