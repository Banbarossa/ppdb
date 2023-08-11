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
                                    <input type="text" name="query" value="{{$query}}" class="form-control" placeholder="search...." aria-label="search...." aria-describedby="button-addon2">
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
                                    <th>Email</th>
                                    <th>Jalur Pendaftaran</th>
                                    <th>Biaya Pendaftaran</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            
                            <tbody id="itemList">
                                @if (count($data['user'])>0)
                                    @foreach ($data['user'] as $key=>$item)
                                    <tr>
                                        <td>{{ ++$key}}</td>
                                        <td>{{ ucFirst($item->name)}}</td>
                                        <td>{{$item->email}}</td>
                                        <td>{{$item->nama_jalur}}</td>
                                        <td>Rp {{number_format($item->biaya_pendaftaran, 0, ',', '.')}}</td>
                                        <td>
                                            {{-- {{$item->approval}} --}}
                                            @if ($item->approval == 'approved')
                                                <span class="text-success"><i data-feather="check-circle" class="me-2"></i>{{$item->approval}}</span>
                                            @elseif ($item->approval == 'Pending')
                                                <span class="text-warning"><i data-feather="clock" class="me-2"></i>{{$item->approval}}</span>
                                            @else
                                                <span class="text-danger"><i data-feather="x-circle" class="me-2"></i>{{$item->approval}}</span>                                            
                                            @endif
                                        </td>
                                        <td><a href="{{route('admin.user-register.show',$item->id)}}" class="btn btn-secondary">Detail</a></td>
                                    </tr>
                                    @endforeach
                                @else
                                <tr>
                                    <td colspan="6"><h5> Data Tidak ditemukan</h5></td>
                                </tr>
                                
                            </tbody>
                            @endif
                          
                        </table>
                        {{$data['user']->links()}}
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
