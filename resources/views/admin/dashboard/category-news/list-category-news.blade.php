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
        <table class="table data-thumb-view" data-url-create="{{ route('catagoryNews.getCreateCategoryNews') }}">
            <thead>
                <tr>
                    <th></th>
                    <th>Tên</th>
                    <th>Thứ Tự</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                @foreach($parentCategories as $itemParentCategories)
                <tr>
                    <td dataUserId="{{ $itemParentCategories->id }}"></td>
                    <td class="product-category">{{ $itemParentCategories->name }}</td>
                    <td class="product-category">{{ $itemParentCategories->weight }}</td>
                    <td class="product-action">
                        <a href="{{ route('catagoryNews.getUpdateCategoryNews', $itemParentCategories->id) }}" class="btn btn-info btn-sm">Sửa</a>
                        {!! Form::open(['method' => 'DELETE','route' => ['catagoryNews.deleteCategoryNews', $itemParentCategories->id],'style'=>'display:inline']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
                @if(!empty($itemParentCategories->chillParent))
                @foreach($itemParentCategories->chillParent as $itemChillParent)
                <tr>
                    <td dataUserId="{{ $itemChillParent->name }}"></td>
                    <td class="product-name-category d-flex mx-2">
                        <div class="fonticon-wrap"><i class="feather icon-corner-down-right"></i></div>
                        <label for="{{ $itemChillParent->name }}">{{ $itemChillParent->name }}</label>
                    </td>
                    <td class="product-category">{{ $itemChillParent->weight }}</td>
                    <td class="product-action">
                        <a href="{{ route('catagoryNews.getUpdateCategoryNews', $itemChillParent->id) }}" class="btn btn-info btn-sm">Sửa</a>
                        {!! Form::open(['method' => 'DELETE','route' => ['catagoryNews.deleteCategoryNews', $itemChillParent->id],'style'=>'display:inline']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
                @if(!empty($itemChillParent->childLevelParent))
                @foreach($itemChillParent->childLevelParent as $itemChildLevelParent)
                <tr>
                    <td dataUserId="{{ $itemChildLevelParent->name }}"></td>
                    <td class="product-name-category d-flex mx-4 ">
                        <div class="fonticon-wrap"><i class="feather icon-corner-down-right"></i></div>
                        <label for="{{ $itemChildLevelParent->name }}">{{ $itemChildLevelParent->name }}</label>
                    </td>
                    <td class="product-category">{{ $itemChildLevelParent->weight }}</td>
                    <td class="product-action">
                        <a href="{{ route('catagoryNews.getUpdateCategoryNews', $itemChildLevelParent->id) }}" class="btn btn-info btn-sm">Sửa</a>
                        {!! Form::open(['method' => 'DELETE','route' => ['catagoryNews.deleteCategoryNews', $itemChildLevelParent->id],'style'=>'display:inline']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
                @endif
                @endforeach
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
</section>
<!-- users list ends -->

@endsection