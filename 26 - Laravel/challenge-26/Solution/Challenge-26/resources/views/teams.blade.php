@extends('layout.layout')

@section('title', 'Teams')

@section('content')

    <div class="container-fluid py-5 min-height bg-grey">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-10">
                @if(session('status'))

                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>

                @endif
                <div class="border rounded overflow-hidden">
                    <div class="p-3 border-bottom bg-light-subtle">
                        <p class="mb-0">Teams</p>
                    </div>
                    <div class="p-3 d-flex justify-content-end">
                        <a href="{{ url('/create/team')}}"><button class="btn btn-primary">Add new Team</button></a>
                    </div>
                    <div class="px-3 pb-3">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Year Founded</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($teams as $team)
                                    <tr>
                                        <td>{{$team->name}}</td>
                                        <td>{{$team->year_of_foundation}}</td>
                                        <td><a href="{{ route('edit.team.page', $team->id) }}" class="text-decoration-none mx-3">Edit</a><a href="{{ route('delete.team', $team->id) }}" class="text-decoration-none">Delete</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
