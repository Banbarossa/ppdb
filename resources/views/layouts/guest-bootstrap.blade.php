<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'PPDB | PIS') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('my-css/guest.css')}}">
    <script src="https://unpkg.com/feather-icons"></script>
</head>

<body>
    <section class="bg-maroon">
        <div class="container d-flex justify-content-end align-items-center pt-2">
            <ul class="header-list">
                <li>+62 821-8444-2747</li>
                <li>itpisaceh@gmail.com</li>
                <li>admin@pis.sch.id</li>
            </ul>
        </div>


    </section>
    <nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top">
        <div class="container">
            <a class="navbar-brand my-2" href="#">
                <img src="{{asset('images/logo.png')}}" height="30px" alt="">
                <span class="ms-3 text-success">Pesantren </span><span class="fw-bolder">Imam Syafi'i</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{request()->is('/psb')?'active':''}}" aria-current="page" href="{{route('welcome')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/#jalur-pendaftaran">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{request()->routeIs('psb.login')?'active':''}}" href="{{route('psb.login')}}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{request()->routeIs('admin.login')?'active':''}}" href="{{route('admin.login')}}">Admin Area</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    @yield('content')

    <section id="footer" class="bg-maroon">
        <div class="container py-5">
            <div class="row">
                <div class="col-md-6 mb-3 col-lg-2">
                    <img src="{{asset('images/logo.png')}}" height="80px" alt="">
                    <img src="{{asset('images/akreditasi.png')}}" height="80px" alt="">
                    <ul class="d-flex mt-4 gap-3">
                        <li class="list-footer mb-2"><i data-feather="facebook"></i></li>
                        <li class="list-footer mb-2"><i data-feather="instagram"></i></li>
                        <li class="list-footer mb-2"><i data-feather="youtube"></i></li>
                    </ul>
                </div>
                <div class="col-md-6 mb-3 col-lg-4">
                    <i data-feather="map" class="mb-3 text-white"></i>
                    <p class="text-white">
                        Jl. Banda Aceh – Medan Km. 16,5 Lr. Masjid Tuha Gampong Reuhat Tuha Kec. Sukamakmur Kab. Aceh Besar
                    </p>
                </div>
                <div class="col-md-6 mb-3 col-lg-3">
                    <h4 class="text-white">Our Program</h4>
                    <ul class="">
                        <li class="list-footer mb-2">Baitul Qur'an</li>
                        <li class="list-footer mb-2">Baitul Lughah</li>
                        <li class="list-footer mb-2">Pramuka</li>
                        <li class="list-footer mb-2">Menjahit</li>
                        <li class="list-footer mb-2">Archery</li>
                        <li class="list-footer mb-2">Taekwando</li>
                    </ul>
                </div>
                <div class="col-md-6 mb-3 col-lg-3">
                    <h4 class="text-white">Jenjang Pendidikan</h4>
                    <ul class="">
                        <li class="list-footer mb-2">SD Plus Imam Syafii</li>
                        <li class="list-footer mb-2">SMP Plus Imam Syafii</li>
                        <li class="list-footer mb-2">MAS Imam Syafii</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    <script>
        feather.replace();
    </script>
</body>

</html>