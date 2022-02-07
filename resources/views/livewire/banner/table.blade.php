<div>
    <div class="table-responsive">
        <table class="table mb-3 table-hover">
            <thead>
                <tr>
                    <th>Jenis Banner</th>
                    <th>Gambar/Thumbnail</th>
                    <th>Nama Banner</th>
                    <th>Urutan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody wire:sortable="updateOrder">
                @forelse ($banners as $banner)
                <tr wire:sortable.item="{{ $banner->id }}" wire:key="banner-{{ $banner->id }}">
                    <td class="text-capitalize">{{$banner->banner_type}}</td>
                    <td>
                        @if ($banner->banner_type === 'image')
                        <img class="rounded" style="width:200px; height:auto;" src="{{url($banner->media_path)}}"
                            alt="Image">
                        @elseif ($banner->banner_type === 'video')
                        <a href="javascript:void(0);" data-toggle="modal" title="Lihat Video"
                            data-target="#previewModal" wire:click="findBanner('{{$banner->id}}')">
                            <img class="rounded" style="width:200px; height:auto;" src="{{url($banner->thumbnail)}}"
                                alt="Image">
                        </a>
                        @endif
                    </td>
                    <td>{{$banner->name}}</td>
                    <td>{{$banner->position}}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <button type="button" class="btn text-secondary btn-light px-2 py-1 font-sm"
                                data-toggle="modal" title="Edit Banner" data-target="#updateModal"
                                wire:click="find('{{$banner->id}}')">
                                <i class="mdi mdi-pencil"></i>
                            </button>
                            <button type="button" class="btn text-secondary btn-light px-2 py-1 font-sm"
                                data-toggle="modal" title="Hapus Banner" data-target="#deleteModal"
                                wire:click="$set('deleteID', '{{$banner->id}}')">
                                <i class="mdi mdi-delete"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4">
                        <p class="text-center py-3">Sayang sekali, banner tidak ditemukan.</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="row">
        <div class="col-12">
            {{$banners->links('livewire::simple-bootstrap')}}
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

    <div class="modal fade" wire:ignore.self id="previewModal" tabindex="-1" role="dialog"
        aria-labelledby="previewLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content border-0">
                <div class="modal-header border-0">
                    <h5 class="modal-title" id="previewLabel">Preview Banner</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if ($thumbnail && $video)
                    <video class="w-100" controls preload="auto" loading="lazy" poster="{{$thumbnail}}" data-setup="{}">
                        <source src="{{$video}}" type="video/mp4" />
                    </video>
                    @endif
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button class="btn btn-danger" wire:click="destroyBanner">Hapus</button>
                </div>
            </div>
        </div>
    </div>
</div>