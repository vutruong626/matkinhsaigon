<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<!-- BEGIN: Head-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description"
        content="Mắt kính sài gòn là đối tác phân phối chính hãng của những thương hiệu mắt kính hàng đầu về chất lượng như : Zeiss ( Đức ) , Essilor (Pháp) , Chemi ( Hàn Quốc )">
    <meta name="keywords"
        content="Tròng Kính Zeiss ; Tròng kính Esilor ; Tròng kính Chemi ; Tròng Kính Hoya; Kính mát có độ ; Kính Đa Tròng ; Kính đổi màu">
    <meta name="author" content="PIXINVENT">
    <title>Login - Mắt Kinh Sài Gòn</title>
    <link rel="apple-touch-icon" href="../../../app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('admin/images/pages/logo/favicon.ico') }}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    @include('admin.layouts.header')
    @yield('add-head')

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->
<body class="horizontal-layout horizontal-menu 1-column  navbar-floating footer-static bg-full-screen-image  blank-page blank-page" data-open="hover" data-menu="horizontal-menu" data-col="1-column">
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                @yield('content')
            </div>
        </div>
    </div>
    <!-- END: Content-->
</body>
<!-- END: Body-->

<!-- BEGIN: footer-->
@include('admin.layouts.footer')
@yield('add-footer')
<!-- END: footer-->

</html>