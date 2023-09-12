@extends('layouts.guest-bootstrap')
@section('content')
<section id="hero">
    <div class="container min-vh-100 d-flex">
        <div class="row">
            <div class="col-lg-5 d-flex d-lg-none align-items-center my-5">
                <div>
                    <img src="{{asset('images/child.png')}}" class="img-fluid rounded-top animated-image" alt="">

                </div>
            </div>
            <div class="col-lg-7 d-flex align-items-center my-5">
                <div class="hero-desc">
                    <h2>Penerimaan Santri Baru <span class="badge bg-success fw-thin">{{$tahun->tahun}}</span></h5>
                        <h1>Pesantren Imam Syafi'i</h1>
                        <h3>Adab, Intelek dan Skill
                    </h2>
                    <div class="mt-4">
                        <a href="#jalur-pendaftaran" class="btn btn-success btn-lg rounded-pill px-5 me-3">Daftar Sekarang</a>
                        <a href="https://pis.sch.id" class="btn btn-outline-success btn-lg rounded-pill px-4">About Ust</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 d-none d-lg-flex align-items-center mb-3">
                <div>
                    <img src="{{asset('images/child.png')}}" class="img-fluid rounded-top animated-image" alt="">

                </div>
            </div>
        </div>

    </div>
</section>
<section id="jalur-pendaftaran" class="bg-body-secondary">
    <div class="container py-4">
        <div class="section-title">
            Jalur Pendaftaran
        </div>
        <div class="row mt-4 bg-">
            @foreach ($model as $item)
            <div class="col-12 col-md-6 col-lg-4 mb-4">
                <div class="card">
                    <div class="card-header">
                        <div><small>Jalur Pendaftran</small></div>
                        <h4 class="card-title">{{ $item->nama_jalur }}</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Tanggal : {{ \Carbon\Carbon::parse($item->tanggal_mulai)->format('d M Y') }} {{ \Carbon\Carbon::parse($item->tanggal_akhir)->format('d M Y') }}</li>

                        </ul>
                        <hr>
                        <div>
                            <p class="fst-italic text-muted p-3 ">
                                {!!$item->meta_description!!}
                            </p>
                        </div>
                        <hr>
                        <div class="px-3 d-flex justify-content-between">
                            <small class="text-muted">Biaya</small>
                            <h4 class="card-title"><i data-feather="tag"></i> Rp {{ number_format($item->biaya_pendaftaran,0,',','.') }}</h3>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        @php
                            $tanggalSekarang = now()->format('Y-m-d');
                        @endphp

                        @if($tanggalSekarang < $item->tanggal_mulai)
                            <button class="btn btn-sm btn-warning rounded-pill">Belum dibuka</button>
                        @elseif ($tanggalSekarang >= $item->tanggal_mulai && $tanggalSekarang <=$item->tanggal_akhir)
                            <a href="{{ route('psb.register',['id'=>$item->id]) }}" class="btn btn-sm btn-success rounded-pill">Daftar Sekarang</a>
                        @else
                            <button class="btn btn-sm btn-danger rounded-pill">Sudah Tutup</button>
                        @endif

                            <a href="{{route('post.welcome',$item->id)}}" class="btn btn-sm btn-outline-success rounded-pill">Selengkapnya</a>
                    </div>
                </div>
            </div>
            @endforeach



        </div>
    </div>

</section>
<section id="Lokasi">
    <div class="container py-4">
        <div class="section-title">
            Lokasi dan Contact Person
        </div>
        <div class="row mt-4 bg-">
            <div class="col-12 col-md-7 col-lg-8 mb-4">
                <div class="card">
                    <div class="card-header">
                        <div><small><i data-feather="map-pin" class="fs-6"></i>Lokasi</small></div>
                        <h4 class="card-title">Alamat Pesantren Imam Syafi'i</h4>
                    </div>
                    <div class="card-body">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d697.8647656716953!2d95.3863461236344!3d5.4633641105763955!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e1!3m2!1sen!2sid!4v1694416475385!5m2!1sen!2sid"
                            width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-5 col-lg-4 mb-4">
                <div class="card">
                    <img src="{{asset('images/contact.jpg')}}" class="card-img-top" alt="">
                    <div class="card-title mt-3 text-center">
                        <h5 class="card-title"><i data-feather="phone" class="me-3"></i>Contact Panitia</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            @foreach ($phone as $item)
                                <li class="list-group-item"><a href="https://wa.me/{{$item->no_wa}}" class="me-4 text-decoration-none">+ {{$item->no_wa}}</a>{{$item->nama}}</li>
                            @endforeach
                        </ul>
                        <hr>
                        <div class="card-title mt-3  text-center">
                            <h5 class="card-title"><i data-feather="cloud" class="me-3"></i>Media Sosial</h5>
                        </div>
                        <ul class="list-group list-group-flush">
                            @foreach ($media as $item)
                                <li class="list-group-item"> {{$item->media}}
                                    <a href="{{$item->url}}" class="me-4 text-decoration-none">: {{$item->alamat}}</a>
                                </li>
                                
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>

</section>

@endsection

 