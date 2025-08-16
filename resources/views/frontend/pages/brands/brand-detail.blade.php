@extends('frontend.layouts.master')
@section('content')
<section class="detail-brand">
    <nav data-depth="3" class="breadcrumb">
        <div class="container">
            <ol itemscope itemtype="">
                <li itemprop="itemListElement" itemscope itemtype="">
                    <a itemprop="item" href="/">
                        <span itemprop="name">Trang Chủ</span>
                    </a>
                    <meta itemprop="position" content="1">
                </li>
                <li itemprop="itemListElement" itemscope itemtype="">
                    <a itemprop="item" href="{{ route('getBrand') }}">
                        <span itemprop="name">Danh Mục Thương Hiệu</span>
                    </a>
                    
                </li>
                <li itemprop="itemListElement" itemscope itemtype="">
                    <span itemprop="name">{{ $detailBrand->name }}</span>
                </li>
            </ol>
        </div>
    </nav>
    <div class="container">
        <div id="columns_inner">
            <div id="content-wrapper">
                <section id="main" itemscope itemtype="">
                    <div class="row">
                        <div class="col-xs-12 col-sm-5 col-md-5">
                            @include('frontend.pages.brands.image-left')
                        </div>
                        <div class="col-xs-12 col-sm-7 col-md-7 not-coppy-content">
                            {!! $detailBrand->content !!}
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</section>
<br />
@include('frontend.pages.brands.brand-product')
@endsection