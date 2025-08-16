<section class="productscategory-products clearfix home-news related-news">
    <div class="container">
        <h2 class="h1 products-section-title text-uppercase">
            <span class="main-title">Tin Tức Liên Quan</span>
        </h2>
        <div class="productscategory-wrapper">
            <div class="products">
                <div id="news-carousel" class="cz-carousel secondary-blog">
                    @foreach($relatedNews as $key => $itemNews)
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
                                
                                <a href="{{ route('detailNews', $itemNews->alias) }}" title="{{ $itemNews->name }}">
                                    <h2 class="title-news">
                                        {{ $itemNews->name }}
                                    </h2>
                                </a>
                                <div class="blog-shortinfo">
                                    {!! $itemNews?->description !!}
                                </div>
                            </div>
                        </article>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>