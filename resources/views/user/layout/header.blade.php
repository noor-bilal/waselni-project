<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="waselni.">
    <meta name="keywords" content="waselni">
    <meta name="author" content="waselni">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>{{$title}}</title>
    <link rel="apple-touch-icon" href="{{avatar('logo.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{avatar('logo.png')}}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700" rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">

    @if(direction() =='ar')

        <link rel="stylesheet" type="text/css" href="{{theme('app-assets/css-rtl/vendors.css')}}">
        <link rel="stylesheet" type="text/css" href="{{theme('app-assets/css-rtl/app.css')}}">
        <link rel="stylesheet" type="text/css" href="{{theme('app-assets/css-rtl/custom-rtl.css')}}">
        <link rel="stylesheet" type="text/css" href="{{theme('app-assets/css-rtl/core/menu/menu-types/vertical-menu.css')}}">
        <link rel="stylesheet" type="text/css" href="{{theme('app-assets/css-rtl/core/colors/palette-gradient.css')}}">
    @else
        <link rel="stylesheet" type="text/css" href="{{theme('app-assets/css/vendors.css')}}">
        <link rel="stylesheet" type="text/css" href="{{theme('app-assets/css/app.css')}}">
        <link rel="stylesheet" type="text/css" href="{{theme('app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
        <link rel="stylesheet" type="text/css" href="{{theme('app-assets/css/core/colors/palette-gradient.css')}}">
    @endif
    @stack('css')

</head>
<body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-col="2-columns">
@include('sweetalert::alert')
