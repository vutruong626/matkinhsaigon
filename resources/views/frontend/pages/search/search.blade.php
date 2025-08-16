@extends('frontend.layouts.master')

@section('content')
<div id="category" 
    class="currency-usd layout-left-column page-category category-id-3 category-sunglasses category-id-parent-2 category-depth-level-2 page-list-product">
    <aside id="notifications">
        <div class="container">
        </div>
    </aside>
    <section id="wrapper">
        <nav data-depth="2" class="breadcrumb">
            <div class="container">
                <ol itemscope itemtype="/">
                    <li itemprop="itemListElement" itemscope itemtype="/">
                        <a itemprop="item" href="/">
                            <span itemprop="name">Trang Chủ</span>
                        </a>
                        <meta itemprop="position" content="1">
                    </li>
                    <li itemprop="itemListElement" itemscope itemtype="">
                        <a itemprop="item" href="">
                            <span itemprop="name">Tìm Kiếm</span>
                        </a>
                        <meta itemprop="position" content="2">
                    </li>
                </ol>
            </div>
        </nav>
        <div class="container">
            <div id="columns_inner">
                <!-- Categories Right -->
                <div id="content-wrapper" class="left-column col-xs-12 col-sm-12 col-md-12">
                    <section id="main">
                        <section id="products">
                            <div id="">
                                <div id="js-product-list-top" class="products-selection">
                                    <div class="col-md-6 hidden-md-down total-products">
                                        <ul class="display hidden-xs grid_list">
                                            <li id="grid"><a href="#" title="Grid">Grid</a></li>
                                            <!-- <li id="list"><a href="#" title="List">List</a></li> -->
                                        </ul>
                                        <p>Có {{ $products->total() }} sản phẩm.</p>
                                    </div>
                                    
                                </div>
                            </div>
                            <div id="" class="hidden-sm-down">
                                <section id="js-active-search-filters" class="hide">
                                    <h1 class="h6 hidden-xs-up">Active filters</h1>

                                </section>
                            </div>
                            <div id="">
                                <div id="js-product-list">
                                    <div class="products row">
                                        <ul class="product_list grid gridcount">
                                            <!-- removed product_grid-->
                                            @foreach($products as $itemProduct)
                                            <li class="product_item col-xs-12 col-sm-6 col-md-6 col-lg-4">

                                                <div class="product-miniature js-product-miniature" data-id-product="1"
                                                    data-id-product-attribute="40" itemscope
                                                    itemtype="{{ route('detailProduct',$itemProduct->alias) }}">
                                                    <div class="thumbnail-container">

                                                        <a href="{{ route('detailProduct',$itemProduct->alias) }}"
                                                            class="thumbnail product-thumbnail">
                                                            @foreach($itemProduct->listImage as $key => $itemImage)
                                                                @if($key === 0) 
                                                                <img class="lazyload"
                                                                    data-src="{{ $itemImage->getAllImage() }}"
                                                                    alt="{{ $itemProduct->name }}"
                                                                    data-full-size-image-url="{{ $itemImage->getAllImage() }}">
                                                                @endif
                                                                @if($key > 0)
                                                                <img class="fliper_image img-responsive lazyload"
                                                                    data-src="{{ $itemImage->getAllImage() }}"
                                                                    data-full-size-image-url="{{ $itemImage->getAllImage() }}"
                                                                    alt="{{ $itemProduct->name }}" />
                                                                @endif
                                                            @endforeach
                                                        </a>
                                                        @if($itemProduct->discount_sale > 0)
                                                        <ul class="product-flags">
                                                            <li class="on-sale">Đang giảm giá!</li>
                                                            <li class="discount">- {{ $itemProduct->discount_sale }} %
                                                                Off</li>
                                                            <li class="new">mới</li>
                                                        </ul>
                                                        @endif
                                                        <div class="highlighted-informations hidden-sm-down">
                                                            <div class="variant-links">
                                                            </div>
                                                            <span class="product-availability">
                                                                <span class="product-available">
                                                                    <i class="material-icons">&#xE5CA;</i>
                                                                    In stock
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>

                                                    <div class="product-description">
                                                        <br />
                                                        <h3 class="h3 product-title" itemprop="name">
                                                            <a
                                                                href="{{ route('detailProduct',$itemProduct->alias) }}">
                                                                {{ $itemProduct->name }}
                                                            </a>
                                                        </h3>
                                                        <div class="product-price-and-shipping">
                                                            <span
                                                                class="regular-price">{{ number_format($itemProduct->price) }}
                                                                VNĐ</span>
                                                            <span class="discount-percentage discount-product">
                                                                @if($itemProduct->discount_sale > 0)
                                                                {{ $itemProduct->discount_sale }} % Off
                                                                @endif
                                                            </span>
                                                            <span itemprop="price"
                                                                class="price">{{ number_format($itemProduct->price_sale) }}
                                                                VNĐ</span>
                                                        </div>
                                                        <div class="outer-functional">
                                                            <div class="functional-buttons">
                                                                <div class="product-actions">
                                                                    <form action="" method="post"
                                                                        class="add-to-cart-or-refresh">
                                                                        <input type="hidden" name="id_product" value="1"
                                                                            class="product_page_product_id">
                                                                        <input type="hidden" name="id_customization"
                                                                            value="0" class="product_customization_id">
                                                                        <div class="item-options text-center ">
                                                                            <div class="cart add-to-cart-product add-cart"
                                                                                data-id="{{ $itemProduct->id }}"
                                                                                data-name="{{ $itemProduct->name }}"
                                                                                data-price="{{ $itemProduct->price_sale }}"
                                                                                data-image="{{ $itemProduct->url_imgs }}"
                                                                                data-color="{{ $itemProduct->color_id }}"
                                                                                data-brand="{{ $itemProduct->brand_id }}"
                                                                                data-url="{{ route('addToCart') }}"
                                                                                data-checkout="{{ route('checkout') }}"
                                                                                data-quantity="1">
                                                                                <i
                                                                                    class="feather icon-shopping-cart"></i>
                                                                                <span class="add-to-cart">Thêm vào giỏ
                                                                                    hàng</span>
                                                                                <a href="{{ route('checkout') }}"
                                                                                    class="view-in-cart d-none">Xem giỏ
                                                                                    hàng</a>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="ps_sortPagiBar clearfix bottom-line">
                                        {{ $products->links('frontend.pages.pagination.customer-pagination') }}
                                    </div>
                                </div>
                            </div>
                        </section>
                    </section>
                </div>
            </div>
        </div>

    </section>
</div>


@endsection