@extends('frontend.layouts.master')
@section('content')
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
                <li itemprop="itemListElement" itemscope itemtype="">
                    <span itemprop="name">Thanh Toán</span>
                </li>
            </ol>
        </div>
    </nav>
    <div class="container">
        <div id="columns_inner">
            <div id="content-wrapper">
                <section id="main">
                    <div class="cart-grid row">
                        <!-- Left Block: cart product informations & shpping -->
                        <div class="cart-grid-body col-xs-12 col-lg-9">
                            <!-- cart products detailed -->
                            <div class="card cart-container">
                                <div class="card-block">
                                    <h1 class="h1">Giỏ hàng</h1>
                                </div>
                                <hr class="separator">
                                <div class="cart-overview js-cart">
                                    <ul class="cart-items">
                                        @if(isset($dataProduct))
                                        @foreach($dataProduct as $itemCart)
                                        <li class="cart-item">
                                            <div class="product-line-grid">
                                                <!--  product left content: image-->
                                                <div class="product-line-grid-left col-md-3 col-xs-12">
                                                    <span class="product-image media-middle">
                                                        @foreach($itemCart->listImage as $key => $itemImage)
                                                            @if($key === 0) 
                                                            <img src="{{ $itemImage->getAllImage() }}"
                                                                alt="{{ $itemCart->name }}">
                                                            @endif
                                                        @endforeach
                                                    </span>
                                                </div>

                                                <!--  product left body: description -->
                                                <div class="product-line-grid-body col-md-3 col-xs-12">
                                                    <div class="product-line-info">
                                                        <a class="label"
                                                            href=""
                                                            data-id_customization="0">{{ $itemCart->name }}</a>
                                                    </div>

                                                    <div class="product-line-info product-price h5 ">
                                                        <div class="current-price" data-price="{{$itemCart->name_sale ? $itemCart->priceSaleOffProduct : $itemCart->price_sale}}" id="totalPrice{{$itemCart->id}}" data-id="{{$itemCart->id}}">
                                                            @if($itemCart->name_sale !== null)
                                                            <span class="price">{{ number_format($itemCart->priceSaleOffProduct) }} VNĐ</span>
                                                            @else
                                                            <span class="price">{{ number_format($itemCart->price_sale) }} VNĐ</span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <br>

                                                    <div class="product-line-info">
                                                        <span class="label">Thương Hiệu:</span>
                                                        @foreach($brands as $key => $itemBrand)
                                                        @if($itemBrand->id == $itemCart['brand_id'])
                                                        <span class="value">{{ $itemBrand->name }}</span> 
                                                        @endif
                                                        @endforeach
                                                    </div>
                                                    @if(!empty($itemCart->name_sale))
                                                    <div class="product-line-info">
                                                        <span class="label">Danh Mục Sản Phẩm Chọn:</span>
                                                        @foreach($itemCart->name_sale as $key => $itemNameSale)
                                                        @if($itemNameSale['name'] !== "Chọn một tùy chọn")
                                                        <span class="value">{{ $itemNameSale['name'] }},</span> 
                                                        @endif
                                                        @endforeach
                                                    </div>
                                                    @endif
                                                    <!-- <div class="product-line-info">
                                                        <span class="label">Màu Sắc:</span>
                                                        <span class="value">Grey</span>
                                                    </div> -->

                                                </div>

                                                <!--  product left body: description -->
                                                <div
                                                    class="product-line-grid-right product-line-actions col-md-6 col-xs-12">
                                                    <div class="row">
                                                        <div class="col-xs-0 hidden-md-up"></div>
                                                        <div class="col-md-9 col-xs-12">
                                                            <div class="row">
                                                                <div class="col-md-4 col-xs-4 qty">
                                                                    <div class=" bootstrap-touchspin">
                                                                        <span
                                                                            class="input-group-addon bootstrap-touchspin-prefix"
                                                                            style="display: none;"></span>
                                                                        <input
                                                                            class="js-cart-line-product-quantity form-control"
                                                                            data-down-url="" data-up-url=""
                                                                            data-update-url="" data-product-id="30"
                                                                            type="number" value="{{ $itemCart->quantity }}" 
                                                                            name="product-quantity-spin" min="1"
                                                                            style="display: block;" onchange="countProduct({{ $itemCart->id }}, this.value)">
                                                                        <span
                                                                            class="input-group-addon bootstrap-touchspin-postfix"
                                                                            style="display: none;"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-8 col-xs-8 price">
                                                                    <span class="product-price">
                                                                        @if(!empty($itemCart->name_sale))
                                                                        <strong class="corlor-default" id="p_{{$itemCart->id}}">
                                                                            {{ number_format($itemCart->totalAmount) }} VNĐ
                                                                        </strong>
                                                                        @else
                                                                        <strong class="corlor-default wk" id="p_{{$itemCart->id}}">
                                                                            {{ number_format($itemCart->price_sale * $itemCart->quantity) }} VNĐ
                                                                        </strong>
                                                                        @endif
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 col-xs-12 text-xs-right">
                                                            <div class="cart-line-product-actions">
                                                            <button class="update-from-cart updatedataProductCart" rel="nofollow" 
                                                                    data-id="{{ $itemCart->id }}"
                                                                    data-name="{{ $itemCart->name }}"
                                                                    data-price="{{ $itemCart->name_sale ? $itemCart->priceSaleOffProduct : $itemCart->price_sale }}"
                                                                    data-image="{{ $itemCart->listImage }}"
                                                                    data-color="{{ $itemCart->color_id }}"
                                                                    data-brand="{{ $itemCart->brand_id }}"
                                                                    data-quantity="1"
                                                                    data-url="{{ route('updateCart') }}"
                                                            >
                                                                <!-- <i class="fa fa-repeat" aria-hidden="true"></i> -->
                                                                <i class="fa fa-check" aria-hidden="true"></i>
                                                                    <!-- update -->
                                                                </button>
                                                                <button class="remove-from-cart" rel="nofollow" type="button"
                                                                        data-toggle="modal" data-target="#deleteCart-{{$itemCart->id}}"
                                                                >
                                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                                    <!-- delete -->
                                                                </button>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="clearfix"></div>
                                            </div>

                                        </li>
                                        @include('frontend.pages.products.popup-delete-cart', ['itemCart' => $itemCart])
                                        @endforeach
                                        @endif
                                    </ul>
                                </div>
                            </div>
                            <!-- <a class="label" href="">
                                <i class="material-icons">chevron_left</i>Continue shopping
                            </a> -->
                            <!-- shipping informations -->
                        </div>
                        <!-- Right Block: cart subtotal & cart total -->
                        <div class="cart-grid-right col-xs-12 col-lg-3">
                            <div class="card cart-summary">
                                <div class="cart-detailed-totals">

                                    <div class="card-block">
                                        <div class="cart-summary-line" id="cart-subtotal-products">
                                            <span class="label js-subtotal">
                                                {{ $totalQT }} Sản Phẩm
                                            </span>
                                            @if($dataSale === true)
                                            <span class="value">
                                                {{ number_format($priceSaleOff) }} VNĐ
                                            </span>
                                            @else 
                                            <span class="value">
                                                {{ number_format($totalCart) }} VNĐ
                                            </span>
                                            @endif
                                        </div>
                                        <div class="cart-summary-line" id="cart-subtotal-shipping">
                                            <span class="label">
                                                Đang chuyển hàng
                                            </span>
                                            <span class="value">
                                                Miễn Phí
                                            </span>
                                            <div><small class="value"></small></div>
                                        </div>
                                    </div>
                                    <div class="card-block cart-summary-totals">
                                        <div class="cart-summary-line cart-total">
                                            <span class="label">Tổng Tiền Thanh Toán&nbsp; :</span>
                                            @if($dataSale === true)
                                            <span class="value">{{ number_format($priceSaleOff) }} VNĐ</span>
                                            @else 
                                            <span class="value">{{ number_format($totalCart) }} VNĐ</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="checkout cart-detailed-actions card-block">
                                    <div class="text-sm-center">
                                        <a href="{{ route('getClientInformation') }}"
                                            class="btn btn-primary">Tiến Hành Thanh Toán</a>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</section>
@endsection