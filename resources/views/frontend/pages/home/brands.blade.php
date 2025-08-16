<section class="brands">
    <div class="container">

        <div class="products animation-element bounce-up in-view">

            <!-- Define Number of product for SLIDER -->

            <div class="customNavigation">
                <a class="btn prev brand_prev">&nbsp;</a>
                <a class="btn next brand_next">&nbsp;</a>
            </div>

            <ul id="brand-carousel" class="cz-carousel product_list">
                @foreach($brand as $item)
                <li class="item">
                    <div class="brand-image">
                        <a href="{{ route('getDetailBrand', $item->alias) }}"
                            title="{{ $item->name }}">
                            <img class="lazyload"
                                data-src="{{ $item->getLogoBrand() }}"
                                alt="{{ $item->name }}" />
                        </a>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</section>