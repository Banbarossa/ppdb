<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="img/icons/icon-48x48.png" />

    <link rel="canonical" href="https://demo-basic.adminkit.io/pages-blank.html" />

    <title>{{ config('app.name', 'PPDB | PIS') }}</title>

    <link href="{{ asset('admin_kit/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('admin_kit/css/mystyle.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    @vite(['resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    @livewireStyles
</head>

<body>
    {{-- navbar --}}
    @include('layouts.guest_navbar')
    {{-- navbar --}}
    {{-- hero section --}}
    <section class="hero-section min-vh-100">
        <div class="container text-center">
            <img src="{{ asset('images/santri.png') }}" alt="" style="height:300px"
                class="animated-image img-fluid">
            <div class="text-center mt-5">
                <h3 class="fs-1 text-muted fw-light">Penerimaan Santri Baru tahun <span
                        class="fw-bold text-maroon">2023-2024</span></h3>
                <h4 class="h4"> Silahkan melakukan pendaftaran melalui jalur dibawah ini</h4>
            </div>
        </div>
    </section>
    {{-- hero section  end --}}

    @php
        $tanggalSekarang = now()->format('Y-m-d');
    @endphp

    <section class="py-5 bg-pustaka" id="jalur-pendaftaran">
        <div class="container">
            <h2 class="section-title text-center" data-aos="fade-up">Jalur Pendaftaran</h2>
            <div class="row">
                @foreach($model as $item)
                    <div class="col-12 col-lg-4 col-md-6">
                        <div class="card px-3 shadow-md pb-4" style="height: 400px" data-aos="fade-up-right">
                            <div class="card-header border-bottom pt-4 bg-tertiary">
                                <div class="d-flex gap-2 align-items-centers">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                                        class="bi bi-calendar-week" viewBox="0 0 16 16">
                                        <path
                                            d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-5 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z" />
                                        <path
                                            d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                                    </svg>
                                    <h5 class=" text-maroon fw-bold">{{ $item->nama_jalur }}</h5>
                                </div>
                                <p>{{ \Carbon\Carbon::parse($item->tanggal_mulai)->format('d M Y') }}
                                    s/d
                                    {{ \Carbon\Carbon::parse($item->tanggal_akhir)->format('d M Y') }}
                                </p>
                            </div>
                            <div class="card-body">
                                <div style="height:80px" class="overflow-y-auto mt-4">
                                    <p class="card-text">{!!$item->meta_description!!}</p>

                                </div>
                                <p class="mt-4 text-muted">Biaya Pendaftaran : <span class="fw-bold text-primary">Rp
                                        {{ number_format($item->biaya_pendaftaran,0,',','.') }}</span>
                                </p>

                            </div>
                            <div class="card-footer">
                                @if($tanggalSekarang < $item->tanggal_mulai)
                                    <button class="btn btn-warning">Jalur ini belum dibuka</button>
                                @elseif ($tanggalSekarang >= $item->tanggal_mulai && $tanggalSekarang <=$item->tanggal_akhir)
                                    <a href="{{ route('psb.register',['id'=>$item->id]) }}"
                                        class="btn btn-success">Daftar Sekarang</a>
                                @else
                                    <button class="btn btn-danger">Jalur ini Sudah Tutup</button>
                                @endif

                                <a href="{{route('post.welcome',$item->id)}}" class="btn btn-secondary">Lihat Detail</a>

                            </div>
                        </div>
                    </div>
                @endforeach



            </div>
        </div>
    </section>


    <section class="py-5" id="lokasi">
        <div class="container">
            <div class="row">
                <h2 class="section-title text-center" data-aos="fade-up">lokasi dan Informasi</h2>
                <div class="col-md-7 col-lg-8">
                    <div class="card" data-aos="fade-up-right">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3971.6904485480445!2d95.38395287432213!3d5.463853594515772!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x304038af7beb88bb%3A0xe7a57b4ea7017ba1!2sPesantren%20Imam%20Syafi&#39;i!5e0!3m2!1sid!2sid!4v1691197783004!5m2!1sid!2sid"
                            width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>

                    </div>
                </div>

                <div class="col-md-5 col-lg-4">
                    <div class="card" data-aos="fade-left">
                        <img src="{{asset('images/contact.jpg')}}" class="card-img-top" alt="contact">
                        <div class="card-body">
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
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
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
                    <p class="text-warning">&copy; {{ date('Y') }} Hak Cipta Dilindungi.</p>
                    
                </div>
            </div>
        </div>
    </section>


    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="{{ asset('admin_kit/js/app.js') }}"></script>
    <script src="{{asset('jquery/jquery.min.js')}}"></script>
</body>

</html>
