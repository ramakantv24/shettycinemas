<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('public/backend/vendors/typicons/typicons.css') }}">
    <link rel="stylesheet" href="{{ asset('public/backend/vendors/css/vendor.bundle.base.css') }}">
    
    <link rel="stylesheet" href="{{ asset('public/backend/css/vertical-layout-light/style.css') }}">
    

</head>
<body>
    
    @yield('content')
    
<script src="{{ asset('public/backend/vendors/vendors/js/vendor.bundle.base.js') }}"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="{{ asset('public/backend/vendors/js/off-canvas.js') }}"></script>
  <script src="{{ asset('public/backend/vendors/js/hoverable-collapse.js') }}"></script>
  <script src="{{ asset('public/backend/vendors/js/template.js') }}"></script>
  <script src="{{ asset('public/backend/vendors/js/settings.js') }}"></script>
  <script src="{{ asset('public/backend/vendors/js/todolist.js') }}"></script>

</body>

</html>
