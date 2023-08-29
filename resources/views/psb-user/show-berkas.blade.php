@extends('layouts.psb')
@section('content')


<x-user-content>

    <div class="mb-3">
        <h1 class="h3 d-inline align-middle">Upload Berkas</h1>
    </div>


    <div class="row">
        <div class="col-12 col-lg-8">
            <div class="card">
                <div class="card-title"></div>
                <div class="card-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>1</th>
                                <th>Kartu Keluarga</th>
                                <td><a href="{{route('psb.berkas',$data->berkasPsb->kk)}}" class="text-decoration-none">lihat</a></td>
                            </tr>
                            <tr>
                                <th>2</th>
                                <th>Akte Kelahiran</th>
                                <td><a href="{{route('psb.berkas',$data->berkasPsb->akte_lahir)}}" class="text-decoration-none">lihat</a></td>
                            </tr>
                            <tr>
                                <th>3</th>
                                <th>KTP Wali</th>
                                <td><a href="{{route('psb.berkas',$data->berkasPsb->ktp_wali)}}" class="text-decoration-none">lihat</a></td>
                            </tr>
                            <tr>
                                <th>4</th>
                                <th>Surat Aktif Sekolah</th>
                                <td><a href="{{route('psb.berkas',$data->berkasPsb->surat_aktif_sekolah)}}" class="text-decoration-none">lihat</a></td>
                            </tr>

                            
                            @if ($data->status_anak == "Yatim")
                                <tr>
                                    <th>5</th>
                                    <th>Surat Kematian Ayah</th>
                                    <td><a href="{{$data->berkasPsb->surat_kematian_ayah ? route('psb.berkas',$data->berkasPsb->surat_kematian_ayah) :'#'}}" class="text-decoration-none">lihat</a></td>
                                </tr>
                                <tr>
                                    <th>6</th>
                                    <th>Akte Kematian Ayah</th>
                                    <td><a href="{{$data->berkasPsb->akte_kematian_ayah ? route('psb.berkas',$data->berkasPsb->akte_kematian_ayah) :'#'}}" class="text-decoration-none">lihat</a></td>

                                </tr>
                            @endif
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


</x-user-content>




@endsection
