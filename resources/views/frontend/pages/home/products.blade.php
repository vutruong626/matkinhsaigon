<div id="czcategorytabs" class="tabs products_block clearfix animation-element bounce-up in-view">
    <div class="container">
        <div class="categorytab block">
            <h2 class="h1 products-section-title text-uppercase">Sản phẩm mới nhất</h2>
            <div class="czcategory-tab">
                <ul id="czcategory-tabs" class="nav nav-tabs clearfix">
                    @foreach($categoriesProduct as $key => $itemCategory)
                    <li class="nav-item">
                        <a href="#tab_{{ $itemCategory->id }}" data-toggle="tab" class="nav-link {{ $key == 0 ? 'active' : '' }}">
                            <span class="category-title">{{ $itemCategory->name }}</span>
                        </a>
                    </li>
                    @endforeach
                    <!-- <li class="nav-item">
                        <a href="#tab_6" data-toggle="tab" class="nav-link ">
                            <span class="category-title">Specks</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#tab_9" data-toggle="tab" class="nav-link ">
                            <span class="category-title">Round Shape</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#tab_10" data-toggle="tab" class="nav-link ">
                            <span class="category-title">Square Shape</span>
                        </a>
                    </li> -->
                </ul>
            </div>
            
            <div class="tab-content">
                @foreach($categoriesProduct as $key => $itemCategory)
                <div id="tab_{{ $itemCategory->id }}" class="tab-pane {{ $key == 0 ? 'active' : '' }}">
                    <div class="products row">
                        <ul id="czcategory{{$itemCategory->id}}-carousel" class="cz-carousel product_list product_slider_grid"
                            data-catid="{{ $itemCategory->id }}">
                            <!-- star item -->
                            @php
                            $dataProduct = [];
                            @endphp
                            @foreach($itemCategory->listProduct as $itemProduct)
                            <li class="item ">
                                <div class="product-miniature js-product-miniature" data-id-product="1"
                                    data-id-product-attribute="40" itemscope>
                                    <div class="thumbnail-container">

                                        <a href="{{ route('detailProduct', [$itemCategory->alias, $itemProduct->alias]) }}"
                                            class="thumbnail product-thumbnail">
                                            @foreach($itemProduct->listImage as $key => $itemImage)
                                                @if($itemImage->weight == 0) 
                                                <img class="lazyload"
                                                    data-src="{{ $itemImage->getAllImage() }}"
                                                    alt="{{ $itemProduct->name }}"
                                                    data-full-size-image-url="{{ $itemImage->getAllImage() }}">
                                                @endif
                                                @if($itemImage->weight == 1)
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
                                            <li class="discount">- {{ $itemProduct->discount_sale }} % Off</li>
                                            <li class="new">mới</li>
                                        </ul>
                                        @endif
                                        <div class="highlighted-informations hidden-sm-down">
                                            <div class="variant-links">
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <div class="product-description">
                                        <!-- <br/> -->
                                        <span class="h3 product-title" itemprop="name">
                                            <a href="{{ route('detailProduct', [$itemCategory->alias, $itemProduct->alias]) }}">
                                                {{ $itemProduct->name }}
                                            </a>
                                        </span>
                                        <div class="product-price-and-shipping">
                                            <span class="regular-price">{{ number_format($itemProduct->price) }} VNĐ</span>
                                            <span class="discount-percentage discount-product">
                                                @if($itemProduct->discount_sale > 0)
                                                - {{ $itemProduct->discount_sale }} %
                                                @endif
                                            </span>
                                            <span itemprop="price" class="price">{{ number_format($itemProduct->price_sale) }} VNĐ</span>
                                        </div>
                                        <div class="outer-functional">
                                            <div class="functional-buttons">
                                                <div class="product-actions">
                                                    <form action="" method="post" class="add-to-cart-or-refresh">
                                                        <input type="hidden" name="token"
                                                            value="8bd9f42887793a736c2d38fd8a0dceff">
                                                        <input type="hidden" name="id_product" value="1"
                                                            class="product_page_product_id">
                                                        <input type="hidden" name="id_customization" value="0"
                                                            class="product_customization_id">
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
                                                                <i class="feather icon-shopping-cart"></i>
                                                                <span class="add-to-cart">Thêm vào giỏ hàng</span>
                                                                <a href="{{ route('checkout') }}"
                                                                class="view-in-cart d-none">Xem giỏ hàng</a>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </li>
                            @php
                            $dataProduct[] = $itemProduct->id;
                            @endphp
                            @endforeach
                            <!-- end item -->
                        </ul>

                        <div class="customNavigation">
                            <a class="btn prev czcategory_prev">&nbsp;</a>
                            <a class="btn next czcategory_next">&nbsp;</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
        </div>
    </div>
</div>