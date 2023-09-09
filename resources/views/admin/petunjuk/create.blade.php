@extends('layouts.psb')
@section('content')


<x-user-content>
    <div class="mb-3">
        <h1 class="h2 d-inline align-middle">{{$title}}</h1>
    </div>

    <form action="{{$data['route']}}" method="post">
        @csrf
        @if ($data['method']=='put')
            @method('put')
        @endif
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        Petunjuk Pendaftaran
                    </div>
                    <div class="card-body"> 
                        
                        <div class="form-group mb-3">
                            <textarea name="petunjuk">{{old('petunjuk')??$data['model']->petunjuk}}</textarea>
                            @error('petunjuk')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div>
                            <button type="submit" class="btn btn-success">submit</button>
                        </div>

                    </div>
                    
                </div>
            </div>

            
        </div>
    </form>



</x-user-content>

@push('script')
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'petunjuk' );


</script>

    
@endpush

@endsection
