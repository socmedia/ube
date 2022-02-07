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
        <h4 class="mb-3 mb-md-0">Galeri Proyek</h4>
    </div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('adm.index')}}">Beranda</a></li>
            <li class="breadcrumb-item"><a href="{{route('adm.post.project.index')}}">Proyek</a></li>
            <li class="breadcrumb-item active" aria-current="page">Galeri</li>
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

<div class="row">
    <div class="col-lg-4 mb-3 mb-lg-0">
        <livewire:project.gallery-create projectId="{{request('id')}}" />
    </div>

    <div class="col-lg-8">
        <livewire:project.gallery-table projectId="{{request('id')}}" />
    </div>
</div>

@endsection

@push('plugin-scripts')
<script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{ asset('assets/plugins/promise-polyfill/polyfill.min.js') }}"></script>
<script src="{{ asset('assets/plugins/tagify/tagify.min.js') }}"></script>
@endpush

@push('custom-scripts')
<script>
    function initToast(text, icon = 'success') {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top',
            timer: 5000,
            closeModal: true
        });

        Toast.fire({
            icon: icon,
            title: text
        })
    }

    document.addEventListener('success', function(e) {
        initToast(e.detail);
        $('.modal').modal('hide');
    })

    document.addEventListener('failed', function(e) {
        initToast(e.detail, 'error');
        $('.modal').modal('hide');
    })
</script>
@endpush