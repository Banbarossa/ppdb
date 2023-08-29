@extends('layouts.psb')
@section('content')


<x-user-content>

    <div class="mb-3">
        <h1 class="h3 d-inline align-middle">Upload Berkas</h1>
    </div>
        <div class="row">
            <form method="POST" action="{{route('psb.upload-berkas.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="col-12 col-lg-8">
                    <div class="card p-4">
                        <div class="card-header">
                            <h5 class="card-title mb-0 text-success">Semua berkas yang diupload adalah scan dari berkas asli (bukan foto copy)</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-4">
                                <label for="kk" class="form-label">Kartu Keluarga <small class="text-danger ms-3">pdf | max:1 mb</small></label>
                                <input class="form-control @error('kk') is-invalid @enderror" type="file"
                                    id="kk" name="kk">
                                <x-input-error :messages="$errors->get('kk')" class="mt-2" />
                                
                            </div>
                            <div class="mb-4">
                                <label for="akte_lahir" class="form-label">Akte Kelahiran <small class="text-danger ms-3">pdf | max:1 mb</small></label>
                                <input class="form-control @error('akte_lahir') is-invalid @enderror" type="file"
                                    id="akte_lahir" name="akte_lahir">
                                <x-input-error :messages="$errors->get('akte_lahir')" class="mt-2" />
                            </div>
                            <div class="mb-4">
                                <label for="ktp_wali" class="form-label">KTP Orang Tua (ayah dan ibu digabung dalam 1 file) <small class="text-danger ms-3">pdf | max:1 mb</small></label>
                                <input class="form-control @error('ktp_wali') is-invalid @enderror" type="file"
                                    id="ktp_wali" name="ktp_wali">
                                <x-input-error :messages="$errors->get('ktp_wali')" class="mt-2" />
                            </div>
                            <div class="mb-4">
                                <label for="surat_aktif_sekolah" class="form-label">Surat Aktif Sekolah <small class="text-danger ms-3">pdf | max:1 mb</small></label>
                                <input class="form-control @error('surat_aktif_sekolah') is-invalid @enderror" type="file"
                                    id="surat_aktif_sekolah" name="surat_aktif_sekolah">
                                <x-input-error :messages="$errors->get('surat_aktif_sekolah')" class="mt-2" />
                            </div>

                            @if ($data->status_anak == 'Yatim')
                            <div class="mb-4">
                                <label for="surat_kematian_ayah" class="form-label">Surat Keterangan Yatim <small class="text-danger ms-3">pdf | max:1 mb</small></label>
                                <input class="form-control @error('surat_kematian_ayah') is-invalid @enderror" type="file"
                                    id="surat_kematian_ayah" name="surat_kematian_ayah">
                                <x-input-error :messages="$errors->get('surat_kematian_ayah')" class="mt-2" />
                                
                            </div>
                            <div class="mb-4">
                                <label for="akte_kematian_ayah" class="form-label">Akte Kematian Ayah <small class="text-danger ms-3">pdf | max:1 mb</small></label>
                                <input class="form-control @error('akte_kematian_ayah') is-invalid @enderror" type="file"
                                    id="akte_kematian_ayah" name="akte_kematian_ayah">
                                <x-input-error :messages="$errors->get('akte_kematian_ayah')" class="mt-2" />
                                
                            </div>
                            @endif

                            <div>
                                <button type="submit" class="btn btn-secondary px-4">Submit</button>
                            </div>
                            
                        </div>
                    </div>
                </div>

                
            </form>
        </div>







</x-user-content>

{{-- @push('script')
<script>


    // preview resi
    $(document).ready(function () {
        // Fungsi untuk menampilkan pratinjau gambar saat file dipilih
        $("#avatar").change(function () {
            readURL(this);
        });
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                // Menampilkan pratinjau gambar menggunakan src elemen img
                $('#previewImage').attr('src', e.target.result);
                $('#previewImage').show(); // Menampilkan elemen gambar
            }

            reader.readAsDataURL(input.files[0]); // Membaca file sebagai data URL
        }
    }

</script>
    
@endpush --}}



@endsection
