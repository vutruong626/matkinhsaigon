<section class="page-content" id="content">
    <div class="product-leftside">
        <!-- <ul class="product-flags">
            <li class="product-flag new">New</li>
        </ul> -->
        <div class="images-container">

            <!-- <div class="product-cover">
                <img class="js-qv-product-cover zoom-product" src="{{ $detailBrand->listImageBrand[0]->getImage() }}" alt="" title=""
                    style="width:100%;" itemprop="image" data-zoom-image="{{ $detailBrand->listImageBrand[0]->getImage() }}" />

                <div class="layer" data-toggle="modal" data-target="#product-modal">
                    <i class="fa fa-arrows-alt zoom-in"></i>
                </div>
            </div> -->
            <!-- Define Number of product for SLIDER -->


            <div id="detail-brand-carousel" class="cz-carousel secondary-blog product-cover">
                @foreach($detailBrand->listImageBrand as $key => $itemImg)
                <div class="item" style="padding: 5px;">
                    <article class="blog-item">
                        <img data-image-large-src="{{ asset('img/brand/'. $itemImg->images) }}"
                                    class="thumb js-modal-thumb" src="{{ asset('img/brand/'. $itemImg->images) }}" alt="" title=""
                                    width="327" itemprop="image">
                        <!-- <div class="layer" data-toggle="modal" data-target="#product-modal-{{ $itemImg->id }}">
                            <i class="fa fa-arrows-alt zoom-in"></i>
                        </div> -->
                        
                    </article>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- foreach($detailBrand->listImageBrand as $key => $itemImg) -->
<!-- include('frontend.pages.brands.popup-images', ['itemImg' => $itemImg]) -->
<!-- endforeach -->
<br/>
<br/>
<br/>
<br/>
<br/>