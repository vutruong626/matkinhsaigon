@extends('admin.layouts.master')
@section('content')

<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">Cập nhật thông tin</h2>
            </div>
        </div>
    </div>
</div>
@include('admin.layouts.include.messages')
<!-- Input Validation start -->
<section class="input-validation upsort-product">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form method="post" action="{{ route('setting.postUpdateSetting') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Facebook:</label>
                                        <div class="controls">
                                            <input type="text" name="facebook" class="form-control" value="{{ $setting->facebook }}">
                                        </div>
                                        @if ($errors->has('facebook'))
                                        <span class="text-danger text-left">{{ $errors->first('facebook') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Icon FB:</label>
                                        <div class="controls" style="width: 300px;">
                                            <input class="multi with-preview" name="icon_fb"
                                                type="file" data-maxfile="-1" style="width: 100%;"
                                                accept="svg|jpg|webp|png|jpeg" />
                                        </div><br/>
                                        <div class="image-news" style="width: 200px;">
                                            <div class="block-img">
                                                <img src="{{ $setting->getIconFB() }}">
                                            </div>
                                        </div>
                                        @if ($errors->has('facebook'))
                                        <span class="text-danger text-left">{{ $errors->first('facebook') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Youtube</label>
                                        <div class="controls">
                                            <input type="text" name="youtube" class="form-control" value="{{ $setting->youtube }}">
                                        </div>
                                        @if ($errors->has('youtube'))
                                        <span class="text-danger text-left">{{ $errors->first('youtube') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Icon Youtube:</label>
                                        <div class="controls" style="width: 300px;">
                                            <input class="multi with-preview" name="icon_youtube"
                                                type="file" data-maxfile="-1" style="width: 100%;"
                                                accept="svg|jpg|webp|png|jpeg" />
                                        </div><br/>
                                        <div class="image-news" style="width: 200px;">
                                            <div class="block-img">
                                                <img src="{{ $setting->getIconYoutube() }}">
                                            </div>
                                        </div>
                                        @if ($errors->has('facebook'))
                                        <span class="text-danger text-left">{{ $errors->first('facebook') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Google +</label>
                                        <div class="controls">
                                            <input type="text" name="google_plus" class="form-control" value="{{ $setting->google_plus }}">
                                        </div>
                                        @if ($errors->has('google_plus'))
                                        <span class="text-danger text-left">{{ $errors->first('google_plus') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Hotline</label>
                                        <div class="controls">
                                            <input type="text" name="hotline" class="form-control" value="{{ $setting->hotline }}">
                                        </div>
                                        @if ($errors->has('hotline'))
                                        <span class="text-danger text-left">{{ $errors->first('hotline') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Zalo</label>
                                        <div class="controls"> 
                                            <input type="text" name="zalo" class="form-control" value="{{ $setting->zalo }}">
                                        </div>
                                        @if ($errors->has('zalo'))
                                        <span class="text-danger text-left">{{ $errors->first('zalo') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Icon Zalo:</label>
                                        <div class="controls" style="width: 300px;">
                                            <input class="multi with-preview" name="icon_zalo"
                                                type="file" data-maxfile="-1" style="width: 100%;"
                                                accept="svg|jpg|webp|png|jpeg" />
                                        </div><br/>
                                        <div class="image-news" style="width: 200px;">
                                            <div class="block-img">
                                                <img src="{{ $setting->getIconZalo() }}">
                                            </div>
                                        </div>
                                        @if ($errors->has('facebook'))
                                        <span class="text-danger text-left">{{ $errors->first('facebook') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <div class="controls">
                                            <input type="text" name="email" class="form-control" value="{{ $setting->email }}">
                                        </div>
                                        @if ($errors->has('email'))
                                        <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Icon Email:</label>
                                        <div class="controls" style="width: 300px;">
                                            <input class="multi with-preview" name="icon_email"
                                                type="file" data-maxfile="-1" style="width: 100%;"
                                                accept="svg|jpg|webp|png|jpeg" />
                                        </div><br/>
                                        <div class="image-news" style="width: 200px;">
                                            <div class="block-img">
                                                <img src="{{ $setting->getIconEmail() }}">
                                            </div>
                                        </div>
                                        @if ($errors->has('facebook'))
                                        <span class="text-danger text-left">{{ $errors->first('facebook') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Meta Title</label>
                                        <div class="controls">
                                            <input type="text" name="meta_title" class="form-control" value="{{ $setting->meta_title }}">
                                        </div>
                                        @if ($errors->has('meta_title'))
                                        <span class="text-danger text-left">{{ $errors->first('meta_title') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Meta Keyword</label>
                                        <div class="controls">
                                            <input type="text" name="meta_keyword" class="form-control" value="{{ $setting->meta_keyword }}"> 
                                        </div>
                                        @if ($errors->has('meta_keyword'))
                                        <span class="text-danger text-left">{{ $errors->first('meta_keyword') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Meta Description</label>
                                        <div class="controls">
                                            <textarea name="meta_description" class="form-control char-textarea" rows="3">{!! $setting->meta_description !!}</textarea>
                                        </div>
                                        @if ($errors->has('meta_description'))
                                        <span class="text-danger text-left">{{ $errors->first('meta_description') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Google Analytic</label>
                                        <div class="controls">
                                            <textarea name="google_analytic" class="form-control char-textarea" rows="3">{!! $setting->google_analytic !!}</textarea>
                                        </div>
                                        @if ($errors->has('google_analytic'))
                                        <span class="text-danger text-left">{{ $errors->first('google_analytic') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Copyright</label>
                                        <div class="controls">
                                            <input type="text" name="copyright" class="form-control" value="{{ $setting->copyright }}">
                                        </div>
                                        @if ($errors->has('copyright'))
                                        <span class="text-danger text-left">{{ $errors->first('copyright') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Quy định pháp lý</label>
                                        <div class="controls">
                                            <textarea name="legal_regulations" id="editorDescription" class="form-control char-textarea" rows="3">{!! $setting->legal_regulations !!}</textarea>
                                        </div>
                                        @if ($errors->has('legal_regulations'))
                                        <span class="text-danger text-left">{{ $errors->first('legal_regulations') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>FanPage Facebook</label>
                                        <div class="controls">
                                            <textarea name="facebook_fb" id="editorContent" class="form-control char-textarea" rows="3">{!! $setting->facebook_fb !!}</textarea>
                                        </div>
                                        @if ($errors->has('facebook_fb'))
                                        <span class="text-danger text-left">{{ $errors->first('facebook_fb') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Google Map</label>
                                        <div class="controls">
                                            <textarea name="map" id="editorNameSpecifications" class="form-control char-textarea" rows="3">{!! $setting->map !!}</textarea>
                                        </div>
                                        @if ($errors->has('map'))
                                        <span class="text-danger text-left">{{ $errors->first('map') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Đặt hàng thành công</label>
                                        <div class="controls">
                                            <textarea name="order_success" id="editorNameConsultingService" class="form-control char-textarea" rows="3">{!! $setting->order_success !!}</textarea>
                                        </div>
                                        @if ($errors->has('order_success'))
                                        <span class="text-danger text-left">{{ $errors->first('order_success') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Thời gian làm việc và Hỗ trợ tư vấn (menu):</label>
                                        <div class="controls">
                                            <textarea name="work_time" id="editorNameShoppingGuide" class="form-control char-textarea" rows="3">{!! $setting->work_time !!}</textarea>
                                        </div>
                                        @if ($errors->has('work_time'))
                                        <span class="text-danger text-left">{{ $errors->first('work_time') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Icon Thời Gian Làm Việc:</label>
                                        <div class="controls" style="width: 300px;">
                                            <input class="multi with-preview" name="icon_time"
                                                type="file" data-maxfile="-1" style="width: 100%;"
                                                accept="svg|jpg|webp|png|jpeg" />
                                        </div><br/>
                                        <div class="image-news" style="width: 200px;">
                                            <div class="block-img">
                                                <img src="{{ $setting->getIconTime() }}">
                                            </div>
                                        </div>
                                        @if ($errors->has('facebook'))
                                        <span class="text-danger text-left">{{ $errors->first('facebook') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Địa chỉ chi nhánh (menu)</label>
                                        <div class="controls">
                                            <textarea name="branch_address" id="editorNameAddresse" class="form-control char-textarea" rows="3">{!! $setting->branch_address !!}</textarea>
                                        </div>
                                        @if ($errors->has('branch_address'))
                                        <span class="text-danger text-left">{{ $errors->first('branch_address') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Giới thiệu:</label>
                                        <div class="controls">
                                            <textarea name="about" id="editorNameOpenTime" class="form-control char-textarea" rows="3">{!! $setting->about !!}</textarea>
                                        </div>
                                        @if ($errors->has('about'))
                                        <span class="text-danger text-left">{{ $errors->first('about') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Liên hệ:</label>
                                        <div class="controls">
                                            <fieldset class="form-label-group mb-0">
                                                <textarea name="address" id="editorEditContent" class="form-control char-textarea" rows="3">{!! $setting->address !!}</textarea>
                                            </fieldset>
                                        </div>
                                        @if ($errors->has('address'))
                                        <span class="text-danger text-left">{{ $errors->first('address') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Thông tin chung:</label>
                                        <div class="controls">
                                            <fieldset class="form-label-group mb-0">
                                                <textarea name="info" id="editorInfo" class="form-control char-textarea" rows="3">{!! $setting->info !!}</textarea>
                                            </fieldset>
                                        </div>
                                        @if ($errors->has('info'))
                                        <span class="text-danger text-left">{{ $errors->first('info') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Logo</label>
                                        <div class="controls upload-img">
                                            <input class="multi with-preview" name="logo"
                                                type="file" data-maxfile="-1" style="width: 100%;"
                                                accept="svg|jpg|webp|png|jpeg" />
                                        </div><br>
                                        <div class="image-news">
                                            <div class="block-img">
                                                <img src="{{ $setting->getLogo() }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-danger product-item">Lưu</button>
                            <!-- <a href="{{ route('slider.getListSlider') }}" class="btn btn-default">Trở Lại</a> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Input Validation end -->
@endsection