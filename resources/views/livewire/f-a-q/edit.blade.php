<div>

    <div class="modal fade" wire:ignore.self id="updateModal" tabindex="-1" role="dialog"
        aria-labelledby="updateModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form wire:submit.prevent="updateFAQ({{$faqID}})">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateModalLabel">Edit FAQ</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="question">Pertanyaan</label>
                            <input type="text" class="form-control" wire:model.defer="question">
                            @error('question')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="answer">Jawaban</label>
                            <textarea class="form-control" wire:model.defer="answer"></textarea>
                            @error('answer')
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