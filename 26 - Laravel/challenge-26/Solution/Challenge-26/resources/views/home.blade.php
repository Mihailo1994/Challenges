@extends('layout.layout')

@section('title', 'Home')

@section('content')

    <div class="container-fluid py-3 min-height bg-grey">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-10">
                @if(session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="border rounded overflow-hidden">
                    <div class="p-3 border-bottom bg-light-subtle">
                        <p class="mb-0">Matches</p>
                    </div>
                    @if (Auth::user()->isAdmin())
                        <div class="p-3 d-flex justify-content-end">
                            <a href="{{ url('/create/match')}}"><button class="btn btn-primary">Add new Match</button></a>
                        </div>
                    @endif
                    <div class="px-3 pb-3">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Date of Match</th>
                                    <th scope="col">Team 1</th>
                                    <th scope="col">Team 2</th>
                                    <th scope="col">Result</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($matches as $match)
                                    <tr>
                                        <td>{{$match->date}}</td>
                                        <td>{{$match->team1()->get()->first()->name}}</td>
                                        <td>{{$match->team2()->get()->first()->name}}</td>
                                        <td>{{$match->team_1_score ?? ''}} / {{$match->team_2_score ?? ''}}</td>
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
