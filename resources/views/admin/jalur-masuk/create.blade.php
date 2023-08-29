@extends('layouts.psb')
@section('content')


<x-user-content>
    <div class="mb-3">
        <h1 class="h2 d-inline align-middle">{{$title}}</h1>
    </div>
    <div class="row justify-content-start">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header"></div>
                <div class="card-body">

                    <form action="{{$data['route']}}" method="post">
                        @csrf
                        @if ($data['method']=='put')
                            @method('put')
                        @endif
                        
                        <div class="form-group mb-3">
                            <label class="form-label" for="nama">Nama Jalur Pendaftaran</label>
                            <input type="text" class="form-control form-control-lg @error('nama_jalur') is-invalid @enderror" name="nama_jalur" id="nama_jalur" value="{{ old('nama_jalur') ?? $data['jalur']->nama_jalur }}"/>
                            <x-input-error :messages="$errors->get('nama_jalur')" class="mt-2"/>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="biaya_pendaftaran">Biaya Pendaftaran</label>
                            <input type="number" class="form-control form-control-lg @error('biaya_pendaftaran') is-invalid @enderror" name="biaya_pendaftaran" id="biaya_pendaftaran" value="{{ old('biaya_pendaftaran') ?? $data['jalur']->biaya_pendaftaran }}"/>
                            <x-input-error :messages="$errors->get('biaya_pendaftaran')" class="mt-2"/>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group mb-3">
                                    <label class="form-label" for="tanggal_mulai">Tanggal Mulai</label>
                                    <input type="date" class="form-control form-control-lg @error('tanggal_mulai') is-invalid @enderror" name="tanggal_mulai" id="tanggal_mulai" value="{{ old('tanggal_mulai') ?? $data['jalur']->tanggal_mulai }}"/>
                                    <x-input-error :messages="$errors->get('tanggal_mulai')" class="mt-2"/>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group mb-3">
                                    <label class="form-label" for="tanggal_akhir">Tanggal Mulai</label>
                                    <input type="date" class="form-control form-control-lg @error('tanggal_akhir') is-invalid @enderror" name="tanggal_akhir" id="tanggal_akhir" value="{{ old('tanggal_akhir') ?? $data['jalur']->tanggal_akhir }}"/>
                                    <x-input-error :messages="$errors->get('tanggal_akhir')" class="mt-2"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label class="form-label" for="nama">Meta Descripsi <small class="text-danger ms-3">(max:100 Karakter)</small></label>
                            <textarea id="meta_description" class="form-control @error('meta_description') is-invalid @enderror" name="meta_description" id="meta_description" rows="4">{{old('meta_description') ?? $data['jalur']->meta_description}}</textarea>
                            <div class="text-muted mt-2">
                                Jumlah Karakter : <span id="charCount">0/100</span>
                            </div>
                            <x-input-error :messages="$errors->get('meta_description')" class="mt-2"/>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="deskripsi">Deskripsi</label>
                            <textarea name="deskripsi">{{old('deskripsi')??$data['jalur']->deskripsi}}</textarea>
                            @error('deskripsi')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        
                        <div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        
                    </form>
                </div>
                
            </div>
        </div>
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
