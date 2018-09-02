<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <style>
        #accounts {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #accountsv td, #accounts th {

            padding: 8px;
        }

        #accounts tr:nth-child(even){background-color: #f2f2f2;}

        #accounts tr:nth-child(odd){background-color: #a6a6a6;}

        #accounts tr:hover {background-color: #ddd;}

        #accounts th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #fff;
            color: #000000;
            font-size: 20px;
        }
    </style>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Latest compiled and minified CSS -->
    <link href="{{ asset('css/bootstrap-table.css') }}" rel="stylesheet">
    <!-- Latest compiled and minified JavaScript -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.12.1/bootstrap-table.min.js"></script>

</head>
<body>

<div id="app">
    @include('inc.navbarAdmin')
    <div class="container">
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</div>
</body>
</html>
