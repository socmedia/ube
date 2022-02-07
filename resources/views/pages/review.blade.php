@extends('layouts.guest')

@push('meta')
<!-- Primary Meta Tags -->
<title>Greenpark Jogja Apartment | Ulasan</title>
<meta name="title" content="Greenpark Jogja Apartment | Ulasan">
<meta name="description"
    content="Mereka adalah pelanggan kami yang sekarang telah memiliki hunian di Greenpark Jogja Apartment.">
<meta name="author" content="Greenpark Jogja" />
<meta name="keywords"
    content="apartemen,apartemen menengah,hunian jogja, greenpark jogja, greenpark jogja apartment,apartment jogja,apartemen jogja,apartemen lengkap, apartemen greenpark jogja,apartemen anak muda" />

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="https://greenparkjogja.com/ulasan">
<meta property="og:title" content="Greenpark Jogja Apartment | Ulasan">
<meta property="og:description"
    content="Mereka adalah pelanggan kami yang sekarang telah memiliki hunian di Greenpark Jogja Apartment.">
<meta property="og:image" content="{{asset('images/logo.svg')}}">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="https://greenparkjogja.com/ulasan">
<meta property="twitter:title" content="Greenpark Jogja Apartment | Ulasan">
<meta property="twitter:description"
    content="Mereka adalah pelanggan kami yang sekarang telah memiliki hunian di Greenpark Jogja Apartment.">
<meta property="twitter:image" content="{{asset('images/logo.svg')}}">
@endpush

@section('content')
<x-breadcrumb page="Ulasan">
    <li class="breadcrumb-item"><a href="{{route('main.index')}}">Beranda</a></li>
    <li class="breadcrumb-item active" aria-current="page">Ulasan</li>
</x-breadcrumb>

<livewire:review.overview />
@endsection