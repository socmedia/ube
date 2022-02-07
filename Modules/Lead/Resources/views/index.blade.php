@extends('layout.master')

@push('plugin-styles')
<link href="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<style>
.table td {
    white-space: unset !important;
}
</style>
@endpush

@section('content')
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
        <h4 class="mb-3 mb-md-0">Lead</h4>
    </div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('adm.index')}}">Beranda</a></li>
            <li class="breadcrumb-item active" aria-current="page">Lead</li>
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
        @livewire('lead.table')
    </div>
</div>

@livewire('lead.edit')

@endsection

@push('plugin-scripts')
<script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{ asset('assets/plugins/promise-polyfill/polyfill.min.js') }}"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
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

    document.addEventListener('preview-mode', function(e) {
        $('#previewModal').modal('show');
        const date = new Date(e.detail.created_at.substring(0, 10));
        let table = (val) => {
            return `
                <div class="row mb-3">
                    <div class="col-6">
                        <p>Jenis Lead</p>
                        <div class="badge badge-light text-capitalize">${e.detail.lead_type}</div>
                    </div>
                    <div class="col-6 text-right">
                        <p>Tanggal Submit</p>
                        <div class="badge badge-light text-capitalize">${date.toDateString()}</div>
                    </div>
                </div>
                <table class="table">
                    <tbody>
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td>${val.name}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td>${val.email}</td>
                        </tr>
                        <tr>
                            <td>No. Telp.</td>
                            <td>:</td>
                            <td>${val.phone}</td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td>${val.address}</td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <strong class="d-block mb-2">Pesan:</strong>
                                <p>${val.question}</p>
                            </td>
                        </tr>
                    </tbody>
                </table>`;
        }
        $('#previewModal').find('.modal-body').html(table(e.detail));
    })

    document.addEventListener('status-updated', function(e) {
        initToast(e.detail);
    })

    document.addEventListener('updated', function(e) {
        $('#updateModal').modal('hide');
        initToast(e.detail);
    })

    $('.date_range').daterangepicker({
        locale: {
            format: 'YYYY-MM-DD',
            cancelLabel: 'Clear'
        }
    })

    $('[name="date"]').change(function() {
        if ($(this).val() === 'custom') {
            $('.date_range_wrapper').removeClass('d-none');
            $('.date_range_wrapper input').val('');
        } else {
            $('.date_range_wrapper').addClass('d-none');
        }
    })

    $('#previewModal').on('hidden.bs.modal', function(e) {
        $(this).find('.modal-body').html('<p class="text-center">Loading...</p>')
    })

})
</script>
@endpush