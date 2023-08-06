@extends('layouts.psb')
@section('content')
@push('style')
    <style>
       
       * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Roboto", sans-serif;
            widht: 100vw;
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 1rem;
            justify-content: center;
            background: #458cb5;
        }

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
            ],
        2=>[
            'nama'=>'Data Siswa',
            'url'=>'/psb/profile',
            ],
        3=>[
            'nama'=>'Data Orang Tua',
            'url'=>'/psb/wali',
            ],
        4=>[
            'nama'=>'Data Sekolah',
            'url'=>'/psb/sekolah',
            ],
        ]
    @endphp
    <div class="row">
        <div class="stepper-container">
            @foreach ($status as $key=> $item)
            <a href="{{$item['url']}}" class="text-decoration-none">
                <div class="step">
                    <div class="status d-flex align-items-center justify-content-center {{$key <= auth()->user()->level_pendaftaran ?'complete':''}}">
                        @if ($key <= auth()->user()->level_pendaftaran)
                            <i class="align-middle" data-feather="check"></i>
                        @else
                            <i class="align-middle" data-feather="x"></i>
                        @endif
                        
                    </div>
                    <div class="text-container">
                        <span class="title">Step {{$key}}</span>
                        <span class="subtitle">{{$item['nama']}}</span>
                    </div>
                </div>
            </a>
            @endforeach             
        </div>
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
    </div>


</x-user-content>


@push('script')

@endpush
@endsection
