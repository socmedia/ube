<div>
    <div class="table-responsive">
        <table class="table mb-3 table-hover">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Dibuat Pada</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($statuses as $status)
                <tr>
                    <td class="text-capitalize">{{ $status->name }}</td>
                    <td class="text-capitalize"> {{ $status->created_at ? $status->created_at->format('D d, M Y') :
                        '-' }}
                    </td>
                    <td>
                        <div class="btn-group" role="group">
                            <button type="button" class="btn text-secondary btn-light px-2 py-1 font-sm"
                                data-toggle="modal" title="Edit Status Postingan" data-target="#updateModal"
                                wire:click="find('{{$status->id}}')">
                                <i class="mdi mdi-pencil"></i>
                            </button>
                            <button type="button" class="btn text-secondary btn-light px-2 py-1 font-sm"
                                data-toggle="modal" title="Hapus Status Postingan" data-target="#deleteModal"
                                wire:click="$set('deleteID', '{{$status->id}}')">
                                <i class="mdi mdi-delete"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4">
                        <p class="text-center py-3">Sayang sekali, status postingan tidak ditemukan.</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="row">
        <div class="col-12">
            {{$statuses->links('livewire::simple-bootstrap')}}
        </div>
    </div>

    <div class="modal fade" wire:ignore.self id="deleteModal" tabindex="-1" role="dialog"
        aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content border-0">
                <div class="modal-header border-0">
                    <h5 class="modal-title" id="deleteModalLabel">Hapus Status</h5>
                    <button status="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Anda yakin akan menghapus data ini ?
                </div>
                <div class="modal-footer border-0">
                    <button status="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button class="btn btn-danger" wire:click="destroyStatus">Hapus</button>
                </div>
            </div>
        </div>
    </div>
</div>
