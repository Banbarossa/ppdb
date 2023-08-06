@extends('layouts.psb')
@section('content')

{{-- Jurusan yang dituju --}}
{{-- asal Sekolah --}}
{{-- npsn seklah asal --}}

<x-user-content>
    <form action="{{route('psb.profile.store')}}" method="POST">
        @csrf
        <div class="mb-3">
            <h1 class="h3 d-inline align-middle">Identitas Orang Tua Siswa</h1>
        </div>
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Lengkapi Data Siswa</h5>
                    </div>
                    <div class="card-body">

                        {{-- aktifkan --}}
                        <input type="hidden" name="id" value="{{$data['siswa']->id}}">
                        <div class="form-group mb-3">
                            <label class="form-label" for="nama">Nama Siswa</label>
                            <input type="text" class="form-control form-control-lg @error('nama') is-invalid @enderror" name="nama" id="nama" value="{{ ucfirst($data['siswa']->nama) }}" disabled />
                            <x-input-error :messages="$errors->get('nama')" class="mt-2"/>
                        </div>

                        {{-- aktifkan --}}
                        <div class="form-group mb-3">
                            <label class="form-label" for="nisn">NISN</label>
                            <input type="text" class="form-control form-control-lg @error('nisn') is-invalid @enderror" name="nisn" id="nisn" value="{{old('nisn') ?? $data['siswa']->nisn }}" placeholder="Masukkan NISN Siswa" />
                            <x-input-error :messages="$errors->get('nisn')" class="mt-2"/>
                        </div>

                        {{-- aktifkan --}}
                        <div class="form-group mb-3">
                            <label class="form-label" for="jenis_kelamin">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-select @error('jenis_kelamin') is-invalid @enderror">
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="Laki-Laki" {{$data['siswa']->jenis_kelamin == 'Laki-Laki'?'selected':''}}>Laki-Laki</option>
                                <option value="Perempuan" {{$data['siswa']->jenis_kelamin == 'Perempuan'?'selected':''}}>Perempuan</option>
                            </select>
                            <x-input-error :messages="$errors->get('jenis_kelamin')" class="mt-2"/>
                        </div>

                        {{-- aktifkan --}}
                        <div class="form-group mb-3">
                            <label class="form-label" for="tempat_lahir_siswa">Tempat Lahir</label>
                            <input type="text" class="form-control form-control-lg @error('tempat_lahir_siswa') is-invalid @enderror" name="tempat_lahir_siswa" id="tempat_lahir_siswa" value="{{ old('tempat_lahir_siswa') ?? $data['siswa']->tempat_lahir_siswa }}" placeholder="Tempat lahir siswa" />
                            <x-input-error :messages="$errors->get('tempat_lahir_siswa')" class="mt-2"/>
                        </div>

                        {{-- aktifkan --}}
                        <div class="form-group mb-3">
                            <label class="form-label" for="tanggal_lahir_siswa">Tanggal Lahir</label>
                            <input type="date" class="form-control form-control-lg @error('tanggal_lahir_siswa') is-invalid @enderror" name="tanggal_lahir_siswa" id="tanggal_lahir_siswa" value="{{ old('tanggal_lahir_siswa') ?? $data['siswa']->tanggal_lahir_siswa }}" placeholder="Tanggal lahir siswa" />
                            <x-input-error :messages="$errors->get('tanggal_lahir_siswa')" class="mt-2"/>
                        </div>

                        {{-- <div class="form-group mb-3">
                            <label class="form-label" for="agama">Agama</label>
                            <select name="agama" id="agama" class="form-select @error('agama') is-invalid @enderror">
                                <option value="">Pilih Agama</option>
                                @foreach ($data['agama'] as $item)
                                    <option value="{{$item}}" {{$data['siswa']->agama == $item ?'selected':''}}>{{$item}}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('agama')" class="mt-2"/>

                        </div> --}}

                        {{-- <div class="form-group mb-3">
                            <label class="form-label" for="nik_siswa">Nomor Induk Kependudukan</label>
                            <input type="text" class="form-control form-control-lg @error('nik_siswa') is-invalid @enderror" name="nik_siswa" id="nik_siswa" value="{{ old('nik_siswa') ?? $data['siswa']->nik_siswa }}" placeholder="Nomor Induk Kependudukan" @unless($data['siswa']->nik) data-mask="9999999999999999" @endunless />
                            <x-input-error :messages="$errors->get('nik_siswa')" class="mt-2"/>
                        </div> --}}

                        {{-- <div class="form-group mb-3">
                            <label class="form-label" for="no_akte">Nomor Akte Kelahiran</label>
                            <input type="text" class="form-control form-control-lg @error('no_akte') is-invalid @enderror" name="no_akte" id="no_akte" value="{{ old('no_akte') ?? $data['siswa']->no_akte }}" placeholder="Nomor Akte Kelahiran" />
                            <x-input-error :messages="$errors->get('no_akte')" class="mt-2"/>
                        </div> --}}

                        {{-- <div class="form-group mb-3">
                            <label class="form-label" for="cita_cita">Cita-cita</label>
                            <input type="text" class="form-control form-control-lg @error('cita_cita') is-invalid @enderror" name="cita_cita" id="cita_cita" value="{{ old('cita_cita') ?? $data['siswa']->cita_cita }}" placeholder="cita_cita" />
                            <x-input-error :messages="$errors->get('cita_cita')" class="mt-2"/>
                        </div> --}}

                        {{-- <div class="form-group mb-3">
                            <label class="form-label" for="hobi">Hobi</label>
                            <input type="text" class="form-control form-control-lg @error('hobi') is-invalid @enderror" name="hobi" id="hobi" value="{{ old('hobi') ?? $data['siswa']->hobi }}" placeholder="Hobi" />
                            <x-input-error :messages="$errors->get('hobi')" class="mt-2"/>
                        </div> --}}

                       

                    </div>
                </div>
            </div>


            {{-- right --}}

            <div class="col-12 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Data Siswa</h5>
                    </div>
                    <div class="card-body">

                        {{-- <div class="form-group mb-3">
                            <label class="form-label" for="tinggi_badan">Tinggi Badan <span class="text-danger ms-2">(CM)</span></label>
                            <input type="number" class="form-control form-control-lg @error('tinggi_badan') is-invalid @enderror" name="tinggi_badan" id="tinggi_badan" value="{{ old('tinggi_badan') ?? $data['siswa']->tinggi_badan }}" placeholder="Tinggi Badan" />
                            <x-input-error :messages="$errors->get('tinggi_badan')" class="mt-2"/>
                        </div> --}}

                        {{-- <div class="form-group mb-3">
                            <label class="form-label" for="berat_badan">Berat Badan <span class="text-danger ms-2">(KG)</span></label>
                            <input type="number" class="form-control form-control-lg @error('berat_badan') is-invalid @enderror" name="berat_badan" id="berat_badan" value="{{ old('berat_badan') ?? $data['siswa']->berat_badan }}" placeholder="Berat Badan" />
                            <x-input-error :messages="$errors->get('berat_badan')" class="mt-2"/>
                        </div> --}}

                        {{-- <div class="form-group mb-3">
                            <label class="form-label" for="gol_darah">Golongan Darah</label>
                            <select name="gol_darah" id="gol_darah" class="form-select @error('gol_darah') is-invalid @enderror">
                                <option value="">Pilih Golongan Darah</option>
                                @foreach ($data['golongan_darah'] as $item)
                                    <option value="{{$item}}" {{$data['siswa']->gol_darah == $item ?'selected':''}}>{{$item}}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('gol_darah')" class="mt-2"/>
                        </div> --}}
                        
                        {{-- <div class="form-group mb-3">
                            <label class="form-label" for="anak_ke">Anak Ke</label>
                            <input type="number" class="form-control form-control-lg @error('anak_ke') is-invalid @enderror" name="anak_ke" id="anak_ke" value="{{ old('anak_ke') ?? $data['siswa']->anak_ke }}" placeholder="Anak Ke" />
                            <x-input-error :messages="$errors->get('anak_ke')" class="mt-2"/>
                        </div> --}}

                        {{-- <div class="form-group mb-3">
                            <label class="form-label" for="jumlah_saudara">Jumlah Saudara</label>
                            <input type="number" class="form-control form-control-lg @error('jumlah_saudara') is-invalid @enderror" name="jumlah_saudara" id="jumlah_saudara" value="{{ old('jumlah_saudara') ?? $data['siswa']->jumlah_saudara }}" placeholder="Jumlah Saudara" />
                            <x-input-error :messages="$errors->get('jumlah_saudara')" class="mt-2"/>
                        </div> --}}

                        

                        {{-- <div class="form-group mb-3">
                            @php
                                $hubungan_keluarga =[
                                    'Anak Kandung',
                                    'Anak Tiri',
                                    'Anak Angkat',
                                ]
                            @endphp
                            <label class="form-label" for="hubungan_keluarga">Hubungan keluarga</label>
                            <select name="hubungan_keluarga" id="hubungan_keluarga" class="form-select @error('hubungan_keluarga') is-invalid @enderror">
                                <option value="">Pilih Hubungan keluarga</option>
                                @foreach ($hubungan_keluarga as $item)
                                    <option value="{{$item}}" {{$data['siswa']->hubungan_keluarga == $item ?'selected':''}}>{{$item}}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('hubungan_keluarga')" class="mt-2"/>
                        </div> --}}

                        {{-- aktifkan --}}
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

                        {{-- aktifkan --}}
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

            </div>
        </div>

    </form>
</x-user-content>

@push('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Tambahkan plugin jQuery Masked Input -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>

<script>


    $(document).ready(function(){
         @unless($data['siswa']->nik)
            $('#nik_siswa').mask('9999999999999999'); // Pola format 16 digit angka
        @endunless
    })

    const formElements= $('.form-control,.form-select');
    const submitButton =$('#submitButton');
    const editButton =$('#editButton');

    editButton.click(function(){
        enableFormElements();
        editButton.hide();
    })


    function disableFormElements(){
        formElements.attr('disabled','disabled');
        submitButton.hide();
    }

    function enableFormElements(){
        formElements.removeAttr('disabled')
        submitButton.show()
        editButton.hide();
    }

    const isDisable = {{auth()->user()->level_pendaftaran >= 2 ? 'true':'false'}}
    if(isDisable){
        disableFormElements();
    }else{
        enableFormElements();

    }





</script>
    
@endpush

@endsection
