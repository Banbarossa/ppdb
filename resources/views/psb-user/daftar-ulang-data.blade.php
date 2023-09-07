@extends('layouts.psb')
@section('content')

{{-- Jurusan yang dituju --}}
{{-- asal Sekolah --}}
{{-- npsn seklah asal --}}

<x-user-content>
    <form action="{{route('psb.daftar-ulang.storeData')}}" method="POST">
        @csrf
        <div class="mb-3">
            <h1 class="h3 d-inline align-middle">Identitas Siswa</h1>
            <strong class="text-danger">Isikan Data Dengan benar, kesalahan pengisian tidak dapat diperbaiki</strong>
        </div>
        <div class="row">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $item)
                        <li>{{$item}}</li>
                    @endforeach
                </ul>
            </div>              
            @endif
            <div class="col-12 col-lg-6">

                {{-- Data Anak --}}
                <div class="card border border-4 border-top-0 border-end-0 border-bottom-0 border-primary">
                    <div class="card-header">
                        <h5 class="card-title mb-0 text-primary">Lengkapi Data Siswa</h5>
                    </div>
                    <div class="card-body">

                        {{-- aktifkan --}}
                        <input type="hidden" name="id" value="{{$data['siswa']->id}}">
                        <div class="form-group mb-3">
                            <label class="form-label" for="nama">Nama Siswa</label>
                            <input type="text" class="form-control form-control-lg @error('nama') is-invalid @enderror" name="nama" id="nama" value="{{ ucfirst($data['siswa']->nama) }}" disabled />
                            <x-input-error :messages="$errors->get('nama')" class="mt-2"/>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label" for="agama">Agama</label>
                            <select name="agama" id="agama" class="form-select @error('agama') is-invalid @enderror">
                                <option value="">Pilih Agama</option>
                                @foreach ($data['agama'] as $item)
                                    <option value="{{$item}}" {{$data['siswa']->agama == $item ?'selected':''}}>{{$item}}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('agama')" class="mt-2"/>

                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label" for="nik">Nomor Kartu Keluarga</label>
                            <input type="text" class="form-control form-control-lg @error('nik') is-invalid @enderror" name="nik" id="nik" value="{{ old('nik') ?? $data['siswa']->nik }}" placeholder="Nomor Induk Kependudukan" @unless($data['siswa']->nik) data-mask="9999999999999999" @endunless />
                            <x-input-error :messages="$errors->get('nik')" class="mt-2"/>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="nik_siswa">Nomor Induk Kependudukan</label>
                            <input type="text" class="form-control form-control-lg @error('nik_siswa') is-invalid @enderror" name="nik_siswa" id="nik_siswa" value="{{ old('nik_siswa') ?? $data['siswa']->nik_siswa }}" placeholder="Nomor Induk Kependudukan" @unless($data['siswa']->nik) data-mask="9999999999999999" @endunless />
                            <x-input-error :messages="$errors->get('nik_siswa')" class="mt-2"/>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label" for="no_akte">Nomor Akte Kelahiran</label>
                            <input type="text" class="form-control form-control-lg @error('no_akte') is-invalid @enderror" name="no_akte" id="no_akte" value="{{ old('no_akte') ?? $data['siswa']->no_akte }}" placeholder="Nomor Akte Kelahiran" />
                            <x-input-error :messages="$errors->get('no_akte')" class="mt-2"/>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label" for="cita_cita">Cita-cita</label>
                            <input type="text" class="form-control form-control-lg @error('cita_cita') is-invalid @enderror" name="cita_cita" id="cita_cita" value="{{ old('cita_cita') ?? $data['siswa']->cita_cita }}" placeholder="cita_cita" />
                            <x-input-error :messages="$errors->get('cita_cita')" class="mt-2"/>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label" for="hobi">Hobi</label>
                            <input type="text" class="form-control form-control-lg @error('hobi') is-invalid @enderror" name="hobi" id="hobi" value="{{ old('hobi') ?? $data['siswa']->hobi }}" placeholder="Hobi" />
                            <x-input-error :messages="$errors->get('hobi')" class="mt-2"/>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label" for="tinggi_badan">Tinggi Badan <span class="text-danger ms-2">(CM)</span></label>
                            <input type="number" class="form-control form-control-lg @error('tinggi_badan') is-invalid @enderror" name="tinggi_badan" id="tinggi_badan" value="{{ old('tinggi_badan') ?? $data['siswa']->tinggi_badan }}" placeholder="Tinggi Badan" />
                            <x-input-error :messages="$errors->get('tinggi_badan')" class="mt-2"/>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label" for="berat_badan">Berat Badan <span class="text-danger ms-2">(KG)</span></label>
                            <input type="number" class="form-control form-control-lg @error('berat_badan') is-invalid @enderror" name="berat_badan" id="berat_badan" value="{{ old('berat_badan') ?? $data['siswa']->berat_badan }}" placeholder="Berat Badan" />
                            <x-input-error :messages="$errors->get('berat_badan')" class="mt-2"/>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label" for="gol_darah">Golongan Darah</label>
                            <select name="gol_darah" id="gol_darah" class="form-select @error('gol_darah') is-invalid @enderror">
                                <option value="">Pilih Golongan Darah</option>
                                @foreach ($data['golongan_darah'] as $item)
                                    <option value="{{$item}}" {{$data['siswa']->gol_darah == $item ?'selected':''}}>{{$item}}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('gol_darah')" class="mt-2"/>
                        </div>
                        
                        <div class="form-group mb-3">
                            <label class="form-label" for="anak_ke">Anak Ke</label>
                            <input type="number" class="form-control form-control-lg @error('anak_ke') is-invalid @enderror" name="anak_ke" id="anak_ke" value="{{ old('anak_ke') ?? $data['siswa']->anak_ke }}" placeholder="Anak Ke" />
                            <x-input-error :messages="$errors->get('anak_ke')" class="mt-2"/>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label" for="jumlah_saudara">Jumlah Saudara</label>
                            <input type="number" class="form-control form-control-lg @error('jumlah_saudara') is-invalid @enderror" name="jumlah_saudara" id="jumlah_saudara" value="{{ old('jumlah_saudara') ?? $data['siswa']->jumlah_saudara }}" placeholder="Jumlah Saudara" />
                            <x-input-error :messages="$errors->get('jumlah_saudara')" class="mt-2"/>
                        </div>

                        <div class="form-group mb-3">
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
                        </div>

                    </div>
                </div>


                {{-- Data Ayah --}}
                <div class="card border border-4 border-top-0 border-end-0 border-bottom-0 border-success">
                    <div class="card-header">
                        <h5 class="card-title mb-0 text-success">Data Ayah</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label class="form-label" for="nama_ayah">Nama Ayah</label>
                            <input type="text" class="form-control form-control-lg @error('nama_ayah') is-invalid @enderror" name="nama_ayah" id="nama_ayah" value="{{ old('nama_ayah') ?? $data['siswa']->nama_ayah }}" placeholder="Nomor Induk Kependudukan" disabled/>
                            <x-input-error :messages="$errors->get('nama_ayah')" class="mt-2"/>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="nik_ayah">NIK Ayah</label>
                            <input type="text" class="form-control form-control-lg @error('nik_ayah') is-invalid @enderror" name="nik_ayah" id="nik_ayah" value="{{ old('nik_ayah') ?? $data['siswa']->nik_ayah }}" placeholder="Nomor Induk Kependudukan" @unless($data['siswa']->nik_ayah) data-mask="9999999999999999" @endunless />
                            <x-input-error :messages="$errors->get('nik_ayah')" class="mt-2"/>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="tempat_lahir_ayah">Tempat Lahir</label>
                            <input type="text" class="form-control form-control-lg @error('tempat_lahir_ayah') is-invalid @enderror" name="tempat_lahir_ayah" id="tempat_lahir_ayah" value="{{ old('tempat_lahir_ayah') ?? $data['siswa']->tempat_lahir_ayah }}" placeholder="Tempat lahir"/>
                            <x-input-error :messages="$errors->get('tempat_lahir_ayah')" class="mt-2"/>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="tanggal_lahir_ayah">Tanggal Lahir</label>
                            <input type="date" class="form-control form-control-lg @error('tanggal_lahir_ayah') is-invalid @enderror" name="tanggal_lahir_ayah" id="tanggal_lahir_ayah" value="{{ old('tanggal_lahir_ayah') ?? $data['siswa']->tanggal_lahir_ayah }}" placeholder="Tanggal Lahir" />
                            <x-input-error :messages="$errors->get('tanggal_lahir_ayah')" class="mt-2"/>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="status_ayah">Status</label>
                            <select name="status_ayah" id="status_ayah" class="form-select @error('status_ayah') is-invalid @enderror">

                                @php
                                    $data['status_ayah'] =[
                                        'Masih Hidup',
                                        'Sudah Meninggal'
                                    ]
                                @endphp
                                <option value="">Pilih Status</option>
                                @foreach ($data['status_ayah'] as $item)
                                    <option value="{{$item}}" {{$data['siswa']->status_ayah == $item ?'selected':''}}>{{$item}}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('status_ayah')" class="mt-2"/>

                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label" for="pendidikan_ayah">Pendidikan</label>
                            <input type="text" class="form-control form-control-lg @error('pendidikan_ayah') is-invalid @enderror" name="pendidikan_ayah" id="pendidikan_ayah" value="{{ old('pendidikan_ayah') ?? $data['siswa']->pendidikan_ayah }}" placeholder="Pendidikan"/>
                            <x-input-error :messages="$errors->get('pendidikan_ayah')" class="mt-2"/>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="penghasilan_ayah">Penghasilan Ayah</label>
                            <input type="text" class="form-control form-control-lg @error('penghasilan_ayah') is-invalid @enderror" name="penghasilan_ayah" id="penghasilan_ayah" value="{{ old('penghasilan_ayah') ?? $data['siswa']->penghasilan_ayah }}" placeholder="Penghasilan Ayah"/>
                            <x-input-error :messages="$errors->get('penghasilan_ayah')" class="mt-2"/>
                        </div>


                    
                    </div>
                </div>



            </div>


            {{-- right --}}

            <div class="col-12 col-lg-6">
                <div class="card border border-4 border-top-0 border-end-0 border-bottom-0 border-info">
                    <div class="card-header">
                        <h5 class="card-title mb-0 text-info">Data Ibu</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label class="form-label" for="nama_ibu">Nama ibu</label>
                            <input type="text" class="form-control form-control-lg @error('nama_ibu') is-invalid @enderror" name="nama_ibu" id="nama_ibu" value="{{ old('nama_ibu') ?? $data['siswa']->nama_ibu }}" placeholder="Nomor Induk Kependudukan" disabled/>
                            <x-input-error :messages="$errors->get('nama_ibu')" class="mt-2"/>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="nik_ibu">NIK ibu</label>
                            <input type="text" class="form-control form-control-lg @error('nik_ibu') is-invalid @enderror" name="nik_ibu" id="nik_ibu" value="{{ old('nik_ibu') ?? $data['siswa']->nik_ibu }}" placeholder="Nomor Induk Kependudukan" @unless($data['siswa']->nik_ibu) data-mask="9999999999999999" @endunless />
                            <x-input-error :messages="$errors->get('nik_ibu')" class="mt-2"/>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="tempat_lahir_ibu">Tempat Lahir</label>
                            <input type="text" class="form-control form-control-lg @error('tempat_lahir_ibu') is-invalid @enderror" name="tempat_lahir_ibu" id="tempat_lahir_ibu" value="{{ old('tempat_lahir_ibu') ?? $data['siswa']->tempat_lahir_ibu }}" placeholder="Tempat lahir"/>
                            <x-input-error :messages="$errors->get('tempat_lahir_ibu')" class="mt-2"/>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="tanggal_lahir_ibu">Tanggal Lahir</label>
                            <input type="date" class="form-control form-control-lg @error('tanggal_lahir_ibu') is-invalid @enderror" name="tanggal_lahir_ibu" id="tanggal_lahir_ibu" value="{{ old('tanggal_lahir_ibu') ?? $data['siswa']->tanggal_lahir_ibu }}" placeholder="Tanggal Lahir" />
                            <x-input-error :messages="$errors->get('tanggal_lahir_ibu')" class="mt-2"/>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="status_ibu">Status</label>
                            <select name="status_ibu" id="status_ibu" class="form-select @error('status_ibu') is-invalid @enderror">

                                @php
                                    $data['status_ibu'] =[
                                        'Masih Hidup',
                                        'Sudah Meninggal'
                                    ]
                                @endphp
                                <option value="">Pilih Status</option>
                                @foreach ($data['status_ibu'] as $item)
                                    <option value="{{$item}}" {{$data['siswa']->status_ibu == $item ?'selected':''}}>{{$item}}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('status_ibu')" class="mt-2"/>

                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label" for="pendidikan_ibu">Pendidikan</label>
                            <input type="text" class="form-control form-control-lg @error('pendidikan_ibu') is-invalid @enderror" name="pendidikan_ibu" id="pendidikan_ibu" value="{{ old('pendidikan_ibu') ?? $data['siswa']->pendidikan_ibu }}" placeholder="Pendidikan"/>
                            <x-input-error :messages="$errors->get('pendidikan_ibu')" class="mt-2"/>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="penghasilan_ibu">Penghasilan ibu</label>
                            <input type="text" class="form-control form-control-lg @error('penghasilan_ibu') is-invalid @enderror" name="penghasilan_ibu" id="penghasilan_ibu" value="{{ old('penghasilan_ibu') ?? $data['siswa']->penghasilan_ibu }}" placeholder="Penghasilan ibu"/>
                            <x-input-error :messages="$errors->get('penghasilan_ibu')" class="mt-2"/>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="alamat_orang_tua">Alamat Orang Tua</label>
                            <textarea name="alamat_orang_tua" class="form-control @error('alamat_orang_tua') is-invalid @enderror" rows="3" placeholder="Alamat Orang Tua">{{ old('alamat_orang_tua') ?? $data['siswa']->alamat_orang_tua }}</textarea>
                            <x-input-error :messages="$errors->get('alamat_orang_tua')" class="mt-2"/>
                        </div>

                    </div>
                </div>


                <div class="card border border-4 border-top-0 border-end-0 border-bottom-0 border-warning">
                    <div class="card-header">
                        <h5 class="card-title mb-0 text-warning">Data Wali</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label class="form-label" for="nama_wali">Nama Wali</label>
                            <input type="text" class="form-control form-control-lg @error('nama_wali') is-invalid @enderror" name="nama_wali" id="nama_wali" value="{{ old('nama_wali') ?? $data['siswa']->nama_wali }}" placeholder="Nomor Induk Kependudukan" disabled/>
                            <x-input-error :messages="$errors->get('nama_wali')" class="mt-2"/>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="nik_wali">NIK Wali</label>
                            <input type="text" class="form-control form-control-lg @error('nik_wali') is-invalid @enderror" name="nik_wali" id="nik_wali" value="{{ old('nik_wali') ?? $data['siswa']->nik_wali }}" placeholder="Nomor Induk Kependudukan" @unless($data['siswa']->nik_wali) data-mask="9999999999999999" @endunless />
                            <x-input-error :messages="$errors->get('nik_wali')" class="mt-2"/>

                        <div class="form-group mb-3">
                            <label class="form-label" for="pendidikan_wali">Pendidikan</label>
                            <input type="text" class="form-control form-control-lg @error('pendidikan_wali') is-invalid @enderror" name="pendidikan_wali" id="pendidikan_wali" value="{{ old('pendidikan_wali') ?? $data['siswa']->pendidikan_wali }}" placeholder="Pendidikan"/>
                            <x-input-error :messages="$errors->get('pendidikan_wali')" class="mt-2"/>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="penghasilan_wali">Penghasilan wali</label>
                            <input type="text" class="form-control form-control-lg @error('penghasilan_wali') is-invalid @enderror" name="penghasilan_wali" id="penghasilan_wali" value="{{ old('penghasilan_wali') ?? $data['siswa']->penghasilan_wali }}" placeholder="Penghasilan wali"/>
                            <x-input-error :messages="$errors->get('penghasilan_wali')" class="mt-2"/>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">No HP (+62)</label>
                            <input class="form-control form-control-lg @error('no_hp_wali') is-invalid @enderror"
                                type="text" id="no_hp_wali" name="no_hp_wali"
                                value="{{ old('no_hp_wali')?? $data['siswa']->no_hp_wali }}"
                                placeholder="Enter your phone number" @unless($data['siswa']->no_hp_wali) data-mask="+62 000 0000 0000" @endunless />
                            <x-input-error :messages="$errors->get('no_hp_wali')" class="mt-2" />
                        </div>
                        



                        


                        <div class="form-group mt-3s">
                            <button type="submit" id="submitButton" class="btn btn-secondary px-4">Submit</button>
                            {{-- <button type="button" class="btn btn-warning" id="editButton">Edit Data</button> --}}
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </form>
</x-user-content>

@push('script')
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}

<!-- Tambahkan plugin jQuery Masked Input -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>

<script>


    $(document).ready(function(){
        @unless($data['siswa']->nik)
            $('#nik_siswa').mask('9999999999999999'); // Pola format 16 digit angka
            $('#nik_ayah').mask('9999999999999999'); // Pola format 16 digit angka
            $('#nik_ibu').mask('9999999999999999'); // Pola format 16 digit angka
            $('#nik_wali').mask('9999999999999999'); // Pola format 16 digit angka
            $('#nik').mask('9999999999999999'); // Pola format 16 digit angka
        @endunless

    
        // $('#no_hp_wali').mask('+62 000-0000-0000');
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
</script>
    
@endpush

@endsection
