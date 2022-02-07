@extends('layouts.guest')

@push('meta')
<!-- Primary Meta Tags -->
<title>Utama Bintang Erkonpersada | Tentang Kami</title>
<meta name="title" content="Utama Bintang Erkonpersada | Tentang Kami">
<meta name="description"
    content="Tidak ada lagi rasa jenuh ketika anda mendapatkan suasana hunian yang tepat. Nuansa alam yang melekat dan pemandangan yang indah membuat suasana dan aura Utama Bintang Erkonpersada menjadi lebih nyaman untuk dihuni.">
<meta name="author" content="Greenpark Jogja" />
<meta name="keywords"
    content="apartemen,apartemen menengah,hunian jogja, greenpark jogja, Utama Bintang Erkonpersada,apartment jogja,apartemen jogja,apartemen lengkap, apartemen greenpark jogja,apartemen anak muda" />

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="https://greenparkjogja.com/tentang-kami">
<meta property="og:title" content="Utama Bintang Erkonpersada | Tentang Kami">
<meta property="og:description"
    content="Tidak ada lagi rasa jenuh ketika anda mendapatkan suasana hunian yang tepat. Nuansa alam yang melekat dan pemandangan yang indah membuat suasana dan aura Utama Bintang Erkonpersada menjadi lebih nyaman untuk dihuni.">
<meta property="og:image" content="{{asset('images/logo.svg')}}">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="https://greenparkjogja.com/tentang-kami">
<meta property="twitter:title" content="Utama Bintang Erkonpersada | Tentang Kami">
<meta property="twitter:description"
    content="Tidak ada lagi rasa jenuh ketika anda mendapatkan suasana hunian yang tepat. Nuansa alam yang melekat dan pemandangan yang indah membuat suasana dan aura Utama Bintang Erkonpersada menjadi lebih nyaman untuk dihuni.">
<meta property="twitter:image" content="{{asset('images/logo.svg')}}">
@endpush

@section('content')
<section class="page-title bg-dark-overlay text-center about-section">
    {{-- <img src="/img/team_2.jpg" alt=""> --}}
    <div class="page-title__holder">
        <h1 class="page-title__title">Tentang Kami</h1>
    </div>
</section>

<section class="section-wrap">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 mb-40">
                <p class="subtitle text-muted fw-semi-bold">PROFIL PERUSAHAAN</p>
                <h2 class="intro__title">PT. UTAMA BINTANG ERKONPERSADA</h2>
                <p>
                    Perusahaan kami telah beroperasi dalam bidang pelayanan instalasi pendingin perusahaan <em>(air
                        conditioning)</em> untuk berbagai kebutuhan pembangunan sejak 2003. Berbagai inovasi dan
                    pengembangan layanan kami telah lakukan hingga saat ini untuk memenuhi kebutuhan pembangunan baik,
                    dalam sektor <em>Rumah Tinggal</em> hingga <em>Gedung Komersial</em> yang ada di Indonesia.
                </p>

                <p class="mb-40">
                    Konsistensi dalam berinovasi dan menjaga mutu karya kami adalah prioritas kami. Untuk
                    itu, kami selalu meningkatkan sumber daya manusia kami, sehingga memiliki jaminan dalam memastikan
                    kepuasan pelanggan.
                </p>

                <p class="mb-40">
                    <strong>PT. Utama Bintang Erkonpersada</strong> <br>
                    <em>Premium Air Conditioning</em>
                </p>
            </div>
            <div class="col-lg-5">
                <img src="" class="img-full-width" alt="">
            </div>
        </div>
    </div>
</section>

<section class="mb-72">
    <div class="container">
        <div class="col-lg-5 mb-40">
            <img src="" class="img-full-width" alt="">
        </div>
        <div class="col-lg-5">
            <div class="steps" id="steps">
                <div class="step">
                    <div class="number"></div>
                    <div class="info">
                        <p class="title">2003</p>
                        <p class="text">
                            Berdiri dengan nama <strong>UD Utama Engineering</strong>.
                        </p>
                    </div>
                </div>
                <div class="step">
                    <div class="number"></div>
                    <div class="info">
                        <p class="title">2005</p>
                        <p class="text">
                            Menjadi Dealer AC Fujiaire dibawah <strong>PT. Wira Kusuma Sejahtera (Jakarta)</strong>.
                        </p>
                    </div>
                </div>
                <div class="step">
                    <div class="number"></div>
                    <div class="info">
                        <p class="title">2007</p>
                        <p class="text">
                            Menjadi <strong>perwakilan resmi AC Fujiaire</strong> untuk <strong>area Jawa Tengah dan
                                DIY</strong>.
                        </p>
                    </div>
                </div>
                <div class="step">
                    <div class="number"></div>
                    <div class="info">
                        <p class="title">2010</p>
                        <p class="text">
                            Berubah menjadi <strong>CV Utama Bintang Engineering</strong>.
                        </p>
                    </div>
                </div>
                <div class="step">
                    <div class="number"></div>
                    <div class="info">
                        <p class="title">2015</p>
                        <p class="text">
                            Menjadi <strong>Dealer Daikin</strong>.
                        </p>
                    </div>
                </div>
                <div class="step">
                    <div class="number"></div>
                    <div class="info">
                        <p class="title">2017</p>
                        <p class="text">
                            Menjadi <strong>Dealer Daikin PRO-SHOP</strong>.
                        </p>
                    </div>
                </div>
                <div class="step">
                    <div class="number"></div>
                    <div class="info">
                        <p class="title">2019</p>
                        <p class="text">
                            Berubah menjadi <strong>PT. Utama Bintang Erkonpersada</strong>.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> <!-- end team -->

<section class="section-wrap pt-0 pb-0">
    <div class="container">
        <h2 class="mb-32 text-center">Layanan</h2>
        <div class="row">
            <div class="col-md-6 col-lg-3">
                <div class="service-1">
                    <a href="#" class="service-1__url hover-scale">
                        <img src="{{ asset('images/services/unit_supply.jpg') }}" class="service-1__img"
                            alt="Unit Supply">
                    </a>
                    <div class="service-1__info">
                        <h3 class="service-1__title">Unit Supply</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="service-1">
                    <a href="#" class="service-1__url hover-scale">
                        <img src="{{ asset('images/services/installation.jpg') }}" class="service-1__img"
                            alt="Installation">
                    </a>
                    <div class="service-1__info">
                        <h3 class="service-1__title">Installation</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="service-1">
                    <a href="#" class="service-1__url hover-scale">
                        <img src="{{ asset('images/services/ducting.jpg') }}" class="service-1__img" alt="Ducting">
                    </a>
                    <div class="service-1__info">
                        <h3 class="service-1__title">Ducting</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="service-1">
                    <a href="#" class="service-1__url hover-scale">
                        <img src="{{ asset('images/services/service_maintenance.jpg') }}" class="service-1__img"
                            alt="Service & Maintenance">
                    </a>
                    <div class="service-1__info">
                        <h3 class="service-1__title">Service & Maintenance</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-wrap pt-0 pb-0">
    <div class="container">
        <h2 class="mb-32 text-center">Layanan</h2>
        <div class="row">
            <div class="col-12">
                <img src="" alt="">
            </div>
            <div class="col-md-6">
                <h2 class="intro__title w-100">PT. Fujiare Indonesia</h2>
                <p>PT Fujiare Indonesia sejak awal telah memberikan kepercayaan dan dukungan penuh kepada kami untuk
                    menjadi <strong>perwakilan resmi di area Jawa Tengah dan Daerah Istimewa Yogyakarta</strong>.
                </p>
            </div>
            <div class="col-md-6">
                <h2 class="intro__title">PT. Daikin Airconditioning Indonesia</h2>
                <p>Perusahaan kami telah dipercaya untuk menjadi salah satu perusahaan yang mendistribusikan teknologi
                    modern alat pendingin ruangan oeh produk dari Jepang, sebagai <strong>DAIKIN PRO-SHOP
                        Dealer</strong> yang memiliki kualitas terbaik di kelasnya.</p>
            </div>
        </div>
    </div>
</section>

@endsection
