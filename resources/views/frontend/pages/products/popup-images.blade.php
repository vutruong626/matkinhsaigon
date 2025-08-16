<div class="modal fade js-product-images-modal" id="product-modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <figure style="width: 100%;">
                    <div id="detail-product-carousel" class="cz-carousel secondary-blog">
                        @foreach($detailProduct->listImage as $key => $itemImg)
                        <div class="item" style="padding: 5px;">
                            <article class="blog-item">
                                <img class="js-modal-product-cover product-cover-modal" width=""
                                    src="{{ asset('img/product/'. $itemImg->image) }}" alt="" title=""
                                    itemprop="image">
                            </article>
                        </div>
                        @endforeach
                    </div>
                    <!-- <figcaption class="image-caption">

                        <div id="product-description-short" itemprop="description">
                            <p>{!! $detailProduct->description !!}</p>
                        </div>

                    </figcaption> -->
                </figure>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->