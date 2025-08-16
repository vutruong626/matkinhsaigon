@php

$routeCheckKey = Route::current()->getName();
@endphp

<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow no-print" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto">
                <a class="navbar-brand" href="/">
                    <div class="brand-logo"></div>
                    <h2 class="brand-text mb-0">MKSG</h2>
                </a></li>
            <li class="nav-item nav-toggle">
                <a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
                    <i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i>
                    <i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i>
                </a>
            </li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="{{ str_contains($routeCheckKey, 'getHomeDashboard') ? 'active' : ' '}} nav-item">
                <a href="{{ route('getHomeDashboard') }}">
                    <i class="feather icon-home"></i>
                    <span class="menu-title" data-i18n="Email">Dashboard</span>
                </a>
            </li>
            <li class=" navigation-header"><span>Apps</span>
            </li>
            <li class="{{Request::is('/') ? 'slider' : ' '}} nav-item">
                <a href="{{ route('slider.getListSlider') }}">
                    <i class="fa fa-paper-plane-o"></i>
                    <span class="menu-title" data-i18n="Email">Hình Ảnh</span>
                </a>
            </li>
            <li class=" nav-item">
                <a href="#">
                <i class="fa fa-paper-plane-o"></i>
                    <span class="menu-title  " style=" color: #ed1c24 !IMPORTANT; " data-i18n="User">Sản Phẩm</span>
                </a>
                <ul class="menu-content">
                    <li class="{{ str_contains($routeCheckKey, 'category.getListCategory') ? 'active' : ' '}} is-shown">
                        <a href="{{ route('category.getListCategory') }}">
                            <i class="feather icon-octagon " ></i>
                            <span class="menu-item "  data-i18n="View">Danh Mục</span>
                        </a>
                    </li>
                    <li class="{{ str_contains($routeCheckKey, 'brand.getListBrand') ? 'active' : ' '}} is-shown">
                        <a href="{{ route('brand.getListBrand') }}">
                            <i class="feather icon-octagon " ></i>
                            <span class="menu-item "  data-i18n="View">Thương Hiệu</span>
                        </a>
                    </li>
                    <li class="{{ str_contains($routeCheckKey, 'material.getListMaterial') ? 'active' : ' '}} is-shown">
                        <a href="{{ route('material.getListMaterial') }}">
                            <i class="feather icon-octagon " ></i>
                            <span class="menu-item "  data-i18n="View">Chất Liệu</span>
                        </a>
                    </li>
                    <li class="{{ str_contains($routeCheckKey, 'color.getListColor') ? 'active' : ' '}} is-shown">
                        <a href="{{ route('color.getListColor') }}">
                            <i class="feather icon-octagon " ></i>
                            <span class="menu-item "  data-i18n="View">Màu Sắc</span>
                        </a>
                    </li>
                    <li class="{{ str_contains($routeCheckKey, 'products.getListProduct') ? 'active' : ' '}} is-shown">
                        <a href="{{ route('products.getListProduct') }}">
                            <i class="fa fa-paper-plane-o"></i>
                            <span class="menu-item "  data-i18n="View">Sản Phẩm</span>
                        </a>
                    </li>
                    <li class="{{ str_contains($routeCheckKey, 'category.getListFeaturedCategory') ? 'active' : ' '}} is-shown">
                        <a href="{{ route('category.getListFeaturedCategory') }}">
                            <i class="fa fa-paper-plane-o"></i>
                            <span class="menu-item "  data-i18n="View">Danh Mục Nổi Bật</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item">
                <a href="#">
                    <i class="fa fa-paper-plane-o"></i>
                    <span class="menu-title" data-i18n="User">Danh Mục Tin Tức</span>
                </a>
                <ul class="menu-content">
                    <li class="{{ str_contains($routeCheckKey, 'catagoryNews.getListCategoryNews') ? 'active' : ' '}} is-shown">
                        <a href="{{ route('catagoryNews.getListCategoryNews') }}">
                            <i class="feather icon-octagon " ></i>
                            <span class="menu-item "  data-i18n="View">Danh Mục</span>
                        </a>
                    </li>
                    <li class="{{ str_contains($routeCheckKey, 'news.getListNews') ? 'active' : ' '}} is-shown">
                        <a href="{{ route('news.getListNews') }}">
                            <i class="feather icon-octagon " ></i>
                            <span class="menu-item "  data-i18n="View">Tin Tức</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="{{ str_contains($routeCheckKey, 'partner.getListPartner') ? 'active' : ' '}} nav-item">
                <a href="{{ route('partner.getListPartner') }}">
                    <i class="fa fa-paper-plane-o"></i>
                    <span class="menu-title" data-i18n="Email">Đối Tác</span>
                </a>
            </li>
            <li class="{{ str_contains($routeCheckKey, 'page.getListPage') ? 'active' : ' '}} nav-item">
                <a href="{{ route('page.getListPage') }}">
                    <i class="fa fa-paper-plane-o"></i>
                    <span class="menu-title" data-i18n="Email">Quy Định</span>
                </a>
            </li>
            <li class="{{ str_contains($routeCheckKey, 'setting.getListSetting') ? 'active' : ' '}} nav-item">
                <a href="{{ route('setting.getListSetting') }}">
                    <i class="fa fa-paper-plane-o"></i>
                    <span class="menu-title" data-i18n="Email">Cài Đặt</span>
                </a>
            </li>
            <li class="{{ str_contains($routeCheckKey, 'contact.getListContact') ? 'active' : ' '}} nav-item">
                <a href="{{ route('contact.getListContact') }}">
                    <i class="fa fa-paper-plane-o"></i>
                    <span class="menu-title" data-i18n="Email">Liên Hệ</span>
                </a>
            </li>
            <!-- <li class=" nav-item">
                <a href="#">
                    <i class="feather icon-users"></i>
                    <span class="menu-title" data-i18n="User">User</span>
                </a>
                <ul class="menu-content">
                    <li class="{{ str_contains($routeCheckKey, 'user.getListCustomerUser') ? 'active' : ' '}} is-shown">
                        <a href="{{ route('user.getListCustomerUser') }}">
                            <i class="feather icon-octagon " ></i>
                            <span class="menu-item "  data-i18n="View">Danh Sách User</span>
                        </a>
                    </li>
                </ul>
            </li> -->
            <!-- <li class=" nav-item">
                <a href="#">
                    <i class="feather icon-users"></i>
                    <span class="menu-title" data-i18n="User">Khách Hàng</span>
                </a>
                <ul class="menu-content">
                    <li class="{{ str_contains($routeCheckKey, 'customer.getListCustomer') ? 'active' : ' '}} is-shown">
                        <a href="{{ route('customer.getListCustomer') }}">
                            <i class="feather icon-octagon"></i>
                            <span class="menu-item" data-i18n="View">Danh Sách</span>
                        </a>
                    </li>
                </ul>
            </li> -->
        </ul>
    </div>
</div>