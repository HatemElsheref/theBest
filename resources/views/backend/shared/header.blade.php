<!DOCTYPE html>
<html dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">
<head>
    <meta charset="UTF-8">
    <title>{{env('APP_NAME')}}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link rel="stylesheet" href="{{dashboardAssets('bootstrap/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons 2.0.0 -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{dashboardAssets('dist/css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{dashboardAssets('dist/css/skins/_all-skins.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{dashboardAssets('plugins/iCheck/flat/blue.css')}}">
    <!-- Morris chart -->
    <link rel="stylesheet" href="{{dashboardAssets('plugins/morris/morris.css')}}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{dashboardAssets('plugins/jvectormap/jquery-jvectormap-1.2.2.css')}}">
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{dashboardAssets('plugins/datepicker/datepicker3.css')}}">
    <link rel="stylesheet" href="{{dashboardAssets('plugins/datatables/jquery.dataTables.css')}}">
    <link rel="stylesheet" href="{{dashboardAssets('plugins/datatables/dataTables.bootstrap.css')}}">

    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{dashboardAssets('plugins/daterangepicker/daterangepicker-bs3.css')}}">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{dashboardAssets('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">

    <link rel="stylesheet" href="{{dashboardAssets('dist/fonts/fonts-fa.css')}}">
     @if(LaravelLocalization::getCurrentLocaleDirection()=='rtl')
    <style>
        .notify-alert-close {
            right: unset !important;
            left: 20px;
        }

    </style>
    <link rel="stylesheet" href="{{dashboardAssets('dist/css/bootstrap-rtl.min.css')}}">
    <link rel="stylesheet" href="{{dashboardAssets('dist/css/rtl.css')}}">
    @else
    <link rel="stylesheet" href="{{dashboardAssets('css/ltr-en.css')}}">
    @endif
    <link rel="stylesheet" href="{{dashboardAssets('css/global-style.css')}}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <![endif]-->
    @if(app()->getLocale()=='en')
      <style>
          .form-control{
              text-align: left!important;
          }
      </style>
    @endif
        @stack('css')
</head>
<!--<body class="skin-blue sidebar-mini ">-->
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
{{--<body class="hold-transition skin-blue sidebar-mini ">--}}
{{--<body class="hold-transition skin-blue-light sidebar-mini ">--}}
{{--<body class="hold-transition skin-black sidebar-mini ">--}}
{{--<body class="hold-transition skin-black-light sidebar-mini ">--}}
{{--<body class="hold-transition skin-purple sidebar-mini ">--}}
{{--<body class="hold-transition skin-purple-light sidebar-mini ">--}}
{{--<body class="hold-transition skin-yellow sidebar-mini ">--}}
{{--<body class="hold-transition skin-yellow-light sidebar-mini ">--}}
<body class="hold-transition skin-red sidebar-mini ">
{{--<body class="hold-transition skin-red-light sidebar-mini ">--}}
{{--<body class="hold-transition skin-green sidebar-mini ">        --}}
{{--<body class="hold-transition skin-green-light sidebar-mini ">--}}

<div class="wrapper">
