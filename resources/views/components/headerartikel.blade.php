<header class="relative top-0 left-0 w-full justify-between  z-10 sticky p-2">
    <div class="flex justify-between items-center mx-2 ">
        <a href="{{ route('artikel')}}"><img src="{{ asset('src/back.png')}}" alt="Search Icon" class="h-8 w-8"></a>
        <!-- Hamburger Menu Icon -->
        <img id="hamburger-menu" src="{{ asset('src/menu.png')}}" alt="Hamburger Menu Icon"
            class="h-8 w-9 cursor-pointer">
    </div>
    <div id="fullscreen-menu"
        class="menu fixed inset-0 bg-red-800 hidden min-h-screen flex items-center justify-center text-white z-20">
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