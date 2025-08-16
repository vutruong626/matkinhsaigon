@extends('admin.layouts.master')
@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">Tạo Mới Sản Phẩm</h2>
            </div>
        </div>
    </div>
</div>
<!-- Input Validation start -->
@include('admin.layouts.include.messages')
<section class="input-validation upsort-product">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form method="post" action="{{ route('product.postUpdateProduct', $product->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Tên sản phẩm:</label>
                                        <div class="controls">
                                            <input type="text" name="name" class="form-control"
                                                value="{{ $product->name }}" placeholder="Tên sản phẩm" id="pushSlug"
                                                onkeyup="ChangeToSlug();">
                                        </div>
                                        @if ($errors->has('name'))
                                        <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Link</label>
                                        <div class="controls">
                                            <input type="text" name="alias" class="form-control"
                                                value="{{ $product->alias }}"
                                                data-validation-required-message="Vui lòng nhập thương hiệu" id="slug"
                                                placeholder="Tên Sản Phẩm">
                                        </div>
                                        @if ($errors->has('name'))
                                        <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="controls">
                                                    @if(isset($product->description["name"]))
                                                    <input type="text" name="description[name]" class="form-control"
                                                        value='{{ $product->description["name"] }}'
                                                        placeholder='{{ $product->description["name"] }}'>
                                                    @else
                                                    <input type="text" name="description[name]" class="form-control"
                                                        value=''
                                                        placeholder=''>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <div class="vs-checkbox-con vs-checkbox-primary">
                                                        @if(isset($product->description["hidden"]))
                                                        <input type="checkbox" name="description[hidden]" {{ ($product->description["hidden"] === "1") ? 'checked' : "" }} value='{{ $product->description["hidden"] }}'>
                                                        @else
                                                        <input type="checkbox" name="description[hidden]" checked='' value='1'>
                                                        @endif
                                                        <span class="vs-checkbox">
                                                            <span class="vs-checkbox--check">
                                                                <i class="vs-icon feather icon-check"></i>
                                                            </span>
                                                        </span>
                                                        <span class="">Active</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="controls">
                                            <fieldset class="form-label-group mb-0">
                                                @if(isset($product->description["text"]))
                                                <textarea name="description[text]" id="editorDescription"
                                                    class="form-control char-textarea" rows="3" required>{{ $product->description["text"] }}</textarea>
                                                @else
                                                <textarea name="description[text]" id="editorDescription"
                                                    class="form-control char-textarea" rows="3" required>{{ $product->description }}</textarea>
                                                @endif

                                            </fieldset>
                                        </div>
                                        @if ($errors->has('decription'))
                                        <span class="text-danger text-left">{{ $errors->first('decription') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="controls">
                                                    <input type="text" name="content[name]" class="form-control"
                                                        value='{{ $product->content["name"] }}'
                                                        placeholder="Tên Sản Phẩm">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <div class="vs-checkbox-con vs-checkbox-primary">
                                                        <input type="checkbox" name="content[hidden]" checked=""
                                                            value='{{ $product->content["hidden"] }}'>
                                                        <span class="vs-checkbox">
                                                            <span class="vs-checkbox--check">
                                                                <i class="vs-icon feather icon-check"></i>
                                                            </span>
                                                        </span>
                                                        <span class="">Active</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="controls">
                                            <fieldset class="form-label-group mb-0">
                                                <textarea name="content[text]" id="editorContent"
                                                    class="form-control char-textarea" rows="3"
                                                    required>{{ $product->content["text"] }}</textarea>
                                            </fieldset>
                                        </div>
                                        @if ($errors->has('decription'))
                                        <span class="text-danger text-left">{{ $errors->first('decription') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="controls">
                                                    <input type="text" name="service[name]" class="form-control"
                                                        value='{{ $product->service["name"] }}'
                                                        placeholder="Tên Sản Phẩm">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <fieldset>
                                                        <div class="vs-checkbox-con vs-checkbox-primary">
                                                            <input type="checkbox" name="service[hidden]" checked=""
                                                                value='{{ $product->service["hidden"] }}'>
                                                            <span class="vs-checkbox">
                                                                <span class="vs-checkbox--check">
                                                                    <i class="vs-icon feather icon-check"></i>
                                                                </span>
                                                            </span>
                                                            <span class="">Active</span>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="controls">
                                            <fieldset class="form-label-group mb-0">
                                                <textarea name="service[text]" id="editorNameSpecifications"
                                                    class="form-control char-textarea"
                                                    rows="3">{{ $product->service["text"] }}</textarea>
                                            </fieldset>
                                        </div>
                                        @if ($errors->has('decription'))
                                        <span class="text-danger text-left">{{ $errors->first('decription') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="controls">
                                                    <input type="text" name="tech[name]" class="form-control"
                                                        value='{{ $product->tech["name"] }}' placeholder="Tên Sản Phẩm">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <fieldset>
                                                        <div class="vs-checkbox-con vs-checkbox-primary">
                                                            <input type="checkbox" name="tech[hidden]" checked=""
                                                                value='{{ $product->tech["hidden"] }}'>
                                                            <span class="vs-checkbox">
                                                                <span class="vs-checkbox--check">
                                                                    <i class="vs-icon feather icon-check"></i>
                                                                </span>
                                                            </span>
                                                            <span class="">Active</span>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="controls">
                                            <fieldset class="form-label-group mb-0">
                                                <textarea name="tech[text]" id="editorNameConsultingService"
                                                    class="form-control char-textarea"
                                                    rows="3">{{ $product->tech["text"] }}</textarea>
                                            </fieldset>
                                        </div>
                                        @if ($errors->has('decription'))
                                        <span class="text-danger text-left">{{ $errors->first('decription') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="controls">
                                                    <input type="text" name="tutorial[name]" class="form-control"
                                                        value='{{ $product->tutorial["name"] }}'>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <fieldset>
                                                        <div class="vs-checkbox-con vs-checkbox-primary">
                                                            <input type="checkbox" name="tutorial[hidden]" checked=""
                                                                value='{{ $product->tutorial["hidden"] }}'>
                                                            <span class="vs-checkbox">
                                                                <span class="vs-checkbox--check">
                                                                    <i class="vs-icon feather icon-check"></i>
                                                                </span>
                                                            </span>
                                                            <span class="">Active</span>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="controls">
                                            <fieldset class="form-label-group mb-0">
                                                <textarea name="tutorial[text]" id="editorNameShoppingGuide"
                                                    class="form-control char-textarea"
                                                    rows="3">{{ $product->tutorial["text"] }}</textarea>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="controls">
                                                    <input type="text" name="address_sale[name]" class="form-control"
                                                        value='{{ $product->address_sale["name"] }}'>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <fieldset>
                                                        <div class="vs-checkbox-con vs-checkbox-primary">
                                                            <input type="checkbox" name="address_sale[hidden]"
                                                                checked=""
                                                                value='{{ $product->address_sale["hidden"] }}'>
                                                            <span class="vs-checkbox">
                                                                <span class="vs-checkbox--check">
                                                                    <i class="vs-icon feather icon-check"></i>
                                                                </span>
                                                            </span>
                                                            <span class="">Active</span>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="controls">
                                            <fieldset class="form-label-group mb-0">
                                                <textarea name="address_sale[text]" id="editorNameAddresse"
                                                    class="form-control char-textarea" rows="3"
                                                    required>{{ $product->address_sale["text"] }}</textarea>
                                            </fieldset>
                                        </div>
                                        @if ($errors->has('decription'))
                                        <span class="text-danger text-left">{{ $errors->first('decription') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="controls">
                                                    <input type="text" name="open_time[name]" class="form-control"
                                                        value='{{ $product->open_time["name"] }}'>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <fieldset>
                                                        <div class="vs-checkbox-con vs-checkbox-primary">
                                                            <input type="checkbox" name="open_time[hidden]" checked=""
                                                                value='{{ $product->open_time["hidden"] }}'>
                                                            <span class="vs-checkbox">
                                                                <span class="vs-checkbox--check">
                                                                    <i class="vs-icon feather icon-check"></i>
                                                                </span>
                                                            </span>
                                                            <span class="">Active</span>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="controls">
                                            <fieldset class="form-label-group mb-0">
                                                <textarea name="open_time[text]" id="editorNameOpenTime"
                                                    class="form-control char-textarea"
                                                    rows="3">{{ $product->open_time["text"] }}</textarea>
                                            </fieldset>
                                        </div>
                                        @if ($errors->has('decription'))
                                        <span class="text-danger text-left">{{ $errors->first('decription') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Meta Keyword:</label>
                                        <div class="controls">
                                            <input type="text" name="kw" class="form-control"
                                                value="{{ $product->kw }}">
                                        </div>
                                        @if ($errors->has('kw'))
                                        <span class="text-danger text-left">{{ $errors->first('kw') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Meta Descript:</label>
                                        <div class="controls">
                                            <textarea rows="" cols="" name="meta_des" class="form-control char-textarea"
                                                rows="3">{{ $product->meta_des }}</textarea>
                                        </div>
                                        @if ($errors->has('meta_des'))
                                        <span class="text-danger text-left">{{ $errors->first('meta_des') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Giá nhập (VNĐ):</label>
                                        <div class="controls">
                                            <input type="text" name="price" class="form-control number_format"
                                                id="priceBalance" value="{{ $product->price }}">
                                        </div>
                                        @if ($errors->has('price'))
                                        <span class="text-danger text-left">{{ $errors->first('price') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Phần trăm giảm giá (%):</label>
                                        <div class="controls">
                                            <input type="text" name="discount_sale" class="form-control number_format"
                                                required id="priceDiscount" value="{{ $product->discount_sale }}">
                                        </div>
                                        @if ($errors->has('discount_sale'))
                                        <span class="text-danger text-left">{{ $errors->first('discount_sale') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Giá bán (VNĐ):</label>
                                        <div class="controls">
                                            <input type="text" name="price_sale" class="form-control number_format"
                                                id="priceResult" value="{{ $product->price_sale }}">
                                        </div>
                                        @if ($errors->has('price_sale'))
                                        <span class="text-danger text-left">{{ $errors->first('price_sale') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Đơn vị tính:</label>
                                        <div class="controls">
                                            <select class="form-control" required id="data-status" name='unit'>
                                                <option value="-1">Chọn đơn vị tính</option>
                                                <option value="Cặp"
                                                    {{ ($product->unit == 'cap') || ($product->unit == 'Cặp') ? 'selected="selected"' : '' }}>Cặp
                                                </option>
                                                <option value="Chiếc"
                                                    {{ ($product->unit == 'chiec')  || ($product->unit == 'Chiếc') ? 'selected="selected"' : '' }}>Chiếc
                                                </option>
                                                <option value="Bộ"
                                                    {{ ($product->unit == 'bo') || ($product->unit == 'Bộ') ? 'selected="selected"' : '' }}>Bộ
                                                </option>
                                                <option value="Cái"
                                                    {{ ($product->unit == 'cai') || ($product->unit == 'Cái') ? 'selected="selected"' : '' }}>Cái
                                                </option>
                                                <option value="Lọ"
                                                    {{ ($product->unit == 'lo') || ($product->unit == 'Lọ') ? 'selected="selected"' : '' }}>Lọ
                                                </option>
                                                <option value="Chai"
                                                    {{ ($product->unit == 'chai') || ($product->unit == 'Chai') ? 'selected="selected"' : '' }}>Chai
                                                </option>
                                                <option value="Hộp"
                                                    {{ ($product->unit == 'hop') || ($product->unit == 'Hộp') ? 'selected="selected"' : '' }}>Hộp
                                                </option>
                                            </select>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Thương hiệu:</label>
                                        <div class="controls">
                                            <select class="form-control" required id="data-status" name='brand_id'>
                                                @foreach($brand as $itemBrand)
                                                <option value="{{ $itemBrand->id }}"
                                                    {{ ($itemBrand->id == $product->brand_id) ? 'selected="selected"' : '' }}>
                                                    {{ $itemBrand->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Chất liệu:</label>
                                        <div class="controls">
                                            <select class="form-control" required id="data-status" name='material_id'>
                                                @foreach($material as $itemMaterial)
                                                <option value="{{ $itemMaterial->id }}"
                                                    {{ ($itemMaterial->id == $product->material_id) ? 'selected="selected"' : '' }}>
                                                    {{ $itemMaterial->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Hình thức bán:</label>
                                        <div class="controls">
                                            <select class="form-control" required id="data-status" name='type_sale'>
                                                <option value="-1"{{ ($product->type_sale == -1) ? 'selected="selected"' : '' }}>Tại Shop & Online </option>
                                                <option value="0"{{ ($product->type_sale == 0) ? 'selected="selected"' : '' }}>Tại Shop </option>
                                                <option value="1" {{ ($product->type_sale == 1) ? 'selected="selected"' : '' }}>Online </option>
                                            </select>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Giới tính:</label>
                                        <div class="controls">
                                            <select class="form-control" required id="data-status" name='gender'>
                                                <option value="1"
                                                    {{ ($product->gender == 1) ? 'selected="selected"' : '' }}>Tất cả
                                                </option>
                                                <option value="2"
                                                    {{ ($product->gender == 2) ? 'selected="selected"' : '' }}>Nam
                                                </option>
                                                <option value="3"
                                                    {{ ($product->gender == 3) ? 'selected="selected"' : '' }}>Nữ
                                                </option>
                                                <option value="4"
                                                    {{ ($product->gender == 4) ? 'selected="selected"' : '' }}>Nam & Nữ
                                                </option>
                                                <option value="5"
                                                    {{ ($product->gender == 5) ? 'selected="selected"' : '' }}>Trẻ em
                                                </option>
                                            </select>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Hiển thị:</label>
                                        <div class="controls">
                                            <select class="form-control" required id="data-status" name='hidden'>
                                                <option value="1"
                                                    {{ ($product->hidden == 1) ? 'selected="selected"' : '' }}>Hoạt động
                                                </option>
                                                <option value="0"
                                                    {{ ($product->hidden == 0) ? 'selected="selected"' : '' }}>Vô hiệu
                                                </option>
                                            </select>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Thứ Tự</label>
                                        <div class="controls">
                                            <div class="d-flex align-items-center mb-1">
                                                <div class="input-group input-group-lg">
                                                    <input type="number" name="weight" class="touchspin"
                                                        value="{{ $product->weight }}">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-6">

                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Danh mục</label>

                                        <div class="sub-category-product">
                                            <ul>
                                                @foreach($categories as $category)
                                                <li>
                                                    <input type="checkbox" name="categories[]" class="cateOpen"
                                                        data-id="{{ $category->id }}" value="{{ $category->id }}"
                                                        {{isset($categoriesList[$category->id]) ? 'checked': ''}}>
                                                    {{$category->name}}
                                                    @if(count($category->subcategory))
                                                    @include('admin.dashboard.products.sub-categories',['subcategories'
                                                    => $category->subcategory])
                                                    @endif
                                                </li>

                                                @endforeach
                                            </ul>
                                            @if ($errors->has('categories'))
                                            <span
                                                class="text-danger text-left">{{ $errors->first('categories') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label>Loại Màu Sắc</label>
                                        <div class="controls">
                                            <select class="form-control" required id="data-status" name='type_color'>
                                                <option value="0" {{ ($product->type_color == 0) ? 'selected="selected"' : '' }}>Màu Sắc</option>
                                                <option value="1" {{ ($product->type_color == 1) ? 'selected="selected"' : '' }}>Chiết Suất</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Giá Sale Sản Phẩm </label>
                                        <div class="controls">
                                            <div class="container-price-sale add-boder">
                                                @foreach($product->cate_price_sale as $key => $itemPriceSale)
                                                <div class="item-product-sale">
                                                    <div class="row price_row">
                                                        <div class="delete-item-price-sale-right delete-item-price-sale" data-url="{{ route('products.deletePriceSale', $itemPriceSale->id) }}" data-id="{{ $itemPriceSale->id }}">
                                                            <i class="feather icon-x"></i>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="select-category">
                                                                <div class="form-group">
                                                                    <label>Danh Mục Cha</label>
                                                                    <div class="controls">
                                                                        <select class="form-control" name="prductPriceSale[{{ $key }}][parent_cate]" >
                                                                            <option>Tất cả</option>
                                                                            @foreach($parentCategories as $itemCate)
                                                                            <option value="{{ $itemCate->id }}" {{ ($itemPriceSale->parent_category == $itemCate->id) ? 'selected="selected"' : '' }}>{{ $itemCate->name }}</option>
                                                                                @foreach($itemCate->chillParent as $itemChillParent)
                                                                                <option value="{{ $itemChillParent->id }}" {{ ($itemPriceSale->parent_category == $itemChillParent->id) ? 'selected="selected"' : '' }}>&ensp;&ensp; |-->{{ $itemChillParent->name }}</option>
                                                                                    
                                                                                @endforeach
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="select-category">
                                                                <div class="form-group">
                                                                    <label>Danh Mục</label>
                                                                    <div class="controls">
                                                                        <select class="form-control" name="prductPriceSale[{{ $key }}][cate]">
                                                                            <option>Tất cả</option>
                                                                            @foreach($parentCategories as $itemCate)
                                                                            <option value="{{ $itemCate->id }}" {{ ($itemPriceSale->id_category == $itemCate->id) ? 'selected="selected"' : '' }}>{{ $itemCate->name }}</option>
                                                                                @foreach($itemCate->chillParent as $itemChillParent)
                                                                                <option value="{{ $itemChillParent->id }}" {{ ($itemPriceSale->id_category == $itemChillParent->id) ? 'selected="selected"' : '' }}>&ensp;&ensp; |-->{{ $itemChillParent->name }}</option>
                                                                                    @foreach($itemChillParent->childLevelParent as $itemChildLevelParent)
                                                                                    <option value="{{ $itemChildLevelParent->id }}" {{ ($itemPriceSale->id_category == $itemChildLevelParent->id) ? 'selected="selected"' : '' }}>&ensp;&ensp;&ensp; |---->{{ $itemChildLevelParent->name }}</option>
                                                                                    @endforeach
                                                                                @endforeach
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="select-category">
                                                                <div class="form-group">
                                                                    <label>Giá Giảm (VNĐ):</label>
                                                                    <div class="controls">
                                                                        <input type="text" name="prductPriceSale[{{ $key }}][price]" class="form-control number_format" value="{{ number_format($itemPriceSale->price) }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                            <div class="add-price-sale" data-url="{{ route('products.getCategoryPriceSale') }}">click Me</div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Album ảnh</label>
                                        @include('admin.layouts.include.messages')
                                        <div class="controls upload-img multiple-images">
                                            <input class="multi with-preview" name="images[]" multiple="multiple"
                                                type="file" data-maxfile="-1" style="width: 100%;"
                                                accept="svg|jpg|webp|png|jpeg" />
                                        </div>

                                        <div class="image-product">
                                            @foreach($getAllImageProduct as $item)
                                            <div class="block-img">
                                                <img src="{{ asset('img/product/'.$item->image) }}" style="width:243px">
                                                @if($item)
                                                <input type="number" name="currentWeight" value="{{ $item['weight'] }}"
                                                    class="form-control order-image-product change-weight-api"
                                                    id="basicInput" onchange="changeWeight(this.value)"
                                                    data-id-image="{{ $item['id'] }}"
                                                    data-weight="{{ $item['weight'] }}"
                                                    data-url="{{ route('products.postUpdateColorWeight', $item['id']) }}" />
                                                <!-- <input type="hidden" name="idProductImage" value="{{ $item['id'] }}">
                                                <input type="hidden" name="urlUpdate" value="{{ route('products.postUpdateColorWeight', $item['id']) }}">
                                                <input type="hidden" name="numberWeight" value="{{ $item['weight'] }}"> -->
                                                <button type="button"
                                                    class="bt-dele-photo btn btn-outline-primary mb-2 confirm-delete delete-photo"
                                                    data-id="{{ $item['id'] }}"
                                                    data-url="{{ route('products.deleteProductImage', $item['id']) }}">
                                                    <i class="feather icon-trash"></i>
                                                </button>
                                                <div class="dropdown">
                                                    <button style="padding: 15px;position: relative;bottom: 60px;left: 10px;width: 90%;"
                                                        class="btn btn-primary dropdown-toggle mr-1 waves-effect waves-light"
                                                        type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="true">
                                                        Chọn Màu Cho Kính
                                                    </button>
                                                    <div class="dropdown-menu"
                                                        aria-labelledby="dropdownMenuButton"
                                                        x-placement="bottom-start"
                                                        style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 38px, 0px);transform: translate3d(10px, -16px, 0px);width: 90%;padding: 10px;">
                                                            <div class="row">
                                                                @foreach($getColor as $itemColor)
                                                                <div class="col-md-4 col-lg-4"
                                                                    style="display: -webkit-box;">
                                                                    <fieldset>
                                                                        <div class="vs-radio-con vs-radio-danger">
                                                                            <input type="radio"
                                                                                name="color_id[{{ $itemColor->id }}]"
                                                                                value="{{ $itemColor->id }}"
                                                                                class="update-color-image"
                                                                                data-id-product-image="{{ $item['id'] }}"
                                                                                data-id-color="{{ $itemColor->id }}"
                                                                                data-url="{{ route('products.postUpdateColorImage', $itemColor->id) }}"
                                                                                data-id-product="{{ $product->id }}"
                                                                                {{ $itemColor->id == $item['color_id'] ? 'checked': '' }}>
                                                                            <span class="vs-radio">
                                                                                <span class="vs-radio--border"></span>
                                                                                <span class="vs-radio--circle"></span>
                                                                            </span>
                                                                        </div>
                                                                    </fieldset>
                                                                    
                                                                    <img src="{{ $itemColor->getImages() }}" width="15px"
                                                                        height="15px"
                                                                        style="height: 20px;width: 20px;margin-top: 3px;border: 1px solid #000;padding: 0;"
                                                                        alt="{{ $itemColor->name }}">
                                                                </div>
                                                                @endforeach
                                                            </div>
                                                    </div>
                                                </div>
                                                <div class="select-collapsed">
                                                    
                                                    <!-- <button class="btn btn-primary plus-minus collapsed" type="button"
                                                        data-toggle="collapse"
                                                        data-target="#collapseColorImage-{{ $item['id'] }}"
                                                        aria-expanded="false"
                                                        aria-controls="collapseColorImage-{{ $item['id'] }}">
                                                        Chọn Màu Cho Kính
                                                    </button>
                                                    <div class="collapse" id="collapseColorImage-{{ $item['id'] }}">
                                                        <div class="row">
                                                            @foreach($getColor as $itemColor)
                                                            <div class="col-md-4 col-lg-4"
                                                                style="display: -webkit-box;">
                                                                <fieldset>
                                                                    <div class="vs-radio-con vs-radio-danger">
                                                                        <input type="radio"
                                                                            name="color_id[{{ $itemColor->id }}]"
                                                                            value="{{ $itemColor->id }}"
                                                                            class="update-color-image"
                                                                            data-id-product-image="{{ $item['id'] }}"
                                                                            data-id-color="{{ $itemColor->id }}"
                                                                            data-url="{{ route('products.postUpdateColorImage', $itemColor->id) }}"
                                                                            data-id-product="{{ $product->id }}"
                                                                            {{ $itemColor->id == $item['color_id'] ? 'checked': '' }}>
                                                                        <span class="vs-radio">
                                                                            <span class="vs-radio--border"></span>
                                                                            <span class="vs-radio--circle"></span>
                                                                        </span>
                                                                    </div>
                                                                </fieldset>
                                                                
                                                                <img src="{{ $itemColor->getImages() }}" width="15px"
                                                                    height="15px"
                                                                    style="height: 20px;width: 20px;margin-top: 3px;border: 1px solid #000;padding: 0;"
                                                                    alt="{{ $itemColor->name }}">
                                                            </div>
                                                            @endforeach
                                                        </div>
                                                    </div> -->
                                                </div>

                                                @endif
                                            </div>
                                            @endforeach
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-danger product-item">Lưu</button>
                            <a href="{{ route('slider.getListSlider') }}" class="btn btn-default">Trở Lại</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Input Validation end -->
@endsection