@extends('layouts.psb')
@section('content')


<x-user-content>
    <div class="mb-3">
        <h1 class="h3 d-inline align-middle">{{$title}}</h1>
    </div>

    <div class="row">
        <div class="col-12">
            
            <div class="card py-3 px-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col d-flex justify-content-between">
                            <h5 class="text-muted">{{$title}}</h5>
                            <a href="{{route('admin.jenjang.create')}}" class="btn btn-success">Tambah Data</a>
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





@push('style')
    <link rel="stylesheet" href="{{asset('dataTables/dataTable.css')}}">
@endpush
@push('script')
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
