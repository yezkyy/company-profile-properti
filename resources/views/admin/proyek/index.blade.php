@extends('admin.layout')

@section('content')
<div class="bg-white rounded-2xl p-8 shadow-xl border border-gray-200">
    {{-- Header --}}
    <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4 mb-8">
        <div>
            <h2 class="text-3xl font-bold text-gray-800">📁 Daftar Proyek</h2>
            <p class="text-sm text-gray-500 mt-1">
                <i class="fa-solid fa-circle-info mr-1"></i> Kelola data proyek properti di bawah ini.
            </p>
        </div>
        <a href="{{ route('admin.proyek.create') }}"
           class="inline-flex items-center gap-2 bg-gradient-to-r from-blue-500 to-blue-600 text-white px-5 py-2.5 rounded-full text-sm shadow hover:from-blue-600 hover:to-blue-700 transition">
            <i class="fa-solid fa-plus"></i> Tambah Proyek
        </a>
    </div>

    {{-- Statistik Ringkas --}}
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-6">
        <div class="bg-blue-50 border border-blue-100 p-4 rounded-xl shadow-sm">
            <div class="flex items-center gap-3">
                <i class="fa-solid fa-folder-open text-blue-600 text-lg"></i>
                <div>
                    <p class="text-sm text-gray-500">Total Proyek</p>
                    <p class="text-xl font-bold text-gray-800">{{ $proyeks->total() }}</p>
                </div>
            </div>
        </div>
        <div class="bg-green-50 border border-green-100 p-4 rounded-xl shadow-sm">
            <div class="flex items-center gap-3">
                <i class="fa-solid fa-circle-check text-green-600 text-lg"></i>
                <div>
                    <p class="text-sm text-gray-500">Proyek Aktif</p>
                    <p class="text-xl font-bold text-gray-800">{{ $proyeks->where('status', 'Aktif')->count() }}</p>
                </div>
            </div>
        </div>
        <div class="bg-yellow-50 border border-yellow-100 p-4 rounded-xl shadow-sm">
            <div class="flex items-center gap-3">
                <i class="fa-solid fa-hourglass-half text-yellow-600 text-lg"></i>
                <div>
                    <p class="text-sm text-gray-500">Pending</p>
                    <p class="text-xl font-bold text-gray-800">{{ $proyeks->where('status', 'Pending')->count() }}</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Filter & Search --}}
    <form method="GET" class="flex flex-col md:flex-row md:items-center gap-4 mb-6">
        <div class="relative w-full md:w-1/3">
            <i class="fa-solid fa-magnifying-glass absolute left-3 top-3.5 text-gray-400 text-sm"></i>
            <input type="text" name="search" placeholder="Cari nama proyek..." value="{{ request('search') }}"
                class="w-full pl-10 pr-4 py-2.5 rounded-lg border border-gray-300 text-sm shadow-sm focus:ring-2 focus:ring-blue-300 focus:outline-none">
        </div>

        <div class="w-full md:w-1/4">
            <select name="status"
                class="w-full px-4 py-2.5 rounded-lg border border-gray-300 text-sm shadow-sm focus:ring-2 focus:ring-blue-300 focus:outline-none">
                <option value="">📊 Semua Status</option>
                <option value="Aktif" {{ request('status') == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="Pending" {{ request('status') == 'Pending' ? 'selected' : '' }}>Pending</option>
                <option value="Nonaktif" {{ request('status') == 'Nonaktif' ? 'selected' : '' }}>Nonaktif</option>
            </select>
        </div>

        <button type="submit"
            class="inline-flex items-center gap-2 bg-blue-600 text-white px-5 py-2.5 rounded-lg text-sm shadow hover:bg-blue-700 transition">
            <i class="fa-solid fa-filter"></i> Terapkan
        </button>
    </form>

    {{-- Notifikasi --}}
    @if (session('success'))
        <div class="mb-4 px-4 py-3 rounded-lg bg-green-50 text-green-700 border border-green-200 text-sm">
            <i class="fa-solid fa-circle-check mr-2"></i> {{ session('success') }}
        </div>
    @endif

    {{-- Tabel Data --}}
    <div class="overflow-x-auto rounded-xl shadow-sm">
        <table class="min-w-full text-sm text-gray-800 border border-gray-200 bg-white">
            <thead>
                <tr class="bg-gray-100 text-gray-600 uppercase text-xs tracking-wider border-b">
                    <th class="py-3 px-5 text-left"><i class="fa-solid fa-building mr-1"></i> Proyek</th>
                    <th class="py-3 px-5 text-left"><i class="fa-solid fa-location-dot mr-1"></i> Lokasi</th>
                    <th class="py-3 px-5 text-center"><i class="fa-solid fa-layer-group mr-1"></i> Unit</th>
                    <th class="py-3 px-5 text-center"><i class="fa-solid fa-calendar-days mr-1"></i> Dibuat</th>
                    <th class="py-3 px-5 text-center"><i class="fa-solid fa-circle-check mr-1"></i> Status</th>
                    <th class="py-3 px-5 text-center"><i class="fa-solid fa-gears mr-1"></i> Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($proyeks as $proyek)
                    <tr class="hover:bg-blue-50 transition">
                        <td class="py-3 px-5 font-medium">{{ $proyek->nama }}</td>
                        <td class="py-3 px-5">{{ $proyek->lokasi }}</td>
                        <td class="py-3 px-5 text-center">{{ $proyek->jumlah_unit }}</td>
                        <td class="py-3 px-5 text-center">{{ $proyek->created_at->format('d M Y') }}</td>
                        <td class="py-3 px-5 text-center">
                            <span class="px-3 py-1 text-xs font-medium rounded-full 
                                {{ $proyek->status === 'Aktif' ? 'bg-green-100 text-green-700' : ($proyek->status === 'Pending' ? 'bg-yellow-100 text-yellow-700' : 'bg-red-100 text-red-700') }}">
                                <i class="fa-solid fa-circle mr-1 text-[0.6rem] align-middle"></i> {{ $proyek->status }}
                            </span>
                        </td>
                        <td class="py-3 px-5 text-center">
                            <div class="flex justify-center items-center gap-2">
                                <a href="{{ route('admin.proyek.edit', $proyek->id) }}"
                                    class="text-blue-600 hover:text-blue-800 text-sm font-medium flex items-center gap-1">
                                    <i class="fa-solid fa-pen-to-square"></i> Edit
                                </a>
                                <form action="{{ route('admin.proyek.destroy', $proyek->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus proyek ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="text-red-600 hover:text-red-800 text-sm font-medium flex items-center gap-1">
                                        <i class="fa-solid fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="py-6 px-4 text-center text-gray-400 italic">
                            <i class="fa-solid fa-circle-exclamation mr-1"></i> Tidak ada data proyek ditemukan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="mt-6">
        {{ $proyeks->withQueryString()->links() }}
    </div>
</div>
@endsection