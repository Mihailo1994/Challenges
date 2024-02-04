@extends('layout.layout')

@section('title', 'Welcome')

@section('content')

    <div class="container-fluid py-5 min-height bg-grey">
        <div class="row justify-content-center">
                <div class="col-12 col-md-8">

                    <p class="mb-0 h5">Welcome {{Auth::user()->username}}</p>

                </div>
            </div>
        </div>
    </div>

@endsection
