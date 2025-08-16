@extends('admin.layouts.master')
@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">Cập Nhật Danh Mục</h2>
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
                        <form method="post" action="{{ route('category.postUpdateCategory', $category->id) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Tên danh mục:</label>
                                        <div class="controls">
                                            <input type="text" name="name" class="form-control" value="{{ $category->name }}"
                                                data-validation-required-message="Vui lòng nhập thương hiệu"
                                                id="pushSlug" onkeyup="ChangeToSlug();" placeholder="Tên danh mục:">
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
                                            <input type="text" name="alias" class="form-control" value="{{ $category->alias }}"
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
                                        <label>Từ khoá:</label>
                                        <div class="controls">
                                            <input type="text" name="kw" class="form-control" value="{{ $category->kw }}"
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
                                        <label>Mô Tả</label>
                                        <div class="controls">
                                            <fieldset class="form-label-group mb-0">
                                                <textarea name="des" id="editorContent"
                                                    class="form-control char-textarea" rows="3" required>{{ $category->des }}</textarea>
                                            </fieldset>
                                        </div>
                                        @if ($errors->has('decription'))
                                        <span class="text-danger text-left">{{ $errors->first('decription') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Thứ Tự</label>
                                        <div class="controls">
                                            <div class="d-flex align-items-center mb-1">
                                                <div class="input-group input-group-lg">
                                                    <input type="number" name="weight" class="touchspin" value="{{ $category->weight }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Danh Mục</label>
                                        <div class="controls">
                                            <select class="form-control" required id="data-parentID" name='parent_id'>
                                                <option value="0">Danh Mục Cha</option>
                                                @if(!empty($parentCategories))
                                                @foreach($parentCategories as $parentCategory)
                                                <option value="{{ $parentCategory->id }}" {{ ($parentCategory->id == $category->parent_id  ) ? 'selected="selected"' : '' }}>{{ $parentCategory->name }}
                                                </option>
                                                @if(!empty($parentCategory->chillParent))
                                                @foreach($parentCategory->chillParent as $itemChillParent)
                                                <option value="{{ $itemChillParent->id }}" {{ ($itemChillParent->id == $category->parent_id  ) ? 'selected="selected"' : '' }}>
                                                &ensp;&ensp;&ensp;|-->{{ $itemChillParent->name }}
                                                </option>
                                                @if(!empty($itemChillParent->childLevelParent))
                                                @foreach($itemChillParent->childLevelParent as $itemChildLevelParent)
                                                <option value="{{ $itemChildLevelParent->id }}" {{ ($itemChildLevelParent->id == $category->parent_id  ) ? 'selected="selected"' : '' }}>
                                                &ensp;&ensp;&ensp;&ensp;|---->{{ $itemChildLevelParent->name }}
                                                </option>
                                                @endforeach
                                                @endif
                                                @endforeach
                                                @endif
                                                @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Hiển thị icon:</label>
                                        <div class="controls">
                                            <select class="form-control" required id="data-status" name='show_icon'>
                                                <option value="1" {{ ($category->show_icon == 1) ? 'selected="selected"' : '' }}>Hoạt động</option>
                                                <option value="0" {{ ($category->show_icon == 0) ? 'selected="selected"' : '' }}>Vô hiệu</option>
                                            </select>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Hiển thị(index):</label>
                                        <div class="controls">
                                            <select class="form-control" required id="data-status" name='index_hidden'>
                                                <option value="1" {{ ($category->index_hidden == 1) ? 'selected="selected"' : '' }}>Hoạt động</option>
                                                <option value="0" {{ ($category->index_hidden == 0) ? 'selected="selected"' : '' }}>Vô hiệu</option>
                                            </select>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Hiển thị:</label>
                                        <div class="controls">
                                            <select class="form-control" required id="data-status" name='hidden'>
                                                <option value="1" {{ ($category->hidden == 1) ? 'selected="selected"' : '' }}>Hoạt động</option>
                                                <option value="0" {{ ($category->hidden == 0) ? 'selected="selected"' : '' }}>Vô hiệu</option>
                                            </select>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group create-catagory">
                                        <label>Hình Ảnh</label>
                                        <div class="controls upload-img">
                                            <input class="multi with-preview" name="icon" multiple="multiple"
                                                type="file" data-maxfile="-1" maxlength="100" style="width: 100%;"
                                                accept="svg|jpg|webp|png|jpeg" />
                                        </div>
                                        @if($category->icon)
                                        <div class="avatar-preview">
                                            <div id="imagePreview"
                                                style="background-image: url({{ $category->icon ? $category->getIconImages() : '' }});">
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-danger product-item">Lưu</button>
                            <a href="{{ route('category.getListCategory') }}" class="btn btn-default">Trở Lại</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Input Validation end -->
@endsection