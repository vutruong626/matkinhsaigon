@extends('admin.layouts.master')

@section('content')

    <div class="row">
        <div class="col-lg-3 col-sm-6 col-12">
            <div class="card">
                <div class="card-header d-flex flex-column align-items-start pb-0">
                    <div class="avatar bg-rgba-primary p-50 m-0">
                        <div class="avatar-content">
                            <i class="feather icon-credit-card text-primary font-medium-5"></i>
                        </div>
                    </div>
                    

                    <h2 class="text-bold-700 mt-1">{{$customerStatistics['totalRoles']}}</h2>
                    <p class="mb-1">Tổng số role</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-12">
            <div class="card">
                <div class="card-header d-flex flex-column align-items-start pb-0">
                    <div class="avatar bg-rgba-success p-50 m-0">
                        <div class="avatar-content">
                            <i class="feather icon-users text-success font-medium-5"></i>
                        </div>
                    </div>
                    <h2 class="text-bold-700 mt-1">{{$customerStatistics['totalCustomerActive']}}</h2>
                    <p class="mb-1">User hoạt động</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-12">
            <div class="card">
                <div class="card-header d-flex flex-column align-items-start pb-0">
                    <div class="avatar bg-rgba-danger p-50 m-0">
                        <div class="avatar-content">
                            <i class="feather icon-users text-danger font-medium-5"></i>
                        </div>
                    </div>
                    <h2 class="text-bold-700 mt-1">{{$customerStatistics['totalCustomerDeactive']}}</h2>
                    <p class="mb-1">User vô hiệu</p>
                </div>
            </div>
        </div>
    </div>
    <!-- BEGIN: Global messenger-->
    @include('admin.layouts.include.messages')
    <!-- END: Global messenger-->
    <!-- users list start -->
    <section id="data-list-view" class="data-list-view-header">
        
        <!-- dataTable starts -->
        <div class="table-responsive">
            <div class="mt-2">
            </div>
            <table class="table data-thumb-view">
                <thead>
                    <tr>
                        <th hidden></th>
                        <th>Tên</th>
                        <th>SDT</th>
                        <th>Vai trò</th>
                        <th>Sinh nhật</th>
                        {{-- <th>Trang Thái</th> --}}
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        foreach ($listCustomer as $customer) {
                            ?>
                                <tr>
                                    <td hidden dataUserId={{$customer['id']}}>
                                        {{$customer['id']}}
                                    </td>
                                    <td class="product-name"><div class="d-flex justify-content-left align-items-center">
                                        <div class="avatar-wrapper">
                                            <div class="avatar  me-1">
                                                <img src="{{ $customer['avatar'] }}" alt="Avatar" height="32" width="32">
                                            </div>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <a href="app-user-view-account.html" class="user_name text-truncate text-body">
                                                <span class="fw-bolder">{{ $customer['first_name'].' '.$customer['last_name'] }}</span>
                                            </a><small class="emp_post text-muted">{{ $customer['email_customer'] }}</small></div></div>
                                    </td>
                                    <td class="product-category">{{$customer['phone']}}</td>
                                    <td class="product-category">{{ (isset($customer['customer_roles'][0])) ? $customer['customer_roles'][0]['name'] : ''  }}</td>
                                    <td align="center">
                                        <div class="text-primary">
                                        {{ ($customer['birthday']) ? date("d-m-Y", strtotime($customer['birthday']) ) :"" }}
                                        </div>
                                        {{-- @if($customer['id_user']) 
                                            <div class="chip chip-success">
                                                <div class="chip-body">
                                                    <div class="chip-text">Được Phép</div>
                                                </div>
                                            </div>
                                        @else 
                                            <div class="chip chip-warning align-center">
                                                <div class="chip-body">
                                                    <div class="chip-text">Không</div>
                                                </div>
                                            </div>
                                        @endif --}}
                                    </td>
                                    {{-- <td align="center">
                                        @if($customer['status'] === 'active') 
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
                                    </td> --}}
                                    <td class="product-action">
                                        <span class="action-edit-two"><i class="feather icon-edit"></i></span>
                                        <span class="action-delete"><i class="feather icon-trash"></i></span>
                                        <input type="hidden" name="id" value="{{ $customer['id'] }}">
                                        <input type="hidden" name="role" value="{{ (isset($customer['customer_roles'][0])) ? $customer['customer_roles'][0]['lever_key'] : '' }}">
                                        <input type="hidden" name="avatar" value="{{ $customer['avatar'] }}">
                                        <input type="hidden" name="first_name" value="{{ $customer['first_name'] }}">
                                        <input type="hidden" name="last_name" value="{{ $customer['last_name'] }}">
                                        <input type="hidden" name="email_customer" value="{{ $customer['email_customer'] }}">
                                        <input type="hidden" name="birthday" value="{{ $customer['birthday'] }}">
                                        <input type="hidden" name="phone" value="{{ $customer['phone'] }}">
                                        <input type="hidden" name="status" value="{{ $customer['status'] }}">
                                    </td>
                                </tr>
                            <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
        <!-- dataTable ends -->

        
        <!-- add new sidebar starts -->
        <div class="add-new-data-sidebar" id="form-add-popup-left">
            <div class="overlay-bg"></div>
            <form  method="post" id="add-customer" action="{{ route('customer.postAddCustomer') }}"  enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <input type="hidden" name="id" value="" />
                <div class="add-new-data">
                    <div class="div mt-2 px-2 d-flex new-data-title justify-content-between">
                        <div>
                            <h4 class="text-uppercase">Thêm Mới Khách Hàng</h4>
                        </div>
                        <div class="hide-data-sidebar">
                            <i class="feather icon-x"></i>
                        </div>
                    </div>
                    <div class="data-items pb-3">
                        <div class="data-fields px-2 mt-3">
                            <div class="row">
                                <div class="col-sm-6 data-field-col">
                                    <label for="data-name">Tên đầu</label>
                                    <input type="text" required class="form-control" name="first_name">
                                </div>
                                <div class="col-sm-6 data-field-col">
                                    <label for="data-name">Tên cuối</label>
                                    <input type="text" required class="form-control" name="last_name">
                                </div>
                                
                                <div class="col-sm-12 data-field-col">
                                    <label for="data-phone">Email</label>
                                    <input type="email" required placeholder="examle.com" class="form-control" name='email_customer'>
                                </div>
                                
                                <div class="col-sm-12 data-field-col">
                                    <label for="data-phone">Sinh nhật</label>
                                    <input type="date"  placeholder="Sinh nhật" class="form-control" name='birthday'>
                                </div>

                                <div class="col-sm-12 data-field-col">
                                    <label for="data-phone">Điện thoại</label>
                                    <input type="tel" required placeholder="#########" minlength="8" class="form-control input-number" name='phone'>
                                </div>
                                <div class="col-sm-12 data-field-col">
                                    <label for="data-category"> là khách </label>
                                    <select class="form-control" required id="data-role" name="role">
                                        <option value=''>Chọn một vai trò</option>
                                        <?php 
                                            foreach ($roles as $role) {
                                                echo "<option value='".$role->lever_key."'>".$role->name."</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-sm-12 data-field-col">
                                    <label for="data-status">Trạng thái</label>
                                    <select class="form-control" required id="data-status" name='status'>
                                        <option value="active">Hoạt động</option>
                                        <option value="deactive">Vô hiệu</option>
                                    </select>
                                </div>
                                
                                <div class="col-md-12">
                                    <label for="data-name">Avatar</label>
                                    <input type="file" class="upload-muli-mksg-default" name="customer_avatar[]" data-max-file-size="3MB" />
                                </div>
                                <div class="col-sm-12 data-field-col">
                                    <button type="reset" class="btn btn-outline-primary">Làm mới</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="add-data-footer d-flex justify-content-around px-3 mt-2">
                        <div class="add-data-btn">
                            <button type="submit" value="create" class="btn btn-success">Tạo</button>
                        </div>
                        <div class="cancel-data-btn">
                            <button class="btn btn-outline-danger">Đóng</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- add new sidebar ends -->

        
        <!-- add new sidebar starts -->
        <div class="add-new-data-sidebar" id="form-delete-popup-left">
            <div class="overlay-bg"></div>
            <form  method="POST" id="delete-customer" action="{{ route('customer.deleteCustomer','') }}" urlAction="{{ route('customer.deleteCustomer','') }}">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <div class="add-new-data">
                    <div class="div mt-2 px-2 d-flex new-data-title justify-content-between">
                        <div>
                            <h4 class="text-uppercase">Xóa khách hàng</h4>
                        </div>
                        <div class="hide-data-sidebar">
                            <i class="feather icon-x"></i>
                        </div>
                    </div>
                    <div class="data-items pb-3">
                        <div class="data-fields px-2">
                            <div class="row">
                                <div class="col-sm-12 data-field-col">
                                    <h3 for="data-phone">Bạn có muốn xóa Khách Hàng</h3>
                                </div>
                                <div class="col-sm-6 data-field-col">
                                    <label for="data-name">Tên đầu</label>
                                    <input type="text" disabled class="form-control" name="first_name">
                                </div>
                                <div class="col-sm-6 data-field-col">
                                    <label for="data-name">Tên cuối</label>
                                    <input type="text" disabled class="form-control" name="last_name">
                                </div>
                                
                                <div class="col-sm-12 data-field-col">
                                    <label for="data-phone">Email</label>
                                    <input type="email" disabled placeholder="examle.com" class="form-control" name='email_customer'>
                                </div>

                                <div class="col-sm-12 data-field-col">
                                    <label for="data-phone">Điện thoại</label>
                                    <input type="tel" disabled placeholder="#########" class="form-control" name='phone'>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="add-data-footer d-flex justify-content-around px-3 mt-2">
                        <div class="add-data-btn">
                            <button type="submit" value="create" class="btn btn-danger">Xóa</button>
                        </div>
                        <div class="cancel-data-btn">
                            <button class="btn btn-outline-danger">Đóng</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- add new sidebar ends -->


    </section>
    <!-- users list ends -->

@endsection