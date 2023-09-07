@extends('layouts.psb')
@section('content')


<x-user-content>
    <div class="mb-3">
        <h1 class="h3 d-inline align-middle">{{$title}}</h1>
    </div>

    <div class="row">
        <div class="col-12">
            
            <div class="card py-3 px-4">
                <div class="card-header d-flex justify-content-end">
                    <a href="{{route('admin.tahun.create')}}" class="btn btn-success">Tambah Data tahun</a>
                    
                </div>
                <div class="card-body">
                    <div class="row d-flex justify-content-between">
                        <div class="col-md-6 col-lg-4">

                        </div>
                        <div class="col text-end">
                            
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-sm" id="tahunTable">
                            <thead class="table-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Tahun</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            

                          
                        </table>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
<script>
    $(document).ready(function(){
        $('#tahun').mask("9999/9999");

        $('#tahunTable').DataTable({
            responsive:true,
            processing :true,
            serverSide :true,
            ajax :"{{route('admin.tahun.index')}}",
            columns:[
                {data:'DT_RowIndex',name:'DT_RowIndex'},
                {data:'tahun',name:'tahun'},
                {
                    data:'status',
                    name:'status',
                    render:function(data){
                        if(data == 'aktif'){
                            return "<span class='text-success'>Aktif</span>";
                        }else{
                            return "<span class='text-danger'>Tidak Aktif</span>";
                        }
                    },
                },
                {data:'action',name:'action'},
            ],
        });
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
