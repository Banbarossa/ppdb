<!DOCTYPE html>
<html lang="en">

<head>


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="img/icons/icon-48x48.png" />

    <link rel="canonical" href="https://demo-basic.adminkit.io/pages-blank.html" />

    <title>{{ config('app.name', 'PPDB | PIS') }}</title>

    @stack('style')
    <link rel="stylesheet" href="{{ asset('bootstrap/bootstrap.min.css') }}">
    <link href="{{ asset('admin_kit/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('admin_kit/css/mystyle.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
   

</head>

<body>
    <div class="wrapper">
        @php
            $getPrefix = request()->route()->getPrefix();
        @endphp
        
        @if ($getPrefix === 'psb')
            @include('layouts.psb-sidebar')
        @elseif ($getPrefix === 'admin')
            @include('layouts.adminpsb-sidebar')
        @endif

        <div class="main">
            @include('layouts.navbar')
            
			@yield('content')

            {{-- @include('layouts.footer') --}}
        </div>
    </div>


    @include('sweetalert::alert')
    <script src="{{ asset('bootstrap/bootstrap.bundle.min.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    <script src="{{ asset('admin_kit/js/app.js') }}"></script>

    @stack('script')


</body>

</html>
