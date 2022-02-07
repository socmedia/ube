<div>
    <div class="table-responsive">
        <table class="table mb-3 table-hover">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Ulasan</th>
                    <th>Ditampilkan dihomepage ?</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($reviews as $review)
                <tr>
                    <td class="text-capitalize">{{$review->name}}</td>
                    <td class="text-capitalize">
                        <div style="width: 300px; text-overflow: ellipsis; overflow:hidden">
                            {{$review->review}}
                        </div>
                    </td>
                    <td class="text-capitalize">
                        <div class="custom-control custom-switch" style="line-height: 1.9">
                            <input type="checkbox" class="custom-control-input" id="is_active-{{$loop->iteration}}"
                                wire:click="updateStatus('{{$review->id}}')"
                                {{$review->is_active === 1 ? 'checked' : ''}}>
                            <label class="custom-control-label"
                                for="is_active-{{$loop->iteration}}">{{$review->is_active === 1 ? 'Ditampilkan' : 'Disembunyikan'}}</label>
                        </div>
                    </td>
                    <td>
                        <div class="btn-group" role="group">
                            <button type="button" class="btn text-secondary btn-light px-2 py-1 font-sm"
                                data-toggle="modal" title="Edit Ulasan" data-target="#updateModal"
                                wire:click="find('{{$review->id}}')">
                                <i class="mdi mdi-pencil"></i>
                            </button>
                            <button type="button" class="btn text-secondary btn-light px-2 py-1 font-sm"
                                data-toggle="modal" title="Hapus Ulasan" data-target="#deleteModal"
                                wire:click="$set('deleteID', '{{$review->id}}')">
                                <i class="mdi mdi-delete"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4">
                        <p class="text-center py-3">Sayang sekali, ulasan tidak ditemukan.</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="row">
        <div class="col-12">
            {{$reviews->links('livewire::simple-bootstrap')}}
        </div>
    </div>

    <div class="modal fade" wire:ignore.self id="deleteModal" tabindex="-1" role="dialog"
        aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content border-0">
                <div class="modal-header border-0">
                    <h5 class="modal-title" id="deleteModalLabel">Hapus Ulasan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Anda yakin akan menghapus data ini ?
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button class="btn btn-danger" wire:click="destroyUlasan">Hapus</button>
                </div>
            </div>
        </div>
    </div>
</div>