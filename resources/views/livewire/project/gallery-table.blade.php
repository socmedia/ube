<div class="card shadow-sm">
    <div class="card-body">
        <div class="row">
            @forelse ($medias as $media)
            <div class="col-md-6 mb-3 mb-md-0">
                <figure class="input" style="background-image: url({{$media->media_path}})">
                    <button class="btn btn-light btn-sm rounded-0" wire:click="$set('deleteID', '{{$media->id}}')"
                        data-toggle="modal" title="Hapus Gambar" data-target="#delete-confirmation">
                        Hapus Gambar
                    </button>
                </figure>
            </div>
            @empty
            <div class="col-12">
                <p class="text-center">Proyek ini belum memiliki galeri.</p>
            </div>
            @endforelse
        </div>
    </div>
    <x-modal id="delete-confirmation" title="Hapus Gambar">
        Anda yakin akan menghapus data ini ?
        @slot('footer')
        <button type="button" class="btn btn-default text-dark shadow-sm rounded-lg" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-danger shadow-sm rounded-lg" wire:click="destroyImage">
            Hapus</button>
        @endslot
    </x-modal>
</div>