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
            @if (session()->has('name'))
            <a href="{{ url('logout') }}" class="text-uppercase text-decoration-none text-black text-white mx-3">log out</a>
            @else
            <a href="{{ url('login') }}" class="text-uppercase text-decoration-none text-black text-white mx-3">log in</a>
            @endif
        </div>
        <div class="position-relative container-part">
            <div class="position-absolute img-part">
                <img src="/img/cafe.jpg" alt="">
            </div>
            <div class="text-part text-center position-absolute">
                <div class="position-relative">
                    <p class="text-uppercase fw-bold">Lorem, ipsum.</p>
                    <p class="text-uppercase h4">Lorem, ipsum.</p>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Accusantium voluptatum ut eum laborum quidem numquam veniam aliquid in neque provident minima a iusto, deleniti nobis cumque sint quas modi. Reprehenderit unde iusto doloribus nihil dolores accusantium aperiam earum, hic omnis.</p>
                    <div class="position-absolute div-btn">
                        <button class="btn btn-warning text-white">Visit us today</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-warning d-flex justify-content-center p-4">
            <div class="p-1 bg-white  w-75">
                <div class="p-1 bg-warning">
                    <div class="bg-white p-3 text-center rounded">
                        <p class="text-uppercase fw-bold mb-2">our promise</p>
                        @if (session()->has('name'))
                        <p class="text-uppercase h4 mb-2">{{session('name')}} {{session('lastName')}}</p>
                        @else
                        <p class="text-uppercase h4 mb-2">To you</p>
                        @endif

                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem, obcaecati repellendus. Harum, est itaque praesentium mollitia placeat laudantium officia iure culpa quia omnis dolorem nostrum impedit aspernatur cum voluptatem quos excepturi sint corporis distinctio aliquam assumenda. Inventore excepturi iure explicabo maxime sed ad incidunt aut velit. A itaque delectus tempore?</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center bg-brown p-3 text-white footer">
            <p class="mb-0">Copyright &copy; your website</p>
        </div>
    </div>
</body>
</html>
