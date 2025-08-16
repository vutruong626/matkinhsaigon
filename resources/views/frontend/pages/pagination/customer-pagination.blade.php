@if ($paginator->hasPages())
    <div id="pagination" class="pagination clearfix">
        <ul class="page-list clearfix text-xs-right">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li id="pagination_previous" class="previous disabled pagination_previous" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span class="previous"><i class="fa fa-long-arrow-left"></i> </span>
                </li>
            @else
                <li id="pagination_previous" class="previous disabled pagination_previous">
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')"><span class="previous"><i class="fa fa-long-arrow-left"></i> </span></a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled" aria-disabled="true"><a>{{ $element }}</a></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <!-- <li class="active" aria-current="page"><a>{{ $page }}</a></li> -->
                            <li class="active current"><span><span>{{ $page }}</span></span></li>
                        @else
                            <!-- <li><a href="{{ $url }}">{{ $page }}</a></li> -->
                            <li><a href="{{ $url }}"><span>{{ $page }}</span></a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li id="pagination_next" class="pagination_next">
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"><span class="previous"><i class="fa fa-long-arrow-right"></i> </span></a>
                </li>
            @else
                <li id="pagination_next" class="next disabled pagination_next" aria-disabled="true" aria-label="@lang('pagination.next')">
                     <a href="#"> <span class="previous"><i class="fa fa-long-arrow-right"></i> </span> Next</a>
                </li>
            @endif
        </ul>
    </div>
@endif
