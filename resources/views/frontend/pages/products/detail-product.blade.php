@extends('frontend.layouts.master')
@section('head')
<title>{{ $detailProduct->name }}</title>
<link rel="canonical" href="{{ route('detailProduct',[$detailProduct->alias]) }}" />
<meta property="og:url" itemprop="url" content="{{ route('detailProduct',[$detailProduct->alias]) }}" />
<meta name="og:title" content="{{ $detailProduct->name }}" />
<meta name="keywords" content="{{ $detailProduct->kw }}" />
<meta name="description" content="{{ $detailProduct->meta_des }}" />
<meta name="og:description" content="{{ $detailProduct->meta_des }}" />
<meta name="og:url" content="{{ route('detailProduct',[$detailProduct->alias]) }}" />
<link rel="canonical" href="{{ route('detailProduct',[$detailProduct->alias]) }}">

<meta property="og:image" itemprop="thumbnailUrl" content="{{ $detailProduct->listImage[0]->getAllImage() }}" />
<meta property="og:image:width" content="524" />
<meta property="og:image:height" content="274" />
@parent
@endsection
@section('content')
<div id="product-detail"
    class="page-product  product-id-20 product-exercitat-virginia product-id-category-6 product-id-manufacturer-4 product-id-supplier-0 product-available-for-order">
    <aside id="notifications">
        <div class="container">
        </div>
    </aside>
    <section id="wrapper">
        <nav data-depth="3" class="breadcrumb">
            <div class="container">
                <ol itemscope itemtype="/">
                    <li itemprop="itemListElement" itemscope itemtype="/">
                        <a itemprop="item" href="/">
                            <span itemprop="name">Trang chủ</span>
                        </a>
                        <meta itemprop="position" content="1">
                    </li>
                    <li itemprop="itemListElement" itemscope itemtype="/">
                        <a itemprop="item" href="{{ route('product', $category->alias) }}">
                            <span itemprop="name">Danh mục sản phẩm</span>
                        </a>
                        <meta itemprop="position" content="2">
                    </li>

                    <li itemprop="itemListElement" itemscope itemtype="/">
                        <a itemprop="item" href="{{ route('getDetailBrand', $detailProduct->brand->alias) }}">
                            <span itemprop="name">{{ $detailProduct->brand->name }}</span>
                        </a>
                        <meta itemprop="position" content="2">
                    </li>

                    <li itemprop="itemListElement" itemscope itemtype="/">
                        <span itemprop="name">{{ $detailProduct->name }}</span>
                        <meta itemprop="position" content="3">
                    </li>
                </ol>
            </div>
        </nav>


        <div class="container">
            <div id="columns_inner">
                <div id="content-wrapper">
                    <section id="main" itemscope
                        itemtype="{{ route('detailProduct',[$detailProduct->cateAlias, $detailProduct->alias]) }}">
                        <meta itemprop="url"
                            content="{{ route('detailProduct',[$detailProduct->cateAlias, $detailProduct->alias]) }}">

                        <div class="row">
                            <div class="pp-left-column col-xs-12 col-sm-6 col-md-6">
                                @include('frontend.pages.products.image-left')
                            </div>
                            <div class="pp-right-column col-xs-12  col-sm-6 col-md-6 not-coppy-content">
                                <h1 class="h1 productpage_title" itemprop="name">{{ $detailProduct->name }}</h1>
                                <!-- Codezeel added -->
                                <div class="product-quantities">
                                    <label class="label">Đơn vị: </label>
                                    <span data-stock="998" data-allow-oosp="0">{{ $detailProduct->unit }}</span>

                                    
                                </div>
                                <div class="product-quantities">
                                    <label class="label">Thương hiệu: </label>
                                    <span data-stock="998" data-allow-oosp="0">{{ $detailProduct->brand->name }} </span>
                                </div>
                                <div class="product-quantities">
                                    <label class="label">Hình Thức bán: </label>
                                    @if($detailProduct->type_sale == -1)
                                    <span itemprop="sku">Tại Shop & Online</span>
                                    @endif
                                    @if($detailProduct->type_sale == 0)
                                    <span itemprop="sku">Tại Shop</span>
                                    @endif
                                    @if($detailProduct->type_sale == 1)
                                    <span itemprop="sku">Online</span>
                                    @endif
                                </div>
                                <div class="product-prices not-coppy-content">
                                    <div class="product-price h5 " itemprop="offers" itemscope>
                                        <link itemprop="availability"
                                            href="{{ route('detailProduct',[$detailProduct->cateAlias, $detailProduct->alias]) }}" />
                                        <meta itemprop="priceCurrency" content="VNĐ">

                                        
                                        <div class="current-price">
                                            <span itemprop="price" class="price" content="{{ number_format( $detailProduct->price ) }}">
                                                {{ number_format( $detailProduct->price_sale ) }} VNĐ
                                            </span>
                                            <br/>
                                            <span class="discount-sale">- {{ $detailProduct->discount_sale }} %</span>
                                            <span itemprop="price" class="price-sale"
                                                content="{{ number_format( $detailProduct->price ) }}">
                                                {{ number_format( $detailProduct->price ) }} VNĐ
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="product-quantities">
                                    <label class="label">Thương hiệu: </label>
                                    <span data-stock="998" data-allow-oosp="0">{{ $detailProduct->brand->name }} </span>
                                </div> -->
                                <!-- <div class="product-quantities">
                                    <label class="label">Hình Thức bán: </label>
                                    @if($detailProduct->type_sale == -1)
                                    <span itemprop="sku">Tại Shop & Online</span>
                                    @endif
                                    @if($detailProduct->type_sale == 0)
                                    <span itemprop="sku">Tại Shop</span>
                                    @endif
                                    @if($detailProduct->type_sale == 1)
                                    <span itemprop="sku">Online</span>
                                    @endif
                                </div> -->
                                
                                <div class="product-information">
                                    <div class="product-actions">
                                        <form action="" method="post" id="add-to-cart-or-refresh">
                                            <input type="hidden" name="token" value="8bd9f42887793a736c2d38fd8a0dceff">
                                            <input type="hidden" name="id_product" value="{{ $detailProduct->id }}"
                                                id="product_page_product_id">
                                            <input type="hidden" name="id_customization" value="0"
                                                id="product_customization_id">

                                            <div class="product-variants">
                                                <div class="clearfix product-variants-item">
                                                    @if($detailProduct->type_color == 0)
                                                    <span class="control-label">Màu sắc:</span>
                                                    @endif
                                                    @if($detailProduct->type_color == 1)
                                                    <span itemprop="sku">Chiết Suất</span>
                                                    @endif
                                                    <ul id="group_2">
                                                        @foreach($detailProduct->imgColor as $itemImgColor)
                                                        <li class="pull-xs-left input-container change-image onclick-change-ja" data-id-product="{{ $detailProduct->id }}" data-id="{{ $itemImgColor->id }}" data-url="{{ route('getImageColor') }}">
                                                            <input class="input-color" type="radio"
                                                                data-product-attribute="{{ $itemImgColor->id }}"
                                                                name="color[{{ $itemImgColor->id }}]"
                                                                value="{{ $itemImgColor->id }}">
                                                            <span class="color"
                                                                style="background-image: url('{{ $itemImgColor->getImages() }}')"><span
                                                                    class="sr-only">{{ $itemImgColor->name }}</span></span>
                                                        </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                            <section class="product-discounts">

                                            </section>
                                            @foreach($dataPriceSale as $itemPriceSale)
                                            <div class="product-price-sale">
                                                <label class="label-price-sale">{{ $itemPriceSale['name'] }}: </label>
                                                <select class="form-select get-price-sale" name="price" data-lable="select-{{ $itemPriceSale['id'] }}" data-active="select-{{ $itemPriceSale['id'] }}">
                                                    <option value="0">Chọn một tùy chọn</option>
                                                    @foreach($itemPriceSale['items'] as $item)
                                                    <option value="{{ $item['price'] }}">{{ $item['categoryName'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                           @endforeach
                                            <div class="product-add-to-cart">
                                                <!-- <span class="control-label">Quantity</span>-->

                                                <div class="product-quantity">
                                                    <div class="qty">
                                                        <input type="text" name="quantity" id="quantity_wanted"
                                                            value="1" onchange="changeQuantity(this.value)"
                                                            class="input-group" min="1" aria-label="Quantity">
                                                    </div>
                                                    <div class="add">
                                                        <span class="btn btn-primary add-to-cart-product"
                                                            data-id="{{ $detailProduct->id }}"
                                                            data-name="{{ $detailProduct->name }}"
                                                            data-price="{{ $detailProduct->price_sale }}"
                                                            data-image="{{ $detailProduct->url_imgs }}"
                                                            data-color="{{ $detailProduct->color_id }}"
                                                            data-brand="{{ $detailProduct->brand_id }}"
                                                            data-name-sale=""
                                                            data-url="{{ route('addToCart') }}" data-quantity="1"
                                                            data-checkout="{{ route('checkout') }}">
                                                            Thêm vào giỏ hàng
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                                <p class="product-minimal-quantity">
                                                </p>
                                            </div>
                                            <div class="product-additional-info">

                                                <div class="social-sharing">
                                                    <span>Share</span>
                                                    <ul>
                                                        <div id="fb-root"></div>
                                                        <script async defer crossorigin="anonymous"
                                                            src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v15.0"
                                                            nonce="IrDKTUDJ"></script>
                                                        <div class="fb-share-button"
                                                            data-href="{{ route('detailProduct',[$detailProduct->alias]) }}"
                                                            data-layout="button_count" data-size="large"><a
                                                                target="_blank"
                                                                href="https://www.facebook.com/sharer/sharer.php?u={{ route('detailProduct',[$detailProduct->alias]) }}"
                                                                class="fb-xfbml-parse-ignore">Chia sẻ</a></div>

                                                    </ul>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <section class="product-tabcontent not-coppy-content" >
                            <?php
                                $content = json_decode($detailProduct->content);
                                $tech = json_decode($detailProduct->tech);
                                $service = json_decode($detailProduct->service);
                                $tutorial = json_decode($detailProduct->tutorial);
                                $address_sale = json_decode($detailProduct->address_sale);
                                $open_time = json_decode($detailProduct->open_time);
                            ?>
                            <div class="tabs">
                                <ul class="nav nav-tabs">
                                    @if(isset($content->hidden) && $content->hidden ==1)
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab"
                                            href="#product-content">{{ $content->name }}</a>
                                    </li>
                                    @endif
                                    @if(isset($service->hidden) && $service->hidden ==1)
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab"
                                            href="#product-service">{{ $service->name }}</a>
                                    </li>
                                    @endif
                                    @if(isset($tech->hidden) && $tech->hidden ==1)
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#product-tech">{{@$tech->name}}</a>
                                    </li>
                                    @endif
                                    @if(isset($tutorial->hidden) && $tutorial->hidden ==1)
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab"
                                            href="#product-tutorial">{{@$tutorial->name}}</a>
                                    </li>
                                    @endif
                                    @if(isset($address_sale->hidden) && $address_sale->hidden ==1)
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab"
                                            href="#product-address_sale">{{@$address_sale->name}}</a>
                                    </li>
                                    @endif
                                    @if(isset($open_time->hidden) && $open_time->hidden ==1)
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab"
                                            href="#product-open_time">{{@$open_time->name}}</a>
                                    </li>
                                    @endif
                                </ul>
                                <div class="tab-content" id="tab-content">
                                    @if(isset($content->hidden) && $content->hidden ==1)
                                    <div class="tab-pane fade in active" id="product-content">
                                        {!! @$content->text !!}
                                    </div>
                                    @endif
                                    @if(isset($service->hidden) && $service->hidden ==1)
                                    <div class="tab-pane fade" id="product-service">
                                        {!! @$service->text !!}
                                    </div>
                                    @endif
                                    @if(isset($tech->hidden) && $tech->hidden ==1)
                                    <div class="tab-pane fade in" id="product-tech">
                                        {!! @$tech->text !!}
                                    </div>
                                    @endif
                                    @if(isset($tutorial->hidden) && $tutorial->hidden ==1)
                                    <div class="tab-pane fade in" id="product-tutorial">
                                        {!! @$tutorial->text !!}
                                    </div>
                                    @endif
                                    @if(isset($address_sale->hidden) && $address_sale->hidden ==1)
                                    <div class="tab-pane fade in" id="product-address_sale">
                                        {!! @$address_sale->text !!}
                                    </div>
                                    @endif
                                    @if(isset($open_time->hidden) && $open_time->hidden ==1)
                                    <div class="tab-pane fade in" id="product-open_time">
                                        {!! @$open_time->text !!}
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </section>
                        <!-- Define Number of product for SLIDER -->
                        @include('frontend.pages.products.category-product-orther', ['productOrther' => $productOrther])
                        @include('frontend.pages.products.popup-images')
                    </section>
                </div>
            </div>
        </div>

    </section>
</div>
@endsection