<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/main.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Homepage</title>
</head>
<body>
    <div class="bg-image">
        <div class="text-center p-4">
            <p class="text-uppercase h1">business casual</p>
        </div>
        <div class="bg-brown text-center p-2">
            <a href="{{ url('home') }}" class="text-uppercase text-decoration-none text-black text-white mx-3">home</a>
            <a href="{{ url('logout') }}" class="text-uppercase text-decoration-none text-black text-white mx-3">log out</a>
        </div>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-8 p-5">
                    <p class="fs-4">Your name is: <span>{{session('name')}}</span></p>
                    <p class="fs-4">Your last name is: <span>{{session('lastName')}}</span></p>
                    @if (session()->has('email'))
                    <p class="fs-4">Your email is: <span>{{session('email')}}</span></p>
                    @endif
                </div>
            </div>
        </div>
        <div class="text-center bg-brown p-3 text-white footer">
            <p class="mb-0">Copyright &copy; your website</p>
        </div>
    </div>
</body>
</html>
