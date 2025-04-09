@extends('admin.layout')

@section('content')
<div class="bg-white rounded-2xl p-8 shadow-md border border-gray-100">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">📁 Daftar Proyek</h2>
        <a href="{{ route('admin.proyek.create') }}"
            class="inline-flex items-center gap-2 bg-gradient-to-r from-blue-500 to-blue-600 text-white px-5 py-2.5 rounded-full text-sm shadow hover:from-blue-600 hover:to-blue-700 transition duration-300">
            <i class="fa-solid fa-plus"></i> Tambah Proyek
        </a>
    </div>

    @if (session('success'))
        <div class="mb-4 px-4 py-3 rounded bg-green-100 text-green-800 border border-green-200">
            <i class="fa-solid fa-check-circle mr-2"></i> {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto rounded-xl shadow-sm">
        <table class="min-w-full text-sm text-gray-700">
            <thead>
                <tr class="bg-gray-50 border-b text-gray-600 text-left uppercase text-xs tracking-wider">
                    <th class="py-3 px-4">Nama Proyek</th>
                    <th class="py-3 px-4">Lokasi</th>
                    <th class="py-3 px-4">Jumlah Unit</th>
                    <th class="py-3 px-4">Tanggal Dibuat</th>
                    <th class="py-3 px-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($proyeks as $proyek)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="py-3 px-4 font-medium">{{ $proyek->nama }}</td>
                        <td class="py-3 px-4">{{ $proyek->lokasi }}</td>
                        <td class="py-3 px-4">{{ $proyek->units_count }}</td>
                        <td class="py-3 px-4">{{ $proyek->created_at->format('d M Y') }}</td>
                        <td class="py-3 px-4 text-center">
                            <div class="flex justify-center items-center gap-3">
                                <a href="{{ route('admin.proyek.edit', $proyek->id) }}"
                                    class="text-indigo-600 hover:text-indigo-800 transition text-sm font-medium flex items-center gap-1">
                                    <i class="fa-solid fa-pen-to-square"></i> Edit
                                </a>
                                <form action="{{ route('admin.proyek.destroy', $proyek->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus proyek ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="text-red-600 hover:text-red-800 transition text-sm font-medium flex items-center gap-1">
                                        <i class="fa-solid fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="py-6 px-4 text-center text-gray-500">Belum ada data proyek.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $proyeks->links() }}
    </div>
</div>
@endsection