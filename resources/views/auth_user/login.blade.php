@extends('auth_user.layouts.template')
@section('content')
<main class="d-flex w-100 bg-mesjid">
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
                                        <input class="form-control form-control-lg @error('email') is-invalid @enderror"
                                            type="email" name="email" placeholder="Enter your email" />
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" id="password" name="password">
                                            <div class="input-group-append">
                                              <button class="btn btn-outline-secondary" type="button" id="showPasswordBtn">
                                                <i class="fa fa-eye-slash"></i>
                                              </button>
                                            </div>
                                        </div>
                                        
                                        {{-- <input class="form-control form-control-lg @error('email') is-invalid @enderror"
                                            type="
                                            password" name="password" placeholder="Enter your password" /> --}}
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

                                        <x-primary-button class="ml-3 btn-primary">
                                            {{ __('Log in') }}
                                        </x-primary-button>
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
                    </div>
                    <div class="text-center mb-3">
                        Don't have an account? <a href="/">Sign up</a>
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
      $(this).html('<i class="fa fa-eye"></i>');
    } else {
      passwordField.attr("type", "password");
      $(this).html('<i class="fa fa-eye-slash"></i>');
    }
  });
});
    </script>
    
@endpush
@endsection
