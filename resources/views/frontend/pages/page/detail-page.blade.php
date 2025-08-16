@extends('frontend.layouts.master')
@section('content')
<section id="detai-news">
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
                    <span itemprop="name">Bài Viết</span>
                </li>
            </ol>
        </div>
    </nav>

    <div class="container">
        <div id="columns_inner">
            <div id="content-wrapper" class="left-column col-xs-12 col-sm-12 col-md-12">
                <div id="blogpage">
                    <article class="blog-detail">
                        {!! $result->content !!}
                    </article>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection