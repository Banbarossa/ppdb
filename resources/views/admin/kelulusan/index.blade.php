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
                   <strong class="text-danger">Pastikan  siswa sudah mengisi data dengan lengkap agar bisa diluluskan</strong>
                    
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <form action="{{route('admin.kelulusan.luluskan')}}" method="post">
                            @csrf
                            <input type="hidden" name="selectedData" id="selectedDataInput" value="">
                            <button type="submit"  class="btn btn-success" id="send-selected">Luluskan semua</button>
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-sm" id="myTable">
                            <thead class="table-dark">
                                <tr>
                                    <th><input type="checkbox" class="form-check-input" id="check-all"></th>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Nomor Pendaftraran</th>
                                    <th>Jenjang</th>
                                    <th>Satus Pendaftaran</th>
                                    <th>Kelulusan</th>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script src="{{asset('dataTables/dataTable.js')}}"></script>
<script>
    $(document).ready(function(){
        $('#myTable').DataTable({

            responsive: true,
            processing:true,
            serverSide:true,
            ajax:"{{URL::current()}}",
            columns:[
                { data: 'select', name: 'select',orderable:false, sortable:false},
                { data: 'DT_RowIndex', name: 'DT_RowIndex',orderable:false, sortable:false},
                {
                    data:'nama',
                    name:'nama',
                    render: function(data) {
                        return data.charAt(0).toUpperCase() + data.slice(1);
                    }
                },
                {data:'no_pendaftaran',name:'no_pendaftaran'},
                {data:'jenjang',name:'jenjang'},
                {
                    data:'status',
                    name:'status',
                    render: function(data){
                        if(data >= 4){
                            return "<span class='text-success'>Lengkap</span>";
                        }else{
                            return "<span class='text-warning'>Belum Lengkap</span>";
                        }
                    }
                },
                {
                    data:'kelulusan',
                    name:'kelulusan',
                    render:function(data){
                        if(data == null){
                            return "Belum Diluluskan"
                        }else if(data == 1 ){
                            return 'Lulus'
                        }else{
                            "Tidak Lulus"
                        }
                    }
                },
                {data:'action',name:'action',sortable:false},
            ]
        });

        $('#check-all').change(function () {
            if ($(this).is(':checked')) {
                $('.checkbox').prop('checked', true);
            } else {
                $('.checkbox').prop('checked', false);
            }
        });


        // $('body').on('click','#send-selected', function(){
        //     var selectedData = [];
        //     $('.checkbox:checked').each(function () {
        //         selectedData.push($(this).val());
        //     });

        //     $.ajax({
        //         url:"{{route('admin.kelulusan.luluskan')}}",
        //         type:'post',
        //         data:{
        //             _token:"{{ csrf_token() }}",
        //             selectedData:selectedData
        //         },
        //         success: function (response) {
        //             console.log(response);
        //         },
        //         error: function (error) {
        //             console.error(error);
        //         },
        //     })
        // })


        $('#send-selected').click(function () {
            var selectedData = [];

            $('.checkbox:checked').each(function () {
                selectedData.push($(this).val());
            });
            $('#selectedDataInput').val(JSON.stringify(selectedData));

        

        });

        
    })
    
</script>


    
@endpush

@endsection
