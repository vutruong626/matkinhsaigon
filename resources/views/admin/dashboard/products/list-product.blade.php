@extends('admin.layouts.master')

@section('content')
<!-- BEGIN: Global messenger-->
@include('admin.layouts.include.messages')
<!-- END: Global messenger-->
<!-- users list start -->
<section class="page-product-admin">

    <!-- dataTable starts -->
    <div class="table-responsive">
        @include('admin.dashboard.products.search-products')
        <div class="action-btns">
            <div class="btn-dropdown mr-1 mb-1">
                <div class="btn-group dropdown actions-dropodown">
                    <a href="{{ route('products.getCreateProduct') }}" class="btn btn-outline-danger block btn-lg"
                        data-target="#default">
                        <i class="feather icon-plus"></i>
                        Thêm Mới
                    </a>
                </div>
            </div>
        </div>
        <!-- <table class="table data-thumb-view " data-url-create="{{ route('products.getCreateProduct') }}" style="width: 100%;"> -->
        <table class="table table-data-product"style="width: 100%;">
            <thead>
                <tr>
                    <th hidden></th>
                    <th>Tên Sản Phẩm</th>
                    <th>Giá Bán</th>
                    <th>Thứ Tự</th>
                    <th>Hiển Thị</th>
                    <th style="text-align: center;">ACTION</th>
                </tr>
            </thead>
            <tbody>
                @foreach($listProduct as $itemProduct)
                <tr>
                    <td hidden dataUserId="{{ $itemProduct->id }}"></td>
                    <td class="product-category">{{ $itemProduct->name }}</td>
                    <td class="product-category">{{ number_format($itemProduct->price_sale) }} VNĐ</td>
                    <td align="center" class="product-category">{{ $itemProduct->weight }}</td>
                    <td class="product-status" align="center" style="width: 15%;">
                        @if($itemProduct->hidden == 1)
                        <div class="chip chip-success">
                            <div class="chip-body">
                                <div class="chip-text">Hoạt động</div>
                            </div>
                        </div>
                        @else
                        <div class="chip chip-warning align-center">
                            <div class="chip-body">
                                <div class="chip-text">Vô hiệu</div>
                            </div>
                        </div>
                        @endif
                    </td>
                    <td align="center" class="product-action">
                        <a href="{{ route('products.getUpdateProduct', $itemProduct->id) }}" class="btn btn-info btn-sm">Sửa</a>
                        {!! Form::open(['method' => 'DELETE','route' => ['products.deleteProduct', $itemProduct->id],'style'=>'display:inline']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
            </tbody>
            
        </table>
        {{ $listProduct->appends(Request::except('page'))->links('admin.dashboard.pagination.customer-pagination') }}
    </div>
    
</section>
<!-- users list ends -->
@endsection