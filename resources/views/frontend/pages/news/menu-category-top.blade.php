
<form id="search-news" action="{{ route('categoryNews',$parentType->alias) }}" method="get">
    <a href="javascript:void(0);" style="font-size:24px;" class="icon-list" onclick="iconCheckReponse()">&#9776;</a>
    <div class="topnav-category " id="top-nav-block">
        <!-- <a href="#home" class="icon-list-cate">&#9776;</a> -->
        @foreach($listType as $itemCategory)
        <div class="dropdown wrapper-category">
            <div class="dropbtn">
                {{ $itemCategory->name }}
                <i class="fa fa-caret-down"></i>
            </div>
            <div class="dropdown-content">
                <ul>
                    @foreach($itemCategory->chillParent as $itemChillParent)
                    <li class="item list-item">
                        <label class="facet-label" for="facet_input_{{ $itemChillParent->id }}">
                            <span class="custom-checkbox">
                                <input id="check-categories-{{ $itemChillParent->id }}"
                                    {{ request()->input('category') ? in_array($itemChillParent->id, request()->input('category')) ? "checked" : '' : ''}}
                                    data-search-url="" name="category[]" class="checkbox-input-item"
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
            </div>
        </div>
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


        