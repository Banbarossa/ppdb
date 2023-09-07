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
                            <label class="form-label" for="nama">Nama</label>
                            <input type="text" class="form-control form-control-lg @error('nama') is-invalid @enderror" name="nama" id="nama" value="{{ old('nama') ?? $data['jalur']->nama }}"/>
                            <x-input-error :messages="$errors->get('nama')" class="mt-2"/>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="no_wa"> Nomor Whatsapp</label>
                            <input type="text" class="form-control form-control-lg @error('no_wa') is-invalid @enderror" name="no_wa" id="no_wa" value="{{ old('no_wa') ?? $data['jalur']->no_wa }}"/>
                            <x-input-error :messages="$errors->get('no_wa')" class="mt-2"/>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<script>
    // masking no hp
    $('#no_wa').mask('+62 000-0000-0000');
</script>
    
@endpush


@endsection
