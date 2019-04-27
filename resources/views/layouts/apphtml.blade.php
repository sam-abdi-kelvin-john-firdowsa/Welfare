<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
         <link rel="stylesheet" href="{{asset('css/app.css')}}">
         <link rel="shortcut icon" type="image/png" href="{{asset('images/icons/eu.png')}}">

        <title>{{config('app.name', 'Welfare')}}</title>
 
    <body>
    @yield('content')
    </body>

</html>
