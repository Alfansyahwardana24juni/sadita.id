<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
 <style>
.kategori-container {
    display: flex;
    flex-direction: column;
    margin-top: 20px;
}

.kategori-item {
    display: flex;
    align-items: center;
    padding: 10px;
    border-radius: 8px;
    justify-content: space-between;
    background-color: #ffffff;
    margin-bottom: 10px;
    box-shadow: 0 4px 13px rgba(0, 0, 0, 0.1), 0 4px 13px rgba(0, 0, 0, 0.06);
    transition: all 0.2s ease;
    /* Tambahkan border yang lebih terlihat */
}

.kategori-item:hover {
    box-shadow: 0 4px 8px -1px rgba(0, 0, 0, 0.1), 0 4px 8px -1px rgba(0, 0, 0, 0.08);
    transform: translateY(-1px);
    /* Ubah warna border saat hover */
    border-color: #cbd5e1;
}

.kategori-item-content {
    display: flex;
    align-items: center;
    gap: 10px;
}

.kategori-icon {
    color: black;
    font-size: 24px;
}

.kategori-text {
    font-size: 16px;
    color: #000;
}

.kategori-count {
    background-color: #e2e8f0;
    color: #4a5568;
    padding: 4px 8px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
}
</style>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sadita | {{ isset($article) ? $article->display_judul ?? $article->judul : '' }}</title>
    <!-- Link ke file CSS lokal -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="{{ asset('src/logo-title.png') }}" rel="icon">
    <link href="{{ asset('src/logo-title.png') }}" rel="apple-touch-icon">

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Satoshi&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    {{-- Open Graph meta tags --}}
    @if(isset($article))
        <meta property="og:title" content="{{ $article->display_judul ?? $article->judul }}">
        <meta property="og:description" content="{{ Str::limit(strip_tags($article->display_konten ?? $article->konten), 120) }}">
        <meta property="og:image" content="{{ asset('storage/' . $article->thumbnail) }}">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:type" content="article">

        {{-- Untuk WhatsApp dan Facebook --}}
        <meta name="twitter:card" content="summary_large_image">
    @else
        <meta property="og:title" content="Sadita">
        <meta property="og:description" content="@if(App::isLocale('id')) Solusi sehat ternak Anda di Sadita Indonesia @else Your healthy livestock solution at Sadita @endif">
        <meta property="og:image" content="{{ asset('src/logo-title.png') }}">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:type" content="website">
        <meta name="twitter:card" content="summary_large_image">
    @endif
</head>

<body class="bg-gray flex items-center justify-center min-h-screen">
    <div class="bg-gray shadow-lg w-full max-w-lg flex flex-col min-h-screen">

        <header class="relative top-0 left-0 w-full justify-between  z-10 sticky p-2">
            <div class="flex justify-between items-center mx-2 ">
                <a href="{{ route('artikel')}}"><img src="{{ asset('src/back.png')}}" alt="Search Icon"
                        class="h-8 w-8"></a>
                <!-- Hamburger Menu Icon -->
                <img id="hamburger-menu" src="{{ asset('src/menu.png')}}" alt="Hamburger Menu Icon"
                    class="h-8 w-9 cursor-pointer">
            </div>
            <div id="fullscreen-menu"
                class="menu fixed inset-0 bg-red-800 hidden min-h-screen flex items-center justify-center  text-white ">
                <!-- Tambahkan gambar di bagian atas kiri -->
                <div class="absolute top-6 w-full flex justify-between items-center px-6">
                    <!-- Gambar ayam di kiri -->
                    <img src="{{ asset('img/ayam2.png')}}" alt="Ayam" class="w-18 h-6">
                    <!-- Icon close di kanan -->
                    <a id="close-menu">
                        <img src="{{ asset('src/close2.png')}}" alt="Close" class="w-6 h-6" style="cursor:pointer;">
                    </a>
                </div>
                <div class="flex flex-col items-center justify-center">
                    <div id="news-content"
                        class="tab-content flex flex-col items-center justify-center  space-y-8 pb-16">
                        <a href="{{ route('index') }}" class="text-xm font-xm hover:text-gray-300">{{ __('messages.home') }}</a>
                        <a href="{{ route('chat') }}" class="text-xm font-xm hover:text-gray-300">{{ __('messages.tanya_dokter') }}</a>
                        <a href="{{ route('tentang') }}" class="text-xm font-xm hover:text-gray-300">{{ __('messages.about') }}</a>
                        <a href="{{ route('produk') }}" class="text-xm font-xm hover:text-gray-300">{{ __('messages.product') }}</a>
                        <a href="#" class="text-xm font-xm hover:text-gray-300">{{ __('messages.hubungi_kami') }}</a>
                        <!-- Tambahkan margin negatif atau padding -->
                        <a href="https://www.google.com/maps/place/PT+Satwa+Medika+Utama+(SADITA)/@-6.3706102,106.6769203,691m/data=!3m1!1e3!4m14!1m7!3m6!1s0x2e69e5cc7e8df9bb:0x98167f3b8f207c03!2sPT+Satwa+Medika+Utama+(SADITA)!8m2!3d-6.3706155!4d106.6794952!16s%2Fg%2F11c0xn4yxq!3m5!1s0x2e69e5cc7e8df9bb:0x98167f3b8f207c03!8m2!3d-6.3706155!4d106.6794952!16s%2Fg%2F11c0xn4yxq?authuser=0&entry=ttu&g_ep=EgoyMDI0MTIxMS4wIKXMDSoASAFQAw%3D%3D"
                            class="#" target="_blank">
                            <img src="{{asset ('src/location.png')}}" alt="Location" class="h-11 w-10">
                        </a>
                    </div>
                </div>
            </div>
        </header>

        <img src="{{ asset('storage/' . $article->thumbnail) }}" alt="{{ $article->display_judul ?? $article->judul }}" class="rounded-t-2xl">

        <div class="p-4">
            <h1 class="text-2xl font-bold text-gray-800">
                {{ $article->display_judul ?? $article->judul }}
            </h1>

            <div class="flex items-center text-sm text-gray-500 mt-2 space-x-4">
                <div class="flex items-center space-x-1">
                    <svg class="w-4 h-4 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 10a4 4 0 100-8 4 4 0 000 8zm0 2c-5.33 0-8 2.67-8 4v2h16v-2c0-1.33-2.67-4-8-4z" />
                    </svg>
                    <span>{{ $article->penulis }}</span>
                </div>
                <div class="flex items-center space-x-1">
                    <svg class="w-4 h-4 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M6 2a1 1 0 00-1 1v1H5a2 2 0 00-2 2v1h14V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H9V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zM3 8v9a2 2 0 002 2h10a2 2 0 002-2V8H3zm2 2h2v2H5v-2zm4 0h2v2H9v-2zm4 0h2v2h-2v-2z" />
                    </svg>
                    <span>{{ $article->tanggal_publikasi->translatedFormat('d F Y') }}</span>
                </div>
            </div>

            <!-- konten -->
            <div class="article-content prose prose-sm sm:prose lg:prose-lg max-w-none justify-text">
                {!! $article->display_konten ?? $article->konten !!}
            </div>

            <!--Tambahan-->
          
          
            <!--ARTIKEL TERKAI -->
            @if(isset($relatedArticles) && $relatedArticles->count() > 0)
                <div class="mb-8 mt-8 border-t pt-6">
                    <div class="kategori-container mb-5">
                        <h2 class="text-xl font-bold text-gray-800 mb-4">
                            @if(App::isLocale('id'))
                                Kategori
                            @else
                                Category
                            @endif
                        </h2>
                        <!--  Kategori 1 -->
                        <a href="{{ route('artikel') }}?kategori=berita" class="kategori-item">
                            <div class="kategori-item-content">
                                <span class="material-symbols-outlined kategori-icon">folder</span>
                                <span class="kategori-text">
                                    @if(App::isLocale('id'))
                                        Berita
                                    @else
                                        News
                                    @endif
                                </span>
                            </div>
                        </a>
          
                        <!--Kategori 2-->
                        <a href="{{ route('artikel') }}?kategori=tips" class="kategori-item">
                            <div class="kategori-item-content">
                                <span class="material-symbols-outlined kategori-icon">folder</span>
                                <span class="kategori-text">
                                    @if(App::isLocale('id'))
                                        Tips
                                    @else
                                        Guides
                                    @endif
                                </span>
                            </div>
                        </a>
                    </div>
                    <h2 class="text-xl font-bold text-gray-800 mb-4">
                        @if(App::isLocale('id'))
                            Artikel Terkait
                        @else
                            Related Articles
                        @endif
                    </h2>
                    <div class="space-y-4">
                        @foreach ($relatedArticles as $relatedArticle)
                            <a href="{{ route($article->category . '.show', $relatedArticle->slug) }}" class="block bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                                <div class="flex">
                                    <img src="{{ asset('storage/' . $relatedArticle->thumbnail) }}" alt="{{ $relatedArticle->display_judul ?? $relatedArticle->judul }}" class="w-28 h-28 object-cover">
                                    <div class="p-3 flex-1">
                                        <h3 class="font-semibold text-gray-800 text-sm leading-tight">
                                            {{ Str::limit($relatedArticle->display_judul ?? $relatedArticle->judul, 70) }}
                                        </h3>
                                        <p class="text-xs text-gray-500 mt-1">
                                            {{ $relatedArticle->tanggal_publikasi->translatedFormat('d F Y') }}
                                        </p>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Panggil Footer -->
            @include('components.footer')

            <!-- Panggil Navbar -->
            @include('components.navbar')

        </div>

        <script src=" {{ asset('js/filament/tailmater.js') }}"></script>
        <script>
            // JavaScript to handle active state dynamically
            document.querySelectorAll('.nav-link').forEach(link => {
                if (link.href === window.location.href) {
                    link.classList.add('active');
                } else {
                    link.classList.remove('active');
                }
            });
          
            document.addEventListener("DOMContentLoaded", function() {
                const hamburgerMenu = document.getElementById("hamburger-menu");
                const fullscreenMenu = document.getElementById("fullscreen-menu");
                const closeMenu = document.getElementById("close-menu");
  
                hamburgerMenu.addEventListener("click", function() {
                    fullscreenMenu.classList.remove("hidden");
                });
  
                closeMenu.addEventListener("click", function() {
                    fullscreenMenu.classList.add("hidden");
                });
            });
  
            function showContent(tab) {
                const slider = document.querySelector('.slider');
                slider.style.transform = tab === 'news' ? 'translateX(0%)' : 'translateX(100%)';
  
                document.querySelectorAll('.tab-button').forEach(button => {
                    const text = button.querySelector('span');
                    text.classList.remove('text-white');
                    text.classList.add('text-gray-600');
                });
  
                const activeTabText = document.querySelector(`#${tab}-tab span`);
                activeTabText.classList.remove('text-gray-600');
                activeTabText.classList.add('text-white');
  
                document.querySelectorAll('.tab-content').forEach(content => {
                    content.classList.add('hidden');
                });
                document.getElementById(`${tab}-content`).classList.remove('hidden');
            }
  
            document.addEventListener('DOMContentLoaded', function() {
                showContent('news');
            });
        </script>
    </div>
</body>
</html>