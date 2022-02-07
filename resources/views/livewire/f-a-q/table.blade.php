<div>
    <div class="accordion" id="faq">
        @foreach ($faqs as $faq)
        <div class="card">
            <div class="card-header d-flex justify-content-between bg-light" id="heading-{{$loop->iteration}}">
                <h2 class="mb-0">
                    <button class="btn btn-link text-dark text-left px-0" type="button" data-toggle="collapse"
                        data-target="#collapse-{{$loop->iteration}}" aria-expanded="true"
                        aria-controls="collapse-{{$loop->iteration}}">{{$faq->question}}</button>
                </h2>
                <div class="btn-group shadow-sm">
                    <button type="button" class="btn text-secondary btn-light px-2 py-1 font-sm" data-toggle="modal"
                        title="Edit FAQ" data-target="#updateModal" wire:click="find({{$faq->id}})">
                        <i class="mdi mdi-pencil"></i>
                    </button>
                    <button type="button" class="btn text-secondary btn-light px-2 py-1 font-sm" data-toggle="modal"
                        title="Hapus FAQ" data-target="#deleteModal" wire:click="$set('deleteID', {{$faq->id}})">
                        <i class="mdi mdi-delete"></i>
                    </button>
                </div>
            </div>

            <div id="collapse-{{$loop->iteration}}" class="collapse {{$loop->first ? 'show' : ''}} bg-white text-dark"
                aria-labelledby="heading-{{$loop->iteration}}" data-parent="#faq">
                <div class="card-body text-muted">{{$faq->answer}}</div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="row">
        <div class="col-12">
            {{$faqs->links('livewire::simple-bootstrap')}}
        </div>
    </div>

    <div class="modal fade" wire:ignore.self id="deleteModal" tabindex="-1" role="dialog"
        aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content border-0">
                <div class="modal-header border-0">
                    <h5 class="modal-title" id="deleteModalLabel">Hapus FAQ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Anda yakin akan menghapus data ini ?
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button class="btn btn-danger" wire:click="destroyFAQ({{$deleteID}})">Hapus</button>
                </div>
            </div>
        </div>
    </div>
</div>