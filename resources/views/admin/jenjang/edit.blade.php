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

                    <form action="{{route('admin.jenjang.update',$data->id)}}" method="post">
                        @csrf
                        @method('put')
                    
                     
                        <div class="form-group mb-3">
                            <label class="form-label" for="nama">Nama Jenjang</label>
                            <input type="text" class="form-control form-control-lg @error('nama_jenjang') is-invalid @enderror" name="nama_jenjang" id="nama_jenjang" value="{{ old('nama_jenjang') ?? $data->nama_jenjang }}"/>
                            <x-input-error :messages="$errors->get('nama_jenjang')" class="mt-2"/>
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
