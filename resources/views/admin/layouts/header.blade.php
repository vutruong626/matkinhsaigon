@php

$routeCheckKey = Route::current()->getName();
@endphp

<!-- BEGIN: GLOBAL-->
    
    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/asset-app/vendors.min.css') }}">

    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/asset-app/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/asset-app/bootstrap-extended.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/asset-app/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/asset-app/components.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/asset-app/dark-layout.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/asset-app/semi-dark-layout.min.css') }}">

    <!-- BEGIN: Page Menu CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/asset-app/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/asset-app/palette-gradient.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/asset-app/authentication.css') }}">
    <!-- END: Page Menu CSS-->

<!-- END: GLOBAL-->

    @if(Request::is('/'))
    <!-- dashboard -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/asset-app/apexcharts.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/asset-app/dashboard-ecommerce.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/asset-app/card-analytics.css') }}">
    <!-- dashboard -->
    @endif
    
    @if(str_contains($routeCheckKey, 'customer.') || str_contains($routeCheckKey, 'user.'))
    
        <!-- Customer user -->
        <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/asset-app/datatables.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/asset-app/dataTables.checkboxes.css') }}">
        
        <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/asset-app/data-list-view.css') }}">
        <!-- Customer user -->

    @endif

    @if(str_contains($routeCheckKey, 'slider.') || str_contains($routeCheckKey, 'user.'))
    
        <!-- Customer user -->
        <!-- <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/asset-app/datatables.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/asset-app/dataTables.checkboxes.css') }}">
        
        <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/asset-app/data-list-view.css') }}"> -->
        <!-- Customer user -->

    @endif

    <!-- Customer user -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/asset-app/datatables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/asset-app/dataTables.checkboxes.css') }}">
        
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/asset-app/data-list-view.css') }}">
        <!-- Customer user -->
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/dev_tr.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/dev_truonglv.css') }}">

    <!-- END: Custom CSS-->