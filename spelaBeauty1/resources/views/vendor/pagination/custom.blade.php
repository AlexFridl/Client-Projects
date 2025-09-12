@if ($paginator->hasPages())
    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center d-flex">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link three_dots">...</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">
                        <i class="bi bi-arrow-left "></i>
                    </a>
                </li>
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link three_dots">...</span>
                </li>
            @endif

            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </li>
            @endif
        </ul>
    </nav>
@endif
