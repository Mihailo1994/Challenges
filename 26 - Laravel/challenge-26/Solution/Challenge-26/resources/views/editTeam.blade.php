@extends('layout.layout')

@section('title', 'Edit')

@section('content')

    <div class="container-fluid py-5 min-height bg-grey">
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

                <div class="border rounded overflow-hidden">
                    <div class="p-3 border-bottom bg-light-subtle">
                        <p class="mb-0">Edit team</p>
                    </div>
                    <div class="p-3">
                        <form action="{{ route('edit.team', $team->id) }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="mb-2">Name</label>
                                <input type="text" name="name" placeholder="Name" class="form-control" value="{{$team->name}}">
                            </div>
                            <div class="mb-3">
                                <label for="year" class="mb-2">Year Founded</label>
                                <input type="number" name="year" class="form-control" placeholder="Year Founded" value="{{$team->year_of_foundation}}">
                            </div>
                            <div>
                                <button class="btn btn-success" type="submit">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
