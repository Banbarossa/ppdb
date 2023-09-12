@extends('layouts.guest-bootstrap')
@section('content')
<section id="hero" class="mt-5">
    <div class="container min-vh-100 d-flex">
        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="card">
                    <img src="{{asset('jalur/')}}/{{$data->image ?? 'default.png'}}" class="card-img-top" alt="">
                </div>
                <div class="card-body px-3">
                    <div class="mt-4 d-flex justify-content-end">
                        <div class="px-3">
                            <div class="d-flex">
                                <small class="text-muted me-3">Biaya Pendaftaran :</small>
                                <h4 class="card-title"><i data-feather="tag"></i> Rp 300.000</h3>
                            </div>
                            
                        </div>
                    </div>
                    <h5 class="card-title mt-3">
                        {{$data->nama_jalur}}
                    </h5>
                    <p>tanggal Pendaftran: <strong>{{ \Carbon\Carbon::parse($data->tanggal_mulai)->format('d M Y') }}</strong> sampai dengan <strong>{{ \Carbon\Carbon::parse($data->tanggal_akhir)->format('d M Y') }}</strong></p>
                    <div class="content-post mt-5">
                        {!!$data->deskripsi!!}
                    </div>
                    <div class="d-grid my-5">
                        @if($tanggalSekarang < $data->tanggal_mulai)
                            <button class="btn btn-warning">Belum dibuka</button>
                        @elseif ($tanggalSekarang >= $data->tanggal_mulai && $tanggalSekarang <=$data->tanggal_akhir)
                            <a href="{{ route('psb.register',['id'=>$data->id]) }}"
                                class="btn btn-success">Daftar Sekarang</a>
                        @else
                            <button class="btn btn-danger">Sudah Tutup</button>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="card mb-3">
                    <img src="{{asset('images/contact.jpg')}}" class="card-img-top" alt="">
                    <div class="card-title mt-3 text-center">
                        <h5 class="card-title"><i data-feather="phone" class="me-3"></i>Contact Panitia</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            @foreach ($phone as $item)
                                <li class="list-group-item">
                                    <a href="https://wa.me/{{$item->no_wa}}" class="me-4 text-decoration-none">+ {{$item->no_wa}}</a>{{$item->nama}}
                                </li>
                            @endforeach
                        </ul>
                        <hr>
                        <div class="card-title mt-3  text-center">
                            <h5 class="card-title"><i data-feather="cloud" class="me-3"></i>Media Sosial</h5>
                        </div>
                        <ul class="list-group list-group-flush">
                            @foreach ($media as $item)
                                <li class="list-group-item">{{$item->media}}
                                    <a href="{{$item->url}}" class="me-4 text-decoration-none"> : {{$item->alamat}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header">
                        <div class="card-title">
                            Jalur Lainnya
                        </div>
                    </div>
                    <div class="card-body">
                        @if (count($all)>=1)
                        <div class="row">
                            <div class="col-12">
                                <a href="{{route('post.welcome',$item->id)}}" class="d-flex text-decoration-none">
                                    <img src="{{asset('jalur/')}}/{{$item->image ?? 'default.png'}}" alt="" class="img-thumbnail">
                                    <ul>
                                        <li class="post-list fw-bold fs-5 text-maroon">{{$item->nama_jalur}}</li>
                                        <li class="post-list text-muted">{{$item->meta_description}}</li>
                                    </ul>
                                </a>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>
@endsection