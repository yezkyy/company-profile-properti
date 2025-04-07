@extends('layouts.app')

@section('content')
<section class="min-h-screen flex items-center justify-center bg-gradient-to-tr from-blue-200 via-white to-blue-100 py-10 px-4">
    <div class="w-full max-w-5xl bg-white shadow-2xl rounded-3xl overflow-hidden grid md:grid-cols-2">

        {{-- Left Side: Branding & Info --}}
        <div class="bg-blue-600 text-white flex flex-col justify-center p-10">
            <div class="mb-6">
                <img src="{{ asset('images/logo.png') }}" alt="PropertiKu Logo" class="w-24 mb-4 bg-white rounded-xl p-2 shadow-md" />
                <h2 class="text-3xl font-bold leading-tight">Selamat Datang!</h2>
                <p class="text-sm text-blue-100 mt-2">Masuk ke akun admin untuk mengelola konten dan proyek PropertiKu.</p>
            </div>
            <div class="mt-auto">
                <p class="text-xs text-blue-100">© {{ date('Y') }} PropertiKu. All rights reserved.</p>
            </div>
        </div>

        {{-- Right Side: Login Form --}}
        <div class="bg-white p-10">
            {{-- Breadcrumb --}}
            <nav class="text-sm text-gray-500 mb-6">
                <ol class="list-reset flex">
                    <li><a href="{{ url('/') }}" class="text-blue-600 hover:underline">Beranda</a></li>
                    <li class="mx-2 text-gray-400">/</li>
                    <li class="text-gray-700 font-medium">Login</li>
                </ol>
            </nav>

            <h2 class="text-2xl font-bold text-gray-700 mb-1">Login Admin</h2>
            <p class="text-sm text-gray-500 mb-6">Silakan masukkan email dan password Anda.</p>

            @if ($errors->any())
                <div class="bg-red-100 border border-red-300 text-red-700 px-4 py-3 rounded mb-4 text-sm flex items-center gap-2 animate-pulse">
                    <i class="fa-solid fa-circle-exclamation"></i>
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ url('/login') }}" method="POST" class="space-y-5">
                @csrf

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-3 flex items-center text-gray-400">
                            <i class="fa-solid fa-envelope"></i>
                        </span>
                        <input type="email" name="email" id="email" required
                            class="w-full pl-10 pr-4 py-2.5 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 outline-none text-sm bg-gray-50">
                    </div>
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-3 flex items-center text-gray-400">
                            <i class="fa-solid fa-lock"></i>
                        </span>
                        <input type="password" name="password" id="password" required
                            class="w-full pl-10 pr-4 py-2.5 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 outline-none text-sm bg-gray-50">
                    </div>
                </div>

                <button type="submit"
                    class="w-full bg-blue-600 text-white py-3 rounded-md font-semibold hover:bg-blue-700 transition duration-300 text-sm flex items-center justify-center gap-2 shadow">
                    <i class="fa-solid fa-arrow-right-to-bracket"></i> Masuk
                </button>
            </form>
        </div>
    </div>
</section>
@endsection