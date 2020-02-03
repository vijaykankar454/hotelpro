<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ config('app.name', 'TravelHub') }}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('css/backend_css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('css/backend_css/ionicons.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('css/backend_css/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('css/backend_css/adminlte.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
    @yield('content') 
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="{{ asset('js/backend_js/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('js/backend_js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('js/backend_js/adminlte.min.js') }}"></script>
    
    </body>
    </html>
    