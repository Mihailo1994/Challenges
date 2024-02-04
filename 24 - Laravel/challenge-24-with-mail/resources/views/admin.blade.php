@extends('layouts.layout')

@section('title', 'Admin')

@section('content')




<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-10 d-flex justify-content-between align-items-end">
            <div class="border-bottom mt-3">
                <label for="radio-btn-add" style="cursor: pointer" class="p-2 active" id="add-label">Додај</label>
                <input type="radio" name="radiobtn" id="radio-btn-add" hidden checked value='add'>
                <label for="radio-btn-edit" style="cursor: pointer" class="p-2" id="edit-label">Измени</label>
                <input type="radio" name="radiobtn" id="radio-btn-edit" hidden value="edit">
            </div>
            <div>
                <a href="{{ url('logout') }}" class="text-decoration-none text-black">Одлогирај се</a>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid" id="add-project">
    <div class="row justify-content-center py-3">
        <div class="col-12 col-lg-10">
            <p class="fw-bold fs-4">Додај нов проект:</p>
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="{{ url('add') }}" method="POST">
                        @csrf
                        <label for="name">Име</label>
                        <input type="text" id="name" name="name" class="form-control mb-2">
                        <label for="subtitle">Поднаслов</label>
                        <input type="text" id="subtitle" name="subtitle" class="form-control mb-2">
                        <label for="image">Слика</label>
                        <input type="text" id="image" name="image" class="form-control mb-2">
                        <label for="url">URL</label>
                        <input type="text" id="url" name="url" class="form-control mb-2">
                        <label for="description">Опис</label>
                        <textarea name="description" id="description" cols="10" rows="5" class="form-control mb-2"></textarea>
                        <button type="submit" class="btn btn-warning form-control">Додај</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid" id="edit-project" style="display: none">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-10">
            <div class="row py-5 px-2">
                @foreach ($projects as $project)

                <div class="col-12 col-md-6 col-lg-4 mb-4 project">
                    <div class="text-center p-3 border rounded border-hover height show-project d-block">
                        <img src="{{$project->image}}" alt="img" class="w-75 d-block mx-auto">
                        <p class="h4">{{$project->name}}</p>
                        <p class="h6">{{$project->subtitle}}</p>
                        <p>{{$project->description}}</p>
                        <div class="btns d-none">
                            <button class="btn fs-3 edit-btn"><i class="fa-solid fa-square-pen"></i></button>
                            <button type="button" class="btn fs-3" data-bs-toggle="modal" data-bs-target="#modal{{$project->id}}"><i class="fa-solid fa-x"></i></button>
                        </div>
                    </div>
                    <div class="text-center border border-warning rounded border-hover height pb-2 d-none edit-project">
                        <form action="{{ url('edit') }}" method="POST">
                            @csrf
                            <input type="text" hidden value="{{$project->id}}" name="id">
                            <label for="url">URL</label>
                            <input type="text" id="url" name="url" class="form-control mb-2" value="{{$project->url}}">
                            <label for="image">Слика</label>
                            <input type="text" id="image" name="image" class="form-control mb-2" value="{{$project->image}}">
                            <label for="name">Име</label>
                            <input type="text" id="name" name="name" class="form-control mb-2" value="{{$project->name}}">
                            <label for="subtitle">Поднаслов</label>
                            <input type="text" id="subtitle" name="subtitle" class="form-control mb-2" value="{{$project->subtitle}}">
                            <label for="description">Опис</label>
                            <textarea name="description" id="description" cols="10" class="form-control mb-2">{{$project->description}}</textarea>
                            <button type="submit" class="btn btn-warning">Зачувај</button>
                            <button type="submit" class="btn btn-warning cancel-btn">Откажи</button>
                        </form>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="modal{{$project->id}}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5">Избриши</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Дали сте сигурни дека сакате да го избришете призводот?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Откажи</button>
                                <form action="{{ url('delete') }}" method="POST">
                                    @csrf
                                    <input type="text" value="{{$project->id}}" name="id" hidden>
                                    <button type="submit" class="btn btn-warning">Избриши</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach

            </div>
        </div>
    </div>
</div>


@endsection

@section('script')

<script src="/js/admin.js"></script>

@endsection
