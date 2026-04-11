@include('components.icon')

<style>
.text-satoshi {
    font-family: 'Satoshi', sans-serif;
}
.material-symbols-outlined {
    font-variation-settings:
        'FILL'0,
        'wght'400,
        'GRAD'0,
        'opsz'24
}

/* Base styles for navigation bar */

</style>
</head>

<body class="flex items-center justify-center min-h-screen rounded-2xl text-satoshi bg-gray">
    <div class="bg-white shadow-lg w-full max-w-lg flex flex-col min-h-screen">

        <main class="">
            <div class="bg-gray p-8 shadow-md rounded-lg relative text-justify absolute">
                <i class="fas fa-times">
                </i>
                <h1 class="text-xl font-bold mb-2 text-center m-4 pt-6">
                    {{ __('messages.sadita') }}
                </h1>
                <p class="text-sm text-gray-700 mb-4">
                    {{ __('messages.deskripsi_tentang') }}
                </p>
                <div class="mb-4">
                    <iframe
                        class="w-full rounded-lg"
                        height="200"
                        src="{{ app()->getLocale() === 'en' ? $video->video_en : $video->video_id }}"
                        title="YouTube video player"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen>
                    </iframe>
                </div>

                <section class="mt-4 p-4 flex justify-center rounded-2xl">
                    <div class="grid grid-cols-2 gap-6 mt-4 place-items-stretch">
                        <div class="flex flex-col items-center justify-start h-full -ml-4">
                            <div class="bg-white p-5 rounded-lg flex items-center justify-center w-32 h-32 box">
                                <img src="{{ asset('src/10 Tahun Pengalaman.png') }}" alt="{{ __('messages.tahun_pengalaman') }}" class="w-16 h-16">
                            </div>
                            <p class="mt-2 text-xs font-medium text-dark text-center">{{ __('messages.tahun_pengalaman') }}</p>
                        </div>

                        <div class="flex flex-col items-center justify-start h-full -mr-4">
                            <div class="bg-white p-5 rounded-lg flex items-center justify-center w-32 h-32 box">
                                <img src="{{ asset('src/200 Berbagi Produk.png') }}" alt="{{ __('messages.berbagai_produk') }}" class="w-16 h-16">
                            </div>
                            <p class="mt-2 text-xs font-medium text-dark text-center">
                                {{ __('messages.berbagai_produk') }} {{-- Using existing key for 200+ --}}
                                @if(app()->getLocale() == 'id')
                                Untuk Unggas, Hewan Besar, & Satwa Akuatik
                                @else
                                For Poultry, Large Animals, & Aquatic Animals
                                @endif
                            </p>
                        </div>

                        <div class="flex flex-col items-center justify-start h-full -ml-4">
                            <div class="bg-white p-5 rounded-lg flex items-center justify-center w-32 h-32 box">
                                <img src="{{ asset('src/500 Mitra Klien.png')}}" alt="{{ __('messages.mitra_klien') }}" class="w-16 h-16">
                            </div>
                            <p class="mt-2 text-xs font-medium text-dark text-center">
                                {{ __('messages.mitra_klien') }}
                                @if(app()->getLocale() == 'id')
                                Tersebar diseluruh Indonesia
                                @else
                                Spread throughout Indonesia
                                @endif
                            </p>
                        </div>

                        <div class="flex flex-col items-center justify-start h-full -mr-4">
                            <div class="bg-white p-5 rounded-lg flex items-center justify-center w-32 h-32 box">
                                <img src="{{ asset('src/100 Ton Produk Setiap Bulan.png')}}" alt="{{ __('messages.produk_setiap_bulan') }}" class="w-16 h-16">
                            </div>
                            <p class="mt-2 text-xs font-medium text-dark text-center">{{ __('messages.produk_setiap_bulan') }}</p>
                        </div>
                    </div>
                </section>
                </div>
        </main>
        <div class="max-w-screen-md mx-auto py-20 px-12 items-center justify-center bg-maroon rounded-3xl text-justify">
            <h1 class="text-2xl font-bold text-center mb-6 text-yellow-300 ">{{ __('messages.manfaat_kami') }}</h1>

            <div class="space-y-6 ">
                <li class="flex items-start">
                    <span class="text-yellow-400 text-2xl font-bold mr-2">•</span>
                    <div>
                        <h2 class="text-xl font-semibold mb-2 text-yellow-300">{{ __('messages.karyawan') }}</h2>
                        <p class="text-white text-xs">{{ __('messages.karyawan_yang_berkompeten_di_bidangnya_masing_masing') }}</p>
                    </div>
                </li>

                <li class="flex items-start">
                    <span class="text-yellow-400 text-2xl font-bold mr-2">•</span>
                    <div>
                        <h2 class="text-xl font-semibold mb-2 text-yellow-300">{{ __('messages.peralatan_standar_nasional') }}</h2>
                        <p class="text-white text-xs">{{ __('messages.deskripsi_peralatan') }}</p>
                    </div>
                </li>

                <li class="flex items-start">
                    <span class="text-yellow-400 text-2xl font-bold mr-2">•</span>
                    <div>
                        <h2 class="text-xl font-semibold mb-2 text-yellow-300">{{ __('messages.produksi') }}</h2>
                        <p class="text-white text-xs">{{ __('messages.deskripsi_produksi') }}</p>
                    </div>
                </li>

                <li class="flex items-start">
                    <span class="text-yellow-400 text-2xl font-bold mr-2">•</span>
                    <div>
                        <h2 class="text-xl font-semibold mb-2 text-yellow-300">{{ __('messages.dokumentasi') }}</h2>
                        <p class="text-white text-xs">{{ __('messages.deskripsi_dokumentasi') }}</p>
                    </div>
                </li>

                <li class="flex items-start">
                    <span class="text-yellow-400 text-2xl font-bold mr-2">•</span>
                    <div>
                        <h2 class="text-xl font-semibold mb-2 text-yellow-300">{{ __('messages.pengawasan_mutu') }}</h2>
                        <p class="text-white text-xs">{{ __('messages.deskripsi_pengawasan_mutu') }}</p>
                    </div>
                </li>
            </div>
        </div>
        <div class="justify-center items-center px-12 mt-16 text-justify mb-16">
            <h1 class="text-2xl font-bold text-center mb-6">{{ __('messages.sejarah_dinamis') }}</h1>
            <div class="space-y-4">
                <li class="flex items-start">
                    <span class="text-2xl font-bold mr-2">•</span>
                    <div>
                        <h2 class="text-xl font-bold mb-2 ">{{ __('messages.didikan_2012') }}</h2>
                        <p class="text-xs">{{ __('messages.deskripsi_didikan_2012') }}</p>
                    </div>
                </li>
                <li class="flex items-start">
                    <span class="text-2xl font-bold mr-2">•</span>
                    <div>
                        <h2 class="text-xl font-bold mb-2 ">{{ __('messages.tahun_2014') }}</h2>
                        <p class="text-xs">{{ __('messages.deskripsi_2014') }}</p>
                    </div>
                </li>
                <li class="flex items-start">
                    <span class="text-2xl font-bold mr-2">•</span>
                    <div>
                        <h2 class="text-xl font-bold mb-2 ">{{ __('messages.pabrik_2015') }}</h2>
                        <p class="text-xs">{{ __('messages.deskripsi_pabrik_2015') }}</p>
                    </div>
                </li>
                <li class="flex items-start">
                    <span class="text-2xl font-bold mr-2">•</span>
                    <div>
                        <h2 class="text-xl font-bold mb-2 ">{{ __('messages.sertifikat_cpohb_2018') }}</h2>
                        <p class="text-xs">{{ __('messages.deskripsi_sertifikat_cpohb_2018') }}</p>
                    </div>
                </li>
            </div>
            <div class="justify-center items-center px-2 pt-5">
                <div class="border border-gray-300 rounded-lg overflow-hidden shadow-md">
                    <img src="{{ asset('img/Sertifikat CPOHB.jpg') }}" alt="CPOHB Certificate" class="w-full h-auto object-cover">
                </div>
                <p class="text-xs text-center text-gray-500 mt-2">{{ __('messages.berlaku_hingga_juni_2029') }}</p>
            </div>

            {{-- Testimoni --}}
            <h1 class="text-xl font-bold text-center m-4 -mb-1 pt-3">{{ __('messages.testimoni') }}</h1>
            @if ($testimonis->count())
                <div class="w-full max-w-5xl mx-auto relative overflow-hidden rounded-xl shadow-lg">
                    <div id="cardSlides" class="flex transition-transform duration-500" style="transform: translateX(0%)">
                        @foreach ($testimonis as $testimoni)
                            <div class="min-w-full flex flex-col items-center bg-white p-6 rounded-xl shadow" style="box-shadow: 0px 0px 5px 1px #00000030;">
                                {{-- <div class="flex items-center space-x-4 w-full max-w-md">
                                    <div>
                                        <h3 class="font-semibold text-gray-900">{{ $testimoni->nama }}</h3>
                                        <p class="text-gray-400 text-sm">{{ $testimoni->jabatan }}</p>
                                    </div>
                                </div> --}}

                                @if ($testimoni->video_link && Str::contains($testimoni->video_link, 'instagram.com'))
                                    <blockquote
                                        class="instagram-media w-full max-w-md"
                                        data-instgrm-permalink="{{ $testimoni->video_link }}"
                                        data-instgrm-version="14"
                                        style="margin: 1rem auto;">
                                    </blockquote>
                                @else
                                    <p class="text-sm text-gray-500 italic">{{ __('messages.invalid_video_link') }}</p>
                                @endif
                            </div>
                        @endforeach
                    </div>

                    {{-- Navigation buttons --}}
                    @if ($testimonis->count() > 1)
                        <button id="prevSlide" class="absolute top-1/2 left-4 -translate-y-1/2 bg-white p-2 rounded-full shadow hover:bg-gray-100">&#8592;</button>
                        <button id="nextSlide" class="absolute top-1/2 right-4 -translate-y-1/2 bg-white p-2 rounded-full shadow hover:bg-gray-100">&#8594;</button>
                    @endif
                </div>
            @else
                <p class="text-sm text-gray-700 mb-4 text-center">{{ __('messages.no_testimonials') }}</p>
            @endif
        </div>
        
         <!-- tombol -->
            
            <div class="mb-12 text-center">
            <a href="https://toko.sadita.id/" target="_blank">
                <button class="bg-maroon px-6 py-2 text-white rounded-lg font-semibold hover:bg bg-red-800 transition">
                     {{ __('messages.kunjungi_toko') }}
                    </button>
            </a>
        </div>

        @include('components.footer')

        @include('components.navbar')

    </div>

    <script src="src/js/tailmater.js"></script>
    {{-- Instagram Embed Script --}}
    <script async src="//www.instagram.com/embed.js"></script>

    {{-- Carousel Script --}}
    <script>
        const slides = document.getElementById('cardSlides');
        const totalSlides = {{ $testimonis->count() }};
        let currentIndex = 0;

        document.getElementById('prevSlide')?.addEventListener('click', () => {
            if (currentIndex > 0) {
                currentIndex--;
                updateSlide();
            }
        });

        document.getElementById('nextSlide')?.addEventListener('click', () => {
            if (currentIndex < totalSlides - 1) {
                currentIndex++;
                updateSlide();
            }
        });

        function updateSlide() {
            const percentage = -100 * currentIndex;
            slides.style.transform = `translateX(${percentage}%)`;
            // Reload Instagram embed for newly visible slide
            if (window.instgrm) {
                window.instgrm.Embeds.process();
            }
        }
    </script>
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
    </script>
</body>
</html>