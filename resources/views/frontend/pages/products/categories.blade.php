<style>
/* .hidden-cate-old {
    display: none;
} */

@media screen and (max-width: 600px) {
    /* .hidden-cate-old {
        display: block;
    } */

    .search_filters {
        overflow-y: scroll;
    }
    #left-column .block, #right-column .block {
        margin: 0px 0 30px;
    }
}
/* #left-column .block, #right-column .block {
    margin: -70px 0 70px;
} */
</style>
<div id="left-column" class="col-xs-12 hidden-cate-old" style="width:24.5%">
    <div id="search_filters_wrapper" class="hidden-md-down block">
        <!-- hidden-sm-down -->
        <div id="search_filter_controls" class="hidden-lg-up">
            <!--  -->
            <span id="_mobile_search_filters_clear_all"></span>
            <button class="btn btn-secondary ok">
                <i class="material-icons">&#xE876;</i>
                OK
            </button>
        </div>
        <div id="search_filters">
            <form id="search-products" action="{{route('product',[$slugParent, $slugChild, $slugChildLevel] )}}" method="get">
                <h4 class="block_title">{{ $categories->name }}</h4>
                <input type="hidden" name="aliasCategory" value="{{ $categories->alias }}">
                <div class="block_content">


                <section class="facet clearfix">
                        <p class="h6 facet-title hidden-md-down">GIÁ</p>

                        <div class="title hidden-lg-up" data-target="#facet_47561" data-toggle="collapse">
                            <p class="h6 facet-title">GIÁ</p>
                            <span class="float-xs-right">
                                <span class="navbar-toggler collapse-icons">
                                    <i class="material-icons add">&#xE313;</i>
                                    <i class="material-icons remove">&#xE316;</i>
                                </span>
                            </span>
                        </div>
                        <div class="budget-wrap">
                            <div class="budget">
                                <div class="header">
                                    <div class="title clearfix"><span class="pull-right" style="display: {{ request()->input('price') ? 'block' : 'none' }}"></span></div>
                                </div>
                                
                                <div class="content">
                                    <input type="range" name="price" min="0" max="50000000" id="pointstopredicts" 
                                            data-price="{{ request()->has('price') ? str_replace(',', '', request()->input('price')) : "" }}" 
                                            data-rangeslider value="{{ request()->has('price') ? str_replace(',', '', request()->input('price')) : "0" }}">
                                </div>
                            </div>
                        </div>

                    </section>
                    


                <section class="facet clearfix">
                        <p class="h6 facet-title hidden-md-down">THƯƠNG HIỆU</p>
                        <p class="h6 facet-title hidden-md-down chill-brand-iao"><span class="icon-brand-psn"></span>Có {{ $brand->count() }} thương hiệu </p>
                        <div class="title hidden-lg-up" data-target="#facet_001" data-toggle="collapse">
                            <p class="h6 facet-title">THƯƠNG HIỆU</p>
                            <span class="float-xs-right">
                                <span class="navbar-toggler collapse-icons">
                                    <i class="material-icons add">&#xE313;</i>
                                    <i class="material-icons remove">&#xE316;</i>
                                </span>
                            </span>
                        </div>

                        <ul id="facet_001" class="collapse">
                            <p class="h6 facet-title tottal-brand-menu---mobile"><span class="icon-brand-psn"></span>Có {{ $brand->count() }} thương hiệu </p>
                            @foreach($brand as $itemBrand)
                            <li class="item-load-more">
                                <label class="facet-label" for="facet_input_{{ $itemBrand->id }}">
                                    <span class="custom-checkbox">
                                        <input id="facet_input_{{ $itemBrand->id }}" name="brand[]"         
                                                data-search-url="" class="category-item"
                                                value="{{ $itemBrand->id }}" type="checkbox"
                                                {{ request()->input('brand') ? in_array($itemBrand->id, request()->input('brand')) ? "checked" : '' : ''}}
                                            >
                                        <span class="ps-shown-by-js">
                                            <i class="fa fa-check rtl-no-flip checkbox-checked" aria-hidden="true"></i>
                                        </span>
                                    </span>

                                    <a href=""
                                        class="_gray-darker search-link js-search-link" rel="nofollow">
                                        {{ $itemBrand->name }}
                                    </a>
                                </label>
                            </li>
                            
                            @endforeach
                            
                        </ul>
                        @if(count($brand) > 10)
                            <a href="#" id="loadMore">Xem thêm</a>

                            <p class="totop"> 
                                <a href="#top">Back to top</a> 
                            </p>
                        @endif
                    </section>

                    @foreach($listCategoties as $itemCategory)
                    @if(!$itemCategory->icon)
                    <section class="facet clearfix">
                        <p class="h6 facet-title hidden-md-down">{{ $itemCategory->name }}</p>
                        <div class="title hidden-lg-up" data-target="#facet_{{ $itemCategory->id }}" data-toggle="collapse">
                            <p class="h6 facet-title">{{ $itemCategory->name }}</p>
                            <span class="float-xs-right">
                                <span class="navbar-toggler collapse-icons">
                                    <i class="material-icons add">&#xE313;</i>
                                    <i class="material-icons remove">&#xE316;</i>
                                </span>
                            </span>
                        </div>
                        <ul id="facet_{{ $itemCategory->id }}" class="collapse">
                            @foreach($itemCategory->chillParent as $itemChillParent)
                            @if(!$itemChillParent->icon)
                            <li>
                                <label class="facet-label" for="facet_input_{{ $itemChillParent->id }}">
                                    <span class="custom-checkbox">
                                        <input id="facet_input_{{ $itemChillParent->id }}"
                                            {{ request()->input('category') ? in_array($itemChillParent->id, request()->input('category')) ? "checked" : '' : ''}}
                                            data-search-url="" name="category[]" class="category-item"
                                            value="{{ $itemChillParent->id }}" type="checkbox">
                                        <span class="ps-shown-by-js">
                                            <i class="fa fa-check rtl-no-flip checkbox-checked" aria-hidden="true"></i>
                                        </span>
                                    </span>

                                    <a href="index3847.html?id_category=3&amp;controller=category&amp;id_lang=1&amp;q=Categories-Material"
                                        class="_gray-darker search-link js-search-link" rel="nofollow">
                                        {{ $itemChillParent->name }}
                                    </a>
                                </label>
                            </li>
                            @endif
                            @if($itemChillParent->icon)
                            <li style="max-width: 45px; display: inline-block;flex-wrap: wrap;margin-right: -5px; margin-left: -5px; min-width: 45px;">
                                <label class="facet-label" for="facet_input_12254_0">
                                    <span class="custom-checkbox">
                                        <input id="facet_input_12254_0" style="width: 25px;margin-top: 8px;"
                                            {{ request()->input('category') ? in_array($itemChillParent->id, request()->input('category')) ? "checked" : '' : ''}}
                                            data-search-url="" name="category[]" class="category-item"
                                            value="{{ $itemChillParent->id }}" type="checkbox">
                                        <img src="{{ $itemChillParent->getIconImages() }}" alt="" width="25">
                                    </span>
                                    <!-- <a href="index9e3c.html?id_category=3&amp;controller=category&amp;id_lang=1&amp;q=Color-Grey"
                                        class="_gray-darker search-link js-search-link" rel="nofollow">
                                        {{ $itemChillParent->name }}
                                    </a> -->
                                </label>
                            </li>
                            @endif
                            @endforeach
                        </ul>
                    </section>
                    @endif
                    @endforeach
                </div>
            </form>
        </div>

    </div>
</div>