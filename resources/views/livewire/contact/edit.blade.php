<div>
    <div class="row mb-3">
        <div class="col-md-4 mb-3 mb-md-0">
            <h4 class="mb-2">Informasi Perusahaan</h4>
            <p class="text-muted">
                Untuk memperbarui informasi perusahaan, kamu hanya perlu mengganti konten pada form disamping.
            </p>
        </div>
        <div class="col-md-8 ml-auto">
            <div class="card">

                <div class="card-body">

                    <fieldset class="form-group">
                        <form wire:submit.prevent="updateContact({{$maps['id']}}, '{{$maps['attribute']}}')">

                            <label for="">Maps</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class='mdi mdi-map'></i>
                                    </div>
                                </div>
                                <textarea type="text" class="form-control" wire:model.defer="maps.value"></textarea>
                                <div class="input-group-append">
                                    <button class="btn btn-dark">
                                        <i class='mdi mdi-check'></i>
                                    </button>
                                </div>
                            </div>
                            <small class="text-muted">Masukkan embed maps yang kamu dapatkan dari google maps.</small>
                        </form>
                    </fieldset>

                    <fieldset class="form-group">
                        <form wire:submit.prevent="updateContact({{$address['id']}}, '{{$address['attribute']}}')">

                            <label for="">Alamat</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class='mdi mdi-map-marker'></i>
                                    </div>
                                </div>
                                <textarea type="text" class="form-control" wire:model.defer="address.value"></textarea>
                                <div class="input-group-append">
                                    <button class="btn btn-dark">
                                        <i class='mdi mdi-check'></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </fieldset>

                    <fieldset class="form-group">
                        <form
                            wire:submit.prevent="updateContact({{$oldCatalogue['id']}}, '{{$oldCatalogue['attribute']}}')">

                            <label for="">Katalog</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class='mdi mdi-file'></i>
                                    </div>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input"
                                        accept=".xlsx,.xls,.doc,.docx,.ppt,.pptx,.txt,.pdf" id="catalogue"
                                        wire:model="catalogue">
                                    <label class="custom-file-label"
                                        for="catalogue">{{$catalogue ? $catalogue->getClientOriginalName() : $oldCatalogue['name']}}</label>
                                </div>
                                <div class="input-group-append">
                                    <button class="btn btn-dark">
                                        <i class='mdi mdi-check'></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </fieldset>

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 mb-3 mb-md-0">
            <h4 class="mb-2">Social Media</h4>
            <p class="text-muted">
                Untuk memperbarui link, kamu bisa memasukkan URL social media pada form disamping.
            </p>
        </div>
        <div class="col-md-8 ml-auto">
            <div class="card">

                <div class="card-body">

                    <fieldset class="form-group row">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <form
                                wire:submit.prevent="updateContact({{$instagram['id']}}, '{{$instagram['attribute']}}')">

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class='mdi mdi-instagram'></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" wire:model.defer="instagram.value">
                                    <div class="input-group-append">
                                        <button class="btn btn-dark">
                                            <i class='mdi mdi-check'></i>
                                        </button>
                                    </div>
                                </div>

                            </form>
                        </div>

                        <div class="col-md-6 mb-3 mb-md-0">
                            <form wire:submit.prevent="updateContact({{$email['id']}}, '{{$email['attribute']}}')">

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class='mdi mdi-email'></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" wire:model.defer="email.value">
                                    <div class="input-group-append">
                                        <button class="btn btn-dark">
                                            <i class='mdi mdi-check'></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </fieldset>

                    <fieldset class="form-group row">

                        <div class="col-md-6 mb-3 mb-md-0">
                            <form
                                wire:submit.prevent="updateContact({{$facebook['id']}}, '{{$facebook['attribute']}}')">

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class='mdi mdi-facebook'></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" wire:model.defer="facebook.value">
                                    <div class="input-group-append">
                                        <button class="btn btn-dark">
                                            <i class='mdi mdi-check'></i>
                                        </button>
                                    </div>
                                </div>

                            </form>
                        </div>

                        <div class="col-md-6">
                            <form
                                wire:submit.prevent="updateContact({{$whatsapp['id']}}, '{{$whatsapp['attribute']}}')">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class='mdi mdi-whatsapp'></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" wire:model.defer="whatsapp.value">
                                    <div class="input-group-append">
                                        <button class="btn btn-dark">
                                            <i class='mdi mdi-check'></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </fieldset>

                    <fieldset class="form-group row">

                        <div class="col-md-6 mb-3 mb-md-0">
                            <form wire:submit.prevent="updateContact({{$phone_1['id']}}, '{{$phone_1['attribute']}}')">

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class='mdi mdi-phone'></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" wire:model.defer="phone_1.value">
                                    <div class="input-group-append">
                                        <button class="btn btn-dark">
                                            <i class='mdi mdi-check'></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="col-md-6">
                            <form wire:submit.prevent="updateContact({{$phone_2['id']}}, '{{$phone_2['attribute']}}')">

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class='mdi mdi-phone'></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" wire:model.defer="phone_2.value">
                                    <div class="input-group-append">
                                        <button class="btn btn-dark">
                                            <i class='mdi mdi-check'></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </fieldset>

                </div>
            </div>
        </div>
    </div>
</div>