<div>
    <div class="modal fade" wire:ignore.self id="updateModal" tabindex="-1" role="dialog"
        aria-labelledby="updateModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form wire:submit.prevent="updateReview">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateModalLabel">Edit Ulasan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Nama Lengkap</label>
                            <input type="text" class="form-control" wire:model.defer="name">
                            @error('name')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="review">Ulasan</label>
                            <textarea class="form-control" wire:model.defer="review"></textarea>
                            @error('review')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-switch" style="line-height: 1.9">
                                <input type="checkbox" class="custom-control-input" id="is_active"
                                    wire:model="isActive">
                                <label class="custom-control-label"
                                    for="is_active">{{$isActive === 1 ? 'Ditampilkan' : 'Disembunyikan'}}</label>
                            </div>
                        </div>
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