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
    transition: color 0.2s;
}

.nav-link p {
    margin: 0;
    font-size: 12px;
    color: #9e9e9e;
    /* Light gray color for text */
}

/* Active state styles */
.nav-link.active {
    background-color: #800000;
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

<body class="flex items-center justify-center min-h-screen text-satoshi">
    <div class="bg-gray shadow-lg w-full max-w-lg flex flex-col min-h-screen">
        <!-- Header -->
        <div class="p-8 sticky top-0 bg-white shadow-lg rounded-2xl flex-items-center">
            <div class="float-right p-3 absolute top-4 right-4">
            </div>
            <div class="text-center mt-4 mb-4">
                <h2 class="font-bold text-lg">{{ __('messages.selamat_datang') }}</h2>
                <h2 class="font-bold text-lg">{{ __('messages.cs') }}</h2>
                <p class="text-gray-400 text-xs">{{ __('messages.konsultasi_kebutuhan') }}</p>
            </div>
            <div class="flex justify-center relative items-center rounded-full bg-white h-8 w-48 mx-auto box">
                <button id="news-tab" class="tab-button flex-1 font-bold focus:outline-none"
                    onclick="showContent('news')">
                    <span class="relative z-10 text-gray-600 text-xs">{{ __('messages.dokter_hewan') }}</span>
                </button>
                <button id="tips-tab" class="tab-button relative flex-1 font-bold focus:outline-none"
                    onclick="showContent('tips')">
                    <span class="relative z-10 text-gray-600 text-xs">{{ __('messages.admin_kantor') }}</span>
                </button>
                <!-- Slider -->
                <div class="slider absolute top-0 left-0 w-24 h-8 bg-maroon rounded-full pointer-events-none"></div>
            </div>
        </div>

        <!-- Content Dokter Hewan -->
        <div id="news-content" class="tab-content mt-4 hidden p-4 flex flex-col items-center justify-center space-y-4">
            @foreach($dokterHewans as $dokter)
            <div class="flex items-center bg-white rounded-lg overflow-hidden w-full max-w-md h-36 box">
                @if($dokter->img)
                <img src="{{ asset('storage/' . $dokter->img) }}" alt="{{ $dokter->nama_dokter }}"
                    class="w-32 h-36 object-cover">
                @else
                <img src="src/img/chat-dokter-1.png" alt="" class="w-32 h-32 object-cover">
                @endif
                <div class="pl-4">
                    <h2 class="font-bold text-sm truncate mb-2">{{ $dokter->nama_dokter }}</h2>
                    <p class="text-gray-600 text-xs flex items-center gap-2">
                        <img src="{{asset ('src/bag.png')}}" alt="" class="h-3 w-3">
                        {{ $dokter->pengalaman }}
                    </p>
                    <p class="text-gray-600 text-xs flex items-center gap-2">
                        <img src="{{asset ('src/tempat.png')}}" alt="" class="h-3 w-3">
                        {{ $dokter->lokasi_praktik }}
                    </p>
                    <a href="{{ route('chat.redirect', ['type' => 'dokter_hewan', 'id' => $dokter->id]) }}"
                        class="text-sm bg-maroon text-white px-4 py-1 rounded-lg mt-4 inline-block" target="blank">
                        {{ __('messages.konsultasi_sekarang') }}
                    </a>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Content Admin Kantor -->
        <div id="tips-content" class="tab-content mt-4 hidden space-y-4 p-4 flex flex-col items-center justify-center">
            @foreach($adminKantors as $admin)
            <div class="flex items-center bg-white rounded-lg overflow-hidden w-full max-w-md h-36 box">
                @if($admin->img)
                <img src="{{ asset('storage/' . $admin->img) }}" alt="{{ $admin->nama_admin }}"
                    class="w-32 h-36 object-cover">
                @else
                <img src="src/img/chat-admin-1.png" alt="" class="w-32 h-32 object-cover">
                @endif
                <div class="pl-4">
                    <h2 class="font-bold text-sm truncate mb-2">{{ $admin->nama_admin }}</h2>
                    <p class="text-gray-600 text-xs flex items-center space-x-2 gap-2">
                        <img src="{{asset ('src/bag.png')}}" alt="" class="h-3 w-3">
                        {{ $admin->hari_kerja }}
                    </p>
                    <p class="text-gray-600 text-xs flex items-center space-x-2 gap-2">
                        <img src="{{asset ('src/tempat.png')}}" alt="" class="h-3 w-3">
                        {{ $admin->lokasi_admin }}
                    </p>
                    <a href="{{ route('chat.redirect', ['type' => 'admin_kantor', 'id' => $admin->id]) }}"
                        class="text-sm bg-maroon text-white px-8 py-1 rounded-lg mt-4 inline-block" target="blank">
                        {{ __('messages.chat_sekarang') }}
                    </a>
                </div>
            </div>
            @endforeach
        </div>


        <main class="flex-grow">
        </main>

        <!-- Footer -->
        <footer class="rounded-t-3xl bg-maroon text-white pb-8 mb-16 p-4">
            <div class="p-4">
                <!-- Logo -->
                <img alt="Logo of Sadita" src="{{ asset('img/logosaditaputih.png') }}" class="object-cover w-32 h-full mb-8" />

                <!-- Kantor -->
                <div class="mb-4">
                    <h3 class="text-lg font-bold mb-2">{{ __('messages.kantor') }}</h3>
                                  <a href="https://maps.app.goo.gl/GJJ7ZrN3C83RXrkV7" target="_blank" rel="noopener noreferrer">
    <p>
        Pabuaran, Kec. Gn. Sindur, Kabupaten Bogor, Jawa Barat.
    </p>
</a>
                </div>

                <!-- Hubungi Kami -->
                <div class="mb-4">
                    <h3 class="text-lg font-bold mb-2">{{ __('messages.hubungi_kami') }}</h3>
                    <p>Saditabogor@gmail.com</p>
                    <p>0811444842 Head Office</p>
                </div>
            </div>
        </footer>


        <!-- Panggil Navbar -->
        @include('components.navbar')



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
    </script>

</body>

</html>