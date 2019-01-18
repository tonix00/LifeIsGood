@if ($paginator->hasPages())
    <div class="paginate">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <a href="#" class="paginate-prev is-disable">
                <span class="paginate-prev-arrow"></span>
            </a>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="paginate-prev">
                <span class="paginate-prev-arrow"></span>
            </a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <a href="#" class="paginate-number is-current">{{ $page }}</a>
                    @else
                        <a href="{{ $url }}" class="paginate-number">{{ $page }}</a>
                    @endif
                @endforeach
            @endif

        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="paginate-next">
                <span class="paginate-next-arrow"></span>
            </a>
        @else
            <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="paginate-next  is-disable">
                <span class="paginate-next-arrow"></span>
            </a>
        @endif
    </div>
@endif