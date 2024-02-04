@extends('layout.layout')

@section('title', 'Players')

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
                        <p class="mb-0">Players</p>
                    </div>
                    <div class="p-3 d-flex justify-content-end">
                        <a href="{{ url('/create/player')}}"><button class="btn btn-primary">Add new Player</button></a>
                    </div>
                    <div class="px-3 pb-3">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Surname</th>
                                    <th scope="col">Date of Birth</th>
                                    <th scope="col">Team</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($players as $player)
                                    <tr>
                                        <td>{{$player->name}}</td>
                                        <td>{{$player->surname}}</td>
                                        <td>{{$player->date_of_birth}}</td>
                                        <td>{{$player->team->name}}</td>
                                        <td><a href="{{route('edit.player.page', $player->id)}}" class="text-decoration-none mx-3">Edit</a><a href="{{route('delete.player', $player->id)}}" class="text-decoration-none">Delete</a></td>
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
