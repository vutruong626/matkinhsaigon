<form id="search-category" action="{{ route('products.getListProduct') }}" method="get">
    <div class="row">
        <!-- <div class="col-md-4">
                </div> -->
        <div class="col-md-3">
            <div class="search-select-categories">
                <fieldset class="form-group">
                    <select class="form-control search-categories" name="category"
                        value="{{ request()->input('category' ?? "") }}">
                        <option value="-1">------------ Danh Mục Cha ------------</option>
                        @if(!empty($parentCategories))
                        @foreach($parentCategories as $parentCategory)
                        <option value="{{ $parentCategory->id }}"
                            {{ request()->input('category') ==  $parentCategory->id ? 'selected="selected"': ''}}>
                            {{ $parentCategory->name }}
                        </option>
                        @if(!empty($parentCategory->chillParent))
                        @foreach($parentCategory->chillParent as $itemChillParent)
                        <option value="{{ $itemChillParent->id }}"
                            {{ request()->input('category') ==  $itemChillParent->id ? 'selected="selected"': ''}}>
                            &ensp;&ensp;&ensp;|-->{{ $itemChillParent->name }}
                        </option>
                        @if(!empty($itemChillParent->childLevelParent))
                        @foreach($itemChillParent->childLevelParent as $itemChildLevelParent)
                        <option value="{{ $itemChildLevelParent->id }}"
                            {{ request()->input('category') ==  $itemChildLevelParent->id ? 'selected="selected"': ''}}>
                            &ensp;&ensp;&ensp;&ensp;|---->{{ $itemChildLevelParent->name }}
                        </option>
                        @endforeach
                        @endif
                        @endforeach
                        @endif
                        @endforeach
                        @endif
                    </select>
                </fieldset>
            </div>
        </div>
        <div class="col-md-3">
            <div class="search-select-materials">
                <fieldset class="form-group">
                    <select class="form-control search-materials search-categories" id="basicSelect" name="brand">
                        <option value="-1">------------ Thương Hiệu ------------</option>
                        @foreach($brand as $itemBrand)
                        <option value="{{ $itemBrand->id }}"
                            {{ request()->input('brand') ==  $itemBrand->id ? 'selected="selected"': ''}}>
                            {{ $itemBrand->name }}</option>
                        @endforeach
                    </select>
                </fieldset>
            </div>
        </div>
        <div class="col-md-4">
            <div class="search-select-materials">
                <fieldset class="form-group">
                    <input type="text" name="keywork" value="{{ request()->input('keywork') }}"
                        placeholder="Tìm Kiếm Theo Tên"
                        class="form-control search-materials search-categories">
                </fieldset>
            </div>
        </div>
        <div class="col-md-2">
            <div class="reset-search">
                <a href="{{ route('products.getListProduct') }}">reset search</a>
            </div>
        </div>
    </div>

</form>