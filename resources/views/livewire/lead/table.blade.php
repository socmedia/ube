<div>
    <div class="row">
        <div class="col-12 mb-3">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5>Filter</h5>
                </div>
                <div class="card-body">
                    <fieldset class="row justify-content-end">

                        <div class="col-12 col-md-3 mb-3">
                            <label for="dateStart">Jenis Lead</label>
                            <select name="" class="form-control select_searchable" wire:model="type">
                                <option value="">Semua Jenis</option>
                                @foreach ($types as $type)
                                <option value="{{$type['slug_name']}}">{{$type['name']}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-12 col-md-3 mb-3">
                            <label for="dateStart">Dari tanggal</label>
                            <input type="date" class="form-control" name="dateStart" wire:model="dateStart">
                        </div>

                        <div class="col-12 col-md-3 mb-3">
                            <label for="dateEnd">Hingga tanggal</label>
                            <input type="date" class="form-control" name="dateEnd" wire:model="dateEnd">
                        </div>

                        <div class="col-12 col-md-2">
                            <label for="dateStart">Tampilkan <sub>/Halaman</sub></label>
                            <select name="" class="form-control select_searchable" wire:model="perPage">
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                                <option value="250">250</option>
                            </select>
                        </div>

                        <div class="col-12 col-md-3 align-self-end">
                            <input type="text" wire:model.debounce.250ms="search" placeholder="Cari disini"
                                class="form-control">
                        </div>

                    </fieldset>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card">

                <div class="card-header">
                    <div class="row">
                        <div class="col-12 col-md-6 mb-3 mb-md-0">
                            <h3 class="card-title">Daftar Lead</h3>
                        </div>
                        <div class="col-12 col-md-6 mb-3 mb-md-0 text-right">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button"
                                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        Export
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" style="cursor: pointer"
                                            onclick="$('#prompt').modal('show')">
                                            <i class="fa fa-file-excel mr-3"></i> Excel
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr class="text-center">
                                            <th>Dibaca</th>
                                            <th>Nama Lengkap</th>
                                            <th>Telp.</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>Tanggal Submit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($leads as $lead)
                                        <tr class="{{$lead->is_readed === 1 ? '' : 'bg-light'}}">
                                            <td class="text-center" style="cursor: pointer;">
                                                <a href="javascript:void(0);" class="text-muted"
                                                    wire:click="isReaded('{{$lead->id}}')"
                                                    title="Ubah keterbacaan lead">
                                                    @if ($lead->is_readed === 1)
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-eye">
                                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                        <circle cx="12" cy="12" r="3"></circle>
                                                    </svg>
                                                    @else
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-eye-off">
                                                        <path
                                                            d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24">
                                                        </path>
                                                        <line x1="1" y1="1" x2="23" y2="23"></line>
                                                    </svg>
                                                    @endif
                                                </a>
                                            </td>
                                            <td>
                                                <a href="javascript:void(0)" class="btn btn-link"
                                                    wire:click="preview('{{$lead->id}}')"
                                                    style="cursor: pointer">{{$lead->name}}</a>
                                            </td>
                                            <td>{{$lead->phone}}</td>
                                            <td>{{$lead->email}}</td>
                                            <td class="text-center">
                                                <div class="dropdown">
                                                    <a class="{{$statusLabel->getOnlyLabelClass($lead->status)}} dropdown-toggle text-capitalize"
                                                        href="javascript:void(0)" role="button" id="dropdownMenuLink"
                                                        data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <small>{{$lead->status}}</small>
                                                    </a>

                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                        @foreach ($statusLabel->getAll() as $status)
                                                        <button
                                                            class="dropdown-item {{$lead->status === $status['slug_name'] ? 'active' : ''}}"
                                                            href="javascript:void(0);"
                                                            wire:click="updateStatus('{{$lead->id}}', '{{$status['slug_name']}}')">
                                                            {{$status['name']}}
                                                        </button>
                                                        @endforeach
                                                    </div>
                                                </div>

                                            </td>
                                            <td class="text-center">
                                                {{$lead->created_at->format('D d, M Y')}}
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td class="text-center" colspan="6">Sayang sekali, lead tidak ditemukan.
                                            </td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-12">
                            {{$leads->links('livewire::simple-bootstrap')}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" data-backdrop="static" role="dialog" id="previewModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Data lead</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="prompt" tabindex="-1" aria-labelledby="promtLabel" aria-hidden="true">
        <div class="modal-dialog rounded">
            <div class="modal-content border-0">
                <div class="modal-header bg-light border-0">
                    <h5 class="modal-title" id="promtLabel">Pilih Tanggal Export</h5>
                    <button type="button" class="close text-dark" data-dismiss="modal" aria-label="Close"
                        style="position: absolute; right: 1rem; top: 1rem;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body border-0">

                    <form action="{{route('adm.lead.export.excel')}}" target="_blank">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <h3 class="lead"><b>Jenis</b></h3>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="type" name="lead-type" class="custom-control-input"
                                        value="all" checked>
                                    <label class="custom-control-label" for="type">Semua Jenis</label>
                                </div>
                                @foreach ($types as $i => $type)
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="type-{{$i}}" name="lead-type" class="custom-control-input"
                                        value="{{$type['slug_name']}}">
                                    <label class="custom-control-label" for="type-{{$i}}">{{$type['name']}}</label>
                                </div>
                                @endforeach
                            </div>
                            <div class="col-12 mb-3">
                                <h3 class="lead"><b>Durasi</b></h3>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="today" name="date" class="custom-control-input"
                                        value="today">
                                    <label class="custom-control-label" for="today">Hari ini</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="this_week" name="date" class="custom-control-input"
                                        value="this_week">
                                    <label class="custom-control-label" for="this_week">Minggu Ini</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="this_month" name="date" class="custom-control-input"
                                        value="this_month" checked>
                                    <label class="custom-control-label" for="this_month">Bulan Ini</label>
                                </div>
                                <div class="custom-control custom-radio mb-3">
                                    <input type="radio" id="custom" name="date" class="custom-control-input"
                                        value="custom">
                                    <label class="custom-control-label" for="custom">Custom</label>
                                </div>
                                <div class="form-group d-none date_range_wrapper">
                                    <label>Pilih tanggal</label>
                                    <input type="text" name="custom_date" class="form-control date_range">
                                </div>
                            </div>
                            <div class="col-12 text-right">
                                <button type="button" class="btn btn-default text-dark shadow-sm rounded-lg mr-1"
                                    data-dismiss="modal">Batal</button>
                                <button class="btn btn-dark shadow-sm rounded-lg">Export</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>