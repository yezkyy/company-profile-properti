<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - PropertiKu</title>

    {{-- Tailwind & App --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Font Awesome CDN --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    {{-- Chart JS --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    {{-- Livewire Styles --}}
    @livewireStyles
</head>   
<body class="bg-gray-100 text-gray-800 font-sans antialiased">

    <div class="flex min-h-screen">

        {{-- Sidebar --}}
        <aside class="w-64 bg-white shadow-md p-6 hidden md:block sticky top-0 h-screen">
            <div class="mb-10 text-center">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="mx-auto w-32 mb-2">
                <h2 class="text-xl font-bold text-blue-600">PropertiKu</h2>
            </div>
            <nav class="space-y-4">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-3 py-2 rounded hover:bg-blue-50 text-gray-700 hover:text-blue-600 transition {{ request()->routeIs('admin.dashboard') ? 'bg-blue-100 text-blue-600 font-semibold' : '' }}">
                    <i class="fa-solid fa-gauge-high w-5"></i> Dashboard
                </a>
                <a href="{{ route('admin.proyek.index')}}" class="flex items-center gap-3 px-3 py-2 rounded hover:bg-blue-50 text-gray-700 hover:text-blue-600 transition">
                    <i class="fa-solid fa-layer-group w-5"></i> Data Proyek
                </a>
                <a href="#" class="flex items-center gap-3 px-3 py-2 rounded hover:bg-blue-50 text-gray-700 hover:text-blue-600 transition">
                    <i class="fa-solid fa-users-gear w-5"></i> Manajemen Pengguna
                </a>
                <a href="#" class="flex items-center gap-3 px-3 py-2 rounded hover:bg-blue-50 text-gray-700 hover:text-blue-600 transition">
                    <i class="fa-solid fa-comments w-5"></i> Testimoni
                </a>
                <a href="#" class="flex items-center gap-3 px-3 py-2 rounded hover:bg-blue-50 text-gray-700 hover:text-blue-600 transition">
                    <i class="fa-solid fa-gear w-5"></i> Pengaturan
                </a>
            </nav>
        </aside>

        {{-- Main Content --}}
        <div class="flex-1 flex flex-col">

            {{-- Navbar --}}
            <header class="bg-white shadow px-6 py-4 flex justify-between items-center">
                <h1 class="text-xl font-semibold flex items-center gap-2">
                    <i class="fa-solid fa-circle-user text-blue-600"></i>
                    Admin Panel
                </h1>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="inline-flex items-center gap-2 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                        <i class="fa-solid fa-right-from-bracket"></i> Logout
                    </button>
                </form>
            </header>

            {{-- Content --}}
            <main class="flex-1 p-6">
                @yield('content')
            </main>

        </div>
    </div>
    
    {{-- Livewire Scripts --}}
    @livewireScripts

    @stack('scripts')
</body>
</html>