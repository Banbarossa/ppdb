@extends('auth_user.layouts.template')
@section('content')
<main class="d-flex w-100 bg-mesjid">
    <div class="container d-flex flex-column">
        <div class="row vh-100">
            <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-auto d-table h-100">
                <div class="d-table-cell align-middle">

                    <div class="text-center mt-4">
                        <div>
                            <img src="{{ asset('images/logo.png') }}" alt=""
                                style="width: 45px;height:45px">
                        </div>
                        <h1 class="h2 mt-2 text-maroon">Pendaftaran Akun</h1>
                        <p class="lead">
                            Silahkan Mendaftarkan Akun
                        </p>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop">
                                    Baca Petunjuk Pendaftaran
                                </button>
                            </div>
                            <div class="m-sm-3">
                                <form method="POST"
                                    action="{{ route('psb.register',['id'=>$jalurMasuk->id]) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="jalurMasuk" value="{{ $jalurMasuk->id }}">
                                    <div class="mb-3">
                                        <label class="form-label">Nama Siswa</label>
                                        <input class="form-control form-control-lg @error('name') is-invalid @enderror"
                                            type="text" name="name" value="{{ old('name') }}"
                                            placeholder="Enter your name" autofocus autocomplete="name" />
                                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">No HP (+62)</label>
                                        <input class="form-control form-control-lg @error('no_hp') is-invalid @enderror"
                                            type="text" id="no_hp" name="no_hp"
                                            value="{{ old('no_hp') }}"
                                            placeholder="Enter your phone number" />
                                        <x-input-error :messages="$errors->get('no_hp')" class="mt-2" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="jenjang" class="form-label">Jenjang Lanjutan</label>
                                        <select name="jenjang" id="jenjang"
                                            class="form-select @error('jenjang') is-invalid @enderror">
                                            <option value="">Pilih Jenjang Pendidikan</option>
                                            @foreach($jenjang as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama_jenjang }}</option>
                                            @endforeach
                                        </select>
                                        <x-input-error :messages="$errors->get('jenjang')" class="mt-2" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Email <span class="ms-2"><small class="text-danger">pastikan anda mendaftar dengan email aktif</small></span> </label>
                                        <input class="form-control form-control-lg @error('email') is-invalid @enderror"
                                            type="email" name="email" value="{{ old('email') }}"
                                            placeholder="Enter your email" />
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <input
                                            class="form-control form-control-lg @error('password') is-invalid @enderror"
                                            type="password" name="password" placeholder="Enter password" />
                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Password Confirmation</label>
                                        <input
                                            class="form-control form-control-lg @error('password_confirmation') is-invalid @enderror"
                                            type="password" name="password_confirmation" placeholder="Enter password Confirmation" />
                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="resi" class="form-label">Upload Resi Pembayaran</label>
                                        <input class="form-control @error('resi') is-invalid @enderror" type="file"
                                            id="resi" name="resi">
                                        <x-input-error :messages="$errors->get('resi')" class="mt-2" />
                                        <img id="previewImage" src="#" alt="Preview Image"
                                            style="display: none; width:200pt;" class="mt-2">
                                    </div>

                                    <div class="d-grid gap-2 mt-3">
                                        <x-primary-button class="ml-3 btn-primary">
                                            {{ __('Sign up') }}
                                        </x-primary-button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mb-3">
                        Already have account? <a href="{{ route('psb.login') }}l">Log In</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


{{-- modal petunjuk --}}


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Petunjuk Pendaftaran</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>wajib menggunkan <strong>email</strong>  yang aktif, sebelum mendaftarkan akun, anda telah mengirimkan biaya pendaftran sesuai dengan besaran biaya pendftaran sesuai dengan jalur yang anda pilih. resi di scan dan di aupload pada formulir pendaftran</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
{{-- 
@push('bootstrap')
    <link rel="stylesheet" href="{{asset('bootstrap/bootstrap.min.css')}}">
@endpush --}}

@push('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script>
        // masking no hp
        $('#no_hp').mask('+62 000-0000-0000');

        // preview resi
        $(document).ready(function () {
            // Fungsi untuk menampilkan pratinjau gambar saat file dipilih
            $("#resi").change(function () {
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



@endpush

@endsection
