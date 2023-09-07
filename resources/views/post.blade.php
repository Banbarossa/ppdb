<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>{{ config('app.name', 'PPDB | PIS') }}</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
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
            <h1 class="mb-0 h3 fw-bold text-maroon">Jalur Pendaftaran: {{$data->nama_jalur}}</h1>
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
                        <img src="{{asset('jalur/')}}/{{$data->image ?? 'default.png'}}"
                            class="img-fluid shadow-2-strong rounded mb-4" alt="" />

                        <div class="row align-items-center mb-4">
                            <div class="col-lg-7 text-center text-lg-start mb-3 m-lg-0">
                                <img src="{{asset('images/logo.png')}}"
                                    class="rounded shadow-1-strong me-2" height="35" alt="" loading="lazy" />
                                <span>
                                    Waktu Pendafataran <strong>{{ \Carbon\Carbon::parse($data->tanggal_mulai)->format('d M Y') }}
                                    s/d
                                    {{ \Carbon\Carbon::parse($data->tanggal_akhir)->format('d M Y') }}</strong>
                                </span>
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
                                    <img src="{{asset('jalur/')}}/{{$item->image ?? 'default.png'}}"
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
                    <section class="sticky-top shadow-lg" style="top: 80px;">
                        <!--Section: Ad-->
                        <section class=" border-bottom pb-4 mb-4">
                            <div class="bg-image hover-overlay ripple mb-4">
                                <img src="{{asset('images/contact.jpg')}}"
                                    class="img-fluid" />
                            </div>
                            <h5 class="card-title"><i class="bi bi-whatsapp me-3"></i>Contact Us</h5>
                            <div>
                                <ul class="list-group list-group-flush">
                                    @foreach ($phone as $item)
                                        <li class="list-group-item"><a href="https://wa.me/{{$item->no_wa}}" class="me-4">+ {{$item->no_wa}}</a>{{$item->nama}} </li>
                                    @endforeach
                                    
                                </ul>
                            </div>


                            <h5 class="card-title mt-4"><i class="bi bi-whatsapp me-3"></i>Email dan Media Sosial</h5>
                            <div>
                                <ul class="list-group list-group-flush">
                                    @foreach ($media as $item)
                                        <li class="list-group-item">
                                            <a href="{{$item->url}}" class="me-4">{{$item->media}} : {{$item->alamat}}</a>
                                        </li>
                                    @endforeach
                                    
                                </ul>
                            </div>
                          

                        </section>
                        <!--Section: Ad-->


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
</body>

</html>
