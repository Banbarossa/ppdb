<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Material Design for Bootstrap</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
    <!-- MDB -->
    {{-- <link rel="stylesheet" href="css/mdb.min.css" />
    <!-- Custom styles -->
    <link rel="stylesheet" href="css/style.css" /> --}}
    <link href="{{ asset('admin_kit/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('admin_kit/css/mystyle.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body>
    <!--Main Navigation-->
    <header>
        <!-- Intro settings -->
        <style>
            #intro {
                /* Margin to fix overlapping fixed navbar */
                margin-top: 58px;
            }
            @media (max-width: 991px) {
                #intro {
                /* Margin to fix overlapping fixed navbar */
                margin-top: 45px;
            }
      }

        </style>

        <!-- Navbar -->
        @include('layouts.guest_navbar')


        <!-- Jumbotron -->
        <div id="intro" class="py-5 bg-light container">
            <h1 class="mb-0 h3 fw-bold">Jalur Pendaftaran: {{$data->nama_jalur}}</h1>
        </div>
        <!-- Jumbotron -->
    </header>
    <!--Main Navigation-->

    <!--Main layout-->
    <main class="mt-4 mb-5">
        <div class="container">
            <!--Grid row-->
            <div class="row">
                <!--Grid column-->
                <div class="col-md-8 mb-4">
                    <!--Section: Post data-mdb-->
                    <section class="border-bottom mb-4">
                        <img src="https://mdbootstrap.com/img/Photos/Slides/img%20(144).jpg"
                            class="img-fluid shadow-2-strong rounded mb-4" alt="" />

                        <div class="row align-items-center mb-4">
                            <div class="col-lg-7 text-center text-lg-start mb-3 m-lg-0">
                                <img src="https://mdbootstrap.com/img/Photos/Avatars/img (23).jpg"
                                    class="rounded shadow-1-strong me-2" height="35" alt="" loading="lazy" />
                                <span>
                                    Waktu Pendafataran <strong>{{ \Carbon\Carbon::parse($data->tanggal_mulai)->format('d M Y') }}
                                    s/d
                                    {{ \Carbon\Carbon::parse($data->tanggal_akhir)->format('d M Y') }}</strong>
                                </span>
                            </div>

                            <div class="col-lg-5 text-center text-lg-end">
                                <a href="https://www.facebook.com/sharer/sharer.php?u=https:http://psb_pis.test/99d0f379-fe12-424a-8977-5978786e4f6c" target="blank" class="btn btn-primary px-3 me-1" style="background-color: #3b5998;"><i class="fab fa-facebook-f"></i></a>
                                <button type="button" class="btn btn-primary px-3 me-1"
                                    style="background-color: #55acee;">
                                    <i class="fab fa-twitter"></i>
                                </button>
                                <button type="button" class="btn btn-primary px-3 me-1"
                                    style="background-color: #0082ca;">
                                    <i class="fab fa-linkedin"></i>
                                </button>
                                <button type="button" class="btn btn-primary px-3 me-1">
                                    <i class="fas fa-comments"></i>
                                </button>
                            </div>
                        </div>
                    </section>
                    <!--Section: Post data-mdb-->

                    <!--Section: Text-->
                    <section>
                        {!!$data->deskripsi!!}
                    </section>

                    <!--Section: Text-->

                    <!--Section: Share buttons-->
                    <section class="text-center border-top border-bottom py-4 mb-4">
                        <div class="d-grid">
                            @if($tanggalSekarang < $data->tanggal_mulai)
                                <button class="btn btn-warning">Jalur ini belum dibuka</button>
                            @elseif ($tanggalSekarang >= $data->tanggal_mulai && $tanggalSekarang <=$data->tanggal_akhir)
                                <a href="{{ route('psb.register',['id'=>$data->id]) }}"
                                    class="btn btn-primary">Daftar Sekarang</a>
                            @else
                                <button class="btn btn-danger">Jalur ini Sudah Tutup</button>
                            @endif
                            {{-- <button class="btn btn-primary">Mendaftar Sekarang</button> --}}
                        </div>
                    </section>
                    <!--Section: Share buttons-->


                    <!--Section: Comments-->
                    <section class="border-bottom mb-3">
                        <p class="text-center"><strong>Jalur Lainnya</strong></p>

                        <!-- Comment -->
                        @foreach ($all as $item)
                        <a href="{{route('post.welcome',$item->id)}}" class="text-decoration-none text-secondary">
                            <div class="row mb-4">
                                <div class="col-2">
                                    <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(24).jpg"
                                        class="img-fluid shadow-1-strong rounded" alt="" />
                                </div>
    
                                <div class="col-10">
                                    <p class="mb-2"><strong>{{$item->nama_jalur}}</strong></p>
                                    <p>
                                        {{$item->meta_description}}
                                    </p>
                                </div>
                            </div>
                        </a>
                        @endforeach
                        
                       
                    </section>
                    <!--Section: Comments-->

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-4 mb-4">
                    <!--Section: Sidebar-->
                    <section class="sticky-top" style="top: 80px;">
                        <!--Section: Ad-->
                        <section class="text-center border-bottom pb-4 mb-4">
                            <div class="bg-image hover-overlay ripple mb-4">
                                <img src="https://mdbootstrap.com/wp-content/themes/mdbootstrap4/content/en/_mdb5/standard/about/assets/mdb5-about.webp"
                                    class="img-fluid" />
                                <a href="https://mdbootstrap.com/docs/standard/" target="_blank">
                                    <div class="mask" style="background-color: rgba(57, 192, 237, 0.2);"></div>
                                </a>
                            </div>
                            <h5>Informasi Lebih Lanjut</h5>

                            <ul class="list-group">
                                <li class="mb-2 list-group-item">
                                    <a href="https://wa.me/6285161102525" class="text-decoration-none d-flex gap-3" target="blank"><i class="bi bi-whatsapp"></i> 085161102525</a>
                                </li>
                                <li class="mb-2 list-group-item">
                                    <a href="" class="text-decoration-none d-flex gap-3" target="blank"><i class="bi bi-whatsapp"></i> 085161102525</a>
                                </li>
                                <li class="mb-2 list-group-item">
                                    <a href="" class="text-decoration-none d-flex gap-3" target="blank"><i class="bi bi-whatsapp"></i> 085161102525</a>
                                </li>
                            </ul>
                            <a role="button" class="btn btn-primary" href="https://mdbootstrap.com/docs/standard/"
                                target="_blank">Download for free<i class="fas fa-download ms-2"></i></a>

                        </section>
                        <!--Section: Ad-->

                        <!--Section: Video-->
                        <section class="text-center">
                            <h5 class="mb-4">Learn the newest Bootstrap 5</h5>

                            <div class="embed-responsive embed-responsive-16by9 shadow-4-strong">
                                <iframe class="embed-responsive-item rounded"
                                    src="https://www.youtube.com/embed/c9B4TPnak1A" allowfullscreen></iframe>
                            </div>
                        </section>
                        <!--Section: Video-->
                    </section>
                    <!--Section: Sidebar-->
                </div>
                <!--Grid column-->
            </div>
            <!--Grid row-->
        </div>
    </main>
    <!--Main layout-->


    <section id="footer" class="py-5 bg-maroon" style="background: maroon">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <a href="/"class="link-body-emphasis text-decoration-none text-center">
                        <img src="{{ asset('images/logo.png') }}" alt=""
                            style="width: 50px;height:50px">
                        <div class="fs-2 fw-bold ms-3 mt-3 text-white">Pesantren Imam Syafi'i</div>
                    </a>
                </div>
                <div class="col-12 mt-4 text-center">
                    <p class="text-success">&copy; {{ date('Y') }}Hak Cipta Dilindungi.</p>
                    
                </div>
            </div>
        </div>
    </section>


    <script src="{{ asset('admin_kit/js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    <!-- MDB -->
    {{-- <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript" src="js/script.js"></script> --}}
</body>

</html>
