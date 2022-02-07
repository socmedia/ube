@extends('layout.master')

@push('plugin-styles')
<link href="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" />
<style>
    figure.input {
        position: relative;
        background-position: center;
        padding-top: 56%;
        background-size: cover;
    }

    figure .action {
        position: absolute;
        top: .25rem;
        right: .25rem
    }

    figure .category {
        font-size: .675rem;
        background: linear-gradient(45deg, #8539c9, #933b90);
        color: white
    }

    figure .category:hover {
        padding: .25rem;
        font-size: .65rem;
        background: linear-gradient(45deg, #7b30bb, #8a2d87);
        color: white
    }

    .card-text {
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        /* number of lines to show */
        line-clamp: 3;
        -webkit-box-orient: vertical;
    }

    .card.archive:before {
        position: absolute;
        content: '';
        height: 100%;
        width: 100%;
        background: rgba(0, 0, 0, .5);
        z-index: 2;
        pointer-events: none;
    }

    .card.archive:after {
        position: absolute;
        content: 'Diarsipkan';
        font-size: 1.25rem;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        z-index: 4;
        font-weight: 800;
        color: white;
    }
</style>
@endpush

@section('content')
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
        <h4 class="mb-3 mb-md-0">Proyek</h4>
    </div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('adm.index')}}">Beranda</a></li>
            <li class="breadcrumb-item active" aria-current="page">Proyek</li>
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

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5>Daftar Proyek</h5>
                <a href="{{ route('adm.post.project.create') }}" class="btn btn-primary">
                    <i class="mdi mdi-plus"></i> Proyek
                </a>
            </div>
            <div class="card-body">
                @livewire('project.table')
            </div>
        </div>
    </div>
</div>
@endsection

@push('plugin-scripts')
<script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{ asset('assets/plugins/promise-polyfill/polyfill.min.js') }}"></script>
@endpush

@push('custom-scripts')
<script>
    $(function() {
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

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $(input).parents('.dropzone-wrapper').find('img').attr('src', e.target.result)
            }
            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }

    $(document).ready(function() {
        $('.dropzone-wrapper').on('dragover', function(e) {
            e.preventDefault();
            e.stopPropagation();
            $(this).addClass('dragover');
        });
        $('.dropzone-wrapper').on('dragleave', function(e) {
            e.preventDefault();
            e.stopPropagation();
            $(this).removeClass('dragover');
        });
    })

    document.addEventListener('show-image-modal', function(e) {
        $('#createModal').modal('hide');
        $('#updateModal').modal('hide');
        $('#imageModal').modal('show');
    })

    document.addEventListener('created', function(e) {
        $('#createModal').modal('hide');
        $('#imageModal').modal('hide');
        initToast(e.detail);
    })

    document.addEventListener('updated', function(e) {
        initToast(e.detail);
    })

    document.addEventListener('failed', function(e) {
        initToast(e.detail, 'error');
    })

    document.addEventListener('deleted', function(e) {
        initToast(e.detail);
    })

    $('[data-inputmask]').on('input', function(event) {
        this.value = this.value.replace(/[^0-9+]/g, '');
        this.value = this.value.substr(0, 16)
    });
})
</script>
@endpush