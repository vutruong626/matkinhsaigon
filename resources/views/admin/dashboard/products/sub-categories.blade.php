@foreach($subcategories as $subcategory)
    <ul class="{{isset($categoriesList[$category->id]) ?: 'd-none'}}">
        <li class="chillcateOpen openCate">
            <input type="checkbox"  {{isset($categoriesList[$subcategory->id]) ? 'checked': ''}} name="categories[]" value="{{ $subcategory->id }}"> 
            <img src="{{$subcategory->getIconImages() }}" alt="" width="25">
            {{$subcategory->name}}
            @if(count($subcategory->subcategory))
                @include('admin.dashboard.products.sub-categories',['subcategories' => $subcategory->subcategory, 'categoryList' => $subcategory ? $subcategory  : $categoriesList])
            @endif
        </li>
    </ul>
@endforeach
