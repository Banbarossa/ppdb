@extends('layouts.psb')
@section('content')

{{-- Jurusan yang dituju --}}
{{-- asal Sekolah --}}
{{-- npsn seklah asal --}}

<x-user-content>
    <form action="{{route('psb.wali.store')}}" method="POST">
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
                            <label class="form-label" for="nama_ayah">Nama Ayah</label>
                            <input type="text" class="form-control form-control-lg @error('nama_ayah') is-invalid @enderror" name="nama_ayah" id="nama_ayah" value="{{ ucfirst($data['siswa']->nama_ayah) }}" placeholder="Nama ayah" />
                            <x-input-error :messages="$errors->get('nama_ayah')" class="mt-2"/>
                        </div>

                        {{-- aktifkan --}}
                        <div class="form-group mb-3">
                            <label class="form-label" for="pekerjaan_ayah">pekerjaan_ayah</label>
                            <input type="text" class="form-control form-control-lg @error('pekerjaan_ayah') is-invalid @enderror" name="pekerjaan_ayah" id="pekerjaan_ayah" value="{{old('pekerjaan_ayah') ?? $data['siswa']->pekerjaan_ayah }}" placeholder="Pekerjaan Ayah" />
                            <x-input-error :messages="$errors->get('pekerjaan_ayah')" class="mt-2"/>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">No HP (+62)</label>
                            <input class="form-control form-control-lg @error('no_hp_ayah') is-invalid @enderror"
                                type="text" id="no_hp_ayah" name="no_hp_ayah"
                                value="{{ old('no_hp_ibu') ?? $data['siswa']->no_hp_ibu }}"
                                placeholder="Enter your phone number" />
                            <x-input-error :messages="$errors->get('no_hp_ayah')" class="mt-2" />
                        </div>

                       

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
                        <input type="hidden" name="id" value="{{$data['siswa']->id}}">
                        <div class="form-group mb-3">
                            <label class="form-label" for="nama_ibu">Nama ibu</label>
                            <input type="text" class="form-control form-control-lg @error('nama_ibu') is-invalid @enderror" name="nama_ibu" id="nama_ibu" value="{{ ucfirst($data['siswa']->nama_ibu) }}" placeholder="Nama Ibu" />
                            <x-input-error :messages="$errors->get('nama_ibu')" class="mt-2"/>
                        </div>

                        {{-- aktifkan --}}
                        <div class="form-group mb-3">
                            <label class="form-label" for="pekerjaan_ibu">pekerjaan_ibu</label>
                            <input type="text" class="form-control form-control-lg @error('pekerjaan_ibu') is-invalid @enderror" name="pekerjaan_ibu" id="pekerjaan_ibu" value="{{old('pekerjaan_ibu') ?? $data['siswa']->pekerjaan_ibu }}" placeholder="Pekerjaan Ibu" />
                            <x-input-error :messages="$errors->get('pekerjaan_ibu')" class="mt-2"/>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">No HP (+62)</label>
                            <input class="form-control form-control-lg @error('no_hp_ibu') is-invalid @enderror"
                                type="text" id="no_hp_ibu" name="no_hp_ibu"
                                value="{{ old('no_hp_ibu') ?? $data['siswa']->no_hp_ibu }}"
                                placeholder="Enter your phone number" />
                            <x-input-error :messages="$errors->get('no_hp_ibu')" class="mt-2" />
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
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

<!-- Tambahkan plugin jQuery Masked Input -->
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script> --}}

<script>
        $('#no_hp_ayah').mask('+62 000-0000-0000')
        $('#no_hp_ibu').mask('+62 000-0000-0000')


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

        const isDisable = {{auth()->user()->level_pendaftaran >= 3 ? 'true':'false'}}
        if(isDisable){
            disableFormElements();
        }else{
            enableFormElements();
        }



</script>
    
@endpush

@endsection
