<!-- Modal -->
<div class="modal fade text-left" id="update-{{ $clientInfo->id }}" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document"
        style="max-width: 1200px;margin: 5.75rem auto;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="info-client">
                    <div class="row">
                        <div class="col-md-10">
                            <h3>Thông tin người mua hàng</h3>
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-info btn-sm update-order" data-ship="Đơn Hàng Đã Được Giao" data-id="{{ $clientInfo->id }}" data-url="{{ route('update.updateShipProduct', $clientInfo->id) }}">Đơn Hàng Đã Được Giao</button>
                        </div>
                    </div>
                    
                    <p><strong>Họ & Tên: </strong>{{ $clientInfo->name }}</p>
                    <p><strong>Hình Thức Thanh Toán: </strong>{{ $clientInfo->payment }}</p>
                    <p><strong>Số Điên Thoại: </strong>{{ $clientInfo->phone }}</p>
                    <p><strong>Email: </strong>{{ $clientInfo->email }}</p>
                    <p><strong>Địa Chỉ: </strong>{{ $clientInfo->address }}</p>
                    <p><strong>Ngày Mua: </strong>{{ $clientInfo->created_at }}</p>
                </div>
                <br />
                <h3>Thông tin sản phẩm</h3>
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên Sản Phẩm</th>
                            <th>Đơn Vị Tính</th>
                            <th>Số Lượng</th>
                            <th>Giá</th>
                            <th>Thành Tiền</th>
                        </tr>
                    </thead>
                    <tbody class="info-bill">
                        @if($clientInfo)
                        @foreach($clientInfo->bill as $key => $itemBill)
                        <tr>
                            <th scope="row">{{ $key }}</th>
                            <td>
                                <a href="" target="_blank">
                                    <strong><i class="ficon feather icon-external-link"></i></strong>
                                    {{ $itemBill->listProduct->name }}
                                    
                                </a>
                                <br/>
                                @if($itemBill->category_name !== null)
                                    <span>Danh Mục chọn: 
                                        <?php 
                                            $response = json_decode($itemBill->category_name);
                                        ?>
                                        @foreach($response as $itemRepo)
                                        @if($itemRepo->name !== 'Chọn một tùy chọn')
                                        <strong>{{ $itemRepo->name }}, </strong>
                                        @endif
                                        @endforeach
                                    </span>
                                    @endif
                            </td>
                            <td>{{ $itemBill->listProduct->unit }}</td>
                            <td>{{ $itemBill->qty }}</td>
                            @if($itemBill->sale_off !== null)
                            <td>{{ number_format($itemBill->sale_off) }} VNĐ</td>
                            @else 
                            <td>{{ number_format($itemBill->listProduct->price_sale) }} VNĐ</td>
                            @endif

                            @if($itemBill->sale_off !== null)
                            <td>{{ number_format( $itemBill->qty*$itemBill->sale_off) }} VNĐ</td>
                            @else 
                            <td>{{ number_format( $itemBill->qty*$itemBill->listProduct->price_sale) }} VNĐ</td>
                            @endif
                        </tr>
                        @endforeach
                        <tr>
                            <th></th>
                            <th style="color: #ed1c24;float: right;font-size: 16px"><strong>Tổng Giá Tiền Thanh Toán:
                                </strong></th>
                            <th></th>
                            <th></th>
                            <th style="color: #ed1c24;font-size: 16px">
                                {{ number_format($clientInfo->tatalBill->tatal) }} VNĐ</th>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>