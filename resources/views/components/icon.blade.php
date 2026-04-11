<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Title Dinamis --}}
    @php
        $routeName = Route::currentRouteName();
        $titles = [
            'index' => 'Beranda',
            'tentang' => 'Tentang',
            'produk' => 'Produk',
            'product.show' => 'Detail Produk',
            'product.detail' => 'Detail Produk',
            'category.detail' => 'Kategori Produk',
            'artikel' => 'Artikel',
            'news.show' => 'Berita',
            'tips.show' => 'Tips',
            'chat' => 'Chat',
            'chat.redirect' => 'Redirect WhatsApp',
        ];
        $pageTitle = $titles[$routeName] ?? 'Halaman';
    @endphp
    <title>SADITA | {{ $pageTitle }}</title>

    <!-- CSS -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="{{ asset('src/logo-title.png') }}" rel="icon">
    <link href="{{ asset('src/logo-title.png') }}" rel="apple-touch-icon">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/satoshi" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://fonts.googleapis.com/css2?family=Satoshi&display=swap" rel="stylesheet">
</head>
