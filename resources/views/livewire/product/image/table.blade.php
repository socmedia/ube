<div>
    <div class="table-responsive">
        <table class="table mb-3 table-hover">
            <thead>
                <tr>
                    <th>Gambar</th>
                    <th>Thumbnail ?</th>
                    <th>urutan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody wire:sortable="updateOrder">
                @forelse ($images as $image)
                <tr wire:sortable.item="{{ $image->id }}" wire:key="image-{{ $image->id }}">
                    <td class="text-capitalize">
                        <img class="rounded" style="width:100px; height: unset" src="{{url($image->image_path)}}"
                            alt="">
                    </td>
                    <td class="text-capitalize">{{$image->position === 1 ? 'Thumbnail' : 'Bukan'}}</td>
                    <td class="text-capitalize">{{$image->position}}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <button type="button" class="btn text-secondary btn-light px-2 py-1 font-sm"
                                data-toggle="modal" title="Hapus Gambar" data-target="#deleteModal"
                                wire:click="$set('deleteID', '{{$image->id}}')"
                                {{$image->position === 1 ? 'disabled' : ''}}>
                                <i class="mdi mdi-delete"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4">
                        <p class="text-center py-3">Sayang sekali, gambar tidak ditemukan.</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="row">
        <div class="col-12">
            {{$images->links('livewire::simple-bootstrap')}}
        </div>
    </div>

    <div class="modal fade" wire:ignore.self id="deleteModal" tabindex="-1" role="dialog"
        aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content border-0">
                <div class="modal-header border-0">
                    <h5 class="modal-title" id="deleteModalLabel">Hapus Gambar</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Anda yakin akan menghapus data ini ?
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button class="btn btn-danger" wire:click="destroyImage">Hapus</button>
                </div>
            </div>
        </div>
    </div>
</div>
