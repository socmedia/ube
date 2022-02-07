@extends('layouts.guest')

@push('meta')
<!-- Primary Meta Tags -->
<title>Utama Bintang Erkonpersada | {{ $post->title }}</title>
<meta name="title" content="Utama Bintang Erkonpersada | {{ $post->title }}">
<meta name="description" content="{{ $post->subject }}">
<meta name="author" content="Utama Bintang Erkonpersada" />
<meta name="keywords"
    content="pt. utama bintang erkonpersada, utama bintang erkonpersada, daikin proshop, daikin proshop solo, utama engineering, toko ac solo, service ac solo, ducting, maintenance, unit supply" />

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="{{ route('main.about') }}">
<meta property="og:title" content="Utama Bintang Erkonpersada | {{ $post->title }}">
<meta property="og:description" content="{{ $post->subject }}">
<meta property="og:image" content="{{ asset('images/logo_text_500.jpg') }}">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="{{ route('main.about') }}">
<meta property="twitter:title" content="Utama Bintang Erkonpersada | {{ $post->title }}">
<meta property="twitter:description" content="{{ $post->subject }}">
<meta property="twitter:image" content="{{ asset('images/logo_text_500.jpg') }}">
@endpush

@section('content')

<!-- Page Title -->
<section class="page-title page-title--tall blog-featured-img bg-dark-overlay text-center"
    style="background-image: url({{ $post->thumbnail ? $post->thumbnail->media_path : asset('images/thumbnail_16_9.png') }});">
    <div class="container">
        <div class="page-title__holder">
            <h1 class="page-title__title">{{ $post->title }}</h1>
            <ul class="entry__meta">
                <li class="entry__meta-date">
                    <span>{{ $post->created_at->format('D d, M Y') }}</span>
                </li>
                <li>-</li>
                <li class="entry__meta-category">
                    <a href="{{ route('main.post.index', [
                        'kategori' => $post->category->slug_name
                    ]) }}">{{$post->category->name}}</a>
                </li>
            </ul>
        </div>
    </div>
</section> <!-- end page title -->

<section class="section-wrap pt-40 pb-48">

    <div class="box-offset-container">
        <div class="blog__content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10">

                        <!-- Article -->
                        <article class="entry mb-0">
                            <div class="entry__article-wrap">
                                <div class="entry__article">
                                    {!! $post->description !!}
                                </div>
                            </div>
                        </article>

                        <livewire:blog.random />

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
