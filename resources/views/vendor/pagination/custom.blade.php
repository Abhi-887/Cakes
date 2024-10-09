@if ($paginator->hasPages())
    <div class="d-flex justify-content-between align-items-center mt-4">
        <!-- Rows per page section -->
        <div class="d-flex align-items-center text-secondary">
            <span>Rows per page:</span>
            <div class="dropdown ms-2">
                <button class="btn btn-light dropdown-toggle custom-toggle pe-4" type="button" id="rowsPerPage" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ $paginator->perPage() }}
                </button>
                <ul class="dropdown-menu" aria-labelledby="rowsPerPage">
                    <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['per_page' => 10]) }}">10</a></li>
                    <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['per_page' => 20]) }}">20</a></li>
                    <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['per_page' => 30]) }}">30</a></li>
                    <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['per_page' => 50]) }}">50</a></li>
                </ul>
            </div>
        </div>

        <!-- Pagination text -->
        <div class="text-secondary">
             {{ $paginator->firstItem() }} – {{ $paginator->lastItem() }} of {{ $paginator->total() }}
        </div>

        <!-- Pagination controls -->
        <nav aria-label="Page navigation custom" class="custom">
            <ul class="pagination mb-0">
                {{-- First Page Link --}}
                @if (!$paginator->onFirstPage())
                    <li class="page-item">
                        <a class="page-link fs-2 text-secondary" href="{{ $paginator->url(1) }}" aria-label="First">
                            <img class="custom-next-pre left-arrow-1" src="{{asset('uploads/logos/upload.png')}}" alt="left-arrow-1">
                        </a>
                    </li>
                @else
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="page-link">
                            <img class="custom-next-pre left-arrow-1" src="{{asset('uploads/logos/upload.png')}}" alt="left-arrow-1">
                        </span>
                    </li>
                @endif

                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <li class="page-item disabled" aria-disabled="true" aria-label="Previous">
                        <span class="page-link">
                            <img class="custom-next-simp" src="{{asset('uploads/logos/left-chevron(4).png')}}" alt="arrow">
                        </span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link fs-2 text-secondary" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="Previous">
                            <img src="{{asset('uploads/logos/left-chevron(4).png')}}" class="custom-next-simp " alt="arrow">
                        </a>
                    </li>
                @endif

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li class="page-item">
                        <a class="page-link fs-2 text-secondary" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="Next">
                            <img src="{{asset('uploads/logos/left-chevron(4).png')}}" class="custom-next-simple" alt="arrow">
                        </a>
                    </li>
                @else
                    <li class="page-item disabled" aria-disabled="true" aria-label="Next">
                        <span class="page-link">
                            <img src="{{asset('uploads/logos/left-chevron(4).png')}}" class="custom-next-simple" alt="arrow">
                        </span>
                    </li>
                @endif

                {{-- Last Page Link --}}
                @if ($paginator->hasMorePages())
                    <li class="page-item">
                        <a class="page-link fs-2 text-secondary" href="{{ $paginator->url($paginator->lastPage()) }}" aria-label="Last">
                              <img class="custom-next-pre" src="{{asset('uploads/logos/upload.png')}}" alt="">
                        </a>
                    </li>
                @else
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="page-link">
                            <img class="custom-next-pre" src="{{asset('uploads/logos/upload.png')}}" alt="">
                        </span>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
@endif
