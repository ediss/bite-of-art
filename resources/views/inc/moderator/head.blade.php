<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Biteofart | Admin Panel</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="all,follow">

<meta name="csrf-token" content="{{ csrf_token() }}" />
<!-- Bootstrap CSS-->
<link rel="stylesheet" href="{{asset('assets/dashboard/vendor/bootstrap/css/bootstrap.min.css')}}">
<!-- Font Awesome CSS-->
<link rel="stylesheet" href="{{asset('assets/dashboard/vendor/font-awesome/css/font-awesome.min.css')}}">
<!-- Custom Font Icons CSS-->
<link rel="stylesheet" href="{{asset('assets/dashboard/css/font.css')}}">
<!-- Google fonts - Muli-->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700')">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<!-- theme stylesheet-->
<link rel="stylesheet" href="{{asset('assets/dashboard/css/style.default.css')}}" id="theme-stylesheet">
<!-- Custom stylesheet - for your changes-->
<link rel="stylesheet" href="{{asset('assets/dashboard/css/custom.css')}}">

<link href="{{ asset('plugins/toastr/toastr.min.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<!-- Favicon-->
<link rel="shortcut icon" href="{{asset('assets/dashboard/img/favicon.ico')}}">



<!-- Tweaks for older IEs-->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->