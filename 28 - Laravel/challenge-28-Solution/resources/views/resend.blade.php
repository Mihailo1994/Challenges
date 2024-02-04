@extends('layout.layout')

@section('title', 'send')

@section('content')

    <div class="container-fluid py-5 min-height bg-grey">
        <div class="row justify-content-center">
                <div class="col-12 col-md-8">
                    <div class="alert alert-danger" role="alert">
                        <p class="mb-0">Your link has expired. Please click on the button bellow to receive a new link.</p>
                        <form action="{{route('resend.link', ['id' => $id])}}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary">Send</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
