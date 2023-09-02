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

                    <div class="table-responsive">
                        <table class="table table-sm" id="tableUser">
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
            ajax:"{{route('admin.user-register.index')}}",
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
                {data:'nama_jalur',name:'nama_jalur'},
                {data:'biaya_pendaftaran',name:'biaya_pendaftaran'},
                {
                    data:'approval',
                    name:'approval',
                    render:function($data){
                        if($data == 'approved'){
                            return '<span class="text-success"><i data-feather="check-circle" class="me-2"></i>Approved</span>'
                        }else if($data == 'pending'){
                            return '<span class="text-warning"><i data-feather="clock" class="me-2"></i>Pending</span>'
                        }else{
                            return '<span class="text-danger"><i data-feather="x-circle" class="me-2"></i>Ditolak</span>'
                        }
                    }
                },
                {data:'action',name:'action',sortable:false,orderable:false},
            ]
        });
    })
</script>
@endpush

@endsection
