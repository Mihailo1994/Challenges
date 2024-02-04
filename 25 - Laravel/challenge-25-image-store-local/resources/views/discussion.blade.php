@extends('layout.layout')

@section('title', 'Discussion')

@section('content')

    <div class="container-fluid py-3 min-height bg-grey">
        <div class="row justify-content-center">
            <div class="col-10">
                <p class="fs-2 text-center">Welcome to the forum</p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="row p-4 mb-4 bg-white rounded border justify-content-center">
                    <p class="pt-3 text-end"><span>{{$discussion->category()->get()->first()->category}}</span> | <span>{{$discussion->user()->get()->first()->username}}</span></p>
                    <div class="col-8">
                        <img src="{{$discussion->photo}}" alt="img" style="width: 100%" class="d-block mb-4">
                        <p class="fs-3 mb-2">{{$discussion->title}}</p>
                        <p class="text-secondary">{{$discussion->description}}</p>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-8">
                        <p class="fs-3">Comments:</p>
                        <a href="{{url('/add/'.$discussion->id.'/comment')}}"><button class="btn-secondary btn">Add comment</button></a>
                    </div>
                </div>
                @isset($comments)
                    @foreach ($comments as $comment)

                    <div class="row bg-white border roundedn p-3 mb-3">
                        <div class="col">
                            <div class="d-flex justify-content-between">
                                <p>{{$comment->username}}<span> says:</span></p>
                                <p class="text-secondary">{{$comment->created_at}}</p>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <p>{{$comment->comment}}</p>
                                </div>

                                @auth
                                @if (Auth::user()->role == 'admin')

                                    <div class="col-auto">
                                        <form action="{{url('edit/'.$comment->id.'/comment')}}" method="POST" class="d-inline">
                                            @csrf
                                            <button class="btn"><i class="fa-solid fa-pen-to-square"></i></button>
                                        </form>
                                        <form action="{{url('delete/'.$comment->id.'/comment')}}" method="POST" class="d-inline">
                                            @csrf
                                            <button class="btn"><i class="fa-solid fa-trash-can"></i></button>
                                        </form>
                                    </div>

                                @elseif (Auth::id() == $comment->user_id)

                                    <div class="col-auto">
                                        <form action="{{url('edit/'.$comment->id.'/comment')}}" method="POST" class="d-inline">
                                            @csrf
                                            <button class="btn"><i class="fa-solid fa-pen-to-square"></i></button>
                                        </form>
                                        <form action="{{url('delete/'.$comment->id.'/comment')}}" method="POST" class="d-inline">
                                            @csrf
                                            <button class="btn"><i class="fa-solid fa-trash-can"></i></button>
                                        </form>
                                    </div>

                                @endif
                                @endauth

                            </div>
                        </div>
                    </div>

                    @endforeach
                @endisset

                </div>
            </div>
        </div>
    </div>

@endsection
