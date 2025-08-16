@extends('admin.layouts.master')

@section('content')
<!-- BEGIN: Global messenger-->
@include('admin.layouts.include.messages')
<!-- END: Global messenger-->
<!-- users list start -->
<section id="data-list-view" class="data-list-view-header">

    <!-- dataTable starts -->
    <div class="table-responsive">
        <!-- <div class="mt-2">
        </div> -->
        <table class="table data-thumb-view" data-url-create="{{ route('category.getCreateFeaturedCategory') }}">
            <thead>
                <tr>
                    <th hidden></th>
                    <th>Tên Thương Hiệu</th>
                    <th>Logo</th>
                    <th>Thứ Tự</th>
                    <th>Hiển Thị</th>
                    <th style="text-align: center;">ACTION</th>
                </tr>
            </thead>
            <tbody>
                @foreach($result as $item)
                <tr>
                    <td hidden dataUserId="2"></td>
                    <td class="product-category">{{ $item->name }}</td>
                    <td class="product-img">
                        <img src="{{ $item->getImage() }}" alt="{{ $item->name }}">
                    </td>
                    <td align="center" class="product-category">{{ $item->weight }}</td>
                    <td class="product-status" align="center" style="width: 15%;">
                        @if($item->status == 1)
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
                    <td  align="center" class="product-action">
                        <a href="{{ route('category.getUpdateFeaturedCategory', $item->id) }}" class="btn btn-info btn-sm">Sửa</a>
                        {!! Form::open(['method' => 'DELETE','route' => ['category.deleteFeaturedCategory', $item->id],'style'=>'display:inline']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
<!-- users list ends -->

@endsection