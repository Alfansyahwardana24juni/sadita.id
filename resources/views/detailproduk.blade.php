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

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white shadow-lg w-full max-w-lg flex flex-col min-h-screen">
      <header class="sticky top-0 left-0 w-full justify-between z-10 p-2">
    <div class="flex justify-between items-center mx-2 ">
        <a href="{{ url()->previous() }}">
            <img src="{{ asset('src/back.png')}}" alt="Back Icon" class="h-8 w-8">
        </a>
        <!-- Hamburger Menu Icon -->
        <img id="hamburger-menu" src="{{ asset('src/menu.png')}}" alt="Hamburger Menu Icon"
            class="h-8 w-9 cursor-pointer">
    </div>
</header>
    <div id="fullscreen-menu"
        class="menu fixed inset-0 bg-red-800 hidden min-h-screen flex items-center justify-center text-white z-50">
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
            <div id="news-content" class="tab-content flex flex-col items-center justify-center  space-y-8 pb-16">
                <a href="{{ route('index') }}" class="text-xm font-xm hover:text-gray-300">{{ __('messages.home') }}</a>
                <a href="https://toko.sadita.id/" target="_blan" class="text-xm font-xm hover:text-gray-300">{{ __('messages.kunjungi_toko') }}</a>
                <a href="{{ route('tentang') }}" class="text-xm font-xm hover:text-gray-300">{{ __('messages.about') }}</a>
                <a href="{{ route('chat') }}" class="text-xm font-xm hover:text-gray-300">{{ __('messages.tanya_dokter') }}</a>
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


       <img src="{{ Storage::url($product->image_top) }}" alt="{{ $product->alt_top ?? '' }}" class="rounded-t-2xl">
<img src="{{ Storage::url($product->image_bottom) }}" alt="{{ $product->alt_bottom ?? '' }}" class="rounded-b-2xl">

        <div class="p-6 text-center">
            <a href="https://toko.sadita.id/" target="_blank" class="bg-red-700 p-4 text-white rounded-lg font-semibold hover:bg bg-red-800 transition">
                {{ __('messages.beli_produk') }}
            </a>
        </div>


        <!-- Panggil Footer -->
        @include('components.footer')

        <!-- Panggil Navbar -->
        @include('components.navbar')
        <!-- end navigation bar -->

    </div>
    </div>
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