<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Mobile Specific Meta-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('Error', ' 404') }}</title>
    <!-- Favicon -->
    {{-- <link rel="shortcut icon" type="{{ asset('image/x-icon" href="img/favicon.html') }}" /> --}}
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dist/css/style.css') }}">
</head>
<body>
    <section class="error section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <img src="{{ asset('assets/dist/img/error/404.jpg') }}" alt="" class="img-fluid">
                </div>
                <div class="col-lg-5">
                    <div class="error-content mt-5 mt-lg-0">
                        <h3>Oops!</h3>
                        <p class="mt-3">Sorry, We can't seem to find the page you are looking for.</p>
                        <a href="{{ URL::previous() }}" class="btn btn-primary btn-sm btn-rounded mt-3">Go Back</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
