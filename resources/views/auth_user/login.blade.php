@extends('layouts.guest-bootstrap')
@section('content')
<main class="d-flex w-100 bg-mesjid mb-5" id="hero">
    <div class="container d-flex flex-column">
        <div class="row mt-5">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <p>{{ session('success') }}</p>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

        </div>
        <div class="row">
            <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-auto d-table h-100">
                <div class="d-table-cell align-middle">

                    <div class="text-center mt-4">
                        <div>
                            <img src="{{ asset('images/logo.png') }}" alt=""
                                style="width: 45px;height:45px">
                        </div>
                        <h1 class="h2 mt-2 text-maroon">Pesantren Imam Syafi'i</h1>
                        <p class="lead">
                            Masukkan email dan password untuk login
                        </p>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="m-sm-3">
                                <form action="{{ route('psb.login.store') }}" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input class="form-control form-control @error('email') is-invalid @enderror"
                                            type="email" name="email" placeholder="Enter your email" />
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" id="password" name="password">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="button" id="showPasswordBtn">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                                </button>
                                            </div>
                                        </div>
                                        
                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    </div>

                                    <div>
                                        <div class="form-check align-items-center">
                                            <input id="remember_me" type="checkbox" class="form-check-input"
                                                name="remember">
                                            <label class="form-check-label text-small"
                                                for="remember_me">{{ __('Remember me') }}</label>
                                        </div>
                                    </div>

                                    <div class="d-grid gap-2 mt-3">

                                        <button type="submit" class="btn btn-success">Log in</button>
                                        @if(Route::has('password.request'))
                                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                                href="{{ route('password.request') }}">
                                                {{ __('Forgot your password?') }}
                                            </a>
                                        @endif
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="text-center mb-3">
                                Don't have an account? <a href="{{route('welcome')}}">Sign up</a>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</main>

@push('script')
<script>
    $(document).ready(function() {
        $("#showPasswordBtn").on("click", function() {
            var passwordField = $("#password");
            var passwordFieldType = passwordField.attr("type");
            
            if (passwordFieldType === "password") {
            passwordField.attr("type", "text");
            $(this).html('<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye-off"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path><line x1="1" y1="1" x2="23" y2="23"></line></svg>');
            } else {
            passwordField.attr("type", "password");
            $(this).html('<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>');
            }

            
        });
    });
</script>
    
@endpush
@endsection
