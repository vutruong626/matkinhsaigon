<div id="left-column" class="col-xs-12" style="width:24.5%">
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
            <form id="search-news" action="{{ route('categoryNews',$parentType->alias) }}" method="get">
                <!-- {{csrf_field()}} -->
                <h4 class="block_title">{{ $parentType->name }}</h4>
                <div class="block_content">
                    @foreach($listType as $itemCategory)
                    <section class="facet clearfix">
                        <p class="h6 facet-title hidden-md-down">{{ $itemCategory->name }}</p>
                        <div class="title hidden-lg-up" data-target="#facet_56614" data-toggle="collapse">
                            <p class="h6 facet-title">{{ $itemCategory->name }}</p>
                            <span class="float-xs-right">
                                <span class="navbar-toggler collapse-icons">
                                    <i class="material-icons add">&#xE313;</i>
                                    <i class="material-icons remove">&#xE316;</i>
                                </span>
                            </span>
                        </div>
                        <ul id="facet_56614" class="collapse">
                            @foreach($itemCategory->chillParent as $itemChillParent)
                            <li>
                                <label class="facet-label" for="facet_input_{{ $itemChillParent->id }}">
                                    <span class="custom-checkbox">
                                        <input id="check-categories-{{ $itemChillParent->id }}"
                                            {{ request()->input('category') ? in_array($itemChillParent->id, request()->input('category')) ? "checked" : '' : ''}}
                                            data-search-url="" name="category[]" class="category-news-item"
                                            value="{{ $itemChillParent->id }}" type="checkbox">
                                        <span class="ps-shown-by-js">
                                            <i class="fa fa-check rtl-no-flip checkbox-checked" aria-hidden="true"></i>
                                        </span>
                                    </span>
                                    <label for="check-categories-{{ $itemChillParent->id }}">{{ $itemChillParent->name }}</label>
                                    
                                </label>
                            </li>
                            @endforeach
                        </ul>
                    </section>
                    @endforeach
                </div>
            </form>
        </div>

    </div>
</div>