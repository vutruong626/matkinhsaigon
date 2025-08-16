@extends('frontend.layouts.master')
@section('head')
    <title>{{ $informationPage->meta_title }}</title>
    <meta name="description" content="{!! $informationPage->meta_description !!}">
    <meta name="keywords" content="{{ $informationPage->meta_keyword }}">
    <meta property="og:url" content="{{ route('home') }}" />
    <meta property="og:title" content="{{ $informationPage->meta_title }}" />
    <meta property="og:description" content="{!! $informationPage->meta_description !!}" />
    
@parent
@endsection

@section('content')

<div class="home-container">
    <div id="columns_inner">
        <div id="content-wrapper">
            <section id="main">
                <section id="content" class="page-home">
                    <div class="display-top-inner">
                        @include('frontend.pages.home.slider')
                    </div>
                    @include('frontend.pages.home.about')
                    <!-- Products -->
                    @include('frontend.pages.home.products')
                    <!-- News -->
                    @include('frontend.pages.home.news')
                    <!-- Brands -->
                    @include('frontend.pages.home.brands')
                </section>
            </section>
        </div>
    </div>
</div>
@endsection