<div>
    <div class="table-responsive">
        <table class="table mb-3 table-hover">
            <thead>
                <tr>
                    <th>Thumbnail</th>
                    <th>Tipe Unit</th>
                    <th>Spesifikasi</th>
                    <th>Ditampilkan dihomepage ?</th>
                    <th>Urutan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody wire:sortable="updateOrder">
                @forelse ($products as $product)
                <tr wire:sortable.item="{{ $product->id }}" wire:key="product-{{ $product->id }}">
                    <td class="text-capitalize">
                        <img class="rounded" style="width:100px; height: unset"
                            src="{{url($product->thumbnail ? $product->thumbnail->image_path : '')}}" alt="">
                    </td>
                    <td class="text-capitalize">{{$product->name}}</td>
                    <td class="text-capitalize">
                        @foreach (json_decode($product->spesification) as $spesification)
                        <div class="badge badge-light">
                            {{array_values(get_object_vars($spesification))[0]}}
                        </div>
                        @endforeach
                    </td>
                    <td class="text-capitalize">
                        <div class="custom-control custom-switch" style="line-height: 1.9">
                            <input type="checkbox" class="custom-control-input"
                                id="show_in_homepage-{{$loop->iteration}}" wire:click="updateStatus('{{$product->id}}')"
                                {{$product->show_in_homepage === 1 ? 'checked' : ''}}>
                            <label class="custom-control-label"
                                for="show_in_homepage-{{$loop->iteration}}">{{$product->show_in_homepage === 1 ? 'Ditampilkan' : 'Disembunyikan'}}</label>
                        </div>
                    </td>
                    <td>{{$product->position}}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <a href="{{route('adm.product.images', $product->id)}}"
                                class="btn text-secondary btn-light px-2 py-1 font-sm" title="Edit Gambar Produk">
                                <i class="mdi mdi-image"></i>
                            </a>
                            <button type="button" class="btn text-secondary btn-light px-2 py-1 font-sm"
                                data-toggle="modal" title="Edit Produk" data-target="#updateModal"
                                wire:click="find('{{$product->id}}')">
                                <i class="mdi mdi-pencil"></i>
                            </button>
                            <button type="button" class="btn text-secondary btn-light px-2 py-1 font-sm"
                                data-toggle="modal" title="Hapus Produk" data-target="#deleteModal"
                                wire:click="$set('deleteID', '{{$product->id}}')">
                                <i class="mdi mdi-delete"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4">
                        <p class="text-center py-3">Sayang sekali, apartemen tidak ditemukan.</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="row">
        <div class="col-12">
            {{$products->links('livewire::simple-bootstrap')}}
        </div>
    </div>

    <div class="modal fade" wire:ignore.self id="deleteModal" tabindex="-1" role="dialog"
        aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content border-0">
                <div class="modal-header border-0">
                    <h5 class="modal-title" id="deleteModalLabel">Hapus Produk</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Anda yakin akan menghapus data ini ?
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button class="btn btn-danger" wire:click="destroyProduct">Hapus</button>
                </div>
            </div>
        </div>
    </div>
</div>