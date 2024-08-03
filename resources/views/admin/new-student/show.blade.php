@extends('layouts.psb')
@section('content')


<x-user-content>
    <div class="mb-3">
        <h1 class="h3 d-inline align-middle">{{$title}}</h1>
    </div>

    <div class="row">
        <div class="col-12">
            
            <div class="card px-4">
                <div class="card-header">
                   
                    
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-8 col-lg-8">
                            <h3 class="fw-bold text-secondary"> Identitas Calon Siswa</h3>
                            <hr class="mb-4">
                            <table class="table table-sm" id="">
                                                             
                                <tr>
                                    <th>Nama</th>
                                    <td><h4 class="fw-bold text-secondary">{{$data->nama}}</h4></td>
                                </tr>
                                <tr>
                                    <th>Nomor Pendaftaran</th>
                                    <td>{{$data->no_pendaftaran}}</td>
                                </tr>                             
                                <tr>
                                    <th>Jenjang</th>
                                    <td>{{$data->jenjang ? $data->jenjang->nama_jenjang :'' }}</td>
                                </tr>                             
                                <tr>
                                    <th>nisn</th>
                                    <td>{{$data->nisn}}</td>
                                </tr>                             
                                <tr>
                                    <th>Email</th>
                                    <td>{{$data->user->email}}</td>
                                </tr>                             
                                <tr>
                                    <th>Jalur Mendaftar</th>
                                    <td>{{$data->user->nama_jalur}}</td>
                                </tr>                             
                                <tr>
                                    <th>Biaya Pendaftaran</th>
                                    <td>{{number_format($data->user->biaya_pendaftaran, 0, ',', '.')}}</td>
                                </tr>
                                <tr>
                                    <th>Jalur Mendaftar</th>
                                    <td>{{$data->user->nama_jalur}}</td>
                                </tr>               
                                <tr>
                                    <th>Jenis Kelamin</th>
                                    <td>{{$data->jenis_kelamin}}</td>
                                </tr>               
                                <tr>
                                    <th>Tempat Lahir</th>
                                    <td>{{$data->tempat_lahir_siswa}}</td>
                                </tr>               
                                <tr>
                                    <th>Tanggal Lahir</th>
                                    <td>{{$data->tanggal_lahir_siswa}} | Usia : {{ $data->tanggal_lahir_siswa ? \Carbon\Carbon::parse($data->tanggal_lahir_siswa)->diffForHumans() : ''}}</td>
                                </tr>               
                                <tr>
                                    <th>Status Anak</th>
                                    <td>{{$data->status_anak}}</td>
                                </tr>               
                                <tr>
                                    <th>Alamat</th>
                                    <td>{{$data->alamat_siswa}}</td>
                                </tr>

                                {{-- break --}}

                                <tr>
                                    <td colspan="2"> <h3 class="fw-bold text-secondary mt-5"> Identitas Orang Tua</h3></td>
                                </tr>
                                {{-- Identitas Ayah --}}
                                <tr>
                                    <th>Nama Ayah</th>
                                    <td>{{$data->nama_ayah}}</td>
                                </tr>                             
                                <tr>
                                    <th>Pekerajaan Ayah</th>
                                    <td>{{$data->pekerjaan_ayah}}</td>
                                </tr>                             
                                <tr>
                                    <th>Nomor Hp Ayah</th>
                                    <td>{{$data->no_hp_ayah}}</td>
                                </tr>                             
                                <tr>
                                    <th>Nama Ibu</th>
                                    <td>{{$data->nama_ibu}}</td>
                                </tr>                             
                                <tr>
                                    <th>Pekerajaan Ibu</th>
                                    <td>{{$data->pekerjaan_ibu}}</td>
                                </tr>                             
                                <tr>
                                    <th>Nomor Hp Ibu</th>
                                    <td>{{$data->no_hp_ibu}}</td>
                                </tr>

                                {{-- break --}}
                                <tr>
                                    <td colspan="2"> <h3 class="fw-bold text-secondary mt-5"> Identitas Sekolah</h3></td>
                                </tr>
                                {{-- Identitas Sekolah --}}
                                <tr>
                                    <th>Nama Sekolah</th>
                                    <td>{{$data->sekolah_sebelumnya}}</td>
                                </tr>                             
                                <tr>
                                    <th>NPSN</th>
                                    <td>{{$data->npsn_sekolah_sebelumnya}}</td>
                                </tr>
                                                     
                            </table>
                            
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
                    <input type="hidden" name="approval" value="Ditolak">
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

@endsection
