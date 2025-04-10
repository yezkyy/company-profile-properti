@extends('admin.layout')

@section('content')
<div class="bg-white rounded-2xl p-8 shadow border border-gray-100 max-w-xl mx-auto">
    <h2 class="text-xl font-bold mb-6 text-gray-700">Edit Proyek</h2>

    <form action="{{ route('admin.proyek.update', $proyek->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-600">Nama Proyek</label>
            <input type="text" name="nama_proyek" value="{{ old('nama_proyek', $proyek->nama) }}"
                   class="w-full mt-1 p-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
        </div>

        <div class="mb-4">
            <label for="gambar" class="block font-medium text-gray-700 mb-2">Gambar Proyek</label>
            <input type="file" name="gambar" class="border rounded w-full p-2">
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-600">Lokasi</label>
            <input type="text" name="lokasi" value="{{ old('lokasi', $proyek->lokasi) }}"
                   class="w-full mt-1 p-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-600">Jumlah Unit</label>
            <input type="number" name="jumlah_unit" value="{{ old('jumlah_unit', $proyek->jumlah_unit) }}"
                   class="w-full mt-1 p-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300" min="0">
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-600">Status</label>
            <select name="status"
                    class="w-full mt-1 p-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                <option value="Aktif" {{ $proyek->status === 'Aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="Pending" {{ $proyek->status === 'Pending' ? 'selected' : '' }}>Pending</option>
                <option value="Nonaktif" {{ $proyek->status === 'Nonaktif' ? 'selected' : '' }}>Nonaktif</option>
            </select>
        </div>

        <div class="flex justify-between">
            <a href="{{ route('admin.proyek.index') }}" class="text-sm text-gray-500 hover:underline">Kembali</a>
            <button type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection