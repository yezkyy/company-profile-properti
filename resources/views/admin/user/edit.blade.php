@extends('admin.layout')

@section('content')
<div class="bg-white rounded-2xl p-8 shadow border border-gray-100 max-w-xl mx-auto">
    <h2 class="text-xl font-bold mb-6 text-gray-700">✏️ Edit Pengguna</h2>

    <form method="POST" action="{{ route('admin.user.update', $user->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-600">Nama Lengkap</label>
            <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}"
                class="w-full mt-1 p-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
            @error('name')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}"
                class="w-full mt-1 p-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
            @error('email')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-600">Password Baru <span class="text-xs text-gray-400">(Opsional)</span></label>
            <input type="password" name="password" id="password"
                class="w-full mt-1 p-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
            @error('password')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="password_confirmation" class="block text-sm font-medium text-gray-600">Konfirmasi Password Baru</label>
            <input type="password" name="password_confirmation" id="password_confirmation"
                class="w-full mt-1 p-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
        </div>

        <div class="flex justify-between mt-6">
            <a href="{{ route('admin.user.index') }}" class="text-sm text-gray-500 hover:underline">← Kembali</a>
            <button type="submit"
                class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 transition">
                Update Pengguna
            </button>
        </div>
    </form>
</div>
@endsection