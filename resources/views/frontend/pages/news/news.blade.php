@extends('frontend.layouts.master')
@section('content')
<section id="wrapper" class="page-news">
    <nav data-depth="3" class="breadcrumb">
        <div class="container">
            <ol itemscope>
                <li itemprop="itemListElement" itemscope>
                    <a itemprop="item" href="/">
                        <span itemprop="name">Trang Chủ</span>
                    </a>
                    <meta itemprop="position" content="1">
                </li>
                <li itemprop="itemListElement" itemscope itemtype="">
                    <span itemprop="name">Danh Mục Tin Tức</span>
                </li>
            </ol>
        </div>
    </nav>
    <div class="container">
        <div id="columns_inner">
            <!-- include('frontend.pages.news.news-category') -->
            
            <div id="content-wrapper" class="left-column">
                <div id="blog-listing" class="blogs-container box">
                    <h1 class="blog-heading">Tin Tức Mới Nhất</h1>
                    <div class="menu-category-top-custom">
                        @include('frontend.pages.news.menu-category-top')
                    </div>
                    <!-- <div class="menu-category-mobile">
                        include('frontend.pages.news.menu-category-mobile')
                    </div> -->
                    <br/>
                    <div class="inner">
                        <div class="secondary-blog row">
                            @foreach($news as $itemNews)
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-3 " style="padding: 0px 10px;">
                                <div class="blog-item">
                                    <div class="blog-image-meta">
                                        <div class="blog-image">
                                            <a href="{{ route('detailNews', $itemNews->alias) }}"
                                                title="{{ $itemNews->name }}" class="link">
                                                <img src="{{ $itemNews->getImage() }}" title="{{ $itemNews->name }}"
                                                    alt="{{ $itemNews->name }}" class="img-fluid"
                                                    style="width: 100%;" />
                                                <span class="post-image-hover"></span>
                                            </a>
                                            <span class="blogicons">
                                                <a title="{{ $itemNews->name }}" href="{{ $itemNews->getImage() }}"
                                                    data-lightbox="example-set" class="icon zoom">&nbsp;</a>
                                                <a title="{{ $itemNews->name }}"
                                                    href="{{ route('detailNews', $itemNews->alias) }}"
                                                    class="icon readmore_link">&nbsp;</a>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="blog-content-wrap">
                                        <span class="blog-created">
                                            <i class="fa fa-calendar"></i>
                                            <!--On: -->
                                            <time class="date" datetime="2019">
                                                {{ $itemNews->created_at->format('d/m/Y') }}
                                            </time>
                                        </span>
                                        <a href="{{ route('detailNews', $itemNews->alias) }}" title="{{ $itemNews->name }}">
                                            <h2 class="title-news">
                                                {{ $itemNews->name }}
                                            </h2>
                                        </a>
                                        <div class="blog-shortinfo">
                                            {!! $itemNews->description !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <div class="ps_sortPagiBar clearfix bottom-line">
                                {{ $news->links('frontend.pages.pagination.customer-pagination') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
@endsection