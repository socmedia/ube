<div class="modal fade" id="{{$id}}" data-backdrop="static" tabindex="-1" aria-labelledby="{{$id}}Label"
    aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog modal-dialog-centered rounded">
        <div class="modal-content border-0">
            <div class="modal-header {{ $deleteModal == 'true' ? 'bg-danger text-white border-0' : ''}}">
                <h5 class="modal-title" id="{{$id}}Label">{{$title}}</h5>
                <button type="button" class="close text-dark" data-dismiss="modal" aria-label="Close"
                    style="position: absolute; right: 1rem; top: 1rem;" wire:click="closeModal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body border-0">
                {{$slot}}
            </div>
            @if ($footer)
            <div class="modal-footer border-0">
                {{$footer}}
            </div>
            @endif
        </div>
    </div>
</div>
