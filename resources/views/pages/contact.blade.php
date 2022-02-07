@extends('layouts.guest')

@push('meta')
<!-- Primary Meta Tags -->
<title>Greenpark Jogja Apartment | Hubungi Kami</title>
<meta name="title" content="Greenpark Jogja Apartment | Hubungi Kami">
<meta name="description" content="Punya pertanyaan yang masih belum terjawab ? Kirim pertanyaan anda sekarang juga.">
<meta name="author" content="Greenpark Jogja" />
<meta name="keywords"
    content="apartemen,apartemen menengah,hunian jogja, greenpark jogja, greenpark jogja apartment,apartment jogja,apartemen jogja,apartemen lengkap, apartemen greenpark jogja,apartemen anak muda" />

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="https://greenparkjogja.com/kontak">
<meta property="og:title" content="Greenpark Jogja Apartment | Hubungi Kami">
<meta property="og:description"
    content="Punya pertanyaan yang masih belum terjawab ? Kirim pertanyaan anda sekarang juga.">
<meta property="og:image" content="{{asset('images/logo.svg')}}">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="https://greenparkjogja.com/kontak">
<meta property="twitter:title" content="Greenpark Jogja Apartment | Hubungi Kami">
<meta property="twitter:description"
    content="Punya pertanyaan yang masih belum terjawab ? Kirim pertanyaan anda sekarang juga.">
<meta property="twitter:image" content="{{asset('images/logo.svg')}}">
@endpush

@section('content')
<x-breadcrumb page="Hubungi Kami">
    <li class="breadcrumb-item"><a href="{{route('main.index')}}">Beranda</a></li>
    <li class="breadcrumb-item active" aria-current="page">Hubungi Kami</li>
</x-breadcrumb>

<livewire:contact.overview />
@endsection