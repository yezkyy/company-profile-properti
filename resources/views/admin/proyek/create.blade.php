@extends('admin.layout')

@section('content')
<div class="bg-white rounded-2xl p-8 shadow border border-gray-100 max-w-xl mx-auto">
    <h2 class="text-xl font-bold mb-6 text-gray-700">Tambah Proyek Baru</h2>

    <form method="POST" action="{{ route('admin.proyek.store') }}">
        @csrf

        <div class="mb-4">
            <label for="nama_proyek" class="block text-sm font-medium text-gray-600">Nama Proyek</label>
            <input type="text" name="nama_proyek" id="nama_proyek"
                value="{{ old('nama_proyek') }}"
                class="w-full mt-1 p-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
            @error('nama_proyek')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="lokasi" class="block text-sm font-medium text-gray-600">Lokasi</label>
            <input type="text" name="lokasi" id="lokasi"
                value="{{ old('lokasi') }}"
                class="w-full mt-1 p-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
            @error('lokasi')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="status" class="block text-sm font-medium text-gray-600">Status</label>
            <select name="status" id="status"
                class="w-full mt-1 p-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                <option value="">-- Pilih Status --</option>
                <option value="Aktif" {{ old('status') === 'Aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="Pending" {{ old('status') === 'Pending' ? 'selected' : '' }}>Pending</option>
                <option value="Nonaktif" {{ old('status') === 'Nonaktif' ? 'selected' : '' }}>Nonaktif</option>
            </select>`
            @error('status')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-between mt-6">
            <a href="{{ route('admin.proyek.index') }}" class="text-sm text-gray-500 hover:underline">Kembali</a>
            <button type="submit"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                Simpan Proyek
            </button>
        </div>
    </form>
</div>
@endsection