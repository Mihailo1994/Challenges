<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/0eb0c5b114.js" crossorigin="anonymous"></script>
    <style>
        .banner {
            background:linear-gradient(rgba(0, 0, 0, 0.40), rgba(0, 0, 0, 0.40)), url('/img/@yield('image')');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            min-height: 100vh;
        }

        .h1 {
            font-size: 4rem!important;
        }

        .height-90 {
            height: 90vh;
        }

    </style>
    <title>@yield('title')</title>
</head>
<body>
    <div class="container-fluid banner min-height-100">
        <div class="row justify-content-center">
            <div class="col-8">
                @include('blog.layouts.nav')
            </div>
        </div>
        <div class="d-flex height-90 justify-content-center align-items-center">
            <div class="text-center w-75">
                @yield('heading')
            </div>
        </div>
    </div>
    <div class="container-fluid border-bottom">
        <div class="row justify-content-center py-3">
            <div class="col-6">

    @yield('content')

            </div>
        </div>
    </div>
    @include('blog.layouts.footer')
</body>
</html>
