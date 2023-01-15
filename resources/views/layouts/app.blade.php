<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <script src="https://kit.fontawesome.com/6b3f1a85d7.js" crossorigin="anonymous"></script>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('css/global.css')}}">
         <title>Versiani</title>
          <script src="//cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>

    </head>
    <body>
        
        @include('layouts.header')
       
    
        @yield('content')
    
    
        @include('layouts.footer')
       
       
    </body>
    <script src="{{asset('js/global.js')}}" ></script>
</html>
