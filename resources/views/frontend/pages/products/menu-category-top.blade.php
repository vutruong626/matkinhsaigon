<form id="search-products" action="{{route('product',[$slugParent, $slugChild, $slugChildLevel] )}}" method="get">
    <a href="javascript:void(0);" style="font-size:24px;" class="icon-list" onclick="iconCheckReponse()">&#9776;</a>
    <div class="topnav-category" id="top-nav-block">
        <div class="dropdown wrapper-category">
            <div class="dropbtn">
                GIÁ
                <i class="fa fa-caret-down"></i>
            </div>
            <div class="dropdown-content">
                <ul>
                    <li class="item list-item">
                        <span class="custom-checkbox">
                            <input name="price" data-search-url="" id="check-price-1" class="category-item"
                                value="1000000" type="radio"
                                {{ app('request')->input('price') == "1000000" ? "checked" : "" }}>
                        </span>
                        <label class="selected-price-category" for="check-price-1">0 ->1tr</label>
                    </li>
                    <li class="item list-item">
                        <span class="custom-checkbox">
                            <input name="price" data-search-url="" id="check-price-2" class="category-item"
                                value="5000000" type="radio"
                                {{ app('request')->input('price') == "5000000" ? "checked" : "" }}>
                        </span>

                        <label class="selected-price-category" for="check-price-2">1tr ->5tr</label>
                    </li>
                    <li class="item list-item">
                        <span class="custom-checkbox">
                            <input name="price" data-search-url="" id="check-price-3" class="category-item"
                                value="10000000" type="radio"
                                {{ app('request')->input('price') == "10000000" ? "checked" : "" }}>
                        </span>
                        <label class="selected-price-category" for="check-price-3">5tr ->10tr</label>
                    </li>
                    <li class="item list-item">
                        <span class="custom-checkbox">
                            <input name="price" data-search-url="" id="check-price-4" class="category-item"
                                value="50000000" type="radio"
                                {{ app('request')->input('price') == "50000000" ? "checked" : "" }}>
                        </span>
                        <label class="selected-price-category" for="check-price-4">10tr ->50tr</label>
                    </li>
                    <li class="item list-item" onclick="">
                        <span class="custom-checkbox">
                            <input name="price" data-search-url="" id="check-price-5" class="category-item"
                                value="100000000" type="radio"
                                {{ app('request')->input('price') == "100000000" ? "checked" : "" }}>
                        </span>
                        <label for="check-bran-5">50tr ->100tr</label>
                    </li>
                </ul>
            </div>
        </div>

        <div class="dropdown wrapper-category">
            <div class="dropbtn">
                THƯƠNG HIỆU
                <i class="fa fa-caret-down"></i>
            </div>
            <div class="dropdown-content">
                <ul>
                    @foreach($brand as $itemBrand)
                    <li class="item list-item">
                        <label class="facet-label" for="facet_input_{{ $itemBrand->id }}">
                            <span class="custom-checkbox">
                                <input id="check-bran-{{ $itemBrand->id }}" name="brand[]" data-search-url=""
                                    class="item-brand category-item" value="{{ $itemBrand->id }}" type="checkbox"
                                    {{ request()->input('brand') ? in_array($itemBrand->id, request()->input('brand')) ? "checked" : '' : ''}}>
                                <span class="ps-shown-by-js">
                                    <i class="fa fa-check rtl-no-flip checkbox-checked" aria-hidden="true"></i>
                                </span>
                            </span>
                            <label for="check-bran-{{ $itemBrand->id }}">{{ $itemBrand->name }}</label>

                        </label>

                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        @foreach($listCategoties as $itemCategory)
        @if(!$itemCategory->icon)
        <div class="dropdown wrapper-category">
            <div class="dropbtn {{ ($itemCategory->alias == $slugChild) ? 'active-category-top' : ' ' }}">
                {{ $itemCategory->name }}
                <i class="fa fa-caret-down"></i>
            </div>
            <div class="dropdown-content">
                <ul>
                    @foreach($itemCategory->chillParent as $itemChillParent)
                    @if(!$itemChillParent->icon)
                    <li class="item list-item">
                        <label class="facet-label" for="facet_input_{{ $itemChillParent->id }}">
                            <span class="custom-checkbox">
                                <input id="check-categories-{{ $itemChillParent->id }}"
                                    {{ request()->input('category') ? in_array($itemChillParent->id, request()->input('category')) ? "checked" : '' : ''}}
                                    data-search-url="" name="category[]" class="category-item"
                                    value="{{ $itemChillParent->id }}" type="checkbox">
                                <span class="ps-shown-by-js">
                                    <i class="fa fa-check rtl-no-flip checkbox-checked" aria-hidden="true"></i>
                                </span>
                            </span>
                            <label
                                for="check-categories-{{ $itemChillParent->id }}">{{ $itemChillParent->name }}</label>
                        </label>
                    </li>
                    @endif
                    @if($itemChillParent->show_icon == 1)
                    <li
                        style="max-width: 45px; display: inline-block;flex-wrap: wrap;margin-right: -5px; margin-left: -5px; min-width: 45px;">
                        <label class="facet-label" for="facet_input_12254_0">
                            <span class="custom-checkbox">
                                <input id="facet_input_12254_0" style="width: 25px;margin-top: 8px;"
                                    {{ request()->input('category') ? in_array($itemChillParent->id, request()->input('category')) ? "checked" : '' : ''}}
                                    data-search-url="" name="category[]" class="category-item"
                                    value="{{ $itemChillParent->id }}" type="checkbox">
                                <img src="{{ $itemChillParent->getIconImages() }}" alt="" width="25">
                            </span>
                        </label>
                    </li>
                    @endif
                    @endforeach
                </ul>
            </div>
        </div>
        @endif
        @endforeach
    </div>
</form>

<script>
    function iconCheckReponse() {
        var x = document.getElementById("top-nav-block");
        if (x.className === "topnav-category") {
            x.className += " responsive";
        } else {
            x.className = "topnav-category";
        }
    }
</script>