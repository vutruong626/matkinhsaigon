@extends('frontend.layouts.master')
@section('content')
<section id="wrapper">
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
                    <a itemprop="item" href="{{ route('getPartner') }}">
                        <span itemprop="name">Danh Mục Đối Tác</span>
                    </a>
                    
                </li>
                <li itemprop="itemListElement" itemscope itemtype="">
                    <span itemprop="name">{{ $getDetailPartner->name }}</span>
                </li>
            </ol>
        </div>
    </nav>
    
    <div class="container">
        <article class="partner-detail">
            {!! $getDetailPartner->content !!}
        </article>
        <article class="map-detail">
            <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.7713649625084!2d106.58331181493156!3d10.752096292337972!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752c54c5a45679%3A0x95ad6eb0f2830073!2zNDQ0OSBOZ3V54buFbiBD4butdSBQaMO6LCBUw6JuIFThuqFvIEEsIELDrG5oIFTDom4sIFRow6BuaCBwaOG7kSBI4buTIENow60gTWluaCwgVmlldG5hbQ!5e0!3m2!1sen!2s!4v1666799884097!5m2!1sen!2s" height="450" style="border:0;width: 100%;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->
                <div class="mapouter">
                    <div class="gmap_canvas">
                        <iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" 
                                src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q={{ $getDetailPartner->address }}&amp;t=&amp;z=17&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                        <a href="https://piratebay-proxys.com/">Pirate bay</a>
                    </div>
                <style>.mapouter{position:relative;text-align:right;width:100%;height:400px;}.gmap_canvas {overflow:hidden;background:none!important;width:100%;height:400px;}.gmap_iframe {height:400px!important;}</style></div>
        </article>
    </div>
</section>
<br/>
@endsection