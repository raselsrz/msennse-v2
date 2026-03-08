<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Theme Style -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/animate.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/animation.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/textanimation.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">

    {!! get_option('header_codes','') !!}


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


<!-- Font -->
<link rel="stylesheet" href="{{ asset('font/fonts.css') }}">

<!-- Icon -->
<link rel="stylesheet" href="{{ asset('icon/style.css') }}">

<!-- Favicon and Touch Icons  -->
<link rel="shortcut icon" href="{{get_option('favicon','')}}">
<link rel="apple-touch-icon-precomposed" href="{{get_option('favicon','')}}">

<!-- Toastr CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">





    <!-- css stack -->
    @stack('css')
</head>
<body class="body">
        @include('includes.user-header')
        @yield('content')
        @include('includes.user-footer')
    @stack('js')


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        @if(Session::has('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: "{{ Session::get('success') }}",
                timer: 5000,
                showConfirmButton: false
            });
        @endif

        @if(Session::has('error'))
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: "{{ Session::get('error') }}",
                timer: 5000,
                showConfirmButton: false
            });
        @endif

    </script>
    

</body>
</html>
