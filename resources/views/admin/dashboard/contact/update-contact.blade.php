@extends('admin.layouts.master')
@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">Cập Nhật Liên Hệ</h2>
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
                        <form method="post" action="{{ route('contact.postUpdateContact', $contact->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Tên Doanh Nghiệp:</label>
                                        <div class="controls">
                                            <input type="text" name="name" class="form-control" value="{{ $contact->name }}">
                                        </div>
                                        @if ($errors->has('name'))
                                        <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Số Điện Thoại</label>
                                        <div class="controls">
                                            <input type="text" name="phone" class="form-control" value="{{ $contact->phone }}">
                                        </div>
                                        @if ($errors->has('phone'))
                                        <span class="text-danger text-left">{{ $errors->first('phone') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Địa Chỉ</label>
                                        <div class="controls">
                                            <input type="text" name="address" class="form-control" value="{{ $contact->address }}">
                                        </div>
                                        @if ($errors->has('address'))
                                        <span class="text-danger text-left">{{ $errors->first('address') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Giờ Mở Cửa</label>
                                        <div class="controls">
                                            <input type="text" name="strart_time" class="form-control" value="{{ $contact->strart_time }}">
                                        </div>
                                        @if ($errors->has('strart_time'))
                                        <span class="text-danger text-left">{{ $errors->first('strart_time') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Giờ Đóng Cửa</label>
                                        <div class="controls">
                                            <input type="text" name="end_time" class="form-control" value="{{ $contact->end_time }}">
                                        </div>
                                        @if ($errors->has('end_time'))
                                        <span class="text-danger text-left">{{ $errors->first('end_time') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Thứ Tự</label>
                                        <div class="controls">
                                            <div class="d-flex align-items-center mb-1">
                                                <div class="input-group input-group-lg">
                                                    <input type="number" name="weight" class="touchspin" value="{{ $contact->weight }}">
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
                                                <option value="1" {{ ($contact->status == 1) ? 'selected="selected"' : '' }}>Hoạt động</option>
                                                <option value="0" {{ ($contact->status == 0) ? 'selected="selected"' : '' }}>Vô hiệu</option>
                                            </select>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-danger product-item">Lưu</button>
                            <a href="{{ route('contact.getListContact') }}" class="btn btn-default">Trở Lại</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Input Validation end -->
@endsection