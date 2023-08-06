@extends('layouts.psb')
@section('content')

{{-- Jurusan yang dituju --}}
{{-- asal Sekolah --}}
{{-- npsn seklah asal --}}

<x-user-content>
    <form action="{{route('psb.sekolah.store')}}" method="POST">
        @csrf
        <div class="mb-3">
            <h1 class="h3 d-inline align-middle">Data Sekolah</h1>
        </div>
        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Lengkapi data sekolah sebelumnya</h5>
                    </div>
                    <div class="card-body">

                        {{-- aktifkan --}}
                        <input type="hidden" name="id" value="{{$data['siswa']->id}}">
                        <div class="form-group mb-4">
                            <label class="form-label" for="sekolah_sebelumnya">Nama Sekolah</label>
                            <input type="text" class="form-control form-control-lg @error('sekolah_sebelumnya') is-invalid @enderror" name="sekolah_sebelumnya" id="sekolah_sebelumnya" value="{{ ucfirst($data['siswa']->sekolah_sebelumnya) }}" placeholder="Nama Sekolah Sebelumnya" />
                            <x-input-error :messages="$errors->get('sekolah_sebelumnya')" class="mt-2"/>
                        </div>

                        {{-- aktifkan --}}

                        <div class="form-group mb-4">
                            <label class="form-label" for="npsn_sekolah_sebelumnya">NPSN Sekolah <span class="ms-3"><small class="text-danger">Anda dapat mencari npsn Sekolah</small></span> <span><a href="https://referensi.data.kemdikbud.go.id/" target="_blank" class="badge bg-success">disini</a></span></label>
                            <input type="text" class="form-control form-control-lg @error('npsn_sekolah_sebelumnya') is-invalid @enderror" name="npsn_sekolah_sebelumnya" id="npsn_sekolah_sebelumnya" value="{{old('npsn_sekolah_sebelumnya') ?? $data['siswa']->npsn_sekolah_sebelumnya }}" placeholder="NPSN Sekolah Sebelumnya" />
                            <x-input-error :messages="$errors->get('npsn_sekolah_sebelumnya')" class="mt-2"/>
                        </div>


                        <div class="form-group mt-3">
                            <input type="checkbox" id="myCheckbox" class="me-3"/>
                            <label for="myCheckbox">Setelah "Submit", data akan terkunci dan tidak dapat diedit lagi.</label>
                        </div>


                        <div class="form-group mt-3">
                            <button type="submit" id="submitButton" class="btn btn-secondary px-4">Submit</button>
                        </div>

                       

                    </div>
                </div>
            </div>



        </div>

    </form>
</x-user-content>

@push('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

<script>
    $(document).ready(function(){
        const $checkbox = $("#myCheckbox")
        const $submitButton = $("#submitButton")

        if ($checkbox.is(":checked")){
                $submitButton.prop("disabled",false)
        }else{
            $submitButton.prop("disabled",true)
        }

        $checkbox.on("change",function(){

            if ($checkbox.is(":checked")){
                $submitButton.prop("disabled",false)
            }else{
                $submitButton.prop("disabled",true)
            }
            // $submitButton.prop("disabled",!$checkbox.is(":checked"))
        });
    })
</script>

<!-- Tambahkan plugin jQuery Masked Input -->

@endpush

@endsection
