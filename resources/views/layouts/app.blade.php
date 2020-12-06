<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    @yield('stylesheets')
    <title>@yield('title') PREMIER LIG</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
<div id="app">
    @include('partials._navigation')

    <div class="wide-screen">

        @include('partials._messages')
        <div class="template">

            @yield('content')
        </div>

    </div>

</div>

@include('partials._javascript')

<!-- Scripts -->

</body>


</html>
