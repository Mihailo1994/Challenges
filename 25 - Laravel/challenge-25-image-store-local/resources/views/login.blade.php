@extends('layout.layout')

@section('title', 'Login')

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

                <div class="border rounded">
                    <div class="p-3 border-bottom">
                        <p class="mb-0">Login</p>
                    </div>
                    <div class="p-3 bg-white">
                        <form action="{{ route('login.user') }}" method="POST">
                            @csrf
                            <div class="row justify-content-center mb-3">
                                <div class="col-4 d-flex justify-content-end">
                                    <label for="username" class="mt-2">Username</label>
                                </div>
                                <div class="col-6">
                                    <input type="text" id="username" name="username" class="form-control">
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-4 d-flex justify-content-end">
                                    <label for="username" class="mt-2">Password</label>
                                </div>
                                <div class="col-6">
                                    <input type="password" id="password" name="password" class="form-control mb-3">
                                    <input type="checkbox" id="remember" name="remember"/>
                                    <label for="remember" class="mb-2">Remember Me</label><br>
                                    <button class="btn btn-primary" type="submit">Login</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
