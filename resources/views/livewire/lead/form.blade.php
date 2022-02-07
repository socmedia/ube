<div>
    <div class="form-card">
        <div class="form-card-body">
            <form wire:submit.prevent="submitForm">
                <div class="form-group">
                    <label for="nama">Nama Lengkap<sup>*</sup> </label>
                    <input type="text" class="form-control" placeholder="Tuliskan nama lengkap anda"
                        wire:model.defer="nama">
                    @error('nama')
                    <small class="text-red">{{$message}}</small>
                    @enderror
                </div>

                <div class="form-group row">

                    <div class="col-12 col-md-6 mb-3 mb-md-0">
                        <label for="telepon">No. Telp<sup>*</sup> </label>
                        <input type="text" class="form-control" placeholder="Masukkan no whatsapp anda"
                            wire:model.defer="telepon" data-inputmask="phone">
                        @error('telepon')
                        <small class="text-red">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="col-12 col-md-6 mb-3 mb-md-0">
                        <label for="email">Email<sup>*</sup> </label>
                        <input type="text" class="form-control numeric" placeholder="Masukkan alamat email anda"
                            wire:model.defer="email">
                        @error('email')
                        <small class="text-red">{{$message}}</small>
                        @enderror
                    </div>

                </div>

                <div class="form-group">
                    <label for="alamat">Alamat<sup>*</sup> </label>
                    <textarea class="form-control" placeholder="Dimana anda tinggal sekarang ?"
                        wire:model.defer="alamat"></textarea>
                    @error('alamat')
                    <small class="text-red">{{$message}}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="pertanyaan">Pertanyaan<sup>*</sup> </label>
                    <textarea class="form-control lg" placeholder="Apa yang ingin anda tanyakan ?"
                        wire:model.defer="pertanyaan"></textarea>
                    @error('pertanyaan')
                    <small class="text-red">{{$message}}</small>
                    @enderror
                </div>

                <fieldset class="form-group text-center">
                    <button class="btn btn-greenpark">
                        Kirim
                        <div id="spinner" class="text-light ml-1" wire:loading wire:loading.class="loading"></div>
                    </button>
                </fieldset>

            </form>
        </div>
    </div>
</div>
