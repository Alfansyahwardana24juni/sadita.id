@include('components.icon')
<style>
.text-satoshi {
    font-family: 'Satoshi', sans-serif;
}

/* Container utama slider - ukuran yang lebih presisi */
.pic-ctn {
    position: relative;
    width: 95%;
    max-width: 800px; /* Diperbesar sedikit untuk centering yang lebih baik */
    height: 180px;
    margin: 0 auto;
    overflow: hidden;
    border-radius: 15px;
    /* Hilangkan padding dan left offset yang menyebabkan masalah */
}

/* Wrapper untuk semua gambar - perhitungan yang lebih tepat */
.slider-wrapper {
    position: relative;
    width: 400%; /* 4 gambar = 400% (tanpa gap ekstra) */
    height: 100%;
    display: flex;
    /* Hilangkan gap untuk menghindari spacing issues */
    animation: autoSlide 12s infinite;
    /* Pindahkan transition ke sini dengan timing yang tepat */
    transition: transform 0.8s ease-in-out;
}

/* Setiap gambar mengambil 25% dari wrapper */
.pic-ctn img {
    width: 25%;
    height: 180px;
    border-radius: 15px;
    object-fit: cover;
    flex-shrink: 0;
    /* Hilangkan margin-right yang menyebabkan gap */
}

/* Animasi yang diperbaiki - perhitungan translateX yang tepat */
@keyframes autoSlide {
    0% { transform: translateX(0%); }          /* Gambar 1 */
    22% { transform: translateX(0%); }         /* Hold di gambar 1 */
    25% { transform: translateX(-25%); }       /* Slide ke gambar 2 */
    47% { transform: translateX(-25%); }       /* Hold di gambar 2 */
    50% { transform: translateX(-50%); }       /* Slide ke gambar 3 */
    72% { transform: translateX(-50%); }       /* Hold di gambar 3 */
    75% { transform: translateX(-75%); }       /* Slide ke gambar 4 */
    97% { transform: translateX(-75%); }       /* Hold di gambar 4 */
    100% { transform: translateX(-100%); }     /* Slide ke posisi reset */
}

/* Alternative: Jika ingin infinite loop yang lebih smooth */
@keyframes autoSlideInfinite {
    0% { transform: translateX(0%); }
    20% { transform: translateX(0%); }
    25% { transform: translateX(-25%); }
    45% { transform: translateX(-25%); }
    50% { transform: translateX(-50%); }
    70% { transform: translateX(-50%); }
    75% { transform: translateX(-75%); }
    95% { transform: translateX(-75%); }
    100% { transform: translateX(-100%); }
}

.text-overlay {
    position: absolute;
    top: 50%;
    left: 43%;
    width: 78%;
    transform: translate(-50%, -50%);
    z-index: 10;
    color: white;
    font-size: 24px;
    font-weight: bold;
    text-align: left;
    text-shadow: 1px 1px 2px rgba(46, 46, 46, 0.8);
    pointer-events: none; / Agar tidak menghalangi interaksi */
}



/* Jika ingin teks di kiri, gunakan ini */
.text-overlay.text-left {
    left: 40%;
    text-align: left;
    width: 60%;
}

/* Custom untuk scrollbar-hide */
.scrollbar-hide::-webkit-scrollbar {
    display: none;
}

.scrollbar-hide {
    -ms-overflow-style: none;
    scrollbar-width: none;
}

.menu {
    z-index: 100;
}

.shadow-article {
    box-shadow: 0px 0px 5px 0px #00000040;
}

.shadow-soft {
    box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.5);
}


</style>
</head>

<body class="bg-gray flex items-center justify-center min-h-screen text-satoshi">
    <div class="bg-white shadow-lg w-full max-w-lg flex flex-col min-h-screen">
        <!-- codingan di atas jangan di ganggu -->


     <header class="flex justify-between items-center px-4 py-2 bg-white shadow-sm">
         
    <!-- Logo -->
    <div class="flex items-center space-x-3">
        <img src="{{ asset('src/logo sadita.png') }}" alt="Sadita logo" class="h-10">
    </div>

    <!-- Bagian kanan: Toko, Menu, Bahasa -->
    <div class="flex items-center space-x-4">
          {{-- Toggle Bahasa --}}
<div class="flex items-center bg-gray-50 rounded-full p-1 w-[80px]">
    <a href="{{ url('locale/id') }}"
        class="{{ app()->getLocale() === 'id' ? 'bg-red-700 text-white' : 'text-gray-700' }} text-xs font-semibold px-3 py-1 rounded-full transition">
        ID
    </a>
    <a href="{{ url('locale/en') }}"
        class="{{ app()->getLocale() === 'en' ? 'bg-red-700 text-white' : 'text-gray-700' }} text-xs font-semibold px-3 py-1 rounded-full transition">
        EN
    </a>
</div>

        <!-- Link ke Toko -->
        <a href="https://toko.sadita.id/" target="_blank">
            <img src="{{ asset('src/store-icon.png') }}" alt="Store Icon" class="h-8 w-8">
        </a>

        <!-- Hamburger Menu -->
        <img id="hamburger-menu" src="{{ asset('src/menu.png') }}" alt="Menu Icon"
            class="h-10 w-10 cursor-pointer">
    </div>
</header>



        <!-- Fullscreen Menu -->
        <div id="fullscreen-menu"
            class="menu fixed inset-0 bg-red-800 hidden min-h-screen flex items-center justify-center  text-white ">
            <!-- Tambahkan gambar di bagian atas kiri -->
            <div class="absolute top-6 w-full flex justify-between items-center px-6">
                <!-- Gambar ayam di kiri -->
                <img src="{{ asset('img/ayam2.png')}}" alt="Ayam" class="w-18 h-6">
                <!-- Icon close di kanan -->
                <a id="close-menu">
                    <img src="{{ asset('src/close2.png')}}" alt="Close" class="w-6 h-6">
                </a>
            </div>
                  <div class="flex flex-col items-center justify-center">
            <div id="news-content" class="tab-content flex flex-col items-center justify-center  space-y-8 pb-16">
                <a href="{{ route('index') }}" class="text-xm font-xm hover:text-gray-300">{{ __('messages.home') }}</a>
                <a href="https://toko.sadita.id/" target="_blan" class="text-xm font-xm hover:text-gray-300">{{ __('messages.kunjungi_toko') }}</a>
                <a href="{{ route('tentang') }}" class="text-xm font-xm hover:text-gray-300">{{ __('messages.about') }}</a>
                   <a href="{{ route('produk') }}" class="text-xm font-xm hover:text-gray-300">{{ __('messages.product') }}</a>
                <a href="{{ route('chat') }}" class="text-xm font-xm hover:text-gray-300">{{ __('messages.tanya_dokter') }}</a>
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

        <main class="p-1">
           <!-- Container untuk slider -->
<div class="pic-ctn">
    <!-- Teks overlay -->
    <div class="text-overlay">{{ __('messages.solusi_sehat') }} <br>{{ __('messages.ternak_anda') }}</div>
    
    <!-- Wrapper slider yang berisi semua gambar -->
    <div class="slider-wrapper">
                    <img src="{{ asset('img/ternak ayam.jpg') }}" alt="Chicken" class="pic">

                    <img src="{{ asset('img/ternak sapi.jpg') }}" alt="Cow" class="pic">

                    <img src="{{ asset('img/ternak kambing.jpg') }}" alt="Goat" class="pic">

                    <img src="{{ asset('img/ternak udang.jpg') }}" alt="Shrimp" class="pic">
                </div>
            </div>
        </main>

        <section class="p-4">
            <div class="flex justify-between items-center">
                <h2 class="text-lg font-bold text-maroon">{{ __('messages.kategori_produk') }}</h2>
                <a href="{{ route('produk') }}" class="text-maroon font-medium">{{ __('messages.lihat_semua') }}</a>
            </div>
            
            <div class="flex space-x-4 mt-4 overflow-x-auto scrollbar-hide z-50 pb-2 p-2">
                @foreach ($categories as $category)
                <div class="flex flex-col items-center min-w-0 flex-shrink-0">
                    <a href="{{ route('category.detail', ['slug' => $category->slug]) }}" class="flex flex-col items-center">
                        <div class="p-4 bg-white rounded-xl shadow-xl flex items-center justify-center w-16 h-16 box border border-gray-50" style="box-shadow: 0px 0px 5px 1px #00000030;">
                            <img src="{{ Storage::url($category->img) }}" alt="{{ $category->name_category }}"
                                class="w-14 h-14 object-contain">
                        </div>
                        <p class="mt-3 text-sm font-medium text-dark text-center max-w-20 leading-tight whitespace-nowrap overflow-hidden text-ellipsis">
                        {{ app()->getLocale() === 'en' ? $category->name_category_en : $category->name_category }}
                        </p>
                    </a>
                </div>
                @endforeach
            </div>
        </section>

        <section class="p-4 rounded-2xl bg-gray">
            <div class="flex justify-between items-center">
                <h2 class="text-lg font-bold text-maroon">{{ __('messages.tentang_kami') }}</h2>
                <a href="{{ route('tentang') }}" class="text-maroon font-medium">{{ __('messages.lihat_semua') }}</a>
            </div>

            <div class="grid grid-cols-2 gap-4 mt-4 place-items-center">
                <div class="flex flex-col items-center">
                    <div class="bg-white p-5 rounded-lg flex items-center justify-center w-30 h-30 box">
                        <img src="{{ asset('src/10 Tahun Pengalaman.png') }}" alt="{{ __('messages.tahun_pengalaman') }}"
                            class="w-20 h-20">
                    </div>
                    <p class="mt-2 text-xs font-medium text-dark">{{ __('messages.tahun_pengalaman') }}</p>
                </div>

                <div class="flex flex-col items-center">
                    <div class="bg-white p-5 rounded-lg flex items-center justify-center w-30 h-30 box">
                        <img src="{{ asset('src/200 Berbagi Produk.png') }}" alt="{{ __('messages.berbagai_produk') }}"
                            class="w-20 h-20">
                    </div>
                    <p class="mt-2 text-xs font-medium text-dark">{{ __('messages.berbagai_produk') }}</p>
                </div>

                <div class="flex flex-col items-center">
                    <div class="bg-white p-5 rounded-lg flex items-center justify-center w-30 h-30 box">
                        <img src="{{ asset('src/500 Mitra Klien.png')}}" alt="{{ __('messages.mitra_klien') }}" class="w-20 h-20">
                    </div>
                    <p class="mt-2 text-xs font-medium text-dark">{{ __('messages.mitra_klien') }}</p>
                </div>

                <div class="flex flex-col items-center">
                    <div class="bg-white p-5 rounded-lg flex items-center justify-center w-30 h-30 box">
                        <img src="{{ asset('src/100 Ton Produk Setiap Bulan.png')}}" alt="{{ __('messages.produk_setiap_bulan') }}"
                            class="w-20 h-20">
                    </div>
                    <p class="mt-2 text-xs font-medium text-dark">{{ __('messages.produk_setiap_bulan') }}</p>
                </div>
            </div>
        </section>
        <div class="p-4">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-lg font-bold text-maroon">{{ __('messages.article') }}</h2>
                <a href="{{ route('artikel') }}" class="text-maroon font-medium">{{ __('messages.lihat_semua') }}</a>
            </div>
            <div class="space-y-4">
                @foreach($articles as $article)
                    <a href="{{ route($article->category == 'news' ? 'news.show' : 'tips.show', $article->slug) }}" class="block">
                        <div class="flex items-center bg-white rounded-lg overflow-hidden w-full h-28 shadow-article">
                            <div class="flex-shrink-0 w-32 h-28 bg-gray-100 flex items-center justify-center overflow-hidden rounded-l-lg">
                                <img
                                    src="{{ asset('storage/' . $article->thumbnail) }}"
                                    alt="{{ $article->judul }}"
                                    class="object-cover w-full h-full"
                                />
                            </div>
                            <div class="flex-1 p-4">
                                <h2 class="font-bold text-sm truncate">
    {{ Str::limit(strip_tags($article->display_judul), 25) }}
                                </h2>
                                <p class="text-gray-600 text-xs mt-1 line-clamp-3">
    {{ Str::limit(strip_tags($article->display_konten), 90) }}
                                </p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            <div class="mt-6">
                <a href="{{ route('artikel') }}">
                    <button class="w-full bg-maroon text-white py-3 rounded-lg font-bold">
                        {{ __('messages.baca_selengkapnya') }}
                    </button>
                </a>
            </div>
        </div>
        @include('components.footer')

        @include('components.navbar')

    </div>

    <script src="{{ asset('js/filament/tailmater.js') }}"></script>
    <script>
        // JavaScript to handle active state dynamically
        // Set active class based on URL
        document.querySelectorAll('.nav-link').forEach(link => {
            // Check if the link's href matches the current URL
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

            // Show menu when hamburger is clicked
            hamburgerMenu.addEventListener("click", function() {
                fullscreenMenu.classList.remove("hidden");
            });

            // Close menu when close button is clicked
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
            showContent('news'); // Default tab
        });

        console.log(document.querySelector('.slider'));
        console.log(document.querySelectorAll('.tab-button'));
        console.log(document.getElementById('news-content'));
    </script>
</body>
</html>