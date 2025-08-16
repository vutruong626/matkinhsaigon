@extends('admin.layouts.master')
@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">Cập Nhật Sản Phẩm</h2>
            </div>
        </div>
    </div>
</div>
<!-- Input Validation start -->
<section class="input-validation upsort-product">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form method="post" action="{{ route('products.postAddProduct') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Tên sản phẩm:</label>
                                        <div class="controls">
                                            <input type="text" name="name" class="form-control"
                                                placeholder="Tên sản phẩm" id="pushSlug" onkeyup="ChangeToSlug();">
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
                                                data-validation-required-message="Vui lòng nhập thương hiệu" id="slug"
                                                placeholder="Tên Sản Phẩm">
                                        </div>
                                        @if ($errors->has('name'))
                                        <span class="text-danger text-left">{{ $errors->first('alias') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <!-- <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Mô Tả</label>
                                        <div class="controls">
                                            <fieldset class="form-label-group mb-0">
                                                <textarea name="description" id="editorDescription"
                                                    class="form-control char-textarea" rows="3"></textarea>
                                            </fieldset>
                                        </div>
                                        @if ($errors->has('description'))
                                        <span class="text-danger text-left">{{ $errors->first('description') }}</span>
                                        @endif
                                    </div>
                                </div> -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="controls">
                                                    <input type="text" name="description[name]" class="form-control"
                                                        value="Mô Tả"
                                                        placeholder="Mô Tả">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <div class="vs-checkbox-con vs-checkbox-primary">
                                                        <input type="checkbox" name="description[hidden]" checked="" value="1">
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
                                                <textarea name="description[text]" id="editorDescription"
                                                    class="form-control char-textarea" rows="3" required></textarea>
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
                                                        value="Thông tin chi tiết"
                                                        placeholder="Tên Sản Phẩm">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <div class="vs-checkbox-con vs-checkbox-primary">
                                                        <input type="checkbox" name="content[hidden]" checked="" value="1">
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
                                                    class="form-control char-textarea" rows="3" required></textarea>
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
                                                        value="Thông số kỹ thuật" value="Thông số kỹ thuật"
                                                        placeholder="Tên Sản Phẩm">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <fieldset>
                                                        <div class="vs-checkbox-con vs-checkbox-primary">
                                                            <input type="checkbox" name="service[hidden]" checked="" value="1">
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
                                                    class="form-control char-textarea" rows="3"></textarea>
                                                <button type="button" class="buttom-load-data-sample loadSampleDataSpecifications">Tạo dữ liệu mặt định</button>
                                            </fieldset>
                                        </div>
                                        @if ($errors->has('service'))
                                        <span class="text-danger text-left">{{ $errors->first('service') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="controls">
                                                    <input type="text" name="tech[name]"
                                                        class="form-control" value="Tư vấn sử dụng"
                                                        placeholder="Tên Sản Phẩm">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <fieldset>
                                                        <div class="vs-checkbox-con vs-checkbox-primary">
                                                            <input type="checkbox"  name="tech[hidden]" checked="" value="1">
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
                                                    class="form-control char-textarea" rows="3"></textarea>
                                                <button type="button" class="buttom-load-data-sample loadSampleDataConsultingService">Tạo dữ liệu mặt định</button>
                                            </fieldset>
                                        </div>
                                        @if ($errors->has('tech'))
                                        <span class="text-danger text-left">{{ $errors->first('tech') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="controls">
                                                    <input type="text" name="tutorial[name]" class="form-control"
                                                        value="Hướng dẫn mua hàng">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <fieldset>
                                                        <div class="vs-checkbox-con vs-checkbox-primary">
                                                            <input type="checkbox" name="tutorial[hidden]" checked="" value="1">
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
                                                    class="form-control char-textarea" rows="3"></textarea>
                                                <button type="button" class="buttom-load-data-sample loadSampleDataShoppingGuide">Tạo dữ liệu mặt định</button>
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
                                                        value="Địa chỉ mua hàng">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <fieldset>
                                                        <div class="vs-checkbox-con vs-checkbox-primary">
                                                            <input type="checkbox" name="address_sale[hidden]" checked="" value="1">
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
                                                    class="form-control char-textarea" rows="3" required></textarea>
                                                <button type="button" class="buttom-load-data-sample loadSampleDataAddress">Tạo dữ liệu mặt định</button>
                                            </fieldset>
                                        </div>
                                        @if ($errors->has('address_sale'))
                                        <span class="text-danger text-left">{{ $errors->first('address_sale') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="controls">
                                                    <input type="text" name="open_time[name]" class="form-control"
                                                        value="Thời gian mở cửa">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <fieldset>
                                                        <div class="vs-checkbox-con vs-checkbox-primary">
                                                            <input type="checkbox" name="open_time[hidden]" checked="" value="1">
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
                                                    class="form-control char-textarea" rows="3"></textarea>
                                                <button type="button" class="buttom-load-data-sample loadSampleDataOpenTime">Tạo dữ liệu mặt định</button>
                                            </fieldset>
                                        </div>
                                        @if ($errors->has('open_time'))
                                        <span class="text-danger text-left">{{ $errors->first('open_time') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Meta Keyword:</label>
                                        <div class="controls">
                                            <input type="text" name="kw" class="form-control">
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
                                                rows="3"></textarea>
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
                                            <input type="text" name="price" class="form-control number_format" id="priceBalance">
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
                                            <input type="text" name="discount_sale" class="form-control number_format" required
                                            id="priceDiscount">
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
                                            <input type="text" name="price_sale" class="form-control number_format" id="priceResult">
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
                                                <option value="Cặp">Cặp</option>
                                                <option value="Chiếc">Chiếc</option>
                                                <option value="Bộ">Bộ</option>
                                                <option value="Cái">Cái</option>
                                                <option value="Lọ">Lọ</option>
                                                <option value="Chai">Chai</option>
                                                <option value="Hộp">Hộp</option>
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
                                                <option value="{{ $itemBrand->id }}">{{ $itemBrand->name }}</option>
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
                                                <option value="{{ $itemMaterial->id }}">{{ $itemMaterial->name }}</option>
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
                                                <option value="-1">Tại Shop & Online</option>
                                                <option value="0">Tại Shop</option>
                                                <option value="1">Online</option>
                                            </select>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Giới tính:</label>
                                        <div class="controls">
                                            <select class="form-control" required id="data-status" name='gender'>
                                                <option value="1">Tất cả</option>
                                                <option value="2">Nam</option>
                                                <option value="3">Nữ</option>
                                                <option value="4">Nam & Nữ</option>
                                                <option value="5">Trẻ em</option>
                                            </select>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Hiển thị:</label>
                                        <div class="controls">
                                            <select class="form-control" required id="data-status" name='hidden'>
                                                <option value="1">Hoạt động</option>
                                                <option value="0">Vô hiệu</option>
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
                                                    <input type="number" name="weight" class="touchspin" value="1">
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
                                                        data-id="{{ $category->id }}" value="{{ $category->id }}">

                                                    <img src="{{$category->getIconImages() }}" alt="" width="25">
                                                    {{$category->name}}
                                                    @if(count($category->subcategory))
                                                    @include('admin.dashboard.products.sub-categories',['subcategories' =>
                                                    $category->subcategory])
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
                                                <option value="0">Màu Sắc</option>
                                                <option value="1">Chiết Suất</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Giá Sale Sản Phẩm </label>
                                        <div class="controls">
                                            <div class="container-price-sale"></div>
                                            <div class="add-price-sale" data-url="{{ route('products.getCategoryPriceSale') }}">click Me</div>
                                            
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Album ảnh</label>
                                        <div class="controls upload-img multiple-images">
                                            <input class="multi with-preview" name="images[]" multiple="multiple"
                                                type="file" data-maxfile="-1" style="width: 100%;"
                                                accept="svg|jpg|webp|png|jpeg" />
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