@extends('layout.layout')

@section('title', 'Create Player')

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

                <div class="border rounded">
                    <div class="p-3 border-bottom">
                        <p class="mb-0">Create new player</p>
                    </div>
                    <div class="p-3 bg-white">
                        <form action="{{ route('create.player') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="mb-2">Name</label>
                                <input type="text" name="name" placeholder="Name" class="form-control" value="{{ old('name') }}">
                            </div>
                            <div class="mb-3">
                                <label for="surname" class="mb-2">Surname</label>
                                <input type="text" name="surname" placeholder="Surname" class="form-control" value="{{ old('surname') }}">
                            </div>
                            <div class="mb-3">
                                <label for="birthDate" class="mb-2">Date of birth</label>
                                <input type="date" name="birthDate" id="birthDate" class="form-control" value="{{ old('birthDate') }}">
                            </div>
                            <div class="mb-3">
                                <label for="team" class="mb-2">Team</label>
                                <select name="team" id="team" class="form-control">
                                    @foreach ($teams as $team)

                                        <option value="{{$team->id}}">{{$team->name}}</option>

                                    @endforeach
                                </select>
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
