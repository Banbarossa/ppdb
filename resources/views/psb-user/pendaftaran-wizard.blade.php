@extends('layouts.psb')
@section('content')

<x-user-content>
    <div class="mb-3">
        <h1 class="h3 d-inline align-middle">Data Calon Santri</h1>
    </div>
    <div class="row">
        <div class="col-12">
            @livewire('daftar-wizard')
        </div>

    </div>
</x-user-content>
@endsection
