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
                            <label class="form-label" for="media">media</label>
                            <input type="text" class="form-control form-control-lg @error('media') is-invalid @enderror" name="media" id="media" value="{{ old('media') ?? $data['jalur']->media }}"/>
                            <x-input-error :messages="$errors->get('media')" class="mt-2"/>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="alamat"> Alamat</label>
                            <input type="text" class="form-control form-control-lg @error('alamat') is-invalid @enderror" name="alamat" id="alamat" value="{{ old('alamat') ?? $data['jalur']->alamat }}"/>
                            <x-input-error :messages="$errors->get('alamat')" class="mt-2"/>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="url"> Url</label>
                            <input type="text" class="form-control form-control-lg @error('url') is-invalid @enderror" name="url" id="url" value="{{ old('url') ?? $data['jalur']->url }}"/>
                            <x-input-error :messages="$errors->get('url')" class="mt-2"/>
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




@endsection
