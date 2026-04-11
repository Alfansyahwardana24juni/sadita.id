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
