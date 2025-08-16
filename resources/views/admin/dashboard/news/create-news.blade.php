@extends('admin.layouts.master')
@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">Tạo Mới Tin Tức</h2>
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
                        <form method="post" action="{{ route('news.postAddNews') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Tên Tin Tức:</label>
                                        <div class="controls">
                                            <input type="text" name="name" class="form-control"
                                                data-validation-required-message="Tên Tin Tức" id="pushSlug"
                                                onkeyup="ChangeToSlug();" placeholder="Tên Tin Tức">
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
                                            <input type="text" name="alias" class="form-control" id="slug">
                                        </div>
                                        @if ($errors->has('alias'))
                                        <span class="text-danger text-left">{{ $errors->first('alias') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Mô Tả:</label>
                                        <div class="controls">
                                            <fieldset class="form-label-group mb-0">
                                                <textarea name="description" id="editorDescription"
                                                    class="form-control char-textarea" rows="3" required></textarea>
                                            </fieldset>
                                        </div>
                                        @if ($errors->has('description'))
                                        <span class="text-danger text-left">{{ $errors->first('description') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Nội Dung:</label>
                                        <div class="controls">
                                            <fieldset class="form-label-group mb-0">
                                                <textarea name="content" id="editorContent"
                                                    class="form-control char-textarea" rows="3" required></textarea>
                                                <button type="button" class="loadSampleData">Tạo dữ liệu mặt
                                                    định</button>
                                            </fieldset>
                                        </div>
                                        @if ($errors->has('decription'))
                                        <span class="text-danger text-left">{{ $errors->first('decription') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Từ khóa:</label>
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
                                        <label>Meta Descript: *</label>
                                        <div class="controls">
                                            <fieldset class="form-label-group mb-0">
                                                <textarea name="meta_description" class="form-control char-textarea"
                                                    rows="3" required></textarea>
                                            </fieldset>
                                        </div>
                                        @if ($errors->has('meta_description'))
                                        <span
                                            class="text-danger text-left">{{ $errors->first('meta_description') }}</span>
                                        @endif
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
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Trạng Thái</label>
                                        <div class="controls">
                                            <select class="form-control" required id="data-status" name='hidden'>
                                                <option value="1">Hoạt động</option>
                                                <option value="0">Vô hiệu</option>
                                            </select>
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
                                                    {{$category->name}}
                                                    @if(count($category->subcategory))
                                                    @include('admin.dashboard.news.sub-category',['subcategories' =>
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
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Hình ảnh:</label>
                                        <div class="controls upload-img">
                                            <input class="multi with-preview" name="url_img" type="file"
                                                data-maxfile="-1" style="width: 100%;" accept="svg|jpg|webp|png|jpeg" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-danger product-item">Lưu</button>
                            <a href="{{ route('news.getListNews') }}" class="btn btn-default">Trở Lại</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Input Validation end -->
@endsection