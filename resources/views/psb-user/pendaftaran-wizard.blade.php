@extends('layouts.psb')
@section('content')

<x-user-content>
    <form action="{{route('psb.profile.store')}}" method="POST">
        @csrf
        <div class="mb-3">
            <h1 class="h3 d-inline align-middle">Identitas Orang Tua Siswa</h1>
        </div>
        <div class="row">
            <div class="col-12 col-lg-6">
                @livewire('counter')
                <livewire:daftar-wizard/>
            </div>


            {{-- right --}}

            {{-- <div class="col-12 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Data Siswa</h5>
                    </div>
                    <div class="card-body">



                        aktifkan
                        <div class="form-group mb-3">
                            @php
                                $status_anak =[
                                    'Non yatim',
                                    'Yatim',
                                    'Piatu',
                                ]
                            @endphp
                            <label class="form-label" for="status_anak">Status Dalam Keluarga</label>
                            <select name="status_anak" id="status_anak" class="form-select @error('status_anak') is-invalid @enderror">
                                <option value="">Pilih Status</option>
                                @foreach ($status_anak as $item)
                                    <option value="{{$item}}" {{$data['siswa']->status_anak == $item ?'selected':''}}>{{$item}}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('status_anak')" class="mt-2"/>
                        </div>

                        aktifkan
                        <div class="form-group mb-3">
                            <label class="form-label" for="alamat_siswa">Alamat Lengkap Siswa</label>
                            <textarea name="alamat_siswa" class="form-control @error('alamat_siswa') is-invalid @enderror" rows="3" placeholder="Alamat Siswa">{{ old('alamat_siswa') ?? $data['siswa']->alamat_siswa }}</textarea>
                            <x-input-error :messages="$errors->get('alamat_siswa')" class="mt-2"/>
                        </div>

                        


                        <div class="form-group mt-3s">
                            <button type="submit" id="submitButton" class="btn btn-secondary px-4">Submit</button>
                            <button type="button" class="btn btn-warning" id="editButton">Edit Data</button>
                        </div>
                    </div>
                </div>

            </div> --}}
        </div>

    </form>
</x-user-content>
@endsection
