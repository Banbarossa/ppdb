@extends('layouts.psb')
@section('content')


<x-user-content>
    <div class="mb-3">
        <h1 class="h3 d-inline align-middle">{{$title}}</h1>
    </div>

    <div class="row">
        <div class="col-12">
            
            <div class="card px-4 py-3">
                <div class="card-header">
                   
                    <div class="d-flex justify-content-between">
                        <a href="{{route('admin.admin-management.create')}}" class=" btn btn-success">Tambah Admin</a>
                    </div>
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-sm" id="tableUser">
                            <thead class="table-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
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
        $('#tableUser').DataTable({
            processing:true,
            serverSide:true,
            ajax:"{{route('admin.admin-management.index')}}",
            columns:[
                {data:'DT_RowIndex',name:'DT_RowIndex', sortable:false,orderable:false},
                {
                    data:'name',
                    name:'name',
                    render: function(data) {
                        return data.charAt(0).toUpperCase() + data.slice(1);
                    }
                },
                {data:'email',name:'email'},
                {data:'action',name:'action',sortable:false,orderable:false},
            ]
        });
    })
</script>
@endpush

@endsection
