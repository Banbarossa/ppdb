@extends('layouts.psb')
@section('content')


<x-user-content>
    {{-- <div class="mb-3">
        <h1 class="h3 d-inline align-middle">{{$data['title']}}</h1>
    </div> --}}

    <div class="row">
        <div class="col-12">
            
            <div class="card border border-4 border-secondary border-top-0 border-end-0 border-bottom-0">
                <div class="card-header bg-secondary-subtle">
                   <div class="card-title text-dark">
                       Detail Registrasi Santri Baru
                   </div>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-8 col-lg-5">
                            <table class="table table-sm table-borderless" id="">
                                <tr>
                                    <th>Nama</th>
                                    <td><h4 class="fw-bold">{{$data['user']->name}}</h4></td>
                                </tr>                             
                                <tr>
                                    <th>Email</th>
                                    <td>{{$data['user']->email}}</td>
                                </tr>                             
                                <tr>
                                    <th>Jalur Mendaftar</th>
                                    <td>{{$data['user']->nama_jalur}}</td>
                                </tr>                             
                                <tr>
                                    <th>Biaya Pendaftaran</th>
                                    <td>{{number_format($data['user']->biaya_pendaftaran, 0, ',', '.')}}</td>
                                </tr>               
                                <tr>
                                    <th>Jenjang</th>
                                    @foreach ($data['user']->newStudents as $newStudent)
                                    <td>{{$newStudent->jenjang->nama_jenjang}}</td>
                                    {{-- <p>Jenjang: {{ $newStudent->jenjang }}</p> --}}
                                    @endforeach
                                    
                                </tr>               
                                <tr>
                                    <th>Status Pendataran</th>
                                    <td>{{ucFirst($data['user']->approval)}}</td>
                                </tr>               
                                <tr>
                                    <th>Resi</th>
                                    <td><a href="/gambar/{{$data['user']->resi}}" target="blank">Lihat Gambar</a></td>
                                    
                                </tr>               
                            </table>
                            @if ($data['user']->approval == 'pending')
                                <div class="mt-3 d-flex gap-3">
                                    <form action="{{route('admin.user-register.update',$data['user']->id)}}" method="post">
                                        @method('patch')
                                        @csrf
                                        <input type="hidden" name="approval" value="approved">
                                        <input type="hidden" name="approval_note" value="terima">
                                        <button type="submit" value="approved" class="btn btn-success">Approve</button>
                                    </form>
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        Tolak
                                    </button>
                                </div>
                            @endif
                            
                        </div>
                    </div>
                    


                </div>
            </div>
          
        </div>
    </div>

    {{-- modal penolakan --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Penolakan Pendaftaran</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.user-register.update',$data['user']->id)}}" method="post">
                    @method('patch')
                    @csrf
                    <input type="hidden" name="approval" value="ditolak">
                    <div class="form-floating">
                        <textarea class="form-control @error('approval_note') is-invalid @enderror" name="approval_note" placeholder="Alasan Penolakan" id="floatingTextarea2" style="height: 100px"></textarea>
                        <label for="floatingTextarea2">Alasan Penolakan Pendaftaran</label>
                        @error('approval_note')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit"  class="btn btn-success">Tolak</button>
                    </div>
                </form>
            </div>
            {{-- <div class="modal-footer">
              
              <button type="button" class="btn btn-primary">Save changes</button>
            </div> --}}
          </div>
        </div>
      </div>

</x-user-content>

@push('script')

@if (count($errors) > 0)
    <script>
        $(document).ready(function() {
            $('#exampleModal').modal('show');
        });
    </script>
@endif


    
@endpush

@endsection
