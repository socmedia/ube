@extends('layouts.guest')

@push('meta')
<!-- Primary Meta Tags -->
<title>Utama Bintang Erkonpersada | Daikin Proshop</title>
<meta name="title" content="Utama Bintang Erkonpersada | Daikin Proshop">
<meta name="description"
    content="PT. Utama Bintang Erkonpersada memberikan pelayanan yang total dalam bidang Air Conditioning. Lingkup pekerjaan kami mencakup Ducting, Installation & Maintenance semua jenis AC Ruang dan Gedung untuk Rumah, Hotel, Pabrik, Restaurant, Meeting Room, Supermarket, Office, dan sebagainya.">
<meta name="author" content="Utama Bintang Erkonpersada" />
<meta name="keywords"
    content="apartemen,apartemen menengah,hunian jogja, greenpark jogja, Utama Bintang Erkonpersada,apartment jogja,apartemen jogja,apartemen lengkap, apartemen greenpark jogja,apartemen anak muda" />

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="https://utamabintangerkonpersada.com/">
<meta property="og:title" content="Utama Bintang Erkonpersada | Daikin Proshop">
<meta property="og:description"
    content="PT. Utama Bintang Erkonpersada memberikan pelayanan yang total dalam bidang Air Conditioning. Lingkup pekerjaan kami mencakup Ducting, Installation & Maintenance semua jenis AC Ruang dan Gedung untuk Rumah, Hotel, Pabrik, Restaurant, Meeting Room, Supermarket, Office, dan sebagainya.">
<meta property="og:image" content="{{asset('images/logo_only_200.jpg')}}">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="https://utamabintangerkonpersada.com/">
<meta property="twitter:title" content="Utama Bintang Erkonpersada | Daikin Proshop">
<meta property="twitter:description"
    content="PT. Utama Bintang Erkonpersada memberikan pelayanan yang total dalam bidang Air Conditioning. Lingkup pekerjaan kami mencakup Ducting, Installation & Maintenance semua jenis AC Ruang dan Gedung untuk Rumah, Hotel, Pabrik, Restaurant, Meeting Room, Supermarket, Office, dan sebagainya.">
<meta property="twitter:image" content="{{asset('images/logo_only_200.jpg')}}">
@endpush

@push('custom-styles')
<link rel="stylesheet" href="{{asset('assets/plugins/plyr/plyr.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/notyf/notyf.min.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css"
    integrity="sha512-H9jrZiiopUdsLpg94A333EfumgUBpO9MdbxStdeITo+KEIMaNfHNvwyjjDJb+ERPaRS6DpyRlKbvPUasNItRyw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightgallery@2.4.0/css/lightgallery-bundle.min.css">
<style>
    .notyf__toast {
        max-width: 100%;
    }

    .notyf__toast--success {
        background: rgb(61, 199, 99);
    }

    .notyf__toast--error {
        background: rgb(237, 61, 61);
    }

    .rev_slider_wrapper {
        height: unset !important;
        aspect-ratio: auto 150 / 61;
    }

    .tp-bgimg.defaultimg {
        height: unset !important;
        padding-top: 41%;
    }
</style>
@endpush

@section('content')
{{-- Banner --}}
<livewire:banner.overview />

{{-- About --}}
<livewire:about.overview />

{{-- Service --}}
<livewire:service.overview />

<section class="section-wrap">
    <div class="container">
        <div data-type="video-preview">
            <a class="pointer" data-video='{"source": [{"src": "{{ asset("videos/compro_ube.mp4") }}", "type"
                :"video/mp4"}], "attributes" : {"preload": false, "controls" : true}}'
                data-poster="{{ asset('images/compro_ube.jpg') }}"
                data-sub-html="<h4 class='text-white'>PT. Utama Bintang Erkonpersada - Company Profile</h4>">
                <img class=" w-100" src="{{ asset('images/compro_ube.jpg') }}" alt="thumbnail" />
            </a>
        </div>
    </div>
</section>

{{-- Projects --}}
<livewire:project.overview />


{{-- Testimoni --}}
<livewire:review.overview />

<livewire:blog.overview />
@endsection

@push('custom-scripts')
<script src="{{asset('assets/plugins/plyr/plyr.polyfilled.js')}}"></script>
<script src="{{asset('assets/plugins/notyf/notyf.min.js')}}"></script>
<script src="{{ asset('js/vendors/revolution/js/extensions/revolution.extension.video.min.js') }}"></script>
<script src="{{ asset('js/vendors/revolution/js/extensions/revolution.extension.carousel.min.js') }}"></script>
<script src="{{ asset('js/vendors/revolution/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
<script src="{{ asset('js/vendors/revolution/js/extensions/revolution.extension.actions.min.js') }}"></script>
<script src="{{ asset('js/vendors/revolution/js/extensions/revolution.extension.layeranimation.min.js') }}">
</script>
<script src="{{ asset('js/vendors/revolution/js/extensions/revolution.extension.kenburn.min.js') }}"></script>
<script src="{{ asset('js/vendors/revolution/js/extensions/revolution.extension.navigation.min.js') }}"></script>
<script src="{{ asset('js/vendors/revolution/js/extensions/revolution.extension.migration.min.js') }}"></script>
<script src="{{ asset('js/vendors/revolution/js/extensions/revolution.extension.parallax.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/lightgallery@2.4.0/lightgallery.umd.js"></script>
<script src="https://cdn.jsdelivr.net/npm/lightgallery@2.4.0/plugins/video/lg-video.umd.js"></script>
<script>
    $(function() {
        let notyf = new Notyf({
            duration: 5000,
            position: {
                x: 'center',
                y: 'top',
            },
            dismissible: true
        });

        window.addEventListener('success', (data) => {
            notyf.success(data.detail)
            var a = gtag_report_conversion(window.location.origin, 'conversion');
            console.log(a)
        });

        window.addEventListener('failed', (data) => notyf.error(data.detail));

        lightGallery(document.querySelector('[data-type="video-preview"]'), {
            plugins: [lgVideo],
            speed: 500,
        });
    });
</script>
@endpush
