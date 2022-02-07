<div>
    <div class="row">
        <div class="col-md-4 mb-3 mb-md-0">
            <div class="card">
                <div class="card-header">
                    <h5>{{!$mode ? 'Tambah' : 'Edit'}} Atribut</h5>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="saveAttribute">
                        <div class="form-group">
                            <label for="">Nama atribut</label>
                            <input type="text" class="form-control" wire:model="name">
                            @error('name')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="form-group text-center">
                            <button class="btn btn-block btn-dark">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5>Daftar Atribut</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hovered">
                            <thead>
                                <tr>
                                    <td>No.</td>
                                    <td>Nama Attribut</td>
                                    <td>Aksi</td>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($attributes as $attribute)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$attribute->attribute}}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn text-secondary btn-light px-2 py-1 font-sm"
                                                data-toggle="modal" title="Edit Attribute" data-target="#updateModal"
                                                wire:click="changeMode('{{$attribute->id}}')">
                                                <i class="mdi mdi-pencil"></i>
                                            </button>
                                            @if (auth()->user()->email === 'indraranuh1@gmail.com')
                                            <button type="button" class="btn text-secondary btn-light px-2 py-1 font-sm"
                                                data-toggle="modal" title="Hapus Attribute" data-target="#deleteModal"
                                                wire:click="$set('deleteID', '{{$attribute->id}}')">
                                                <i class="mdi mdi-delete"></i>
                                            </button>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" wire:ignore.self id="deleteModal" tabindex="-1" role="dialog"
        aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content border-0">
                <div class="modal-header border-0">
                    <h5 class="modal-title" id="deleteModalLabel">Hapus Banner</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Anda yakin akan menghapus data ini ?
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button class="btn btn-danger" wire:click="destroyBanner">Hapus</button>
                </div>
            </div>
        </div>
    </div>

</div>
