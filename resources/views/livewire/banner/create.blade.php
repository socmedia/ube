<div>
    <div class="modal fade" wire:ignore.self id="createModal" tabindex="-1" role="dialog"
        aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form wire:submit.prevent="createBanner">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createModalLabel">Tambahkan Banner</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="bannerType">Pilih Jenis Banner</label>
                            <select class="form-control" wire:model="bannerType">
                                <option value="image">Gambar</option>
                                <option value="video">Vidio</option>
                            </select>
                        </div>

                        @if ($bannerType === 'image')
                        <div class="form-group text-center">
                            @if ($media)
                            <img class="w-75 rounded" src="{{$media->temporaryUrl()}}" alt="">
                            @endif
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 mb-3 mb-md-0">
                                <label for="name">Nama Banner</label>
                                <input type="text" class="form-control" wire:model.defer="name">
                                @error('name')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3 mb-md-0">
                                <label for="alt">Text Alt.</label>
                                <input type="text" class="form-control" wire:model.defer="alt">
                                @error('alt')
                                <small class="text-danger">{{$message}}</small>
                                @else
                                <small class="text-muted">
                                    <em>*Teks yang akan ditampilkan ketika gambar gagal dimuat.</em>
                                </small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="url">Target url</label>
                            <input type="url" class="form-control" wire:model.defer="url">
                            @error('url')
                            <small class="text-danger">{{$message}}</small>
                            @else
                            <small class="text-muted">
                                <em>*Ketika banner diklik, maka akan berpindah ke URL yang ditulis.</em>
                            </small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="media">Gambar</label>
                            <div class="custom-file">
                                <input type="file" accept="image/*" class="custom-file-input"
                                    wire:model.defer="media" />
                                <label class="custom-file-label"
                                    for="customFile">{{$media ? $media->getClientOriginalName() : 'Pilih gambar'}}</label>
                            </div>
                            @error('media')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        @else
                        <div class="form-group text-center">
                            @if ($thumbnail && $media)
                            <video class="w-100" controls preload="auto" loading="lazy"
                                poster="{{$thumbnail->temporaryUrl()}}" data-setup="{}">
                                <source src="{{$media->temporaryUrl()}}" type="video/mp4" />
                            </video>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="name">Nama Banner</label>
                            <input type="text" class="form-control" wire:model.defer="name">
                            @error('name')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="thumbnail">Thumbnail</label>
                            <div class="custom-file">
                                <input type="file" accept="image/*" class="custom-file-input"
                                    wire:model.defer="thumbnail" />
                                <label class="custom-file-label"
                                    for="customFile">{{$thumbnail ? $thumbnail->getClientOriginalName() : 'Pilih thumbnail'}}</label>
                            </div>
                            @error('thumbnail')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="media">Vidio</label>
                            <div class="custom-file">
                                <input type="file" accept="video/*" class="custom-file-input"
                                    wire:model.defer="media" />
                                <label class="custom-file-label"
                                    for="customFile">{{$media ? $media->getClientOriginalName() : 'Pilih video'}}</label>
                            </div>
                            @error('media')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        @endif

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>