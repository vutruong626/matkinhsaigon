<section class="productscategory-products clearfix">
    <h2 class="h1 products-section-title text-uppercase">
        Sản phẩm liên quan:
    </h2>
    <div class="productscategory-wrapper">
        <div class="products">
            <!-- Define Number of product for SLIDER -->

            <ul id="productscategory-carousel" class="cz-carousel product_list">
                @foreach($productOrther as $itemProductOrther)
                <li class="item">
                    <div class="product-miniature js-product-miniature" data-id-product="{{ $itemProductOrther->id }}"
                        data-id-product-attribute="{{ $itemProductOrther->id }}" itemscope itemtype="{{ route('detailProduct',$itemProductOrther->alias) }}">
                        <div class="thumbnail-container">
                            <a href="{{ route('detailProduct',$itemProductOrther->alias) }}"
                                class="thumbnail product-thumbnail">
                                @foreach($itemProductOrther->listImage as $key => $itemImage)
                                    @if($key === 0) 
                                    <img class="lazyload"
                                        data-src="{{ $itemImage->getAllImage() }}"
                                        alt="{{ $itemProductOrther->name }}"
                                        data-full-size-image-url="{{ $itemImage->getAllImage() }}">
                                    @endif
                                    @if($key > 0)
                                    <img class="fliper_image img-responsive lazyload"
                                        data-src="{{ $itemImage->getAllImage() }}"
                                        data-full-size-image-url="{{ $itemImage->getAllImage() }}"
                                        alt="{{ $itemProductOrther->name }}" />
                                    @endif
                                @endforeach
                            </a>
                            @if($itemProductOrther->discount_sale > 0)
                            <ul class="product-flags">
                                <li class="on-sale">Đang giảm giá!</li>
                                <li class="discount">- {{ $itemProductOrther->discount_sale }} %</li>
                                <li class="new">mới</li>
                            </ul>
                            @endif

                            <!-- <div class="highlighted-informations hidden-sm-down">
                                <div class="variant-links">
                                    <a href=""
                                        class="color" title="White" style="background-color: #ffffff"><span
                                            class="sr-only">White</span></a>
                                    <a href=""
                                        class="color" title="Red" style="background-color: #E84C3D"><span
                                            class="sr-only">Red</span></a>
                                    <a href=""
                                        class="color" title="Blue" style="background-color: #5D9CEC"><span
                                            class="sr-only">Blue</span></a>
                                    <span class="js-count count"></span>
                                </div>
                            </div> -->
                        </div>

                        <div class="product-description">
                            <br/>
                            <span class="h3 product-title" itemprop="name">
                                <a href="{{ route('detailProduct',$itemProductOrther->alias) }}">
                                    {{ $itemProductOrther->name }}
                                </a>
                            </span>
                            <div class="product-price-and-shipping">
                                <span class="regular-price">{{ number_format($itemProductOrther->price) }} VNĐ</span>
                                <span class="discount-percentage discount-product">
                                    @if($itemProductOrther->discount_sale > 0)
                                    - {{ $itemProductOrther->discount_sale }} %
                                    @endif
                                </span>
                                <span itemprop="price" class="price">{{ number_format($itemProductOrther->price_sale) }} VNĐ</span>
                            </div>
                            <div class="outer-functional">
                                <div class="functional-buttons">
                                    <div class="product-actions">
                                        <a href=""
                                            class="btn btn-primary add-to-cart view_page">
                                            Thêm Vào Giỏ hàng
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </li>
                @endforeach
                
            </ul>

            <div class="customNavigation">
                <a class="btn prev productscategory_prev">&nbsp;</a>
                <a class="btn next productscategory_next">&nbsp;</a>
            </div>

        </div>
    </div>
</section>