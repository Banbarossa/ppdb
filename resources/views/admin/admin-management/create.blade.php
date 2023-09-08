@extends('layouts.psb')
@section('content')


<x-user-content>
    <div class="mb-3">
        <h1 class="h2 d-inline align-middle">{{$title}}</h1>
    </div>


        <div class="row">
            <div class="col-lg-7">
                <form action="{{$data['route']}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @if ($data['method']=='put')
                        @method('put')
                    @endif
                    <div class="card border border-4 border-primary border-top-0 border-end-0 border-bottom-0 px-3">
                        <div class="card-header">
                            <div class="card-title">
                                @if ($data['method']=='put')
                                    Ubah Data Admin
                                @else
                                    Tambah Data Admin
                                @endif
                            </div>
                        </div>
                        <div class="card-body"> 
                            <div class="form-group mb-3">
                                <label class="form-label" for="name">Nama</label>
                                <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') ?? $data['model']->name }}"/>
                                <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label" for="email">Email</label>
                                <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') ?? $data['model']->email }}"/>
                                <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                            </div>
                            @if ($data['method']=='post')
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
                            @endif
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>


                        </div>
                        
                    </div>
                </form>
            </div>
            @if ($data['method']=='put')
            <div class="col-lg-5">
                <div class="card border border-4 border-success border-top-0 border-end-0 border-bottom-0">
                    <div class="card-header bg-secondary-subtle">
                        <div class="card-title">
                            Change Password
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{$data['updatePassword']}}" method="post">
                            @method('put')
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="old_password">Password Lama</label>
                                <input
                                    class="form-control form-control-lg @error('old_password') is-invalid @enderror"
                                    type="old_password" name="old_password" placeholder="Enter old_password" />
                                <x-input-error :messages="$errors->get('old_password')" class="mt-2" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">New Password</label>
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
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </form>
        
                    </div>
                </div>
            </div>
            @endif
            
        </div>





</x-user-content>

@push('script')
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'deskripsi' );

    $(document).ready(function(){

        $("#meta_description").on("input",function(){
            
            var inputText = $(this).val();
            var charCount = inputText.length;
            console.log(charCount);

            $("#charCount").text(charCount + "/100");

            if(charCount > 100){
                $(this).val(inputText.substring(0,100));
                $("#charCount").text("100/100");
                $("#charCount").addClass("text-danger");

            }else{
                $("#charCount").removeClass("text-danger");
            }
        })

    })
</script>

    
@endpush

@endsection
