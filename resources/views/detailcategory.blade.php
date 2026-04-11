@include('components.icon')

<style>
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
    /* Add padding for full height */
}

.nav-link .material-symbols-outlined {
    font-size: 24px;
    color: #9e9e9e;
    /* Light gray color for icons */
    transition: color 0.3s;
}

.nav-link p {
    margin: 0;
    font-size: 12px;
    color: #9e9e9e;
    /* Light gray color for text */
    transition: color 0.3s;
}

/* Active state styles */
.nav-link.active {
    background-color: #7f1d1d;
    /* Red background for active state */
    color: #ffffff;
    /* White color for active icon and text */
    height: 100%;
    /* Ensure background stretches fully */
}

.nav-link.active .material-symbols-outlined,
.nav-link.active p {
    color: #ffffff;
    /* White color for active icon and text */
}
</style>

</head>

<body class="bg-gray flex items-center justify-center min-h-screen rounded-2xl">
    <div class="bg-gray shadow-lg w-full max-w-lg flex flex-col min-h-screen">


        @include('components.header')

        <img src="{{ Storage::url($detailCategory->img) }}" alt="" class="w-full -mt-12">
<div class="p-4">
    <h1 class="text-2xl font-bold">{{ $detailCategory->title }}</h1>
    <p class="text-justify">{{ $detailCategory->description }}</p>
</div>

<div class="grid grid-cols-2 gap-6 pt-6 px-4 mb-10">
    @foreach ($detailCategory->products->where('aktif', true) as $product)
        <div class="flex flex-col items-center">
            <a href="{{ route('product.detail', [
                'categorySlug' => $detailCategory->category->slug, 
                'productSlug' => $product->slug
            ]) }}">
                <div class="bg-white rounded-lg shadow-md w-40 h-40 flex flex-col justify-between overflow-hidden">
                    
                    {{-- Gambar Produk --}}
                    <div class="w-full h-32 bg-white flex items-center justify-center overflow-hidden">
                        <img 
                            alt="{{ $product->name }}" 
                            src="{{ Storage::url($product->list_image) }}" 
                            class="object-contain w-full h-full"
                        />
                    </div>

                    {{-- Nama Produk --}}
                    <div class="w-full bg-maroon text-white text-xs text-center py-1 px-1 truncate">
                        {{ $product->name }}
                    </div>

                </div>
            </a>
        </div>
    @endforeach
</div>


        <!-- tombol -->
        <div class="mb-5 text-center">
            <a href="https://toko.sadita.id/" target="_blank">
                <button class="bg-maroon p-4 text-white rounded-lg font-semibold hover:bg bg-red-800 transition">
                     {{ __('messages.kunjungi_toko') }}
                    </button>
            </a>
        </div>

        <!-- Panggil Footer -->
        @include('components.footer')

        <!-- Panggil Navbar -->
        @include('components.navbar')

    </div>
    <script src="src/js/tailmater.js"></script>
    <script>
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
        showContent('news'); // Tab default
    });

    console.log(document.querySelector('.slider'));
    console.log(document.querySelectorAll('.tab-button'));
    console.log(document.getElementById('news-content'));
    </script>


</body>

</html>