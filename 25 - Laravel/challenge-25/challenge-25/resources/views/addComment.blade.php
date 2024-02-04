@extends('layout.layout')

@section('title', 'Home')

@section('content')

    <div class="container-fluid py-3 min-height bg-grey">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-10">
                @if ($errors->any())

                <div class="alert alert-danger">
                    <ul>

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                    </ul>
                </div>

                @endif
                <form action="{{url('/add/'.$id.'/comment')}}" method="POST">
                    @csrf
                    <label for="comment">Comment</label>
                    <textarea name="comment" id="comment" cols="30" rows="10" class="form-control my-3"></textarea>
                    <button class="btn btn-primary" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>

@endsection
