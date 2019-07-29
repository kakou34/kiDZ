<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>@yield('title', 'kiDZ')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
          integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/footerStyle.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/headerStyle.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/sidebarStyle.css') }}" rel="stylesheet">

    @yield('style')
</head>
<body>
<div id="app">

    @include('nav')
    @yield('content')
    @include('footer')

</div>
<audio id="paperAudio">
    <source src="{{asset('/audio/paper.mp3')}}" type="audio/ogg">
    <source src="{{asset('/audio/paper.mp3')}}" type="audio/mpeg">
    Your browser does not support the audio element.
</audio>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/myJs.js') }}"></script>

@yield('script')
</body>
</html>
