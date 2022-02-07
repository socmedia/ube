@extends('layouts.guest')

@push('meta')
<!-- Primary Meta Tags -->
<title>Greenpark Jogja Apartment | Apartemen</title>
<meta name="title" content="Greenpark Jogja Apartment | Apartemen">
<meta name="description"
    content="Unit apartemen fully furnished menggunakan berbagai konsep. Salah satu konsep terbaik apartemen, smart living tampilan minimalis dengan perabotan mebel yang multi-fungsi sehingga ruangan tampak lebih luas.">
<meta name="author" content="Greenpark Jogja" />
<meta name="keywords"
    content="apartemen,apartemen menengah,hunian jogja, greenpark jogja, greenpark jogja apartment,apartment jogja,apartemen jogja,apartemen lengkap, apartemen greenpark jogja,apartemen anak muda" />

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="https://greenparkjogja.com/apartemen">
<meta property="og:title" content="Greenpark Jogja Apartment | Apartemen">
<meta property="og:description"
    content="Unit apartemen fully furnished menggunakan berbagai konsep. Salah satu konsep terbaik apartemen, smart living tampilan minimalis dengan perabotan mebel yang multi-fungsi sehingga ruangan tampak lebih luas.">
<meta property="og:image" content="{{asset('images/logo.svg')}}">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="https://greenparkjogja.com/apartemen">
<meta property="twitter:title" content="Greenpark Jogja Apartment | Apartemen">
<meta property="twitter:description"
    content="Unit apartemen fully furnished menggunakan berbagai konsep. Salah satu konsep terbaik apartemen, smart living tampilan minimalis dengan perabotan mebel yang multi-fungsi sehingga ruangan tampak lebih luas.">
<meta property="twitter:image" content="{{asset('images/logo.svg')}}">
@endpush

@section('content')
<x-breadcrumb page="Apartemen">
    <li class="breadcrumb-item"><a href="{{route('main.index')}}">Beranda</a></li>
    <li class="breadcrumb-item active" aria-current="page">Apartemen</li>
</x-breadcrumb>

<livewire:product.overview />
@endsection