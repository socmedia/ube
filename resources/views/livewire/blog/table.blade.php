<div>
    <div class="email-filters">

        <div class="row">
            <div class="col-12">
                <div class="d-flex flex-wrap">
                    @foreach ($filters as $index => $filter)
                    @if ($filter['value'])
                    <div class="mb-2">
                        @if ($filter['value'])
                        <a href="javascript:void(0)" class="d-inline-block text-white"
                            wire:click="$set('filters.{{$index}}.value', null)">
                            <small class="px-2 py-1 bg-secondary mr-1 mb-1 rounded">
                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-x-circle">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="15" y1="9" x2="9" y2="15"></line>
                                    <line x1="9" y1="9" x2="15" y2="15"></line>
                                </svg>

                                {{$filter['label']}}: {{$filter['value']}}
                            </small>
                        </a>
                        @endif
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3 mb-md-0 d-flex flex-wrap justify-content-center justify-content-md-start">
                <select class="form-control py-2 mb-1 mr-1 w-auto" title="Kategori" wire:model="filters.category.value">
                    <option value="">Semua Kategori</option>
                    @foreach ($categories as $category)
                    <option value="{{$category->name}}">{{$category->name}}</option>
                    @endforeach
                </select>

                <select class="form-control py-2 mb-1 mr-1 w-auto" title="Status" wire:model="filters.status.value">
                    <option value="">Semua Status</option>
                    @foreach ($statuses as $status)
                    <option value="{{$status->name}}">{{$status->name}}</option>
                    @endforeach
                </select>

                <select class="form-control py-2 mb-1 mr-1 w-auto" title="Per halaman" wire:model="perPage">
                    <option value="12">12/<sub><small>Hal.</small></sub></option>
                    <option value="24">24/<sub><small>Hal.</small></sub></option>
                    <option value="48">48/<sub><small>Hal.</small></sub></option>
                    <option value="96">96/<sub><small>Hal.</small></sub></option>
                </select>
            </div>
            <div class="col-md-4 ml-auto">
                <input type="text" wire:model.debounce.250ms="filters.search.value" class="form-control"
                    placeholder="Cari blog disini...">
            </div>
        </div>
    </div>
    <div class="email-list blog">
        <div class="row my-3">
            @forelse ($posts as $post)
            <div class="col-sm-6 col-md-4 col-lg-3 mb-3">
                <div class="card border border-light shadow-none">
                    <figure class="m-0 input d-flex justify-content-end"
                        style="background-image: url({{$post->thumbnail ? $post->thumbnail->media_path : asset('images/thumbnail_16_9.png') }})">

                        <div class="dropdown mr-2 mt-2 action">
                            <button class="btn btn-light p-0" type="button" id="action" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-more-horizontal icon-lg pb-3px">
                                    <circle cx="12" cy="12" r="1"></circle>
                                    <circle cx="19" cy="12" r="1"></circle>
                                    <circle cx="5" cy="12" r="1"></circle>
                                </svg>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="action">
                                <a class="dropdown-item" href="{{route('adm.post.blog.edit', $post->id)}}">
                                    Edit Blog
                                </a>
                                <button type="button" class="dropdown-item" data-toggle="modal"
                                    data-target="#delete-confirmation" wire:click="$set('deleteID', '{{$post->id}}')">
                                    Hapus
                                </button>
                            </div>
                        </div>

                        <a href="javascript:void(0)"
                            wire:click="$set('filters.category.value', '{{$post->category->name}}')"
                            class="btn btn-light px-2 py-1 category">
                            {{$post->category->name}}
                        </a>
                    </figure>

                    <div class="card-body">
                        <h4 class="card-title">
                            <a href="{{route('adm.post.blog.edit',$post->slug_title)}}">{{ $post->title }}</a>
                        </h4>
                        <p class="card-text">{!! $post->subject !!}</p>
                    </div>
                    <div class="card-footer text-muted d-flex justify-content-between bg-transparent border-top-0">
                        <div class="stats d-flex">
                            <small class="mr-2 d-flex align-items-center">
                                <svg class="mr-1" viewBox="0 0 24 24" width="10" height="10" stroke="currentColor"
                                    stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                    class="css-i6dzq1">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                </svg>
                                <span>{{$post->number_of_views}} view</span>
                            </small>
                            <small class="mr-2 d-flex align-items-center">
                                <svg class="mr-1" viewBox="0 0 24 24" width="10" height="10" stroke="currentColor"
                                    stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                    class="css-i6dzq1">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <polyline points="12 6 12 12 16 14"></polyline>
                                </svg>
                                <span>{{$post->reading_time}}</span>
                            </small>
                        </div>

                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <p class="text-center">Data tidak ditemukan</p>
            </div>
            @endforelse
        </div>
        @if ($posts)
        {{$posts->links('livewire::simple-bootstrap')}}
        @endif
    </div>

    <x-modal id="delete-confirmation" title="Hapus blog">
        Anda yakin akan menghapus data ini ?
        @slot('footer')
        <button type="button" class="btn btn-default text-dark shadow-sm rounded-lg" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-danger shadow-sm rounded-lg" wire:click="destroyBlog('{{$deleteID}}')">
            Hapus</button>
        @endslot
    </x-modal>
</div>