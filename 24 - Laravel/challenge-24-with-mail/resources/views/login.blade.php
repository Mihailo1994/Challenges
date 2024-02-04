@extends('layouts.layout')

@section('title', 'Login')

@section('content')

<div class="container-fluid align-items-center">
    <div class="row justify-content-center login-page align-items-center">
        <div class="col-12 col-lg-4">
            @if (session('msg'))
                <div class="alert alert-danger">
                    {{ session('msg') }}
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
            <form action="{{ url('login') }}" method="POST">
                @csrf
                <label for="email">E-мајл</label>
                <input type="text" id="email" name="email" class="form-control mb-2">
                <label for="password">Пасворд</label>
                <input type="password" id="password" name="password" class="form-control mb-2">
                <button type="submit" class="btn btn-warning form-control">Логирај се</button>
            </form>
        </div>
    </div>
</div>


@endsection
