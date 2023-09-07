@extends('layouts.psb')
@section('content')


<x-user-content>
    <div class="mb-3">
        <h1 class="h2 d-inline align-middle">{{$title}}</h1>
    </div>
    <div class="row justify-content-start">
        <div class="col-lg-6">
            <div class="card border border-4 border-secondary border-top-0 border-end-0 border-bottom-0">
                <div class="card-header"></div>
                <div class="card-body">

                    <form action="{{$data['route']}}" method="post">
                        @csrf
                        @if ($data['method']=='put')
                            @method('put')
                        @endif
                    
                     
                        <div class="form-group mb-3">
                            <label class="form-label" for="tahun">Tahun</label>
                            <input type="text" class="form-control form-control-lg @error('tahun') is-invalid @enderror" name="tahun" id="tahun" value="{{ old('tahun') ?? $data['model']->tahun }}"/>
                            <x-input-error :messages="$errors->get('tahun')" class="mt-2"/>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
<script>
    $(document).ready(function(){
        $('#tahun').mask('9999/9999');
    })
</script>
    
@endpush


@endsection
