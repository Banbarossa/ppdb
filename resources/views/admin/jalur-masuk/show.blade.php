@extends('layouts.psb')
@section('content')


<x-user-content>
    <div class="mb-3">
        <h1 class="h2 d-inline align-middle">{{$title_halaman}}</h1>
    </div>
    <div class="row justify-content-start">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h2 class="text-primary fs-2 fw-bold">{{ $item->nama_jalur }}</h2>
                    <div >
                        <p>{{ \Carbon\Carbon::parse($item->tanggal_mulai)->format('d M Y') }}
                            s/d
                            {{ \Carbon\Carbon::parse($item->tanggal_akhir)->format('d M Y') }}
                        </p>
                    </div>
                    <hr>
                    <div class="mt-5">
                        <h2 class="card-title">Meta Deskripsi</h2>
                        <div>{{$item->meta_description}}</div>
                        
                    </div>
                    <hr>
                    <div class="mt-5">
                        <h2 class="card-title">Deskripsi</h2>
                        <div>{!!$item->deskripsi!!}</div>
                        
                    </div>

                    <div class="mt-3 d-flex gap-4">
                        <a href="{{route('admin.jalur-pendaftaran.edit',$item->id) }}" class="btn btn-warning px-4">Edit Data</a>
                        <form action="{{route('admin.jalur-pendaftaran.destroy',$item->id)}}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Hapus Data</button>

                        </form>

                    </div>


                </div>
            </div>
        </div>
    </div>


    

   

</x-user-content>

@endsection
