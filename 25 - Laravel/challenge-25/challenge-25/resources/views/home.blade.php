@extends('layout.layout')

@section('title', 'Home')

@section('content')

    <div class="container-fluid py-3 min-height bg-grey">
        <div class="row justify-content-center">
            <div class="col-10">
                <p class="fs-2 text-center">Welcome to the forum</p>

                @if(session('status'))

                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>

                @endif

                <p><a href="{{route('add.discussion')}}"><button class="btn btn-secondary">Add new discussion</button></a></p>

                @auth
                @if (Auth::user()->role === 'admin')

                <p><a href="{{ url('/pending/discussion')}}"><button class="btn btn-primary">Approve discussions</button></a></p>

                @endif
                @endauth

            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-10">

                @if ($discussions->isEmpty())

                <p class="fs-4 text-center my-5 text-secondary">Nothing here yet! Start a topic!</p>

                @else
                    @foreach ($discussions as $discussion)
                        @if (Auth::check())
                            @if (Auth::user()->role === 'admin')

                                <div class="row flex-wrap p-4 bg-white rounded border mb-3">
                                    <div class="col-auto">
                                        <img src="{{ $discussion->photo }}" alt="" style="width: 120px">
                                    </div>
                                    <div class="col">
                                        <a href="{{ url('/discussion/'.$discussion->id)}}" class="text-decoration-none h4">{{ $discussion->title }}</a>
                                        <p class="text-secondary mt-2">{{ $discussion->description }}.</p>
                                    </div>
                                    <div class="col-auto d-flex pt-3">
                                        <div>

                                            @if ($discussion->status === 0)

                                                <form action="{{url('approve/'.$discussion->id.'/discussion')}}" class="d-inline" method="POST">
                                                    @csrf
                                                    <button class="btn" type="submit"><i class="fa-solid fa-check"></i></button>
                                                </form>

                                            @endif

                                            <form action="{{url('edit/'.$discussion->id.'/discussion')}}" method="POST" class="d-inline">
                                                @csrf
                                                <button class="btn" type="submit"><i class="fa-solid fa-pen-to-square"></i></button>
                                            </form>
                                            <form action="{{url('delete/'.$discussion->id.'/discussion')}}" class="d-inline" method="POST">
                                                @csrf
                                                <button class="btn"><i class="fa-solid fa-trash-can"></i></button>
                                            </form>
                                        </div>
                                        <p><span>{{ $discussion->category()->get()->first()->category}}</span> | <span>{{ $discussion->user()->get()->first()->username }}</span></p>
                                    </div>
                                </div>

                            @elseif (Auth::id() == $discussion->created_by)

                                <div class="row flex-wrap p-4 bg-white rounded border mb-3">
                                    <div class="col-auto">
                                        <img src="{{ $discussion->photo }}" alt="" style="width: 120px">
                                    </div>
                                    <div class="col">
                                        <a href="{{ url('/discussion/'.$discussion->id)}}" class="text-decoration-none h4">{{ $discussion->title }}</a>
                                        <p class="text-secondary mt-2">{{ $discussion->description }}.</p>
                                    </div>
                                    <div class="col-auto d-flex pt-3">
                                        <div>
                                            <a href=""><button class="btn"><i class="fa-solid fa-pen-to-square"></i></button></a>
                                            <a href=""><button class="btn"><i class="fa-solid fa-trash-can"></i></button></a>
                                        </div>
                                        <p><span>{{ $discussion->category()->get()->first()->category}}</span> | <span>{{ $discussion->user()->get()->first()->username }}</span></p>
                                    </div>
                                </div>

                            @elseif ($discussion->status == 1)

                                <div class="row flex-wrap p-4 bg-white rounded border mb-3">
                                    <div class="col-auto">
                                        <img src="{{ $discussion->photo }}" alt="" style="width: 120px">
                                    </div>
                                    <div class="col">
                                        <a href="{{ url('/discussion/'.$discussion->id)}}" class="text-decoration-none h4">{{ $discussion->title }}</a>
                                        <p class="text-secondary mt-2">{{ $discussion->description }}.</p>
                                    </div>
                                    <div class="col-auto d-flex pt-3">
                                        <p><span>{{ $discussion->category()->get()->first()->category}}</span> | <span>{{ $discussion->user()->get()->first()->username }}</span></p>
                                    </div>
                                </div>

                            @endif
                        @elseif ($discussion->status == 1)

                            <div class="row flex-wrap p-4 bg-white rounded border mb-3">
                                <div class="col-auto">
                                    <img src="{{ $discussion->photo }}" alt="" style="width: 120px">
                                </div>
                                <div class="col">
                                    <a href="{{ url('/discussion/'.$discussion->id)}}" class="text-decoration-none h4">{{ $discussion->title }}</a>
                                    <p class="text-secondary mt-2">{{ $discussion->description }}.</p>
                                </div>
                                <div class="col-auto d-flex pt-3">
                                    <p><span>{{ $discussion->category()->get()->first()->category}}</span> | <span>{{ $discussion->user()->get()->first()->username }}</span></p>
                                </div>
                            </div>

                        @endif
                    @endforeach
                @endif

            </div>
        </div>
    </div>

@endsection
