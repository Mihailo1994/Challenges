@extends('layout.layout')

@section('title', 'Create match')

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
                        <p class="mb-0">Create new match</p>
                    </div>
                    <div class="p-3">
                        <form action="{{route('create.match')}}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="team1" class="mb-2">Home Team</label>
                                <select name="team1" id="team1">
                                    @foreach ($teams as $team)
                                        <option value="{{$team->id}}">{{$team->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="team2" class="mb-2">Home Team</label>
                                <select name="team2" id="team2">
                                    @foreach ($teams as $team)
                                        <option value="{{$team->id}}">{{$team->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="date" class="mb-2">Date</label>
                                <input type="date" name="date" id="date" class="form-control" value="{{ old('date') }}">
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
