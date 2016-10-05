<!DOCTYPE html>
<html lang="en">
<head>
    <title>LARAVEL TASK</title>
    <meta charset="utf-8">
    <!--meta content="width=device-width, initial-scale=1.0" name="viewport"-->
    <meta name="theme-color" content="#5cb85c"/>
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta content="LARAVEL TASK" name="keywords">
    <meta content="BIkash Shrestha Desar" name="author">
    <meta name="content-language" content="en-CA"/>
    <meta http-equiv="content-language" content="en-CA"/>
    <meta content="LARAVEL TASK" name="description">
    <meta property="og:site_name" content="LARAVEL">
    <meta property="og:title" content="LARAVEL">
    <meta property="og:description" content="LARAVEL TASK">
    <meta property="og:type" content="website">
    
    
    
    <!-- CSS -->

    
    <link href='https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>

    
    <!--link href="{{ asset('assets/global/css/bootstrap.min.css') }}" rel="stylesheet"-->
    <link rel="stylesheet" href="https://v4-alpha.getbootstrap.com/dist/css/bootstrap.min.css" integrity="" crossorigin="anonymous">

    <!--link href="{{ asset('assets/global/css/bootstrap.css') }}" rel="stylesheet"-->
    <link href="{{ asset('assets/global/css/custom_css.css') }}" rel="stylesheet">

    <!-- JS these two must go first -->
    <script src="{{ asset('assets/global/plugins/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/global/plugins/jquery-migrate.min.js') }}"></script>
    <!-- JS these two must go first -->

    <script src="{{ asset('assets/global/scripts/bootstrap.min.js') }}"></script>
    
    <script src="{{ asset('assets/global/scripts/jqueryui/jquery-ui.js') }}"></script>
     
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>

   

    <script src="{{ asset('assets/global/plugins/jquery-validation/js/jquery.validate.min.js') }}"></script>
  


</head>

<body>

<div class="container-fluid bg-success" style="margin-bottom: 70px;">
    @include('layouts.includes.header')
</div>
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<div class="container-fluid">
    @yield('content')
</div>

<div class="container-fluid">
    @include('layouts.includes.footer')
</div>
</body>
</html>