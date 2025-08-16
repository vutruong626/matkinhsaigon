<section class="productscategory-products clearfix home-featured-category" style="margin-bottom: 0;">
    <div class="container">
        <h2 class="h1 products-section-title text-uppercase">
            <span class="main-title">Danh Mục Nổi Bật</span>
        </h2>
        <div class="productscategory-wrapper">
            <div class="products">
                <div id="featured-category" class="cz-carousel secondary-blog">
                    @foreach($featuredCategory as $key => $itemfeaturedCategory)
                    
                    <div class="item-featured-category" style="padding: 5px; background-color: #{{ $itemfeaturedCategory->color }}" >
                    <a href="{{ $itemfeaturedCategory->link }}">
                        <div class="image-featured-category">
                            <img src="{{ $itemfeaturedCategory->getImage() }}" title="{{ $itemfeaturedCategory->name }}"
                                            alt="{{ $itemfeaturedCategory->name }}" class="img-fluid"/>
                        </div>
                        <div class="title-featured-category">
                            <h6>{{ $itemfeaturedCategory->name }}</h6>
                            <a href="{{ $itemfeaturedCategory->link }}">Xem Ngay</a>
                        </div>
                        </a>
                    </div>
                    
                    @endforeach
                </div>
                <!-- <div class="customNavigation">
                    <a class="btn prev productscategory_prev">&nbsp;</a>
                    <a class="btn next productscategory_next">&nbsp;</a>
                </div> -->

            </div>
        </div>
    </div>
</section>