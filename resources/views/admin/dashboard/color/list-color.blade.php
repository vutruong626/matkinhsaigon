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
        <table class="table data-thumb-view" data-url-create="{{ route('color.getCreateColor') }}">
            <thead>
                <tr>
                    <th hidden></th>
                    <th>Logo</th>
                    <th>Tên Thương Hiệu</th>
                    <th>Thứ Tự</th>
                    <th style="text-align: center;">ACTION</th>
                </tr>
            </thead>
            <tbody>
                @foreach($color as $itemColor)
                <tr>
                    <td hidden dataUserId="2"></td>
                    <td class="product-img">
                        <img src="{{ $itemColor->getImages() }}" alt="">
                    </td>
                    <td class="product-category">{{ $itemColor->name }}</td>
                    <td align="center" class="product-category">{{ $itemColor->weight }}</td>
                    <td  align="center" class="product-action">
                        <a href="{{ route('color.getUpdateColor', $itemColor->id) }}" class="btn btn-info btn-sm">Sửa</a>
                        {!! Form::open(['method' => 'DELETE','route' => ['color.deleteColor', $itemColor->id],'style'=>'display:inline']) !!}
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