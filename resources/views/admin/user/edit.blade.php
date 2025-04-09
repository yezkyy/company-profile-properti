@extends('admin.layout')

@section('content')
<div class="bg-white rounded-2xl p-8 shadow border border-gray-100 max-w-xl mx-auto">
    <h2 class="text-2xl font-semibold mb-6 text-gray-700 flex items-center gap-2">
        <i class="fa-solid fa-user-pen text-yellow-500"></i> Edit Pengguna
    </h2>

    <form method="POST" action="{{ route('admin.user.update', $user->id) }}" autocomplete="off">
        @csrf
        @method('PUT')

        <div class="mb-5">
            <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
            <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" autocomplete="off"
                class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-yellow-300 focus:border-yellow-400 transition text-sm">
            @error('name')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-5">
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" autocomplete="off"
                class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-yellow-300 focus:border-yellow-400 transition text-sm">
            @error('email')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-5">
            <label for="password" class="block text-sm font-medium text-gray-700">
                Password Baru <span class="text-xs text-gray-400">(Opsional)</span>
            </label>
            <input type="password" name="password" id="password" autocomplete="new-password"
                class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-yellow-300 focus:border-yellow-400 transition text-sm">
            @error('password')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-5">
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Password Baru</label>
            <input type="password" name="password_confirmation" id="password_confirmation" autocomplete="new-password"
                class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-yellow-300 focus:border-yellow-400 transition text-sm">
        </div>

        <div class="flex justify-between items-center mt-6">
            <a href="{{ route('admin.user.index') }}"
                class="text-sm text-gray-500 hover:underline flex items-center gap-1">
                <i class="fa-solid fa-arrow-left"></i> Kembali
            </a>
            <button type="submit"
                class="bg-yellow-500 hover:bg-yellow-600 text-white text-sm px-5 py-2.5 rounded-lg transition flex items-center gap-2 shadow-sm">
                <i class="fa-solid fa-floppy-disk"></i> Update
            </button>
        </div>
    </form>
</div>
@endsection