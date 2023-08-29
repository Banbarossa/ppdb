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
                    <div class="row">
                        <div class="col d-flex justify-content-between">
                            <h5 class="text-muted">{{$title}}</h5>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Tambah Data
                            </button>
                        </div>
                    </div>
                    
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm" id="jenjangTable">
                            <thead class="table-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Tahun</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            

                          
                        </table>

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
          <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Jenjang</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{route('admin.jenjang.store')}}" method="post">
            @csrf
            <div class="form-group mb-3">
                <label class="form-label" for="nama_jenjang">Nama Jenjang</label>
                <input type="text" class="form-control form-control-lg @error('nama_jenjang') is-invalid @enderror" name="nama_jenjang" id="nama_jenjang" value="{{old('nama_jenjang')}}"/>
                <x-input-error :messages="$errors->get('nama_jenjang')" class="mt-2"/>
            </div>
            <div>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah Data</button>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>




@push('style')
    <link rel="stylesheet" href="{{asset('dataTables/dataTable.css')}}">
@endpush
@push('script')
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script> --}}
    <script src="{{asset('dataTables/dataTable.js')}}"></script>
    <script>
        $(document).ready(function(){
            $('#jenjangTable').DataTable({
                processing:true,
                serverSide:true,
                ajax:"{{route('admin.jenjang.index')}}",
                columns:[
                    {data:'DT_RowIndex',name:'DT_RowIndex', sortable:false,orderable:false},
                    {data:'nama_jenjang',name:'nama_jenjang'},
                    {data:'action',name:'action',sortable:false,orderable:false}
                ]
            });

            
        })
        
    </script>

@endpush

@endsection
