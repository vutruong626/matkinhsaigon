@extends('admin.layouts.master')
@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">Thay Đổi Mật Khẩu</h2>
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
                        <form method="post" action="{{ route('user.postChangePassword', Auth::user()->customer->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Mật Khẩu Củ</label>
                                        <div class="controls">
                                            <input type="password" name="pass_old" class="form-control">
                                        </div>
                                        @if ($errors->has('pass_old'))
                                        <span class="text-danger text-left">{{ $errors->first('pass_old') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Mật Khẩu Mới</label>
                                        <div class="controls">
                                            <input type="password" name="pass_new" class="form-control">
                                        </div>
                                        @if ($errors->has('pass_new'))
                                        <span class="text-danger text-left">{{ $errors->first('pass_new') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Nhập Lại Mật Khẩu Mới</label>
                                        <div class="controls">
                                            <input type="password" name="pass_new_check" class="form-control">
                                        </div>
                                        @if ($errors->has('pass_new_check'))
                                        <span class="text-danger text-left">{{ $errors->first('pass_new_check') }}</span>
                                        @endif
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