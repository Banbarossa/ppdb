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
                        <table class="table table-sm" id="myTable">
                            <thead class="table-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Nomor Pendaftraran</th>
                                    <th>Satus Pendaftaran</th>
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
        $('#myTable').DataTable({

            responsive: true,
            processing:true,
            serverSide:true,
            ajax:"{{route('admin.siswa-baru.index')}}",
            columns:[
                { data: 'DT_RowIndex', name: 'DT_RowIndex',orderable:false, sortable:false},
                {
                    data:'nama',
                    name:'nama',
                    render: function(data) {
                        return data.charAt(0).toUpperCase() + data.slice(1);
                    }
                },
                {data:'no_pendaftaran',name:'no_pendaftaran'},
                {
                    data:'status',
                    name:'status',
                    render: function(data){
                        if(data == 4){
                            return "<span class='text-success'>Lengkap</span>";
                        }else{
                            return "<span class='text-warning'>Belum Lengkap</span>";
                        }
                    }
                },
                {data:'action',name:'action',sortable:false},
                
            ]
        });
    })
</script>

    
@endpush

@endsection
