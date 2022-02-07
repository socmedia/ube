<div>
    <div class="modal fade" wire:ignore.self id="createModal" tabindex="-1" role="dialog"
        aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form wire:submit.prevent="createProduct">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createModalLabel">Tambahkan Apartemen</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="type">Tipe Apartemen</label>
                            <input type="text" class="form-control" wire:model.defer="type">
                            @error('type')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="form-group row">
                            @foreach ($spesification as $i => $spesification)
                            <div class="col-6 mb-3">
                                <input type="text" class="form-control" placeholder="{{$spesification['label']}}"
                                    wire:model.defer="spesification.{{$i}}.value">
                                @error('spesification.'.$i.'.value')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            @endforeach
                        </div>

                        <div class="form-group">
                            <label for="description">Deskripsi</label>
                            <textarea type="text" class="form-control" wire:model.defer="description"></textarea>
                            @error('description')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
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
