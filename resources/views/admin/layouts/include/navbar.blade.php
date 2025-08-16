<nav class="header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-light navbar-shadow no-print">
    <div class="navbar-wrapper">
        <div class="navbar-container content">
            <div class="navbar-collapse" id="navbar-mobile">
                <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                    <ul class="nav navbar-nav">
                        <li class="nav-item mobile-menu d-xl-none mr-auto"><a
                                class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i
                                    class="ficon feather icon-menu"></i></a></li>
                    </ul>
                    <ul class="nav navbar-nav bookmark-icons">
                        <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand"><i
                                    class="ficon feather icon-maximize"></i></a></li>
                                    <li class="nav-item nav-search">
                        <a class="nav-link nav-link-search" href="/" target="_blank">
                            <i class="ficon feather icon-external-link"></i>
                        </a>

                    </li>
                    </ul>
                </div>
                <ul class="nav navbar-nav float-right">
                    
                    <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link"
                            href="#" data-toggle="dropdown">
                            <div class="user-nav d-sm-flex d-none"><span class="user-status">Xin Chào, <span
                                        class="user-name text-bold-600"
                                        style=" color: #ed1c24 !IMPORTANT; ">{{ (isset(Auth::user()->customer->id)) ? Auth::user()->customer->first_name.' '.Auth::user()->customer->last_name : 'Chưa Liên kết' }}</span>
                                </span> <span class="user-status">{{ Auth::user()->username }}</span></div><span><img
                                    class="round" style=" object-fit: contain; "
                                    src="{{ (isset(Auth::user()->customer->avatar)) ? '/'.Auth::user()->customer->avatar : AVATAR_DEFAULT_CUSTOMER}}"
                                    alt="avatar" height="40" width="40"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-divider"></div>


                            <div class="text-end">
                                <a class="dropdown-item" href="{{ route('logout.getLogout') }}"><i
                                        class="feather icon-power"></i>Logout</a>
                            </div>
                            <div class="text-end">
                                <a class="dropdown-item" href="{{ route('user.getChangePassword', Auth::user()->customer->id) }}"><i
                                        class="feather icon-power"></i>Thay Đổi Mật Khẩu</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>