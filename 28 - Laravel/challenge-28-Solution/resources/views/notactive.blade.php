@extends('layout.layout')

@section('title', 'confirmation')

@section('content')

    <div class="container-fluid py-5 min-height bg-grey">
        <div class="row justify-content-center">
                <div class="col-12 col-md-8">
                    <div class="alert alert-danger" role="alert">
                        <p>Your account is not activated.</p>
                        <p>Go to your mail to activate your account.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
