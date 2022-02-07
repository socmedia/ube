<button class="btn btn-{{$color ? $color : 'dark'}} d-flex align-items-center {{$additionalClass}}">
    {{$slot}}
    <div class="ml-1" style="display: none" wire:loading.class="d-block" wire:target="{{$target}}">
        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
        <span class="sr-only">Loading...</span>
    </div>
</button>
