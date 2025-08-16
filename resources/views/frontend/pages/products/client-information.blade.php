@extends('frontend.layouts.master')
@section('content')
<section id="wrapper">
    <nav data-depth="3" class="breadcrumb">
        <div class="container">
            <ol itemscope itemtype="/">
                <li itemprop="itemListElement" itemscope itemtype="/">
                    <a itemprop="item" href="/">
                        <span itemprop="name">Trang chủ</span>
                    </a>
                    <meta itemprop="position" content="1">
                </li>
            </ol>
        </div>
    </nav>
    <div class="container">
        <div id="columns_inner">
            <div id="content-wrapper">
                <section id="main">
                    <form method="POST" action="{{ route('clientInformation') }}" data-refresh-url="">
                        {{csrf_field()}}
                        <div class="cart-grid row">
                            <!-- Left Block: cart product informations & shpping -->
                            <div class="cart-grid-body col-xs-12 col-lg-9">
                                <!-- cart products detailed -->
                                <div class="card cart-container">
                                    <div class="card-block">
                                        <h1 class="h1">Thông Tin Người Mua</h1>
                                    </div>
                                    <hr class="separator">

                                    <div class="content">
                                        <div class="js-address-form client-information">
                                            <p class="note-infor"> Địa chỉ đã chọn sẽ được sử dụng làm địa chỉ cá nhân
                                                của bạn (cho hóa đơn) và làm địa chỉ giao hàng của bạn. </p>
                                            <div id="delivery-address">
                                                <div class="js-address-form">
                                                    <section class="form-fields">
                                                        <div class="form-group row ">
                                                            <label class="col-md-3 form-control-label required">
                                                                Họ & Tên
                                                            </label>
                                                            <div class="col-md-6">
                                                                <input class="form-control" name="name" type="text"
                                                                    value="" maxlength="255" required="">
                                                            </div>
                                                            <div class="col-md-3 form-control-comment">
                                                            </div>
                                                        </div>

                                                        <div class="form-group row ">
                                                            <label class="col-md-3 form-control-label required">
                                                                Giới Tính
                                                            </label>
                                                            <div class="col-md-6">
                                                                <select
                                                                    class="form-control form-control-select js-country"
                                                                    name="sex" required="">
                                                                    <option value="Nam">Nam</option>
                                                                    <option value="Nữ">Nữ</option>
                                                                </select>
                                                                <input type="hidden" id="district_name">
                                                            </div>
                                                            <div class="col-md-3 form-control-comment">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row ">
                                                            <label class="col-md-3 form-control-label required">
                                                                Số Điện Thoại
                                                            </label>
                                                            <div class="col-md-6">
                                                                <input class="form-control" name="phone" type="number"
                                                                    value="" maxlength="255" required="">
                                                            </div>

                                                            <div class="col-md-3 form-control-comment">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row ">
                                                            <label class="col-md-3 form-control-label">
                                                                Email
                                                            </label>
                                                            <div class="col-md-6">
                                                                <input class="form-control" name="email" type="text"
                                                                    value="" maxlength="255">
                                                            </div>
                                                            <div class="col-md-3 form-control-comment">
                                                                <!-- Optional -->
                                                            </div>
                                                        </div>


                                                        <div class="form-group row ">
                                                            <label class="col-md-3 form-control-label required">
                                                                Thành Phố
                                                            </label>
                                                            <div class="col-md-6">
                                                                <select
                                                                    class="form-control form-control-select js-country"
                                                                    id="select-city" name="city" required="">
                                                                    <option value="-1" selected="">-- Vui lòng nhập
                                                                        thành
                                                                        phố --</option>
                                                                    @foreach($city as $itemCity)
                                                                    <option value="{{ $itemCity->id }}"
                                                                        data-name="{{ $itemCity->name }}">
                                                                        {{ $itemCity->name }}</option>
                                                                    @endforeach

                                                                </select>
                                                                <input type="hidden" id="city_name">
                                                            </div>
                                                            <div class="col-md-3 form-control-comment">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row ">
                                                            <label class="col-md-3 form-control-label required">
                                                                Quận Huyện
                                                            </label>
                                                            <div class="col-md-6">
                                                                <select
                                                                    class="form-control form-control-select js-country"
                                                                    id="district" name="district" required="">
                                                                    <option value="-1">-- Vui nhập chọn quận huyện --
                                                                    </option>
                                                                    @foreach($city as $itemCity)
                                                                    @foreach($itemCity->districts as $itemDistrict)
                                                                    <option value="{{ $itemDistrict->id }}">
                                                                        {{ $itemDistrict->name }}</option>
                                                                    @endforeach
                                                                    @endforeach
                                                                </select>
                                                                <input type="hidden" id="district_name">
                                                            </div>
                                                            <div class="col-md-3 form-control-comment">
                                                            </div>
                                                        </div>

                                                        <div class="form-group row ">
                                                            <label class="col-md-3 form-control-label required">
                                                                Địa Chỉ Liên Hệ
                                                            </label>
                                                            <div class="col-md-6">
                                                                <input class="form-control" name="address" type="text"
                                                                    value="" maxlength="128" required="">
                                                            </div>
                                                            <div class="col-md-3 form-control-comment">
                                                            </div>
                                                        </div>

                                                        <div class="form-group row ">
                                                            <label class="col-md-3 form-control-label required">
                                                                Ghi chú
                                                            </label>
                                                            <div class="col-md-6">
                                                                <textarea name="note" id="" cols="74.99"
                                                                    rows="5"></textarea>
                                                            </div>
                                                            <div class="col-md-3 form-control-comment">
                                                            </div>
                                                        </div>

                                                    </section>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- shipping informations -->
                            </div>
                            <!-- Right Block: cart subtotal & cart total -->
                            <div class="cart-grid-right col-xs-12 col-lg-3">
                                <div class="card cart-summary">
                                    <div class="cart-detailed-totals">

                                        <div class="card-block">
                                            <div class="cart-summary-line" id="cart-subtotal-products">
                                                <span class="label js-subtotal">
                                                    {{ $totalQT }} Sản Phẩm
                                                </span>
                                                <span class="value">
                                                    {{ number_format($totalCart) }} VNĐ
                                                </span>
                                            </div>
                                            <div class="cart-summary-line" id="cart-subtotal-shipping">
                                                <span class="label">
                                                    Đang chuyển hàng
                                                </span>
                                                <span class="value">
                                                    Miễn Phí
                                                </span>
                                                <div><small class="value"></small></div>
                                            </div>
                                        </div>
                                        <div class="card-block cart-summary-totals">
                                            <div class="cart-summary-line cart-total">
                                                <span class="label">Tổng Tiền Thanh Toán&nbsp; :</span>
                                                <span class="value">{{ number_format($totalCart) }} VNĐ</span>
                                            </div>
                                        </div>






                                        <div class="collapsible">
                                            <!-- <span class="custom-checkbox">
                                                <input id="facet_input_1" name="brand[]"
                                                    data-search-url="" class="category-item"  type="checkbox">
                                                <span class="ps-shown-by-js">
                                                    <i class="fa fa-check rtl-no-flip checkbox-checked"
                                                        aria-hidden="true"></i>
                                                </span>
                                            </span> -->
                                            <input type="radio" name="payment" value="Chuyển khoản ngân hàng">
                                            Chuyển khoản ngân hàng :
                                        </div>
                                        <div class="content-collapsible">
                                            <p>
                                                Quý khách chuyển khoản vui lòng để lại SĐT trong phần ghi chú để bộ phận
                                                kế toán hỗ trợ nhanh nhất.<br />
                                                – Ngân hàng Vietcombank <br />
                                                – Số tài khoản : 8888888.301 <br />
                                                – Tên chủ TK: Vũ Thị Hảo
                                            </p>
                                        </div>
                                        <div class="collapsible">
                                            <input type="radio" name="payment" value="Thanh toán khi nhận hàng (COD)">
                                            Thanh toán khi nhận hàng (COD) :
                                        </div>
                                        <div class="content-collapsible">
                                            <p>Miễn phí giao hàng COD cho hóa đơn trên 500,000đ. Phí giao hàng đơn dưới
                                                500k sẽ được thông báo khi nhân viên xác nhận đơn hàng.Miễn phí giao
                                                hàng COD cho hóa đơn trên 500,000đ. Phí giao hàng đơn dưới 500k sẽ được
                                                thông báo khi nhân viên xác nhận đơn hàng.</p>
                                        </div>
                                        <div class="collapsible">
                                            <input type="radio" name="payment" value="Đặt hàng và thanh toán tại Shop ">
                                            Đặt hàng và thanh toán tại Shop : 
                                        </div>
                                        <div class="content-collapsible">
                                            <p>
                                                –Tại 301B Điện Biên Phủ , Quận 3 <br />
                                                – Tại 245C Xô Viết Nghệ Tĩnh ,Quận Bình Thạnh <br />
                                                – Tại 90 Nguyễn Hữu Thọ , Bà Rịa <br />
                                            </p>
                                        </div>
                                        @if ($errors->has('payment'))
                                        <span class="text-danger text-left">{{ $errors->first('payment') }}</span>
                                        @endif
                                    </div>



                                    <div class="checkout cart-detailed-actions card-block">
                                        <div class="text-sm-center">
                                            <button type="submit" class="continue btn btn-primary">
                                                Tiến Hành Thanh Toán
                                            </button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
</section>
<script>
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
    coll[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var content = this.nextElementSibling;
        if (content.style.maxHeight) {
            content.style.maxHeight = null;
        } else {
            content.style.maxHeight = content.scrollHeight + "px";
        }
    });
}
</script>
@endsection