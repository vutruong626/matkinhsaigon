@extends('frontend.layouts.master')
@section('content')
<section class="detail-brand">
    <nav data-depth="3" class="breadcrumb">
        <div class="container">
            <ol itemscope itemtype="">
                <li itemprop="itemListElement" itemscope itemtype="">
                    <a itemprop="item" href="/">
                        <span itemprop="name">Trang Chủ</span>
                    </a>
                    <meta itemprop="position" content="1">
                </li>

                <li itemprop="itemListElement" itemscope itemtype="">
                    <span itemprop="name">Liên Hệ</span>
                </li>
            </ol>
        </div>
    </nav>
    <div class="container">
        <div class="title-contact">
            <h2 class="text-uppercase text-center">
                <span class="main-title">DANH SÁCH CỬA HÀNG <code>MATKINHSAIGON.COM</code> </span>
            </h2>
            <br />
        </div>
        <div id="columns_inner">
            <div id="content-wrapper">

                <section id="main" itemscope itemtype="">

                    <div class="tab">
                        <!-- @foreach($contact as $item)
                        <button class="tablinks" onclick="openCity(event, '{{ $item->id }}')" id="defaultOpen">{{ $item->name }}</button>
                        @endforeach -->
                        @foreach($contact as $item)
                        <div class="tab-inf tablinks" onclick="openCity(event, '{{ $item->id }}')" id="defaultOpen">
                            <h1>{{ $item->name }}</h1>
                            <p> <i class="fa fa-map-marker" aria-hidden="true"></i> {{ $item->address }}</p>
                            <p><i class="fa fa-phone" aria-hidden="true"></i> {{ $item->phone }}</p>
                            <p> <i class="fa fa-clock-o" aria-hidden="true"></i> {{ $item->strart_time }} -
                                {{ $item->end_time }}</p>
                        </div>
                        @endforeach
                        <!-- <button class="tablinks" onclick="openCity(event, 'Paris')">Paris</button>
                        <button class="tablinks" onclick="openCity(event, 'Tokyo')">Tokyo</button> -->
                    </div>
                    @foreach($contact as $item)
                    <div id="{{ $item->id }}" class="tabcontent">
                        <div class="mapouter">
                            <div class="gmap_canvas">
                                <iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no" marginheight="0"
                                    marginwidth="0"
                                    src="https://maps.google.com/maps?width=600&amp;height=600&amp;hl=en&amp;q={{ $item->address }}&amp;t=&amp;z=17&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                                <a href="https://piratebay-proxys.com/">Pirate bay</a>
                            </div>
                            <style>
                            .mapouter {
                                position: relative;
                                text-align: right;
                                width: 100%;
                                height: 600px;
                            }

                            .gmap_canvas {
                                overflow: hidden;
                                background: none !important;
                                width: 100%;
                                height: 600px;
                            }

                            .gmap_iframe {
                                height: 600px !important;
                            }
                            </style>
                        </div>
                    </div>
                    @endforeach
                    <!-- <div id="Paris" class="tabcontent">
                        <h3>Paris</h3>
                        <p>Paris is the capital of France.</p>
                    </div>

                    <div id="Tokyo" class="tabcontent">
                        <h3>Tokyo</h3>
                        <p>Tokyo is the capital of Japan.</p>
                    </div> -->
                </section>
            </div>
        </div>
    </div>
</section>
<br />
<script>
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
@endsection