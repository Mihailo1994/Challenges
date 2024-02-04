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
        </div>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-6 p-5">
                    <form action="{{ url('register') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label text-capitalize fw-bold">name</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                            @error('name')
                                <p class="text-danger bg-warning fw-bold py-2 px-1 rounded">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-capitalize fw-bold">last name</label>
                            <input type="text" class="form-control" name="lastName" value="{{ old('lastName') }}">
                            @error('lastName')
                                <p class="text-danger bg-warning fw-bold py-2 px-1 rounded">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-capitalize fw-bold">email</label>
                            <input type="text" class="form-control" name="email" value="{{ old('email') }}">
                            @error('email')
                                <p class="text-danger bg-warning fw-bold py-2 px-1 rounded">{{ $message }}</p>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary form-control">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="text-center bg-brown p-3 text-white footer">
            <p class="mb-0">Copyright &copy; your website</p>
        </div>
    </div>
</body>
</html>
