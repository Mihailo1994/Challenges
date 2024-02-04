<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/64087b922b.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
    <title>@yield('title')</title>
</head>
<body>
    <nav class="border-bottom">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-10 d-flex justify-content-between py-3">
                    <div>
                        <a href="{{url('/')}}" class="text-decoration-none text-black">Laravel</a>
                    </div>
                    <div>
                        @auth
                            @if (Route::is('home'))
                                <a href="{{url('/')}}" class="text-decoration-none text-secondary mx-2 btn fw-bold">Matches</a>
                            @else
                                <a href="{{url('/')}}" class="text-decoration-none text-secondary mx-2 btn">Matches</a>
                            @endif
                            @if (Auth::user()->isAdmin())
                                @if (Route::is('teams'))
                                    <a href="{{url('/teams')}}" class="text-decoration-none text-secondary mx-2 btn fw-bold">Teams</a>
                                @else
                                    <a href="{{url('/teams')}}" class="text-decoration-none text-secondary mx-2 btn">Teams</a>
                                @endif
                                @if (Route::is('players'))
                                    <a href="{{url('/players')}}" class="text-decoration-none text-secondary mx-2 btn fw-bold">Players</a>
                                @else
                                    <a href="{{url('/players')}}" class="text-decoration-none text-secondary mx-2 btn">Players</a>
                                @endif
                            @endif
                            <div class="dropdown d-inline">
                                <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown">{{ Auth::user()->username }}</button>
                                <ul class="dropdown-menu">
                                    <li class="text-center"><a href="{{ route('user.logout') }}" class="text-decoration-none text-secondary mx-2">Logout</a></li>
                                </ul>
                            </div>
                        @else
                            @if (Route::is('register.page'))
                                <a href="{{ route('login.page')}}" class="text-decoration-none text-secondary mx-2">Login</a>
                            @elseif (Route::is('login.page'))
                                <a href="{{ route('register.page')}}" class="text-decoration-none text-secondary mx-2">Register</a>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </nav>

@yield('content')



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
