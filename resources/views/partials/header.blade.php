<header x-data="{ open: false }" class="fixed top-4 left-1/2 -translate-x-1/2 bg-white/80 backdrop-blur-md shadow-lg px-4 py-2 rounded-full border border-black z-50 w-[90%] max-w-5xl">
    <div class="max-w-7xl mx-auto px-4 lg:px-8 flex justify-between items-center">
        <!-- Logo -->
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 overflow-hidden">
                <img src="{{ asset('images/logo.png') }}" alt="PropertiKu Logo" class="w-full h-full object-cover">
            </div>
            <span class="text-2xl font-bold text-textPrimary tracking-wide">
                Properti<span class="text-primary">Ku</span>
            </span>
        </div>

        <!-- Desktop Navigation -->
        <nav class="hidden md:flex items-center gap-6">
            @foreach([
                ['link' => '/', 'icon' => 'fa-house', 'label' => 'Beranda'],
                ['link' => '#tentang', 'icon' => 'fa-users', 'label' => 'Tentang'],
                ['link' => '#proyek', 'icon' => 'fa-city', 'label' => 'Proyek'],
                ['link' => '#galeri', 'icon' => 'fa-image', 'label' => 'Galeri'],
                ['link' => '#berita', 'icon' => 'fa-newspaper', 'label' => 'Berita']
            ] as $item)
                <a href="{{ $item['link'] }}" class="group font-medium transition relative 
                    {{ request()->is(trim($item['link'], '/')) ? 'text-primary' : 'text-textSecondary hover:text-primary' }}">
                    <i class="fa-solid {{ $item['icon'] }} mr-2"></i> {{ $item['label'] }}
                    <span class="block h-0.5 max-w-0 bg-primary transition-all duration-300 group-hover:max-w-full 
                        {{ request()->is(trim($item['link'], '/')) ? 'max-w-full' : '' }}"></span>
                </a>
            @endforeach
        </nav>

        <!-- CTA & Mobile Toggle -->
        <div class="flex items-center gap-4">
            <div class="hidden md:block">
                <a href="#hubungi" class="inline-flex items-center gap-2 bg-primary text-white px-5 py-2 rounded-full text-sm font-semibold shadow hover:bg-primaryLight transition-all duration-200">
                    <i class="fa-solid fa-phone-volume"></i> Hubungi Kami
                </a>
            </div>

            <!-- Hamburger Button -->
            <button @click="open = !open" class="md:hidden text-textPrimary focus:outline-none">
                <i :class="open ? 'fa-solid fa-xmark' : 'fa-solid fa-bars'" class="text-2xl transition-all"></i>
            </button>
        </div>
    </div>

    <!-- Mobile Navigation -->
    <div x-show="open" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 -translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-2"
        class="md:hidden mt-2 bg-white border border-gray-200 rounded-xl shadow-lg overflow-hidden"
    >
        <nav class="px-6 py-4 flex flex-col space-y-4">
            @foreach([
                ['link' => '/', 'icon' => 'fa-house', 'label' => 'Beranda'],
                ['link' => '#tentang', 'icon' => 'fa-users', 'label' => 'Tentang'],
                ['link' => '#proyek', 'icon' => 'fa-city', 'label' => 'Proyek'],
                ['link' => '#galeri', 'icon' => 'fa-image', 'label' => 'Galeri'],
                ['link' => '#berita', 'icon' => 'fa-newspaper', 'label' => 'Berita']
            ] as $item)
                <a href="{{ $item['link'] }}" class="flex items-center gap-2 text-textSecondary hover:text-primary transition-all 
                    {{ request()->is(trim($item['link'], '/')) ? 'text-primary font-semibold' : '' }}">
                    <i class="fa-solid {{ $item['icon'] }}"></i> {{ $item['label'] }}
                </a>
            @endforeach

            <!-- CTA Mobile -->
            <a href="#hubungi" class="flex items-center justify-center gap-2 bg-primary text-white px-4 py-2 rounded-full text-sm shadow hover:bg-primaryLight transition">
                <i class="fa-solid fa-phone-volume"></i> Hubungi Kami
            </a>
        </nav>
    </div>
</header>