<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <meta content="" name="copyright">
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <meta content="ja" http-equiv="Content-Language">
    <meta content="text/css" http-equiv="Content-Style-Type">
    <meta content="text/javascript" http-equiv="Content-Script-Type">
    <meta id="viewport" name="viewport" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        if(screen.width <= 736){
            document.getElementById("viewport").setAttribute("content", "width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no");
        }
    </script>
    <title>Home | E-Shopper</title>
    <link href="{{ asset('client/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('client/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('client/css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ asset('client/css/price-range.css') }}" rel="stylesheet">
    <link href="{{ asset('client/css/animate.css') }}" rel="stylesheet">
	<link href="{{ asset('client/css/main.css') }}" rel="stylesheet">
	<link href="{{ asset('client/css/responsive.css') }}" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="{{ asset('client/css/rate.css') }}">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="{{ asset('client/images/ico/favicon.ico') }}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('client/images/ico/apple-touch-icon-144-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('client/images/ico/apple-touch-icon-114-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('client/images/ico/apple-touch-icon-72-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('client/images/ico/apple-touch-icon-57-precomposed.png') }}">
</head><!--/head-->

<body>
    {{-- Hiển thị thông báo --}}
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    @include('client.layouts.header')

    @include('client.layouts.slide')

    @include('client.layouts.contents')

    @include('client.layouts.footer')




    <script src="{{asset('client/js/jquery.js')}}"></script>
	<script src="{{asset('client/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('client/js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{asset('client/js/price-range.js')}}"></script>
    <script src="{{asset('client/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('client/js/main.js')}}"></script>
</body>
</html>