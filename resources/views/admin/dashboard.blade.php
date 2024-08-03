@extends('layouts.psb')
@section('content')


<x-user-content>
    <div class="row">
        @foreach ($user as $status => $item)
        <div class="col-xl-3 col-md-6 mb-4" data-aos="fade-up">
            <div class="card border border-4 border-{{$item['color']}} border-bottom-0 border-top-0 border-end-0 shadow py-2 px-3">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2 d-flex justify-content-between">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                <div>
                                    <a href="{{$item['url']}}" class="text-decoration-none fw-bold text-{{$item['color']}} d-flex align-items-center fs-4">{{$status}}<i class="align-middle ms-3" data-feather="arrow-up-right"></i> </a>
                                </div>
                                <div>
                                    <div class="h1 mb-0 mr-3 fw-bolder text-{{$item['color']}}">{{$item['data']->count()}}</div>
                                </div>
                            </div>
                            <div class="row no-gutters align-items-center position-relative">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" width="30" height="30"><path d="M12,16a4,4,0,1,1,4-4A4,4,0,0,1,12,16Zm0-6a2,2,0,1,0,2,2A2,2,0,0,0,12,10Zm6,13A6,6,0,0,0,6,23a1,1,0,0,0,2,0,4,4,0,0,1,8,0,1,1,0,0,0,2,0ZM18,8a4,4,0,1,1,4-4A4,4,0,0,1,18,8Zm0-6a2,2,0,1,0,2,2A2,2,0,0,0,18,2Zm6,13a6.006,6.006,0,0,0-6-6,1,1,0,0,0,0,2,4,4,0,0,1,4,4,1,1,0,0,0,2,0ZM6,8a4,4,0,1,1,4-4A4,4,0,0,1,6,8ZM6,2A2,2,0,1,0,8,4,2,2,0,0,0,6,2ZM2,15a4,4,0,0,1,4-4A1,1,0,0,0,6,9a6.006,6.006,0,0,0-6,6,1,1,0,0,0,2,0Z"/></svg>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>

    <div class="row mt-5">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header bg-primary-subtle">
                    <h4 class="card-title">Pendaftar Terbaru</h4>
                </div>
                <div class="card-body">
                    <ol class="list-group list-group-numbered">
                        @foreach ($latestUser as $item)
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                            <div class="fw-bold">{{$item->name}}</div>
                            {{$item->nama_jalur}}
                            </div>
                            @if ($item->approval == 'approved')
                                <span class="badge bg-success rounded-pill">{{ucFirst($item->approval)}}</span>
                            @elseif ($item->approval == 'pending')
                                <span class="badge bg-warning rounded-pill">{{ucFirst($item->approval)}}</span>
                            @else
                                <span class="badge bg-danger rounded-pill">{{ucFirst($item->approval)}}</span>
                            @endif
                        </li>
                        @endforeach
                    </ol>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <img src="{{asset('images/contact.jpg')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><i class="bi bi-whatsapp me-3"></i>Contact panitia</h5>
                    <div>
                        <ul class="list-group list-group-flush">
                            @foreach ($phone as $item)
                                <li class="list-group-item"><a href="https://wa.me/{{$item->no_wa}}" class="me-4">+ {{$item->no_wa}}</a>{{$item->nama}} </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>




</x-user-content>


@endsection
