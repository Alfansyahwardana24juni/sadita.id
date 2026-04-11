@include('components.icon')

<style>
.text-satoshi {
    font-family: 'Satoshi', sans-serif;
}
.slider {
    transition: transform 0.3s ease;
}

.material-symbols-outlined {
    font-variation-settings:
        'FILL'0,
        'wght'400,
        'GRAD'0,
        'opsz'24
}

/* Base styles for navigationbar */
.nav-link {
    text-decoration: none;
    transition: background-color 0.3s, color 0.3s;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 12px 0;
}

.nav-link .material-symbols-outlined {
    font-size: 24px;
    color: #9e9e9e;
    transition: color 0.2s;
}

.nav-link p {
    margin: 0;
    font-size: 12px;
    color: #9e9e9e;
}

/* Active state styles */
.nav-link.active {
    background-color: #800000;
    color: #ffffff;
    height: 100%;
}

.nav-link.active .material-symbols-outlined,
.nav-link.active p {
    color: #ffffff;
}

/* Elemen tabs */
.tabs {
    position: relative;
    z-index: 1;
}

/* Elemen di atas tabs */
.header {
    position: sticky;
    top: 0;
    z-index: 10;
}

/* Layout fixes for sticky footer */
.main-container {
    min-height: 100vh;
    display: flex;
    flex-direction: column;
}

.content-wrapper {
    flex: 1;
    display: flex;
    flex-direction: column;
}

.main-content {
    flex: 1;
    padding-bottom: 1rem;
}
</style>
</head>

<body class="flex items-center justify-center min-h-screen text-satoshi">
    <!-- Main container with proper flex layout -->
    <div class="bg-gray shadow-lg w-full max-w-lg main-container">
        <div class="content-wrapper">
            <!-- Header section -->
            <div class="header">
                <div class="relative sticky top-0 p-8 bg-white rounded-b-2xl shadow-md">
                    <div class="flex items-center space-x-1">
                        <input 
                        id="search-input"
                        type="text" 
                        placeholder="{{ __('messages.cari_topik') }}" 
                        class="w-full h-10 px-5 text-gray-400 placeholder-gray-400 rounded-2xl focus:outline-none focus:ring-2 focus:ring-gray-300" 
                        style="box-shadow: 0 0 8px rgba(0, 0, 0, 0.2);"
                        onkeyup="searchArticles()"
                        />

                        <button id="search-button" class="w-10 h-10 min-w-[35px] min-h-[37px] flex-shrink-0 rounded-2xl bg-white flex items-center justify-center" 
                        style="box-shadow: 0 0 8px rgba(0, 0, 0, 0.2);"
                        onclick="searchArticles()">
                            <img src="{{ asset('src/icon-search.png')}}" alt="search" class="w-6 h-6 object-contain">
                        </button>
                    </div> 
                    <button class="absolute top-0 right-0 p-2 text-red-500 focus:outline-none">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            
            <!-- Main content area -->
            <div class="main-content px-4 mt-6">
                <h1 class="text-2xl font-bold mb-4">
                    {{ __('messages.pilih_kategori') }}
                </h1>

                <!-- tabs -->
                <div class="tabs">
                    <div class="flex relative items-center rounded-full bg-white h-8 w-40 mb-4 box">
                        <button id="news-tab" class="tab-button relative flex-1 py-2 font-semibold focus:outline-none"
                            onclick="showContent('news')">
                            <span class="relative z-10 text-gray-600 text-xs">{{ __('messages.berita') }}</span>
                        </button>
                        <button id="tips-tab" class="tab-button relative flex-1 py-2 font-semibold focus:outline-none"
                            onclick="showContent('tips')">
                            <span class="relative z-10 text-gray-600 text-xs">{{ __('messages.tips') }}</span>
                        </button>
                        <!-- Slider -->
                        <div class="slider absolute top-0 left-0 w-20 h-8 bg-maroon rounded-full pointer-events-none">
                        </div>
                    </div>
                </div>
                <!-- end tabs -->
                
                <!-- Tab contents -->
                <!-- No results message (initially hidden) -->
                <div id="no-results" class="hidden text-center py-8">
                    <div class="bg-white rounded-lg p-6 shadow">
                        <img src="{{ asset('src/icon-search.png')}}" alt="No results" class="w-16 h-16 mx-auto mb-4 opacity-50">
                        <h3 class="text-lg font-semibold text-gray-600 mb-2">{{ __('messages.tidak_ada_hasil') }}</h3>
                        <p class="text-gray-500 text-sm">{{ __('messages.coba_kata_kunci_berbeda') }}</p>
                    </div>
                </div>
                
                <!-- content news -->
                <div id="news-content" class="tab-content space-y-4 mb-4 mt-4 hidden">
                    @foreach ($news as $article)
                        <a href="{{ route('news.show', $article->slug) }}" class="article-item block" 
                           data-title="{{ strtolower($article->judul) }}" 
                           data-content="{{ strtolower(strip_tags($article->konten)) }}"
                           data-category="news">
                            <div class="flex items-center bg-white rounded-lg overflow-hidden w-full max-w-lg h-28 shadow">
                                
                                {{-- Kotak gambar tetap 1:1 (persegi) --}}
                                <div class="flex-shrink-0 w-32 h-28 bg-gray-100 flex items-center justify-center overflow-hidden rounded-l-lg">
                                    <img
                                        src="{{ asset('storage/' . $article->thumbnail) }}"
                                        alt="{{ $article->judul }}"
                                        class="object-cover w-full h-full"
                                    />
                                </div>

                                {{-- Konten teks --}}
                                <div class="p-4 w-full">
                                    <h2 class="font-bold text-sm truncate">
    {{ Str::limit(strip_tags($article->display_judul), 25) }}
                                    </h2>
                                    <p class="text-gray-600 text-xs">
    {{ Str::limit(strip_tags($article->display_konten), 90) }}
                                    </p>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
                <!-- end news -->

                <!-- content tips -->
                <div id="tips-content" class="tab-content space-y-4 mb-4 mt-4 hidden">
                    @foreach($tips as $article)
                        <a href="{{ route('tips.show', $article->slug) }}" class="article-item block"
                           data-title="{{ strtolower($article->judul) }}" 
                           data-content="{{ strtolower(strip_tags($article->konten)) }}"
                           data-category="tips">
                            <div class="flex items-center bg-white rounded-lg overflow-hidden w-full max-w-lg h-28 shadow">

                                {{-- Kotak gambar tetap persegi dan responsif --}}
                                <div class="flex-shrink-0 w-32 h-28 bg-gray-100 flex items-center justify-center overflow-hidden rounded-l-lg">
                                    <img 
                                        src="{{ asset('storage/' . $article->thumbnail) }}" 
                                        alt="{{ $article->judul }}"
                                        class="object-cover w-full h-full"
                                    />
                                </div>

                                {{-- Konten teks --}}
                                <div class="p-4 w-full">
                                    <h2 class="font-bold text-sm truncate">
    {{ Str::limit(strip_tags($article->display_judul), 25) }}
                                    </h2>
                                    <p class="text-gray-600 text-xs">
    {{ Str::limit(strip_tags($article->display_konten), 90) }}
                                    </p>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
                <!-- end tips -->
            </div>
        </div>

        <!-- Footer - akan selalu berada di bawah -->
        <footer class="rounded-t-3xl bg-maroon text-white mb-16 pb-8 p-4 mt-auto">
            <div class="p-4">
                <!-- Logo -->
                <img alt="Logo of Sadita" src="{{ asset('img/logosaditaputih.png') }}" class="object-cover w-32 h-full mb-8" />
                <!-- Kantor -->
                <div class="mb-4">
                    <h3 class="text-lg font-bold mb-2">
                        {{ __('messages.kantor') }}
                    </h3>
                                  <a href="https://maps.app.goo.gl/GJJ7ZrN3C83RXrkV7" target="_blank" rel="noopener noreferrer">
    <p>
        Pabuaran, Kec. Gn. Sindur, Kabupaten Bogor, Jawa Barat.
    </p>
</a>
                </div>
                <!-- Hubungi Kami -->
                <div class="mb-4">
                    <h3 class="text-lg font-bold mb-2">
                        {{ __('messages.hubungi_kami') }}
                    </h3>
                    <p class="">
                        Saditabogor@gmail.com
                    </p>
                    <p>
                        0811444842 Head Office
                    </p>
                </div>
            </div>
        </footer>

        <!-- Panggil Navbar -->
        @include('components.navbar')
    </div>
    
    <script src="src/js/tailmater.js"></script>
    <script>
    
    // Tambahan Untuk Script Kategori di dalam artikel
    function getKategoriFromURL() {
    const params = new URLSearchParams(window.location.search);
    return params.get('kategori');
    }
    
    // JavaScript to handle active state dynamically
    // Atur active class berdasarkan URL
    document.querySelectorAll('.nav-link').forEach(link => {
        // Periksa apakah href dari link cocok dengan URL saat ini
        if (link.href === window.location.href) {
            link.classList.add('active');
        } else {
            link.classList.remove('active');
        }
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
        
        // Reset search when switching tabs
        searchArticles();
    }

    // Search functionality
    function searchArticles() {
        const searchInput = document.getElementById('search-input');
        const searchTerm = searchInput.value.toLowerCase().trim();
        const activeTab = document.querySelector('.tab-content:not(.hidden)');
        const noResultsDiv = document.getElementById('no-results');
        
        if (!activeTab) return;
        
        const articles = activeTab.querySelectorAll('.article-item');
        let visibleCount = 0;
        
        articles.forEach(article => {
            const title = article.getAttribute('data-title');
            const content = article.getAttribute('data-content');
            
            if (searchTerm === '' || 
                title.includes(searchTerm) || 
                content.includes(searchTerm)) {
                article.style.display = 'block';
                visibleCount++;
            } else {
                article.style.display = 'none';
            }
        });
        
        // Show/hide no results message
        if (visibleCount === 0 && searchTerm !== '') {
            noResultsDiv.classList.remove('hidden');
        } else {
            noResultsDiv.classList.add('hidden');
        }
    }
    
    // Add event listener for Enter key
    document.getElementById('search-input').addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            searchArticles();
        }
    });
    
    // Clear search when input is empty
    document.getElementById('search-input').addEventListener('input', function() {
        if (this.value.trim() === '') {
            searchArticles();
        }
    });
    
    // Tambahan Untuk Script Kategori di dalam artikel
    
    document.addEventListener('DOMContentLoaded', function() {
    const kategori = getKategoriFromURL();

    if (kategori === 'tips') {
        showContent('tips');
    } else {
        showContent('news'); // default
    }
});


    // document.addEventListener('DOMContentLoaded', function() {
    //     showContent('news'); // Tab default
    // });

    console.log(document.querySelector('.slider'));
    console.log(document.querySelectorAll('.tab-button'));
    console.log(document.getElementById('news-content'));
    </script>

</body>

</html>