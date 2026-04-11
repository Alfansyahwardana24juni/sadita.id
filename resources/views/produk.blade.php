@include('components.icon')

<style>
.material-symbols-outlined {
    font-variation-settings:
        'FILL'0,
        'wght'400,
        'GRAD'0,
        'opsz'24
}
.text-satoshi {
    font-family: 'Satoshi', sans-serif;
}
/* Base styles for navigation bar */
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

/* Category filter styles */
.category-filter {
    display: flex;
    gap: 8px;
    overflow-x: auto;
    padding: 4px 0;
    scrollbar-width: none;
    -ms-overflow-style: none;
}

.category-filter::-webkit-scrollbar {
    display: none;
}

.category-btn {
    background-color: #f5f5f5;
    border: 1px solid #e0e0e0;
    padding: 8px 16px;
    border-radius: 20px;
    font-size: 12px;
    white-space: nowrap;
    cursor: pointer;
    transition: all 0.3s;
}

.category-btn.active,
.category-btn:hover {
    background-color: #800000;
    color: white;
    border-color: #800000;
}

/* Product grid styles */
.product-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 16px;
}

.product-card {
    background: white;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.2s;
}

.product-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
}

.product-image {
    width: 100%;
    height: 120px;
    object-fit: cover;
}

.product-info {
    padding: 12px;
}

.product-name {
    font-weight: 600;
    font-size: 14px;
    margin-bottom: 4px;
    color: #333;
}

.product-category {
    font-size: 12px;
    color: #666;
    margin-bottom: 8px;
}


.no-results {
    text-align: center;
    padding: 40px 20px;
    color: #666;
}

.search-results-info {
    margin-bottom: 16px;
    font-size: 14px;
    color: #666;
}
</style>
</head>

<body class="flex items-center justify-center min-h-screen text-satoshi">
    <div class="bg-gray shadow-lg w-full max-w-lg flex flex-col min-h-screen">

        <div class="relative sticky top-0 p-8 bg-white rounded-b-2xl shadow-md">
            <form method="GET" action="{{ route('produk') }}" class="flex items-center space-x-1">
                <input 
                    type="text" 
                    name="search"
                    value="{{ $search ?? '' }}"
                    placeholder="{{ __('messages.cari_nama_produk') }}" 
                    class="w-full h-10 px-5 text-gray-400 placeholder-gray-400 rounded-2xl focus:outline-none focus:ring-2 focus:ring-gray-300" 
                    style="box-shadow: 0 0 8px rgba(0, 0, 0, 0.2);"
                />
                <input type="hidden" name="category" value="{{ $selectedCategory ?? '' }}">
                
                <button type="submit" class="w-10 h-10 min-w-[35px] min-h-[37px] flex-shrink-0 rounded-2xl bg-white flex items-center justify-center" style="box-shadow: 0 0 8px rgba(0, 0, 0, 0.2);">
                    <img src="{{ asset('src/icon-search.png')}}" alt="search" class="w-6 h-6 object-contain">
                </button>
            </form>
            
            <button class="absolute top-0 right-0 p-2 text-red-500 focus:outline-none" onclick="clearSearch()">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <!-- Category Filter -->
        <div class="p-4 pb-0">
            <div class="category-filter">
                <a href="{{ route('produk') }}" 
                   class="category-btn {{ !$selectedCategory ? 'active' : '' }}">
                    {{ __('messages.semua') }}
                </a>
                @foreach ($categories as $category)
                    <a href="{{ route('produk', ['category' => $category->slug, 'search' => $search]) }}" 
                       class="category-btn {{ $selectedCategory == $category->slug ? 'active' : '' }}">
                        {{ app()->getLocale() === 'en' ? $category->name_category_en : $category->name_category }}
                    </a>
                @endforeach
            </div>
        </div>

        <!-- Search Results Info -->
        @if($search || $selectedCategory)
        <div class="px-4 pt-4">
            <div class="search-results-info">
                @if($search && $selectedCategory)
                    Hasil pencarian "{{ $search }}" dalam kategori "{{ $categories->where('slug', $selectedCategory)->first()->name_category ?? $selectedCategory }}"
                @elseif($search)
                    Hasil pencarian "{{ $search }}"
                @elseif($selectedCategory)
                    Produk dalam kategori "{{ $categories->where('slug', $selectedCategory)->first()->name_category ?? $selectedCategory }}"
                @endif
                ({{ isset($products) ? $products->count() : 0 }} produk ditemukan)
            </div>
        </div>
        @endif

       <!-- Product Results -->
<div class="p-4 pb-8">
    @if(!$search && !$selectedCategory)
        <!-- Default Category View -->
        <h1 class="text-2xl font-bold mb-6">{{ __('messages.pilih_kategori') }}</h1>
        <div class="grid grid-cols-2 gap-6">
            @foreach ($categories as $category)
            <div class="flex flex-col items-center">
               <a href="{{ route('category.detail', ['slug' => $category->slug]) }}">
                    <div class="box bg-white rounded-t-lg pt-2 flex flex-col items-center w-28 h-auto">
                        <img alt="{{ $category->name_category }}" class="w-16 h-16 mb-2"
                            src="{{ Storage::url($category->img) }}" />
                    </div>
                    <div class="w-full bg-maroon text-white text-center py-1 rounded-b-lg text-xs">
                        {{ app()->getLocale() === 'en' ? $category->name_category_en : $category->name_category }}
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    @else
        <!-- Product Results -->
        @if(isset($products) && $products->count() > 0)
        <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 gap-3 pt-6 px-4 mb-10">
            @foreach($products as $product)
                <div class="w-full">
                    <a href="{{ route('product.show', [$product->detailCategory->category->slug ?? 'uncategorized', $product->slug]) }}">
                        <div class="bg-white rounded-lg shadow-md block h-full w-full min-h-[160px] sm:min-h-[180px] md:min-h-[200px] flex flex-col justify-between overflow-hidden">

                            {{-- Gambar --}}
                            <div class="flex-grow bg-white flex items-center justify-center p-3 sm:p-4">
                                <img 
                                    alt="{{ $product->name }}" 
                                    src="{{ Storage::url($product->list_image) }}" 
                                    class="object-contain w-full max-w-full"
                                />
                            </div>

                            {{-- Nama Produk --}}
                            <div class="w-full bg-maroon text-white text-xs text-center py-1 px-1 truncate">
                                {{ app()->getLocale() === 'en' ? $product->name_en : $product->name }}
                            </div>

                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        @else
            <div class="no-results">
                <img src="{{ asset('src/no-results.png') }}" alt="No Results" class="w-32 h-32 mx-auto mb-4 opacity-50">
                <h3 class="text-lg font-bold mb-2">Produk tidak ditemukan</h3>
                <p class="text-sm text-gray-500 mb-4">
                    @if($search && $selectedCategory)
                        Tidak ada produk yang cocok dengan pencarian "{{ $search }}" dalam kategori yang dipilih.
                    @elseif($search)
                        Tidak ada produk yang cocok dengan pencarian "{{ $search }}".
                    @else
                        Tidak ada produk dalam kategori ini.
                    @endif
                </p>
                <a href="{{ route('produk') }}" class="text-maroon underline">Lihat semua produk</a>
            </div>
        @endif
    @endif
</div>


        <main class="flex-grow"></main>

        <!-- Footer -->
        <footer class="rounded-t-3xl bg-maroon text-white pb-8 mb-16 p-4">
            <div class="p-4">
                <img alt="Logo of Sadita" src="{{ asset('img/logosaditaputih.png') }}" class="object-cover w-32 h-full mb-8" />

                <div class="mb-4">
                    <h3 class="text-lg font-bold mb-2">{{ __('messages.kantor') }}</h3>
                    <a href="https://maps.app.goo.gl/GJJ7ZrN3C83RXrkV7" target="_blank" rel="noopener noreferrer">
    <p>
        Pabuaran, Kec. Gn. Sindur, Kabupaten Bogor, Jawa Barat.
    </p>
</a>

                </div>

                <div class="mb-4">
                    <h3 class="text-lg font-bold mb-2">{{ __('messages.hubungi_kami') }}</h3>
                    <p>Saditabogor@gmail.com</p>
                    <p>0811444842 Head Office</p>
                </div>
            </div>
        </footer>

        @include('components.navbar')
    </div>

    <script src="src/js/tailmater.js"></script>
    <script>
        // Handle active navigation
        document.querySelectorAll('.nav-link').forEach(link => {
            if (link.href === window.location.href) {
                link.classList.add('active');
            } else {
                link.classList.remove('active');
            }
        });

        // Clear search function
        function clearSearch() {
            window.location.href = "{{ route('produk') }}";
        }

        // Auto-submit form on category change (optional)
        document.querySelectorAll('.category-btn').forEach(btn => {
            btn.addEventListener('click', function(e) {
                if (this.href.includes('search=')) {
                    // If there's a search term, maintain it when changing category
                    const currentSearch = new URLSearchParams(window.location.search).get('search');
                    if (currentSearch) {
                        e.preventDefault();
                        const url = new URL(this.href);
                        url.searchParams.set('search', currentSearch);
                        window.location.href = url.toString();
                    }
                }
            });
        });
    </script>
</body>
</html>