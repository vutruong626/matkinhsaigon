<div class="header-top-address">
    <div class="row">
        <div class="col-lg-1 col-md-1">
        </div>
        <div class="col-lg-10 col-md-10">
            <marquee style="">
                <div class="float-left">
                {!! $informationPage->branch_address !!}
                </div>
            </marquee>
        </div>
        <div class="col-lg-1 col-md-1">
        </div>
    </div>
</div>
<header id="header">
    <div class="header-banner"> </div>
    <nav class="header-nav">
        <div class="container">
            <div class="left-nav"></div>
            <div class="right-nav"></div>
        </div>
    </nav>
    <div class="header-top">
        <div class="container">
            <div class="header_logo">
                <a href="/">
                    <img class="logo img-responsive" src="{{ $informationPage->getLogo() }}"
                        alt="Mắt Kính Sài Gòn">
                </a>
            </div>
            
            <div id="search_widget" class="col-lg-4 col-md-5 col-sm-12 search-widget"
                data-search-controller-url="">
                <!-- <span class="search_button"></span> -->
                <i class="fa fa-search search_button_top" aria-hidden="true"></i>
                <!-- <i class="fa fa-search" aria-hidden="true"></i> -->
                <div class="search_toggle">
                    <form method="get"
                        action="{{ route('searchProduct') }}">
                        <!-- <input type="hidden" name="controller" value="search"> -->
                        <input type="text" name="keyword" value="" placeholder="Vui lòng nhập từ khoá">
                        <button type="submit">
                        </button>
                    </form>
                </div>
            </div>
            <div class="header-top-inner">
                <div class="text-xs-left mobile hidden-lg-up mobile-menu">
                    <div class="menu-icon">
                        <div class="cat-title">Menu</div>
                    </div>

                    <div id="mobile_top_menu_wrapper" class="row hidden-lg-up">
                        <div class="mobile-menu-inner">
                            <div class="menu-icon">
                                <div class="cat-title">Menu</div>
                            </div>
                            <div class="js-top-menu mobile" id="_mobile_top_menu"></div>
                        </div>
                    </div>
                </div>


                <div class="menu col-lg-12 js-top-menu position-static hidden-md-down" id="_desktop_top_menu">

                    <ul class="top-menu top-menu  container" id="top-menu" data-depth="0">
                        <li class="category" id="category-6">
                            <a class="dropdown-item zise-mobile" href="/" data-depth="0">
                                <i class="fa fa-home" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li class="category" id="category-6">
                            <a class="dropdown-item" href="{{ route('getBrand') }}" data-depth="0">
                                THƯƠNG HIỆU
                            </a>
                        </li>
                        <!-- News -->
                        @foreach($dataMenu as $itemNews)
                        @if($itemNews->type == 'new')
                        <li class="category" id="category-{{ $itemNews->id }}">
                            <a class="dropdown-item"
                                href="{{ route('categoryNews', $itemNews->alias) }}"
                                data-depth="0">
                                <span class="pull-xs-right hidden-lg-up">
                                    <span data-target="#top_sub_menu_{{ $itemNews->id }}" data-toggle="collapse"
                                        class="navbar-toggler collapse-icons">
                                        <i class="fa-icon add">&nbsp;</i>
                                        <i class="fa-icon remove">&nbsp;</i>
                                    </span>
                                </span>
                                {{ $itemNews->name }}
                            </a>
                            <div class="popover sub-menu js-sub-menu collapse" id="top_sub_menu_{{ $itemNews->id }}">

                                <ul class="top-menu  " data-depth="1">
                                    @foreach($itemNews->chillParent as $itemChillParent)
                                    <li class="category" id="category-{{ $itemChillParent->id }}">
                                        <a class="dropdown-item dropdown-submenu"
                                            href="{{ route('categoryNews', [$itemNews->alias, $itemChillParent->alias]) }}"
                                            data-depth="1">
                                            <span class="pull-xs-right hidden-lg-up">
                                                <span data-target="#top_sub_menu_{{ $itemChillParent->id }}" data-toggle="collapse"
                                                    class="navbar-toggler collapse-icons">
                                                    <i class="fa-icon add">&nbsp;</i>
                                                    <i class="fa-icon remove">&nbsp;</i>
                                                </span>
                                            </span>
                                            {{ $itemChillParent->name }}
                                        </a>
                                        <div class="collapse" id="top_sub_menu_{{ $itemChillParent->id }}">

                                            <ul class="top-menu  " data-depth="2">
                                                @foreach($itemChillParent->childLevelParent as $itemChildLevelParent)
                                                <li class="category" id="category-{{ $itemChildLevelParent->id }}">
                                                    <a class="dropdown-item"
                                                        href="{{ route('categoryNews', [$itemNews->alias, $itemChillParent->alias, $itemChildLevelParent->alias]) }}"
                                                        data-depth="2">
                                                        {{ $itemChildLevelParent->name }}
                                                    </a>
                                                </li>
                                                @endforeach

                                            </ul>

                                        </div>
                                    </li>
                                    @endforeach

                                </ul>
                            </div>
                        </li>
                        @endif
                        @endforeach
                        <!-- Product -->
                        @foreach($dataMenu as $itemProduct)
                        @if($itemProduct->type == 'product')
                        <li class="category" id="category-{{ $itemProduct->id }}">
                            <a class="dropdown-item" href="{{ route('product', $itemProduct->alias) }}" data-depth="0">
                                <span class="pull-xs-right hidden-lg-up">
                                    <span data-target="#top_sub_menu_{{ $itemProduct->id }}" data-toggle="collapse"
                                        class="navbar-toggler collapse-icons">
                                        <i class="fa-icon add">&nbsp;</i>
                                        <i class="fa-icon remove">&nbsp;</i>
                                    </span>
                                </span>
                                {{ $itemProduct->name }}
                            </a>
                            <div class="popover sub-menu js-sub-menu collapse" id="top_sub_menu_{{ $itemProduct->id }}">
                                <ul class="top-menu  " data-depth="1">
                                    @foreach($itemProduct->chillParent as $itemChillParent)
                                    <li class="category" id="category-{{ $itemChillParent->id }}">
                                        <a class="dropdown-item dropdown-submenu"
                                            href="{{ route('product', [$itemProduct->alias, $itemChillParent->alias]) }}"
                                            data-depth="1">
                                            <span class="pull-xs-right hidden-lg-up">
                                                <span data-target="#top_sub_menu_{{ $itemChillParent->id }}" data-toggle="collapse"
                                                    class="navbar-toggler collapse-icons">
                                                    <i class="fa-icon add">&nbsp;</i>
                                                    <i class="fa-icon remove">&nbsp;</i>
                                                </span>
                                            </span>
                                            {{ $itemChillParent->name }}
                                        </a>
                                        <div class="collapse" id="top_sub_menu_{{ $itemChillParent->id }}">
                                            <ul class="top-menu caterory-level-child" data-depth="2">
                                                @foreach($itemChillParent->childLevelParent as $itemChildLevelParent)
                                                @if($itemChildLevelParent->show_icon != 1 || !$itemChildLevelParent->icon)
                                                <li class="category" id="category-{{ $itemChildLevelParent->id }}" style="width: 100%;">
                                                    <a class="dropdown-item"
                                                        href="{{ route('product', [$itemProduct->alias, $itemChillParent->alias, $itemChildLevelParent->alias]) }}"
                                                        data-depth="2">
                                                        {{ $itemChildLevelParent->name }}
                                                    </a>
                                                </li>
                                                @endif
                                                @if($itemChildLevelParent->show_icon == 1)
                                                <div class="menu-icon-color">
                                                    <a
                                                        href="{{ route('product', [$itemProduct->alias, $itemChillParent->alias, $itemChildLevelParent->alias]) }}">
                                                        <img src="{{ $itemChildLevelParent->getIconImages() }}"
                                                            width="25">
                                                    </a>
                                                </div>
                                                @endif
                                                @endforeach
                                            </ul>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </li>
                        @endif
                        @endforeach
                        <!-- Product -->
                        <li class="category" id="category-6">
                            <a class="dropdown-item" href="{{ route('getPartner') }}" data-depth="0">
                                ĐỐI TÁC
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </div>


</header>