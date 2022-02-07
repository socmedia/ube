@extends('layouts.guest')

@push('meta')
<!-- Primary Meta Tags -->
<title>Utama Bintang Erkonpersada | Blog</title>
<meta name="title" content="Utama Bintang Erkonpersada | Blog">
<meta name="description"
    content="Dapatkan berita terbaru, tips & trick, maupun blog terbaru dari DAIKIN PROSHOP - PT. Utama Bintang Erkonpersada">
<meta name="author" content="Utama Bintang Erkonpersada" />
<meta name="keywords"
    content="pt. utama bintang erkonpersada, utama bintang erkonpersada, daikin proshop, daikin proshop solo, utama engineering, toko ac solo, service ac solo, ducting, maintenance, unit supply" />

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="{{ route('main.about') }}">
<meta property="og:title" content="Utama Bintang Erkonpersada | Blog">
<meta property="og:description"
    content="Dapatkan berita terbaru, tips & trick, maupun blog terbaru dari DAIKIN PROSHOP - PT. Utama Bintang Erkonpersada">
<meta property="og:image" content="{{ asset('images/logo_text_500.jpg') }}">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="{{ route('main.about') }}">
<meta property="twitter:title" content="Utama Bintang Erkonpersada | Blog">
<meta property="twitter:description"
    content="Dapatkan berita terbaru, tips & trick, maupun blog terbaru dari DAIKIN PROSHOP - PT. Utama Bintang Erkonpersada">
<meta property="twitter:image" content="{{ asset('images/logo_text_500.jpg') }}">
@endpush

@section('content')
<section class="page-title bg-dark-overlay text-center" style="background-image: url(img/page-title/blog.jpg);">
    <div class="container">
        <div class="page-title__holder">
            <h1 class="page-title__title">Blog</h1>
            <ul class="breadcrumbs">
                <li class="breadcrumbs__item">
                    <a href="{{ route('main.index') }}" class="breadcrumbs__url">Beranda</a>
                </li>
                <li class="breadcrumbs__item breadcrumbs__item--current">
                    Blog
                </li>
            </ul>
        </div>
    </div>
</section>

<livewire:blog.overview />
@endsection
