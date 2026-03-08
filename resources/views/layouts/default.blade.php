<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- meta kayword --}}
    <meta name="keywords" content="{{get_option('keywords','')}}" />


    {{-- meta bingbot --}}

    <title>{{ config('app.name') }} @yield('title')</title>


    <!-- Favicon and touch Icons -->
    <link href="{{get_option('favicon','')}}" rel="shortcut icon" type="image/png">
    <link href="{{get_option('favicon','')}}" rel="apple-touch-icon">
    <link href="{{get_option('favicon','')}}" rel="apple-touch-icon" sizes="72x72">
    <link href="{{get_option('favicon','')}}" rel="apple-touch-icon" sizes="114x114">
    <link href="{{get_option('favicon','')}}" rel="apple-touch-icon" sizes="144x144">
        
    
    <!-- Theme Style -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/animate.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/animation.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/textanimation.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">

    <!-- Font -->
<link rel="stylesheet" href="{{ asset('font/fonts.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


<!-- Icon -->
<link rel="stylesheet" href="{{ asset('icon/style.css') }}">

<!-- Favicon and Touch Icons  -->
<link rel="shortcut icon" href="{{get_option('favicon','')}}">
<link rel="apple-touch-icon-precomposed" href="{{get_option('favicon','')}}">

    {!! get_option('header_codes','') !!}

    <style>


        .tf-container {
            position: relative;
            margin-left: auto;
            margin-right: auto;
            padding-right: 15px;
            padding-left: 15px;
            width: 1140px;
            max-width: 100%;
        }
        
        </style>

    <!-- css stack -->
    @stack('css')
</head>
<body>
        @include('includes.header')
        @yield('content')
        @include('includes.footer')

   
@stack('js')


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    @if(Session::has('success'))
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: "{{ Session::get('success') }}",
            timer: 4000,
            showConfirmButton: false
        });
    @endif

    @if(Session::has('error'))
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: "{{ Session::get('error') }}",
            timer: 4000,
            showConfirmButton: false
        });
    @endif

</script>


</body>
</html>
