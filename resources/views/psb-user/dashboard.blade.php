@extends('layouts.psb')
@section('content')
@push('style')
    <style>
       

        .stepper-container {
            width: 90%;
            max-width: 40rem;
            height: 10rem;
            background: #fff;
            border-radius: 0.6rem;
            display: flex;
            align-items: center;
            justify-content: space-evenly;
        }

        .step {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1rem;
            color: #000;
        }

        .status {
            width: 2.5rem;
            height: 2.5rem;
            border-radius: 50%;
            border: 0.1rem solid #820518;
        }

        .complete {
            /* dari status */
            width: 2.5rem;
            height: 2.5rem;
            border-radius: 50%;
            border: 0.1rem solid #026219;

            /* source */
            background: #026219;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.6em;
            font-weight: 700;
            color: #fff;
        }

        .text-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            gap: 0.4rem;
        }

        .title {
            font-size: 1.3em;
            font-weight: 700;
        }

        .subtitle {
            font-size: 1em;
        }

        .separator {
            width: 8rem;
            height: 0.2rem;
            background: #000;
            border: 0.1rem solid #1e658f;
            border-radius: 0.6rem;
        }

        .container {
            width: 90%;
            max-width: 40rem;
            height: 20rem;
            background: #fff;
            border-radius: 0.6rem;
            display: flex;
            align-items: center;
            justify-content: space-evenly;
        }
        a{
            text-decoration: none;
            color: #000;
        }
        a:hover{
            text-decoration: none;
        }



    </style>
@endpush

<x-user-content>

    @php
        $status=[
        1=>[
            'nama'=>'Pendaftaran Akun',
            'url'=>'psb/dashboard',
            'color'=>'primary',
            ],
        2=>[
            'nama'=>'Data Siswa',
            'url'=>'/psb/profile',
            'color'=>'success',
            ],
        3=>[
            'nama'=>'Data Orang Tua',
            'url'=>'/psb/wali',
            'color'=>'info',
            ],
        4=>[
            'nama'=>'Data Sekolah',
            'url'=>'/psb/sekolah',
            'color'=>'warning',
            ],
        ]
    @endphp


    <div class="row">
        @foreach ($status as $key=> $item)
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border border-4 border-{{$item['color']}} border-bottom-0 border-top-0 border-end-0 shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1"><a href="{{$item['url']}}" class="text-decoration-none fw-bold">{{$item['nama']}}</a>
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$key <= auth()->user()->level_pendaftaran ?'100%':'0%'}}</div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-{{$item['color']}}" role="progressbar"
                                            style="{{$key <= auth()->user()->level_pendaftaran ?'width : 100%':'width:0%'}}" aria-valuenow="50" aria-valuemin="0"
                                            aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="row mt-5">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Informasi Pendaftaran</h4>
                </div>
                <div class="card-body">
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cupiditate consequatur nostrum ipsam magni quod deserunt ratione aspernatur laboriosam corrupti expedita.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="fw-bold text-muted">Nomor Ujian Santri</h4>                    
                </div>
                <div class="card-body">
                    <div>
                        <ul>
                            <li>Nama: <span class="fw-bold">{{ucFirst($data->nama)}}</span></li>
                            <li>No Pendaftaran: {{$data->no_pendaftaran}}</li>
                        </ul>
                    </div>                    
                </div>
                <div class="card-footer">
                    @if (auth()->user()->level_pendaftaran == 4)
                        <a href="{{route('psb.kartuujian.index')}}" class="btn btn-secondary">Unduh Kartu Ujian</a>                        
                    @endif
                </div>
            </div>
        </div>

    </div>


</x-user-content>


@push('script')

@endpush
@endsection
