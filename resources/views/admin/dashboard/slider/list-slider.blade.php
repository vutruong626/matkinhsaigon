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
        <table class="table data-thumb-view" data-url-create="{{route('slider.getCreateSlider')}}">
            <thead>
                <tr>
                    <th hidden></th>
                    <th>Hình Ảnh</th>
                    <th>Tên</th>
                    <th>Trang Thái</th>
                    <th style="text-align: center;">ACTION</th>
                </tr>
            </thead>
            <tbody>
                @foreach($listSlider as $itemSlider)
                <tr>
                    <td hidden dataUserId="{{ $itemSlider->id }}"></td>
                    <td class="product-img">
                        <img src="{{ $itemSlider->getImage() }}" alt="{{ $itemSlider->name }}">
                    </td>
                    <td class="product-category">{{ $itemSlider->name }}</td>

                    <td class="product-status" align="center" style="width: 15%;">
                        @if($itemSlider->hidden == 1)
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
                    <td class="product-action">
                        <!-- <a href="{{ route('slider.getUpdateSlider', $itemSlider->id) }}">
                            <span>Sửa</span></a> -->
                        <a href="{{ route('slider.getUpdateSlider', $itemSlider->id) }}" class="btn btn-info btn-sm">Sửa</a>
                        <!-- <a href="{{ route('slider.deleteSlider', $itemSlider->id) }}"><span><i
                                    class="feather icon-trash"></i></span></a> -->
                        {!! Form::open(['method' => 'DELETE','route' => ['slider.deleteSlider', $itemSlider->id],'style'=>'display:inline']) !!}
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