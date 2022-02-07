@extends('layout.master')

@push('plugin-styles')
<link href="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" />
<style>
.dropzone-wrapper {
    border: 2px dashed #91b0b3;
    color: #92b0b3;
    position: relative;
    min-height: 150px;
    overflow: hidden
}

.dropzone-wrapper .text {
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%)
}

.dropzone,
.dropzone:focus {
    position: absolute;
    outline: none !important;
    width: 100%;
    height: 100%;
    cursor: pointer;
    opacity: 0
}

.preview-zone {
    text-align: center
}

.preview-zone .box {
    box-shadow: none;
    border-radius: 0;
    margin-bottom: 0
}
</style>
@endpush

@section('content')
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
        <h4 class="mb-3 mb-md-0">Apartemen</h4>
    </div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('adm.index')}}">Beranda</a></li>
            <li class="breadcrumb-item active" aria-current="page">Apartemen</li>
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
                <h5>Daftar Apartemen</h5>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">
                    <i class="mdi mdi-plus"></i> Apartemen
                </button>
            </div>
            <div class="card-body">
                @livewire('product.table')
            </div>
        </div>
    </div>
</div>

@livewire('product.create')
@livewire('product.image-step')
@livewire('product.edit')

@endsection

@push('plugin-scripts')
<script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{ asset('assets/plugins/promise-polyfill/polyfill.min.js') }}"></script>
@endpush

@push('custom-scripts')
<script>
$(function() {
    function initToast(text) {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top',
            timer: 5000,
            closeModal: true
        });

        Toast.fire({
            icon: 'success',
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
        $('#updateModal').modal('hide');
        initToast(e.detail);
    })

    document.addEventListener('deleted', function(e) {
        $('#deleteModal').modal('hide');
        initToast(e.detail);
    })

    $('[data-inputmask]').on('input', function(event) {
        this.value = this.value.replace(/[^0-9+]/g, '');
        this.value = this.value.substr(0, 16)
    });
})
</script>
@endpush