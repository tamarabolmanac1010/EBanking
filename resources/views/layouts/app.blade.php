<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>

    <style>
        #accounts {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
            border: 5px ;
            border-radius: 15px 15px 15px 15px;
        }

        #accounts td, #accounts th {

            padding-left: 20px;
            left: 70px;
            font-size: 18px;
        }

        #accounts tr:nth-child(even){background-color: rgba(242, 242, 242, 0.7);
            height:40px;
            padding-left: 20px;
        }

        #accounts tr:nth-child(odd){background-color:rgba(166, 166, 166, 0.7);
            height:40px;
            left: 20px;}

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
        @include('inc.navbar')
        <div class="container">
            <main class="py-4">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
