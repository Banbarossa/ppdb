@extends('layouts.psb')
@section('content')


<x-user-content>
    <div class="mb-3">
        <h1 class="h2 d-inline align-middle">{{$title}}</h1>
    </div>
    <div class="row justify-content-start">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title">Ho Wa Panitia PSB</h4>
                    <a href="{{route('admin.contact-wa.create')}}" class="btn btn-secondary">Tambah No Wa</a>
                </div>
                <div class="card-body">
                    <table class="table" id="PhoneTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>nama</th>
                                <th>No Wa</th>         
                                <th>Action</th>         
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
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

            responsive: true,
            processing:true,
            serverSide:true,
            ajax:"{{route('admin.contact-wa.index')}}",
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
    })
</script>

    
@endpush


@endsection