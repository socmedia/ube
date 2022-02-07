@extends('layout.master')

@push('plugin-styles')
<link href="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" />
<link rel="stylesheet" href="{{asset('assets/plugins/tagify/tagify.css')}}" />
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<style>
    .dropdown-grid {
        position: absolute;
        top: 6px;
        right: 21px
    }

    .dropdown-grid .btn-light {
        opacity: .5;
    }

    .ck-editor__editable_inline {
        min-height: 400px;
    }

    .tagify {
        border: 1px solid #cad1d7;
        padding: 0;
        display: flex;
    }

    .tagify:hover {
        border-color: rgba(50, 151, 211, .25)
    }

    .tagify__input {
        align-self: center
    }

    .ck.ck-editor__main>.ck-editor__editable {
        color: #04060c
    }

    .note-editable {
        background: white;
    }

    figure.input {
        background-position: center;
        padding-top: 56%;
        background-size: cover;
    }
</style>
@endpush

@section('content')
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
        <h4 class="mb-3 mb-md-0">Edit Blog</h4>
    </div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('adm.index')}}">Beranda</a></li>
            <li class="breadcrumb-item"><a href="{{route('adm.post.blog.index')}}">Blog</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </nav>
</div>

@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Sukses !</strong> {{session()->get('success')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if (session()->has('failed'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Gagal !</strong> {{session()->get('failed')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<form action="" id="form" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="row">
        <div class="col-lg-4 mb-3 mb-lg-0">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="form-group">
                        <div class="blog">
                            <label for="thumbnail">Pilih thumbnail</label>
                            <input id="thumbnail" type="file" name="thumbnail" accept="image/*" autocomplete="thumbnail"
                                autofocus name="thumbnail" onchange="readURL(this)">

                            @error('thumbnail')
                            <small class="text-danger">{{$message}}</small>
                            @else
                            <small class="text-center text-secondary">
                                <em>Format: .png, .jpg, .jpeg</em>
                            </small>
                            @enderror
                            <figure class="mt-3 input"
                                style="background-image: url({{$post->thumbnail ? $post->thumbnail->media_path : asset('images/thumbnail_16_9.png')}})">
                                <p class="placeholder">
                                </p>
                            </figure>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="category">Kategori</label>
                        <select class="form-control" title="Kategori" data-livesearch="true" name="category"
                            id="category">
                            <option value="">Pilih Kategori</option>
                            @foreach ($categories as $category)
                            <option value="{{$category->id}}" {{old('category') || $post->category_id == $category->id ?
                                'selected' : '' }}>
                                {{$category->name}}
                            </option>
                            @endforeach
                        </select>

                        @error('category')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="form-group text-right">
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="save"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Simpan
                            </button>
                            <div class="dropdown-menu" aria-labelledby="save">
                                <a class="dropdown-item" href="javascript:void(0)"
                                    onclick="$('form').attr('action', $(this).data('action')); document.getElementById('form').submit()"
                                    data-action="{{route('adm.post.blog.update', ['id' => $post->id, 'status' => 'draft'])}}">Draft</a>
                                <a class="dropdown-item" href="javascript:void(0)"
                                    onclick="$('form').attr('action', $(this).data('action')); document.getElementById('form').submit()"
                                    data-action="{{route('adm.post.blog.update', ['id' => $post->id, 'status' => 'publish'])}}">Publish</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="pl-lg-4">
                        <div class="form-group">
                            <label for="title">Judul</label>
                            <input id="title" type="text" class="form-control" name="title"
                                value="{{old('title') ?: $post->title}}">

                            @error('title')
                            <small class="text-danger">
                                {{$message}}
                            </small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <small class="input-group-text">{{ url('/blog') }}/</small>
                                </div>
                                <input id="slug" type="text" class="form-control" name="slug"
                                    value="{{old('slug') ?: $post->slug_title}}">
                            </div>

                            @error('slug')
                            <small class="text-danger">{{$message}}</small>
                            @else
                            <small class="text-muted">
                                <em>*Judul singkat untuk link yang dapat diakses oleh publik</em>
                            </small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="tags">Tag</label>
                            <input type="text" name="tags" value="{{old('tags') ?: $post->tags}}">

                            @error('tags')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Subjek</label>
                            <textarea class="form-control" name="subject" autocomplete="subject"
                                style="height: 200; resize:none">{{old('subject') ?: $post->subject }}</textarea>

                            @error('subject')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Konten</label>
                            <textarea id="editor" class="form-control" name="description" autocomplete="description">
                                    {{old('description') ?: $post->description}}
                                </textarea>

                            @error('description')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</form>

@endsection

@push('plugin-scripts')
<script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{ asset('assets/plugins/promise-polyfill/polyfill.min.js') }}"></script>
<script src="{{ asset('assets/plugins/tagify/tagify.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
@endpush

@push('custom-scripts')
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('figure.input').attr('style', `background-image: url(${e.target.result})`)
                $('figure.input').addClass('no-border')
                $('figure.input .placeholder').remove()
            }
            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }

    $('input[name="title"]').focusout(function () {
        const route = '{{route('adm.post.blog.check')}}',
        title = this.value
        fetch(`${route}?title=${title}`, {
            method: 'GET'
        })
        .then(res => res.json())
        .then(data => {
            const response = data.response;
            $('input[name="slug"]').val(response.slug)
            if(data.status == 422){
                if('errors' in response){
                    if('title' in response.errors)
                        $('input[name="title"]').parents('.form-group').append(`<small class="text-danger">${response.errors.title}</small>`)

                    if('slug' in response.errors)
                        $('input[name="slug"]').parents('.form-group').find('small').last().html(response.errors.slug).attr('class', 'text-danger')
                }
            }else{
                $('input[name="title"]').parents('.form-group').find('small').remove()
                $('input[name="slug"]').parents('.form-group').find('small').last().html('<em>*Judul singkat untuk link yang dapat diakses oleh publik</em>').attr('class', 'text-muted')
            }
        }).catch(err => console.error(err))
    })

    $('input[name="slug"]').focusout(function () {
        const route = '{{route('adm.post.blog.check')}}',
        slug = this.value
        fetch(`${route}?slug=${slug}`, {
        method: 'GET'
        })
        .then(res => res.json())
        .then(data => {
            if(data.status == 422){
                const response = data.response;
                if('errors' in response){
                    if('slug' in response.errors)
                        $('input[name="slug"]').parents('.form-group').find('small').last().html(response.errors.slug).attr('class', 'text-danger')
                }
            }else{
                console.log('berhasil')
                $('input[name="slug"]').parents('.form-group').find('small').last().html('<em>*Judul singkat untuk link yang dapat diakses oleh publik</em>').attr('class', 'text-muted')
            }
        }).catch(err => console.error(err))
    })

    document.addEventListener('check-result', function (e) {
        const data = e.detail;
        $('input[name="slug"]').val(data.slug)
    })

    function init(){
        const input = document.querySelector('input[name="tags"]'),
        tagify = new Tagify(input, {
            dropdown: {
                classname: "color-blue",
                enabled: 0, // show the dropdown immediately on focus
                maxItems: 5,
                position: "text", // place the dropdown near the typed text
                closeOnSelect: false, // keep the dropdown open after selecting a suggestion
                highlightFirst: true
            },
            originalInputValueFormat: valuesArr => valuesArr.map(item => item.value).join(','),
            callbacks: {
                "blur": (e) => Livewire.emit('tags-change', e.detail.value)
            }
        });

        const editor = $('#editor').summernote({
            height: 500,
            callbacks: {
                onImageUpload: function(files) {
                    // upload image to server and create imgNode...
                    uploadImage(files[0])
                    .then(res => res.json())
                    .then(res => {
                        const range = $.summernote.range;
                        const rng = range.create();
                        rng.pasteHTML(`<p></p></br><img src="${res.image_link}" width="100%" /></br><p>caption</p>`)
                    })
                }
            }
        });
    }

    async function uploadImage(file){
        const url = '{{route('adm.post.image.upload')}}';
        var data = new FormData()
        data.append('_token', $('[name="_token"]').attr('content'))
        data.append('image', file)

        return await fetch(url, {
            method: 'POST',
            body: data
        });
    }

    init()
</script>
@endpush