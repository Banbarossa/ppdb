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


    <div class="row">
        <div class="col">
            <div class="card border border-4 border-warning border-bottom-0 border-top-0 border-end-0">
                <div class="card-body">
                    <img src="{{asset('images/welcome.jpg')}}" class="img-fluid" alt="">

                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-lg-8">
            <div class="card border border-4 border-primary border-top-0 border-end-0 border-bottom-0 px-4">
                <div class="card-header">
                    <h4 class="card-title">Informasi Pendaftaran</h4>
                </div>
                <div class="card-body">
                    @if (auth()->user()->level_pendaftaran < 4)
                        @include('psb-user.notif-dashboard.level-2')
                    @endif
                    @if (auth()->user()->level_pendaftaran == 4)
                        @include('psb-user.notif-dashboard.level-4')
                    @endif
                    @if (auth()->user()->level_pendaftaran == 5)
                        @include('psb-user.notif-dashboard.level-5')
                    @endif
                    @if (auth()->user()->level_pendaftaran == 6)
                        @include('psb-user.notif-dashboard.level-6')
                    @endif
                    @if (auth()->user()->level_pendaftaran == 7)
                        @include('psb-user.notif-dashboard.level-7')
                    @endif
                </div>
            </div>
        </div>
        <div class="col-lg-4">

            <div class="card">
                <img src="{{asset('images/psb.png')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Kartu Siswa</h5>
                    <ul>
                        <li>Nama: <span class="fw-bold">{{ucFirst($data->nama)}}</span></li>
                        <li>No Pendaftaran: {{$data->no_pendaftaran}}</li>
                        <li>No Pendaftaran: {{$data->jenjang->nama_jenjang}}</li>
                    </ul>
                    @if (auth()->user()->level_pendaftaran >= 4)
                        <a href="{{route('psb.kartuujian.index')}}" class="btn btn-success">Unduh Kartu Ujian</a>
                    @elseif (auth()->user()->level_pendaftaran < 4)  
                        <p class="card-text">Silahkan mengisi pendaftaran secara lengkap untuk mengunduh kartu ujian.</p>
                    @endif
                </div>
            </div>
            <div class="card">
                <img src="{{asset('images/contact.jpg')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">contact Us</h5>
                    <ul>
                        
                    </ul>
                    @if (auth()->user()->level_pendaftaran >= 4)
                        <a href="{{route('psb.kartuujian.index')}}" class="btn btn-success">Unduh Kartu Ujian</a>
                    @elseif (auth()->user()->level_pendaftaran < 4)  
                        <p class="card-text">Silahkan mengisi pendaftaran secara lengkap untuk mengunduh kartu ujian.</p>
                    @endif
                </div>
            </div>



           
        </div>

    </div>


</x-user-content>


@push('script')

@endpush
@endsection
