<!-- resources/views/components/navbar.blade.php -->
<div class="fixed bottom-0 left-0 right-0 bg-white shadow-[0_-4px_15px_rgba(0,0,0,0.1)] z-50">
  <div class="max-w-lg mx-auto px-4">
    <div class="flex justify-between items-center h-20">
      <!-- Beranda (Home) -->
      <a href="{{ route('index') }}"
         class="flex flex-col items-center justify-center gap-1 w-16 transition-colors duration-200 {{ request()->routeIs('index') ? 'text-red-800' : 'text-gray-400 hover:text-red-600' }}">
        <!-- Icon: Home -->
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="{{ request()->routeIs('index') ? '2.5' : '2' }}" stroke-linecap="round" stroke-linejoin="round">
          <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
          <polyline points="9 22 9 12 15 12 15 22"/>
        </svg>
        <span class="text-xs font-medium">{{ __('messages.home') }}</span>
      </a>

      <!-- Tentang (About) -->
      <a href="{{ route('tentang') }}"
         class="flex flex-col items-center justify-center gap-1 w-16 transition-colors duration-200 {{ request()->routeIs('tentang') ? 'text-red-800' : 'text-gray-400 hover:text-red-600' }}">
        <!-- Icon: Building2 -->
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="{{ request()->routeIs('tentang') ? '2.5' : '2' }}" stroke-linecap="round" stroke-linejoin="round">
          <path d="M6 22V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v18Z"/>
          <path d="M6 12H4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h2"/>
          <path d="M18 9h2a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2h-2"/>
          <path d="M10 6h4"/>
          <path d="M10 10h4"/>
          <path d="M10 14h4"/>
          <path d="M10 18h4"/>
        </svg>
        <span class="text-xs font-medium">{{ __('messages.about') }}</span>
      </a>

      <!-- Produk (Product) -->
      <a href="{{ route('produk') }}"
         class="flex flex-col items-center justify-center gap-1 w-16 transition-colors duration-200 {{ request()->routeIs('produk', 'detailcategory', 'detailproduk') ? 'text-red-800' : 'text-gray-400 hover:text-red-600' }}">
        <!-- Icon: Package -->
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="{{ request()->routeIs('produk', 'detailcategory', 'detailproduk') ? '2.5' : '2' }}" stroke-linecap="round" stroke-linejoin="round">
          <path d="m7.5 4.27 9 5.15"/>
          <path d="M21 8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16Z"/>
          <path d="m3.3 7 8.7 5 8.7-5"/>
          <path d="M12 22v-10"/>
        </svg>
        <span class="text-xs font-medium">{{ __('messages.product') }}</span>
      </a>

      <!-- Artikel (Article) -->
      <a href="{{ route('artikel') }}"
         class="flex flex-col items-center justify-center gap-1 w-16 transition-colors duration-200 {{ request()->routeIs('artikel', 'news.show', 'tips.show') ? 'text-red-800' : 'text-gray-400 hover:text-red-600' }}">
        <!-- Icon: FileText -->
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="{{ request()->routeIs('artikel', 'news.show', 'tips.show') ? '2.5' : '2' }}" stroke-linecap="round" stroke-linejoin="round">
          <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"/>
          <path d="M14 2v4a2 2 0 0 0 2 2h4"/>
          <path d="M10 9H8"/>
          <path d="M16 13H8"/>
          <path d="M16 17H8"/>
        </svg>
        <span class="text-xs font-medium">{{ __('messages.article') }}</span>
      </a>

      <!-- Chat -->
      <a href="{{ route('chat') }}"
         class="flex flex-col items-center justify-center gap-1 w-16 transition-colors duration-200 {{ request()->routeIs('chat') ? 'text-red-800' : 'text-gray-400 hover:text-red-600' }}">
        <!-- Icon: MessageCircle -->
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="{{ request()->routeIs('chat') ? '2.5' : '2' }}" stroke-linecap="round" stroke-linejoin="round">
          <path d="M7.9 20A9 9 0 1 0 4 16.1L2 22Z"/>
        </svg>
        <span class="text-xs font-medium">{{ __('messages.chat') }}</span>
      </a>
    </div>
  </div>
</div>
