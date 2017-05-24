<ul class="pagination">

    {{-- Prev --}}
    @if($pagination->hasPrev)
        <li class="is-prev">
            <a href="{{ get_pagenum_link($pagination->prev) }}">
                <i class="fa fa-angle-double-left" aria-hidden="true"></i>
            </a>
        </li>
    @endif

    {{-- Pages --}}
    @foreach($pagination->pages as $page)
        @if($page === $pagination->paged)
            <li class="is-current">
                {{ $page }}
            </li>
        @else
            <li>
                <a href="{{ get_pagenum_link($page) }}">{{ $page }}</a>
            </li>
        @endif
    @endforeach

    {{-- Next --}}
    @if($pagination->hasNext)
        <li class="is-next">
            <a href="{{ get_pagenum_link($pagination->next) }}">
                <i class="fa fa-angle-double-right" aria-hidden="true"></i>
            </a>
        </li>
    @endif

</ul>
