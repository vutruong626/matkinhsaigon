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
        <table class="table data-thumb-view" data-url-create="{{route('partner.getCreatePartner')}}">
            <thead>
                <tr>
                    <th hidden></th>
                    <th>Logo</th>
                    <th>Tên Đối Tác</th>
                    <th>Điện Thoại</th>
                    <th>Địa Chỉ</th>
                    <th>Trang Thái</th>
                    <th style="text-align: center;">ACTION</th>
                </tr>
            </thead>
            <tbody>
                @foreach($partner as $itemPartner)
                <tr>
                    <td hidden dataUserId="{{ $itemPartner->id }}"></td>
                    <td class="product-img">
                        <img src="{{ $itemPartner->getImage() }}" alt="{{ $itemPartner->name }}">
                    </td>
                    <td class="product-category">{{ $itemPartner->name }}</td>
                    <td class="product-category">{{ $itemPartner->phone }}</td>
                    <td class="product-category">{{ $itemPartner->address }}</td>

                    <td class="product-status" align="center" style="width: 15%;">
                        @if($itemPartner->hidden == 1)
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
                        <a href="{{ route('partner.getUpdatePartner', $itemPartner->id) }}" class="btn btn-info btn-sm">Sửa</a>
                        {!! Form::open(['method' => 'DELETE','route' => ['partner.deletePartner', $itemPartner->id],'style'=>'display:inline']) !!}
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