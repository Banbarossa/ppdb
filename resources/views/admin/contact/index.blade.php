@extends('layouts.psb')
@section('content')


<x-user-content>
    <div class="mb-3">
        <h1 class="h2 d-inline align-middle">{{$title}}</h1>
    </div>
    <div class="row justify-content-start">
        <div class="col-lg-12">
            <div class="card px-4">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title">Nomor Wa Panitia</h4>
                    <a href="{{route('admin.phone.create')}}" class="btn btn-success">Tambah No Wa</a>
                </div>
                <div class="card-body">
                    <table class="table table-sm table-stripped" id="PhoneTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>No Wa</th>         
                                <th>Action</th>         
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            
        </div>


        <div class="col-lg-12">
            <div class="card px-4">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title">Email dan Media Sosial</h4>
                    <a href="{{route('admin.contact.create')}}" class="btn btn-success">Tambah Contact</a>
                </div>
                <div class="card-body">
                    <table class="table table-sm" id="mediaTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Media</th>
                                <th>Alamat</th>         
                                <th>url</th>         
                                <th>Action</th>         
                            </tr>
                        </thead>
                    </table>
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
        $('#PhoneTable').DataTable({

            // responsive: true,
            processing:true,
            serverSide:true,
            ajax:"{{route('admin.get-wa')}}",
            columns:[
                { data: 'DT_RowIndex', name: 'DT_RowIndex',orderable:false, sortable:false},
                {
                    data:'nama',
                    name:'nama',
                    render: function(data) {
                        return data.charAt(0).toUpperCase() + data.slice(1);
                    }
                },
            
                {data:'no_wa',name:'no_wa',sortable:false},
                {data:'action',name:'action',sortable:false},
                
            ]
        });

        $('#mediaTable').DataTable({
            processing:true,
            serverSide:true,
            ajax:"{{route('admin.get-media')}}",
            columns:[
                {data:'DT_RowIndex',name:'DT_RowIndex', orderable:false, sortable:false},
                {data:'media',name:'media'},
                {data:'alamat',name:'alamat'},
                {data:'url',name:'url'},
                {data:'action',name:'action'},
            ]
        })
    })
</script>

    
@endpush


@endsection