<div>
    <div class="modal fade" wire:ignore.self id="imageModal" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form wire:submit.prevent="saveImage">
                    <div class="modal-header">
                        <h5 class="modal-title" id="imageModalLabel">Tambahkan Gambar</h5>
                    </div>
                    <div class="modal-body">

                        <small class="text-muted">
                            <em> * Gambar pertama adalah gambar yang akan dijadikan
                                thumbnail.</em>
                        </small>
                        <div class="dropzone-wrapper">
                            <div class="dropzone-desc">

                                @if (count($images) === 0)
                                <p class="text">
                                    Pilih Gambar atau Letakkan Gambar Disini.<br>
                                    <small class="text-muted">Format gambar: jpg, jpeg, png, webp</small>
                                </p>
                                @endif

                                <div class="preview-zone">
                                    <div class="box box-solid">
                                        <div class="box-body">
                                            @if ($images)
                                            <div class="row px-3 py-2">
                                                @foreach($images as $i => $image)
                                                <div class="col-6 col-md-4 col-lg-3 mb-3 position-relative">
                                                    <button
                                                        class="btn btn-danger px-2 py-1 text-sm rounded-lg shadow-lg"
                                                        type="button"
                                                        wire:click="removeImage('{{$image->getFileName()}}', {{$i}})"
                                                        style="position:  absolute; right: .5rem; top: .5rem; z-index: 999">
                                                        <i class="mdi mdi-delete"></i>
                                                    </button>
                                                    <figure>
                                                        <img src="{{ $image->temporaryUrl() }}" class="img-fluid">
                                                    </figure>
                                                </div>
                                                @endforeach
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="file" name="images" accept="image/*" class="dropzone" wire:model="images"
                                multiple style="position: absolute; z-index:3; top:0">
                        </div>

                        @error('images.*')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary">Tambahkan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
