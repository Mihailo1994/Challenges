@extends('layout.layout')

@section('title', 'Register')

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

                <form action="{{ route('save.discussion') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="d-block mb-2">Title</label>
                        <input type="text" class="form-control" name="title" id="title">
                    </div>
                    <div class="mb-3">
                        <label for="photo" class="d-block mb-2">Photo</label>
                        <input type="text" name="photo" class="form-control" id="photo" placeholder="URL">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="d-block mb-2">Description</label>
                        <textarea name="description" id="description" cols="30" rows="2" class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="category" class="d-block mb-2">Category</label>
                        <select class="form-select" name="category" id="category">
                            <option selected disabled>Select category...</option>
                            @foreach ($categories as $category)

                                <option value="{{ $category->id }}" class="text-capitalize">{{ $category->category }}</option>

                            @endforeach
                        </select>
                    </div>
                    <div>
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

@endsection
