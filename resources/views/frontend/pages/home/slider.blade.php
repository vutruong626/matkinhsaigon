<div class="czhomeslider">
    <div id="spinner" class="loadingdiv spinner"></div>
    <div id="nivoslider" class="nivoSlider" data-interval="8000" data-pause="true">
        @foreach($slider as $key => $itemSlider)
        <a href="#" title="{{ $itemSlider->name }}">
            <img class="lazyload" src="{{ $itemSlider->getImage() }}"
                data-thumb="{{ $itemSlider->getImage() }}"
                alt="{{ $itemSlider->name }}" title="{{ $itemSlider->name }}" />
        </a>
        @endforeach
    </div>
</div>