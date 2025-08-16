@extends('admin.layouts.master')

@section('content')
<!-- BEGIN: Global messenger-->
@include('admin.layouts.include.messages')
<!-- END: Global messenger-->
<!-- users list start -->
<section id="data-list-view" class="data-list-view-header dashboard">

    <!-- dataTable starts -->
    <div class="table-responsive">
        <!-- <div class="mt-2">
        </div> -->
        <table class="table data-thumb-view">
            <thead>
                <tr>
                    <th hidden></th>
                    <th>Tên khách hàng</th>
                    <th>Địa chỉ</th>
                    <th>Điện thoại</th>
                    <th>Trạng thái</th>
                    <th>Ngày</th>
                    <th style="text-align: center;">ACTION</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clientInformation as $itemClientInformation)
                <tr>
                    <td hidden dataUserId="2"></td>
                    <td class="product-category">{{ $itemClientInformation->name }}</td>
                    <td class="product-category" style="width: 25%;">{{ $itemClientInformation->address }}</td>
                    <td class="product-category">{{ $itemClientInformation->phone }}</td>
                    
                    <td class="product-category">
                        <button type="button" class="btn btn-info btn-sm">
                                {{ $itemClientInformation->ship }}
                        </button>
                    </td>
                    <td class="product-category">{{ $itemClientInformation->created_at }}</td>
                    <td  align="center" class="product-action">
                        <button type="button" class="btn btn-info btn-sm update-data" 
                                data-toggle="modal" data-target="#update-{{ $itemClientInformation->id }}">
                            Xem
                        </button>
                        {!! Form::open(['method' => 'DELETE','route' => ['deleteOrder', $itemClientInformation->id],'style'=>'display:inline']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
                
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@foreach($clientInformation as $item)
    @include('admin.dashboard.chart.modal-detail', ['clientInfo' => $item])
@endforeach
<!-- users list ends -->

@endsection