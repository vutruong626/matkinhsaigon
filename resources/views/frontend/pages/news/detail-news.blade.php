@extends('frontend.layouts.master')
@section('head')
<title>{{ $getDetailNews->name }}</title>
<link rel="canonical" href="{{ route('detailNews',[$getDetailNews->alias]) }}"/>
<meta property="og:url" itemprop="url" content="{{ route('detailNews',[$getDetailNews->alias]) }}"/>
<meta name="og:title" content="{{ $getDetailNews->name }}" />
<meta name="keywords" content="{{ $getDetailNews->kw }}" />
<meta name="description" content="{{ $getDetailNews->meta_description }}" />
<meta name="og:description" content="{{ $getDetailNews->meta_description }}" />
<meta name="og:url" content="{{ route('detailNews',[$getDetailNews->alias]) }}" />
<link rel="canonical" href="{{ route('detailNews',[$getDetailNews->alias]) }}">

<meta property="og:image" itemprop="thumbnailUrl" content="{{ $getDetailNews->getImage() }}"/>
<meta property="og:image:width" content="524"/>
<meta property="og:image:height" content="274"/>
@parent
@endsection
@section('content')
<section id="detai-news">
    <nav data-depth="3" class="breadcrumb">
        <div class="container">
            <ol itemscope itemtype="http://schema.org/BreadcrumbList">
                <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <a itemprop="item" href="/">
                        <span itemprop="name">Trang Chủ</span>
                    </a>
                    <meta itemprop="position" content="1">
                </li>
                <li itemprop="itemListElement" itemscope itemtype="">
                    <a itemprop="item" href="{{ route('categoryNews', $category->alias) }}">
                        <span itemprop="name">Danh Mục Tin Tức</span>
                    </a>
                </li>
                <li itemprop="itemListElement" itemscope itemtype="">
                    <span itemprop="name">{{ $getDetailNews->name }}</span>
                </li>
            </ol>
        </div>
    </nav>

    <div class="container">
        <div id="columns_inner">
            <div id="content-wrapper" class="left-column col-xs-12 col-sm-12 col-md-12">
                <div id="blogpage">
                    <article class="blog-detail not-coppy-content">
                        {!! $getDetailNews->content !!}
                        <div class="buttom-share" style="text-align: right;">
                            <div class="social-sharing">
                                <span>Share</span>
                                <ul>
                                    <div id="fb-root"></div>
                                    <script async defer crossorigin="anonymous"
                                        src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v15.0"
                                        nonce="IrDKTUDJ"></script>
                                    <div class="fb-share-button"
                                        data-href="{{ route('detailNews',[$getDetailNews->alias]) }}"
                                        data-layout="button_count" data-size="large"><a
                                            target="_blank"
                                            href="https://www.facebook.com/sharer/sharer.php?u={{ route('detailNews',[$getDetailNews->alias]) }}"
                                            class="fb-xfbml-parse-ignore">Chia sẻ</a></div>

                                </ul>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
</section>
@include('frontend.pages.news.category-news-orther', ['relatedNews' => $relatedNews])
@endsection