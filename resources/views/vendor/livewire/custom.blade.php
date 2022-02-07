<div>
    @if ($paginator->hasPages())
    <!-- Pagination -->

    <nav class="pagination">
        @if ($paginator->onFirstPage())
        <span aria-current="page" class="page-numbers current" aria-label="@lang('pagination.previous')">&lsaquo;</span>
        @else
        <a href="javascript:void(0)" class="page-numbers" dusk="previousPage"
            wire:click="previousPage" wire:loading.attr="disabled" rel="prev"
            aria-label="@lang('pagination.previous')">&lsaquo;</a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            @if (is_string($element))
            <a href="javascript:void(0)" class="page-item disabled" aria-disabled="true">
                <span>{{ $element }}</span>
            </a>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                    <a href="javascript:void(0)" class="page-numbers current" wire:key="paginator-page-{{ $page }}"
                        aria-current="page">
                        {{ $page }}
                    </a>
                    @else
                        @if ($page == $paginator->currentPage() - 1 || $page == $paginator->currentPage() + 1)
                        <a href="javascript:void(0)" class="page-numbers" wire:key="paginator-{{ $page }}" wire:click="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')">
                            {{$page}}
                        </a>

                        @elseif($page == 1)
                        <a href="javascript:void(0)" class="page-numbers" wire:key="paginator-{{ $page }}" wire:click="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')">
                            {{$page}}
                        </a>

                        @elseif($page == $paginator->lastPage())
                        <a href="javascript:void(0)" class="page-numbers" wire:key="paginator-{{ $page }}" wire:click="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')">
                            {{$page}}
                        </a>
                        @endif
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
        <a href="javascript:void(0)" class="next page-numbers" dusk="nextPage" wire:click="nextPage"
            wire:loading.attr="disabled" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
        @else
        <span class="next page-numbers" dusk="nextPage" wire:loading.attr="disabled" rel="next"
        aria-label="@lang('pagination.next')">&rsaquo;</span>
        @endif
    </nav>
    @endif
</div>
