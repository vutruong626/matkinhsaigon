<footer id="footer">
    <div class="footer-before">
        <div class="container">
        </div>
    </div>
    <div class="footer-container animation-element bounce-up in-view">
        <div class="container">
            <div class="row footer">
                <div class="block-contact col-md-4 links wrapper">
                    <h3 class="text-uppercase block-contact-title hidden-sm-down"><a href="">CHÍNH SÁCH & QUY ĐỊNH</a>
                    </h3>
                    <div class="title clearfix hidden-md-up" data-target="#block-contact_list" data-toggle="collapse">
                        <span class="h3">CHÍNH SÁCH & QUY ĐỊNH</span>
                        <span class="pull-xs-right">
                            <span class="navbar-toggler collapse-icons" style="color: #000;font-size: 24px;font-weight: bold;">
                                <i class="fa fa-angle-down add" aria-hidden="true"></i>
                                <i class="fa fa-angle-up remove" aria-hidden="true"></i>
                            </span>
                        </span>
                    </div>
                    <ul id="block-contact_list" class="collapse">
                        @foreach($policiesAndRegulations as $key => $itemPolice)
                        <li>
                            <a href="{{ route('getPage', $itemPolice->link) }}"><span> {{ $key }}: {{ $itemPolice->name }}</span></a>
                        </li>
                        @endforeach
                        
                    </ul>

                </div>
                <div class="col-md-4 links block">
                    <h3 class="h3 hidden-md-down">QUY ĐỊNH PHÁP LÝ</h3>
                    <div class="title h3 block_title hidden-lg-up" data-target="#footer_sub_menu_81660"
                        data-toggle="collapse">
                        <span class="">QUY ĐỊNH PHÁP LÝ</span>
                        <span class="pull-xs-right">
                            <span class="navbar-toggler collapse-icons" style="color: #000;font-size: 24px;font-weight: bold;">
                                <i class="fa fa-angle-down add" aria-hidden="true"></i>
                                <i class="fa fa-angle-up remove" aria-hidden="true"></i>
                            </span>
                        </span>
                    </div>
                    <ul id="footer_sub_menu_81660" class="collapse block_content" style="color: #000;">
                        {!! $informationPage->legal_regulations !!}
                    </ul>
                </div>
                <div class="col-md-4 links block">
                    <h3 class="h3 hidden-md-down">KẾT NỐI VỚI CHÚNG TÔI:</h3>
                    <div class="title h3 block_title hidden-lg-up" data-target="#footer_sub_menu_26212"
                        data-toggle="collapse">
                        <span class="">KẾT NỐI VỚI CHÚNG TÔI:</span>
                        <span class="pull-xs-right">
                            <span class="navbar-toggler collapse-icons" style="color: #000;font-size: 24px;font-weight: bold;margin-right: -19px;">
                                <i class="fa fa-angle-down add" aria-hidden="true"></i>
                                <i class="fa fa-angle-up remove" aria-hidden="true"></i>
                            </span>
                        </span>
                    </div>
                    <ul id="footer_sub_menu_26212" class="collapse block_content">
                        <div class="image-social-network">
                            <a href="{{ $informationPage->facebook }}"><img class="logo img-responsive" src="{{ $informationPage->getIconFB() }}"></a>
                            <a href="mailto:{{ $informationPage->email }}"><img class="logo img-responsive" src="{{ $informationPage->getIconEmail() }}"></a>
                            <a href="{{ $informationPage->youtube }}"><img class="logo img-responsive" src="{{ $informationPage->getIconYoutube() }}"></a>
                            <a href="{{ $informationPage->zalo }}"><img class="logo img-responsive" src="{{ $informationPage->getIconZalo() }}"></a>
                        </div>
                        <br/>
                        <!-- <h3 class="h3"><a href="">GIỚI THIỆU</a></h3> -->
                        <h3 class="h3">THỜI GIAN LÀM VIỆC:</h3>
                        <div class="network-time">
                            <img class="logo img-responsive" src="{{ $informationPage->getIconTime() }}">
                            {!! $informationPage->work_time !!}
                        </div>
                        <br/>
                        <a href="//www.dmca.com/Protection/Status.aspx?ID=6fc42ede-3640-4e7d-92ca-015ba36f4035" title="DMCA.com Protection Status" class="dmca-badge"> <img src ="https://images.dmca.com/Badges/dmca-badge-w150-5x1-07.png?ID=6fc42ede-3640-4e7d-92ca-015ba36f4035"  alt="DMCA.com Protection Status" /></a>  <script src="https://images.dmca.com/Badges/DMCABadgeHelper.min.js"> </script>
                    </ul>
                </div>
                <div class="block_newsletter">
                    <h4 class="title"><span class="news1">BẢN ĐỒ:</span></h4>
                    <div class="block_map">
                        {!! $informationPage->map !!}
                    </div>
                </div>


            </div>
        </div>
    </div>
    </div>
    <div class="footer-after">
        <div class="container">
            <div class="footer-inner-after">
                <div class="copyright">
                    {!! $informationPage->copyright !!}
                </div>

                <!-- Block payment logo module -->
                <div id="payement_logo_block_left" class="payement_logo_block">
                    <a href="#">
                        <img class="lazyload"
                            data-src="{{asset('img/tmp/visa.png')}}"
                            alt="visa" width="40" height="25" />
                        <img class="lazyload"
                            data-src="{{asset('img/tmp/master_card.png')}}"
                            alt="master_card" width="40" height="25" />
                        <img class="lazyload"
                            data-src="{{asset('img/tmp/american_express.png')}}"
                            alt="american_express" width="40" height="25" />
                        <img class="lazyload"
                            data-src="{{asset('img/tmp/paypal.png')}}"
                            alt="paypal" width="40" height="25" />
                    </a>
                </div>
                <!-- /Block payment logo module -->
            </div>
        </div>
    </div>
    <a class="top_button" href="#" style="">&nbsp;</a>
</footer>