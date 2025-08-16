<section class="page-content img-left-product" id="change-image-color">
    <div class="product-leftside">
        <div class="images-container">
            <div class="product-cover">
                <img class="js-qv-product-cover zoom-product" src="{{ $detailProduct->listImage[0]->getAllImage() }}" alt="" title=""
                    style="width:100%;" itemprop="image" data-zoom-image="{{ $detailProduct->listImage[0]->getAllImage() }}" />
                <div class="layer" data-toggle="modal" data-target="#product-modal">
                    <i class="fa fa-arrows-alt zoom-in"></i>
                </div>
            </div>
            <!-- Define Number of product for SLIDER -->
            <div class="js-qv-mask mask additional_slider">
                <ul class="cz-carousel product_list additional-carousel additional-image-slider">
                    @foreach($detailProduct->listImage as $key => $itemImg)
                    <li class="thumb-container item" style="width: 116px;">
                        <a href="javaScript:void(0)" class="elevatezoom-gallery load-image-oa"
                            data-image="{{ asset('img/product/'. $itemImg->image) }}"
                            data-zoom-image="{{ asset('img/product/'. $itemImg->image) }}">
                            <img class="thumb js-thumb {{ $key == 0 ? 'selected' : ''}}  "
                                data-image-medium-src="{{ asset('img/product/'. $itemImg->image) }}"
                                data-image-large-src="{{ asset('img/product/'. $itemImg->image) }}"
                                src="{{ asset('img/product/'. $itemImg->image) }}" alt="" title="" width="95"
                                itemprop="image">
                        </a>
                    </li>
                    @endforeach
                </ul>
                <div class="customNavigation">
                    <a class="btn prev additional_prev">&nbsp;</a>
                    <a class="btn next additional_next">&nbsp;</a>
                </div>
            </div>
        </div>
    </div>
</section>
<br/>
<?php
    $description = json_decode($detailProduct->description);
?>
@if($description && $description->hidden == 1)
<div class="description-left">
    <div class="text-description">
        {!! $description->text !!}
    </div>
</div>
@endif
<style>
.additional_slider .owl-wrapper-outer .owl-wrapper .owl-item{
    width: auto !important
}
</style>