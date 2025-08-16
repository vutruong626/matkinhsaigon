@extends('frontend.layouts.master')
@section('content')
<section id="wrapper">
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
                    <span itemprop="name">Danh Mục Đối Tác</span>
                </li>
            </ol>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            @foreach($getPartner as $item)
            <div class="col-lg-3 col-md-3 col-sm-12">
                <div class="flip-box">
                    <div class="flip-box-inner">
                        <a href="{{ route('getDetailPartner', $item->alias) }}">
                            <div class="flip-box-front">
                                <img src="{{ $item->getImage() }}" alt="" class="img-partner">
                            </div>
                            <div class="flip-box-back">
                                <img src="{{ $item->getImage() }}" alt="" class="img-partner">
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection