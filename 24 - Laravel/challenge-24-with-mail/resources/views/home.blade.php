@extends('layouts.layout')

@section('title', 'Home')

@section('content')

<div class="banner text-white d-flex justify-content-center align-items-center text-center">
    <div>
        <p class="h1">Brainser.xyz Labs</p>
        <p>Проекти на академиите на Brainster</p>
    </div>
</div>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-10">
            <div class="row py-5 px-2">

@foreach ($projects as $project)

                <div class="col-12 col-md-6 col-lg-4 mb-4">
                    <a href="{{$project->url}}" class="text-black text-decoration-none">
                        <div class="text-center p-3 border-hover border rounded height">
                            <img src="{{$project->image}}" alt="img" class="w-75 d-block mx-auto">
                            <p class="h4">{{$project->name}}</p>
                            <p class="h6">{{$project->subtitle}}</p>
                            <p>{{$project->description}}</p>
                        </div>
                    </a>
                </div>
@endforeach

            </div>
        </div>
    </div>
</div>
@endsection
