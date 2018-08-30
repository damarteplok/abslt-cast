@if ($paginator->hasPages())
<div class="col-md-12">
    <ul class="d-flex justify-content-between pl-0" role="navigation" style="list-style-type: none;">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class=" page-item disabled" aria-disabled="true">
                <span class="btn btn-white page-link"><i class="ti-arrow-left fs-9 mr-4"></i> Newer </span>
            </li>
        @else
            <li class="page-item">
                <a class="btn btn-white page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev"><i class="ti-arrow-left fs-9 mr-4"></i> Newer</a>
            </li>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="  page-item">
                <a class="btn btn-white page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">Older <i class="ti-arrow-right fs-9 ml-4"></i></a>
            </li>
        @else
            <li class=" page-item disabled" aria-disabled="true">
                <span class="btn btn-white page-link">Older <i class="ti-arrow-right fs-9 ml-4"></i></span>
            </li>
        @endif
    </ul>
</div>
@endif
