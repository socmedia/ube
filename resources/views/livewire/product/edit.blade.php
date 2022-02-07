<div>
    <div class="modal fade" wire:ignore.self id="updateModal" tabindex="-1" role="dialog"
        aria-labelledby="updateModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form wire:submit.prevent="updateProduct">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateModalLabel">Edit Apartemen</h5>
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

                        <div class="form-group">
                            <div class="custom-control custom-switch" style="line-height: 1.9">
                                <input type="checkbox" class="custom-control-input" id="show_in_homepage"
                                    wire:model="showInHomepage">
                                <label class="custom-control-label" for="show_in_homepage">Tampilkan di Homepage
                                    ?</label>
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
