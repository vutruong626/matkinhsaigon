@extends('admin.layouts.master-login')

@section('content')

<section class="row flexbox-container">
    <div class="col-xl-8 col-12 ">
        <div class="card bg-authentication rounded-0 mb-0">
            <div class="row m-0">
                <div class="col-lg-6 d-lg-block d-none text-center align-self-center px-1 py-0">
                    <img src="https://matkinhsaigon.com.vn/img/setting/1671614870-Logo_mksg_2023.png" alt="branding logo">
                </div>
                <div class="col-lg-6 col-12 p-0">
                    <div class="card rounded-0 mb-0 px-2">
                        <div class="card-header pb-1">
                            <div class="card-title">
                                <h4 class="mb-0">Đăng Nhập</h4>
                            </div>
                        </div>
                        <p class="px-2">Chào mừng bạn trở lại, vui lòng đăng nhập.</p>
                        <div class="card-content">
                            <div class="card-body pt-1">
                                <!-- BEGIN: Global messenger-->
                                @include('admin.layouts.include.messages')
                                <!-- END: Global messenger-->
                                <section id="auth-login">
                                    <form method="post" id="do-auth-login-ajax" action="{{ route('login.postLogin') }}">
                                        
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                        {{-- @include('admin.messages') --}}
                                
                                        <div class="form-group form-floating mb-1">
                                            <input type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Username" required="required" autofocus>
                                            <label for="floatingName">Tài khoản hoặc Email</label>
                                            @if ($errors->has('username'))
                                                <span class="text-danger text-left">{{ $errors->first('username') }}</span>
                                            @endif
                                        </div>
                                        
                                        <div class="form-group form-floating mb-1">
                                            <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Password" required="required">
                                            <label for="floatingPassword">Mật Khẩu</label>
                                            @if ($errors->has('password'))
                                                <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                                            @endif
                                        </div>
                                
                                        <button class="w-100 btn btn-lg btn-primary" type="submit">Đăng Nhập</button>
                                        
                                        {{-- @include('auth.copy') --}}
                                    </form>
                                </section>
                                
                            </div>
                        </div>
                        <div class="login-footer" style="    opacity: 0;">
                            <div class="divider">
                                <div class="divider-text">Hoặc</div>
                            </div>
                            <div class="footer-btn d-inline">
                                <a href="#" class="btn btn-facebook"><span class="fa fa-facebook"></span></a>
                                <a href="#" class="btn btn-twitter white"><span class="fa fa-twitter"></span></a>
                                <a href="#" class="btn btn-google"><span class="fa fa-google"></span></a>
                                <a href="#" class="btn btn-github"><span class="fa fa-github-alt"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection