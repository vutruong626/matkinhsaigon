@extends('admin.layouts.master')
@section('content')
<!-- BEGIN: Global messenger-->
<div class="alert-success">
@include('admin.layouts.include.messages')
</div>


<section id="data-thumb-view" class="data-thumb-view-header customers-information view-acction">
    <div class="action-btns">
        <div class="btn-dropdown mr-1 mb-1">
            <div class="btn-group dropdown actions-dropodown">
                <button type="button" class="btn btn-outline-danger block btn-lg models-create-all" data-toggle="modal"
                    data-target="#default">
                    Thêm Mới
                </button>
                <!-- Modal -->
                @include('admin.dashboard.material.model-create')
            </div>
        </div>
    </div>
    <!-- dataTable starts -->
    <div class="table-responsive" >
        <div class="mt-2">
        </div>
        <table class="table data-thumb-view" >
            <thead>
                <tr>
                    <th></th>
                    <th>TÊN THƯƠNG HIỆU</th>
                    <th>THỨ TỰ</th>
                    <th class="aligt-right-bt-acction">ACTION</th>
                </tr>
            </thead>
            <tbody>
                @foreach($material as $item)
                <tr >
                    <td></td>
                    <td class="product-name">{{ $item->name }}</td>
                    <td class="product-name">{{ $item->weight }}</td>
                    <td class="action">
                        <button type="button" class="btn btn-info btn-sm update-data" 
                                data-toggle="modal" data-target="#update-{{ $item->id }}" 
                                data-id=""
                                data-name=""
                                data-url="">
                            Sửa
                        </button>
                        {!! Form::open(['method' => 'DELETE','route' => ['material.deleteMaterial', $item->id],'style'=>'display:inline']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
                @include('admin.dashboard.material.model-update', ['item' => $item])
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- dataTable ends -->
</section>
@endsection