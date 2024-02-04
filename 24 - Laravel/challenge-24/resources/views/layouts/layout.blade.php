<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
    <script src="https://kit.fontawesome.com/64087b922b.js" crossorigin="anonymous"></script>
    <title>@yield('title')</title>
</head>
<body>
    <div class="container-fluid bg-yellow">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">
                <nav class="navbar navbar-expand-md">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="{{ route('home') }}">
                            <img src="/img/logo_footer_black.png" alt="Logo" class="logo-size d-block mx-auto">
                            <p class="mb-0 text-uppercase logo-text">Brainster</p>
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                <li class="nav-item text-md-center">
                                    <a class="nav-link text-dark font-weight-bold px-md-3" href="https://brainster.co/full-stack/">Академија за програмирање</a>
                                </li>
                                <li class="nav-item text-md-center">
                                    <a class="nav-link text-dark font-weight-bold px-md-3" href="https://brainster.co/marketing/">Академија за маркетинг</a>
                                </li>
                                <li class="nav-item text-md-center">
                                    <a class="nav-link text-dark font-weight-bold px-md-3" href="https://brainster.co/graphic-design/">Академија за дизајн</a>
                                </li>
                                <li class="nav-item ttext-md-center">
                                    <a class="nav-link text-dark font-weight-bold px-md-3" href="https://blog.brainster.co/">Блог</a>
                                </li>
                                <li class="nav-item text-md-center">
                                    <a type="button" data-bs-toggle="modal" data-bs-target="#employmentModal" class="nav-link text-dark font-weight-bold px-md-3">Вработи наш студент</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>

    @yield('content')

    <footer class="text-center p-3">
        <p class="mb-0">Made with <span class="text-danger"><i class="fa-solid fa-heart"></i></span> by <img src="/img/logo_footer_black.png" alt="Logo" class="logo-size">  -  <span><a href="https://www.facebook.com/brainster.co" class="text-decoration-none text-dark">Say Hi!</a></span> - Terms</p>
    </footer>

    <div class="modal fade" id="employmentModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Вработи наши студенти</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="text-secondary">Внесете ваши информации за да стапеме во контакт:</p>
                    <form action="">
                        <label for="email">E-мајл</label>
                        <input type="text" id="email" name="email" class="form-control mb-2">
                        <label for="phone-number">Телефон</label>
                        <input type="text" id="phone-number" name="phone" class="form-control mb-2">
                        <label for="company">Компанија</label>
                        <input type="text" id="company" name="company" class="form-control mb-2">
                        <button type="submit" class="btn btn-warning form-control">Испрати</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    @yield('script')
</body>
</html>
