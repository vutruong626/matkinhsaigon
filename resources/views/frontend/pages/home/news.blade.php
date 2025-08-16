<section class="productscategory-products clearfix home-news">
    <div class="container">
        <h2 class="h1 products-section-title text-uppercase">
            <span class="main-title">Tin Tức Mới Mới Nhất</span>
        </h2>
        <div class="productscategory-wrapper">
            <div class="products">
                <div id="news-carousel" class="cz-carousel secondary-blog">
                    @foreach($news as $key => $itemNews)
                    <div class="item" style="padding: 5px;" >
                        <article class="blog-item" >
                            <div class="blog-image-meta">
                                <div class="blog-image">
                                    <a href="{{ route('detailNews', $itemNews->alias) }}" title="{{ $itemNews->name }}"
                                        class="link">
                                        <img src="{{ $itemNews->getImage() }}" title="{{ $itemNews->name }}"
                                            alt="{{ $itemNews->name }}" class="img-fluid" style="width: 100%;" />
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
                        </article>
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