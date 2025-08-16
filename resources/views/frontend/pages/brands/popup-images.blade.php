<div class="modal fade js-product-images-modal" id="product-modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <figure>
                    <img class="js-modal-product-cover product-cover-modal" width="900"
                        src="{{ $detailBrand->listImageBrand[0]->getImage() }}"
                        alt="" title="" itemprop="image">
                    <figcaption class="image-caption">
                    </figcaption>
                </figure>
                <aside id="thumbnails" class="thumbnails js-thumbnails text-xs-center">

                    <div class="js-modal-mask mask ">
                        <ul class="product-images js-modal-product-images">
                            @foreach($detailBrand->listImageBrand as $key => $itemImg)
                            <li class="thumb-container">
                                <img data-image-large-src="{{ asset('img/brand/'. $itemImg->images) }}"
                                    class="thumb js-modal-thumb" src="{{ asset('img/brand/'. $itemImg->images) }}" alt="" title=""
                                    width="327" itemprop="image">
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="arrows js-modal-arrows">
                        <i class="material-icons arrow-up js-modal-arrow-up fa fa-caret-up" aria-hidden="true"></i>
                        <i class="material-icons fa fa-caret-down arrow-down js-modal-arrow-down" aria-hidden="true"></i>
                    </div>
                </aside>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->