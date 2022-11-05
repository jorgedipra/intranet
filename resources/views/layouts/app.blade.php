<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Intranet') }}</title>
	<link rel="shortcut icon" href="/image/h1.ico" />
	<link rel="apple-touch-icon" href="/image/h1.jpg" />	
    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <div class="row">
            <div class="col">
                @include('partials.nav')
          </div>
        </div>

        @yield('content')
    </div>
    <section id="alerts"></section>

    <!-- Scripts -->
    <script>
        var API_BACKEND_IMG = '{{ env("API_BACKEND_IMG") }}';
    </script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/alert.js') }}"></script>
</body>
</html>
