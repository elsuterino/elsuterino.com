<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

@include('seo-meta')
<!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    @if(isset($cheatsheet))
    <script>window.cheatsheet = {!! json_encode($cheatsheet) !!}</script>
    @endif
</head>
<body>
<div id="app">
    <v-navbar></v-navbar>

    <transition name="fade-down" mode="out-in" appear>
        <router-view></router-view>
    </transition>
</div>
</body>
</html>
