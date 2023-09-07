@extends('layouts.psb')
@section('content')

    <x-user-content>

        {{-- <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Profile') }}
            </h2>
        </x-slot> --}}

        <div class="py-12">
            <div class="card px-5">
                <div class="card-header">

                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-lg-8">
                            @include('profile.partials.update-profile-information-form')
                            @include('profile.partials.update-password-form')
                        </div>
                    </div>
                </div>
            </div>

            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                {{-- <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        
                    </div>
                </div> --}}

                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        
                    </div>
                </div>

                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        {{-- @include('profile.partials.delete-user-form') --}}
                    </div>
                </div>
            </div>
        </div>
    </x-user-content>
@endsection
