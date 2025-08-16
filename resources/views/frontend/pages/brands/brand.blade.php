@extends('frontend.layouts.master')
@section('content')
<section id="wrapper">
    <nav data-depth="3" class="breadcrumb">
        <div class="container">
            <ol itemscope itemtype="">
                <li itemprop="itemListElement" itemscope itemtype="">
                    <a itemprop="item" href="/">
                        <span itemprop="name">Trang Chủ</span>
                    </a>
                    <meta itemprop="position" content="1">
                </li>
                <li itemprop="itemListElement" itemscope itemtype="">
                    <span itemprop="name">Danh Mục Thương Hiệu</span>
                </li>
            </ol>
        </div>
    </nav>
    <div class="tabs">
        <div class="container">
            <div class="czcategory-tab">
                <ul id="czcategory-tabs" class="nav nav-tabs clearfix">
                    <li class="nav-item">
                        
                        <a href="{{ route('getBrand') }}" class="nav-link {{Request::is('thuong-hieu') ? 'active' : ' '}}">
                            <span class="category-title">Tất cả</span>
                        </a>
                    </li>
                    @foreach($parentCategory as $key => $category)
                    <li class="nav-item">
                        <form id="search-tab-brand-{{ $category->id }}"
                            action="{{ route('getBrand', $category->alias) }}" method="get">
                            <a href="#tab_6" data-toggle="tab" class="nav-link tab-brand-item {{ $paramCategory ? $paramCategory->alias == $category->alias ? 'active' : '' : '' }}" data-brand="{{ $category->id }}">
                                <span class="category-title">{{ $category->name }}</span>
                            </a>
                        </form>
                    </li>
                    @endforeach
                    <!-- <li class="nav-item">
                        <a href="#tab_9" data-toggle="tab" class="nav-link ">
                            <span class="category-title">Round Shape</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#tab_10" data-toggle="tab" class="nav-link ">
                            <span class="category-title">Square Shape</span>
                        </a>
                    </li> -->
                </ul>
            </div>
            <div class="tab-content">
                <div class="products row">
                @foreach($brand as $key => $itemBrand)
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="card block-brand">
                            <div class="card-content">
                                <a href="{{ route('getDetailBrand', $itemBrand->alias) }}" >
                                    <img src="{{ $itemBrand->getLogoBrand() }}"
                                        alt="{{ $itemBrand->name }}" width="150">
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!-- {{ $brand->links() }} -->
                <div class="ps_sortPagiBar clearfix bottom-line">
                    {{ $brand->links('frontend.pages.pagination.customer-pagination') }}
                </div>
            </div>
        </div>

    </div>

</section>
@endsection