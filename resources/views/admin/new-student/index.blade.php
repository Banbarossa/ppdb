@extends('layouts.psb')
@section('content')


<x-user-content>
    <div class="mb-3">
        <h1 class="h3 d-inline align-middle">{{$data['title']}}</h1>
    </div>

    <div class="row">
        <div class="col-12">
            
            <div class="card">
                <div class="card-header">
                   
                    
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 col-lg-4">
                            <form action="{{ route('admin.user-register.index') }}" method="get">
                                <div class="input-group mb-3">
                                    <input type="text" name="query" value="" class="form-control" placeholder="search...." aria-label="search...." aria-describedby="button-addon2">
                                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-sm" id="">
                            <thead class="table-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Nomor Pendaftraran</th>
                                    <th>Satus Pendaftaran</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            
                            <tbody id="itemList">
                                @if (count($data)>0)
                                    @foreach ($data as $key=>$item)
                                    <tr>
                                        <td>{{ ++$key}}</td>
                                        <td>{{ ucFirst($item->nama)}}</td>
                                        <td>{{ $item->no_pendaftaran}}</td>
                                        <td>
                                            @if ($item->user->level_pendaftaran == 4)
                                                <span class="text-success">Lengkap</span>
                                            @else                                              
                                                <span class="text-warning">Belum Lengkap</span>                                                
                                            @endif
                                        </td>
                                        
                                        <td><a href="{{route('admin.siswa-baru.show',$item->id)}}" class="btn btn-secondary">Detail</a></td>
                                    </tr>
                                    @endforeach
                                @else
                                <tr>
                                    <td colspan="6"><h5> Data Tidak ditemukan</h5></td>
                                </tr>
                                
                            </tbody>
                            @endif
                          
                        </table>

                        @if (count($data)>0)
                            {{$data->links()}}
                            
                        @endif
                    </div>
                    
                    <div class="flex justify-content-between">
                        

                    </div>
                </div>
            </div>
          
        </div>
    </div>

</x-user-content>

{{-- @push('script') --}}
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}

    
{{-- @endpush --}}

@endsection
