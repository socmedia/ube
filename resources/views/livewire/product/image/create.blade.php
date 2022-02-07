<div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <form wire:submit.prevent="storeImage">
                <div class="form-group">
                    <div class="dropzone-wrapper">
                        <div class="dropzone-desc">

                            @if (! $image)
                            <p class="text">
                                Pilih Gambar atau Letakkan Gambar Disini.<br>
                                <small class="text-muted">Format gambar: jpg, jpeg, png, webp</small>
                            </p>
                            @endif

                            <div class="preview-zone">
                                <div class="box box-solid">
                                    <div class="box-body">
                                        @if ($image)
                                        <figure class="p-3">
                                            <img src="{{ $image->temporaryUrl() }}" class="img-fluid">
                                        </figure>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="file" name="image" accept="image/*" class="dropzone" wire:model="image"
                            style="position: absolute; z-index:3; top:0">
                    </div>

                    @error('image')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>

                <div class="form-group text-right">
                    <button class="btn btn-primary">Tambahkan</button>
                </div>
            </form>
        </div>
    </div>
</div>
