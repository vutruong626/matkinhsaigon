<form id="search-news" action="{{ route('categoryNews',$parentType->alias) }}" method="get">
    <div id="sidepanel-news-mobile" class="sidepanel-news">
        <div class="closebtn" onclick="closeNav()">×</div>
        @foreach($listType as $itemCategory)
        <div class="menu-dropdown">
            <div class="dropdown-btn active">
                <span class="text">
                {{ $itemCategory->name }}
                <i class="fa fa-caret-down"></i>
                </span>
            
            </div>
            <div class="dropdown-container" style="display: block">
                <ul>
                    @foreach($itemCategory->chillParent as $itemChillParent)
                   
                    <li class="item">
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
            </div>
        </div>
        @endforeach
        
    </div>
</form>
<button class="openbtn-news" onclick="openNav()">☰</button>
<script>
function openNav() {
    document.getElementById("sidepanel-news-mobile").style.width = "100%";
}

function closeNav() {
    document.getElementById("sidepanel-news-mobile").style.width = "0";
}

var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
    dropdown[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var dropdownContent = this.nextElementSibling;
        if (dropdownContent.style.display === "block") {
            dropdownContent.style.display = "none";
        } else {
            dropdownContent.style.display = "block";
        }
    });
}
</script>