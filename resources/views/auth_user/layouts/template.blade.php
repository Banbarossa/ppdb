<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="{{asset('images/logo.png')}}" />



    <title>{{ config('app.name', 'PPDB | PIS') }}</title>

    @stack('bootstrap')
    <link rel="stylesheet" href="{{asset('bootstrap/bootstrap.min.css')}}">
    <link href="{{ asset('admin_kit/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('admin_kit/css/mystyle.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    
</head>

<body>

    {{-- navbar --}}
    @include('layouts.guest_navbar')
    {{-- navbar --}}


    @yield('content')




    @include('sweetalert::alert')
    <script src="{{asset('jquery/jquery.min.js')}}"></script>
    <script src="{{asset('bootstrap/bootstrap.bundle.min.js')}}"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    <script src="{{ asset('admin_kit/js/app.js') }}"></script>
    <script src="{{asset('jquery/jquery.min.js')}}"></script>

    @stack('script')


</body>

</html>
