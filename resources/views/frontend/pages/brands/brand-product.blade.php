<!-- <link rel="stylesheet" href="http://localhost/frontend/css/app-asset/bootstrap.min.css" type="text/css" media="all"> -->
<section id="nav-brand-detail" class="product-brand-detail">
    <div class="container">
        <div id="tab-Categories"></div>
        <div class="card-header">
            <h4 class="card-title font-size-24">SẢN PHẨM THUỘC THƯƠNG HIỆU <code>{{ $detailBrand->name }}</code></h4>
        </div>
        <br>
        <div class="row">

            <div class="col-lg-2 col-md-2 col-sm-12 col-xl-2 pt-left-right-5">
                <div class="list-categories-detail-brand">
                    <button class="click-all-brand  {{ $materialID ? '' : 'active' }}"
                        data-url="{{ route('getDetailBrand', $detailBrand->alias) }}">Tất cả</button>
                </div>
            </div>
            @php
            $materials = [];
            @endphp
            @foreach($material as $itemMaterial)
            @if(!in_array($itemMaterial->id, $materials))
            <div class="col-lg-2 col-md-2 col-sm-12 col-xl-2 pt-left-right-5">
                <div class="list-categories-detail-brand">
                    <button class="onclick-item  {{ $materialID == $itemMaterial->id ? 'active' : ' '}}" data-id="{{ $itemMaterial->id }}"
                        data-url="{{ route('getDetailBrand', [$detailBrand->alias, $itemMaterial->id]) }}">
                        {{ $itemMaterial->name }}
                    </button>
                </div>
            </div>
            @endif
            @php
            $materials[] = $itemMaterial->id;
            @endphp
            @endforeach

        </div>
        <br>
        <div class="row">

            <div id="js-product-list">
                <div class="products row">
                    <ul class="product_list grid gridcount">
                        @foreach($products as $itemProduct)
                        <li class="product_item col-xs-12 col-sm-6 col-md-3 col-lg-3">
                            <div class="product-miniature js-product-miniature" data-id-product="1"
                                data-id-product-attribute="40" itemscope
                                itemtype="{{ route('detailProduct',$itemProduct->alias) }}">
                                <div class="thumbnail-container">

                                    <a href="{{ route('detailProduct',$itemProduct->alias) }}"
                                        class="thumbnail product-thumbnail">
                                        @foreach($itemProduct->listImage as $key => $itemImage)
                                        @if($key === 0)
                                        <img class="lazyload" data-src="{{ $itemImage->getAllImage() }}"
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
                                        <li class="discount">- {{ $itemProduct->discount_sale }} %</li>
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
                                    <!-- <br /> -->
                                    <h3 class="h3 product-title" itemprop="name">
                                        <a
                                            href="{{ route('detailProduct',$itemProduct->alias) }}">
                                            {{ $itemProduct->name }}
                                        </a>
                                    </h3>
                                    <div class="product-price-and-shipping">
                                        <span class="regular-price">{{ number_format($itemProduct->price) }}
                                            VNĐ</span>
                                        <span class="discount-percentage discount-product">
                                            @if($itemProduct->discount_sale > 0)
                                            {{ $itemProduct->discount_sale }} %
                                            @endif
                                        </span>
                                        <span itemprop="price"
                                            class="price">{{ number_format($itemProduct->price_sale) }}
                                            VNĐ</span>
                                    </div>
                                    <div class="outer-functional">
                                        <div class="functional-buttons">
                                            <div class="product-actions">
                                                    <div class="item-options text-center ">
                                                        <div class="cart add-to-cart-product add-cart"
                                                            data-id="{{ $itemProduct->id }}"
                                                            data-name="{{ $itemProduct->name }}"
                                                            data-price="{{ $itemProduct->price_sale }}"
                                                            data-image="{{ $itemProduct->listImage }}"
                                                            data-color="{{ $itemProduct->color_id }}"
                                                            data-brand="{{ $itemProduct->brand_id }}"
                                                            data-checkout="{{ route('checkout') }}"
                                                            data-url="{{ route('addToCart') }}" data-quantity="1">
                                                            <i class="feather icon-shopping-cart"></i>
                                                            <span class="add-to-cart">Thêm vào giỏ
                                                                hàng</span>
                                                            <a href="{{ route('checkout') }}"
                                                                class="view-in-cart d-none">Xem giỏ
                                                                hàng</a>
                                                        </div>
                                                    </div>
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
        <div class="row">
            <div class="col-12 pagination">

            </div>
        </div>
    </div>
</section>