<!DOCTYPE html>
<html lang="en">

<head>


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="{{asset('images/logo.png')}}" />

    <link rel="canonical" href="https://demo-basic.adminkit.io/pages-blank.html" />

    <title>{{ config('app.name', 'PPDB | PIS') }}</title>

    @stack('style')
    @vite(['resources/sass/app.scss'])
    <link href="{{ asset('admin_kit/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('admin_kit/css/mystyle.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    @livewireStyles


</head>

<body>
    <div class="wrapper">
        @php
            $getPrefix = request()->route()->getPrefix();
        @endphp

        
        @if ($getPrefix == 'psb')
            @include('layouts.psb-sidebar')
        @elseif ($getPrefix == 'admin')
            @include('layouts.adminpsb-sidebar')
        @endif

        <div class="main">
            @include('layouts.navbar')
            
			@yield('content')

        </div>
    </div>


    @include('sweetalert::alert')
    
    

    <script src="{{asset('jquery/jquery.min.js')}}"></script>
    
    <script src="{{asset('admin_kit/js/app.js')}}"></script>

  

    @livewireScripts
    

    @stack('script')
    


</body>

</html>
