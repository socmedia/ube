<form wire:submit.prevent="store">
    <div class="card shadow-sm">
        <div class="card-body">
            <div class="form-group">
                <label for="image">Pilih image</label>
                <input id="image" type="file" class="form-control" name="image" accept="image/*" name="image"
                    wire:model="image">

                @error('image')
                <small class="text-danger">{{$message}}</small>
                @else
                <small class="text-center text-secondary">
                    <em>Format: .png, .jpg, .jpeg</em>
                </small>
                @enderror
                <figure class="mt-3 input" style="background-image: url({{$image ? $image->temporaryUrl() : '' }})">
                </figure>
                <div x-data="{ isUploading: false, progress: 0 }" x-on:livewire-upload-start="isUploading = true"
                    x-on:livewire-upload-finish="isUploading = false" x-on:livewire-upload-error="isUploading = false"
                    x-on:livewire-upload-progress="progress = $event.detail.progress" wire:target="image"
                    wire:loading="image">

                    <div x-show="isUploading">
                        <progress max="100" x-bind:value="progress"></progress>
                    </div>
                </div>
            </div>

            <div class="form-group text-right">
                <button class="btn btn-primary" type="submit">
                    Simpan
                </button>
            </div>
        </div>
    </div>
</form>