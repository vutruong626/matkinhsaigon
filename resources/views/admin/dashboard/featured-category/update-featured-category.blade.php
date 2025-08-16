@extends('admin.layouts.master')
@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">Cập Nhật Danh Mục Nổi Bật</h2>
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
                        <form method="post" action="{{ route('category.postUpdateFeaturedCategory', $result->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Tên Danh Mục:</label>
                                        <div class="controls">
                                            <input type="text" name="name" class="form-control" value="{{ $result->name }}">
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
                                            <input type="text" name="link" class="form-control" value="{{ $result->link }}">
                                        </div>
                                        @if ($errors->has('link'))
                                        <span class="text-danger text-left">{{ $errors->first('link') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Màu Khối</label>
                                        <div class="controls">
                                            <input type="text" name="color" class="form-control" value="{{ $result->color }}">
                                        </div>
                                        @if ($errors->has('color'))
                                        <span class="text-danger text-left">{{ $errors->first('color') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Thứ Tự</label>
                                        <div class="controls">
                                            <div class="d-flex align-items-center mb-1">
                                                <div class="input-group input-group-lg">
                                                    <input type="number" name="weight" class="touchspin" value="{{ $result->weight }}">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Trạng Thái</label>
                                        <div class="controls">
                                            <select class="form-control" required id="data-status" name='status'>
                                                <option value="1" {{ ($result->status == 1) ? 'selected="selected"' : '' }}>Hoạt động</option>
                                                <option value="0" {{ ($result->status == 0) ? 'selected="selected"' : '' }}>Vô hiệu</option>
                                            </select>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Hình Ảnh</label>
                                        <div class="controls upload-img">
                                            <input class="multi with-preview" name="image"
                                                type="file" data-maxfile="-1" style="width: 300px;"
                                                accept="svg|jpg|webp|png|jpeg" />
                                        </div>
                                        <div class="avatar-preview" style="width: 300px;height: 300px;">
                                            <div id="imagePreview"
                                                style="background-image: url({{ $result->image ? $result->getImage() : 'http://i.pravatar.cc/500?img=7' }});">
                                            </div>
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