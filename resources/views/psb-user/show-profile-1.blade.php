@extends('layouts.psb')
@section('content')


<x-user-content>


    <div class="row">
        <div class="col-12">
            
            <div class="card border border-4 border-primary border-top-0 border-end-0 border-bottom-0">
                <div class="card-header">
                   
                </div>
                <div class="card-body px-5">

                    <div class="row">
                        <div class="col-md-8 col-lg-8">
                            <div class="py-2 px-4 text-primary border border-4 border-primary border-top-0 border-end-0 border-bottom-0 rounded-2 fw-bold mb-4">
                                <i class="fa-regular fa-user me-3"></i>Profil Santri
                            </div>
                            {{-- <hr class="mb-4"> --}}
                            <table class="table table-sm table-borderless" id="">
                                                             
                                <tr>
                                    <th>Nama</th>
                                    <td class="fw-bold">{{$data->nama}}</td>
                                </tr>
                                <tr>
                                    <th>Nomor Pendaftaran</th>
                                    <td>{{$data->no_pendaftaran}}</td>
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
                                    <td>{{$data->tanggal_lahir_siswa}} | Usia : {{\Carbon\Carbon::parse($data->tanggal_lahir_siswa)->diffForHumans()}}</td>
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
                                    <td colspan="2"> <h5 class="fw-bold text-secondary mt-5 text-primary"> Identitas Orang Tua</h5></td>
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
                                    <td colspan="2"> <h5 class="fw-bold text-secondary mt-5 text-primary"> Data Sekolah sebelumnya</h5></td>
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

                <div class="card-footer px-5">
                    <div>
                        <a href="{{route('psb.profile.edit',$data->id)}}" class="btn btn-primary px-5">Edit Data</a>
                    </div>
                </div>
            </div>
          
        </div>
    </div>


</x-user-content>

@endsection
