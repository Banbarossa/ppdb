@extends('layouts.psb')
@section('content')


<x-user-content>
    <div class="mb-3">
        <h1 class="h3 d-inline align-middle">{{$title}}</h1>
    </div>

    <div class="row">
        <div class="col-12">
            
            <div class="card">
                <div class="card-header">
                   
                    
                </div>
                <div class="card-body">
                    <div class="row d-flex justify-content-between">
                        <div class="col-md-6 col-lg-4">
                            <form action="{{ route('admin.tahun.index') }}" method="get">
                                <div class="input-group mb-3">
                                    <input type="text" name="query" value="{{$query}}" class="form-control" placeholder="search...." aria-label="search...." aria-describedby="button-addon2">
                                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
                                </div>
                            </form>
                        </div>
                        <div class="col text-end">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Tambah Data
                              </button>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-sm" id="">
                            <thead class="table-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Tahun</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            
                            <tbody id="itemList">
                                @if (count($data)>0)
                                    @foreach ($data as $key=>$item)
                                    <tr>
                                        <td>{{ ++$key}}</td>
                                        <td>{{ ucFirst($item->tahun)}}</td>
                                        <td>{{ ucFirst($item->status)}}</td>
                                        <td>
                                            @if ($item->status =="tidak aktif")
                                            <form action="{{route('admin.tahun.update',$item->id)}}" method="post">
                                                @method('patch')
                                                @csrf
                                                <button type="submit" class="btn btn-secondary" onclick="return confirm('Apakah yakin merubah data?')">Aktifkan</button>
                                            </form>
                                            @endif
                                            
                                        </td>
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

{{-- Modal --}}
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Tahun</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{route('admin.tahun.store')}}" method="post">
            @csrf
            <div class="form-group mb-3">
                <label class="form-label" for="tahun">Tahun</label>
                <input type="text" class="form-control form-control-lg @error('tahun') is-invalid @enderror" name="tahun" id="tahun" value="{{old('tahun')}}"/>
                <x-input-error :messages="$errors->get('tahun')" class="mt-2"/>
            </div>
            <div>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah Data</button>
            </div>
          </form>
        </div>
        {{-- <div class="modal-footer">
          
        </div> --}}
      </div>
    </div>
</div>


@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
<script>
    $(document).ready(function(){
        $('#tahun').mask("9999/9999");
    })
</script>
@if (count($errors)>0)
    <script>
        $(document).ready(function(){
            $('#exampleModal').modal('show');
        })
    </script>
@endif
@endpush

@endsection
