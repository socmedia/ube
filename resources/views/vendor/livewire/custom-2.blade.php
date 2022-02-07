<div>
    @if ($paginator->hasPages())
    <nav>
        <ul class="paging justify-content-end">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
            <li class="item disabled" aria-disabled="true">
                <span class="link" rel="prev">Sebelumnya</span>
            </li>
            @else
            <li class="item">
                <button type="button" class="link" wire:click="previousPage" wire:loading.attr="disabled"
                    rel="prev">Sebelumnya</button>
            </li>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
            <li class="item">
                <button type="button" class="link" wire:click="nextPage" wire:loading.attr="disabled"
                    rel="next">Selanjutnya</button>
            </li>
            @else
            <li class="item disabled" aria-disabled="true">
                <span class="link" rel="next">Selanjutnya</span>
            </li>
            @endif
        </ul>
    </nav>
    @endif
</div>