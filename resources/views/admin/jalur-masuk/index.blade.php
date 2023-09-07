@extends('layouts.psb')
@section('content')


<x-user-content>
    <div class="mb-3 d-flex justify-content-between">
        <h1 class="h3 d-inline align-middle">{{$title}}</h1>
        <a href="{{route('admin.jalur-pendaftaran.create')}}" class="btn btn-primary">Tambah baru</a>
    </div>

    <div class="row">
        @foreach($data as $item)
        {{-- <div class="col-12 col-md-4 col-lg-4">
            <div class="card">
                <img src="{{asset('jalur/')}}/{{$item->image}}" class="card-img-top img-fluid" alt="..." style="height: 250px">
                <div class="card-body">
                    <h5 class="card-title">{{ $item->nama_jalur }}</h5>
                    <div class="card-text mb-4">
                            {!!$item->meta_description!!}
                    </div>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div> --}}
        


        <div class="col-12 col-md-4">
            <div class="card shadow-md pb-4">
                <img src="{{asset('jalur/')}}/{{$item->image ?? 'default.png'}}" class="card-img-top" alt="{{$item->name}}">
                
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

                    <div style="height:90px" class="overflow-y-auto">
                        <p class="card-text">{!!$item->meta_description!!}</p>
                    </div>
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Biaya Pendaftaran</td>
                                <th>{{ number_format($item->biaya_pendaftaran,0,',','.') }}</th>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <th>{{$item->status?'Aktif':'Tidak Aktif'}}</th>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <button class="btn {{$item->status?'btn-danger':'btn-primary'}}">{{$item->status?'Non Aktifkan':'Aktifkan'}}</button>
                    <a href="{{route('admin.jalur-pendaftaran.show',$item->id)}}" class="btn btn-success">View</a>
                </div>
            </div>
        </div>
    @endforeach

    </div>

</x-user-content>

@endsection
