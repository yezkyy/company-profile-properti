@extends('admin.layout')

@section('content')
<section class="min-h-screen bg-gradient-to-tr from-gray-100 via-white to-gray-50 py-16 px-6">
    <div class="max-w-7xl mx-auto space-y-10">

        {{-- Header --}}
        <div class="bg-white shadow-2xl rounded-2xl p-10 border border-gray-100">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                <div>
                    <h1 class="text-3xl font-extrabold text-gray-800 mb-1">Selamat Datang, Admin 👋</h1>
                    <p class="text-gray-500 text-sm">Kelola website PropertiKu dari dashboard ini.</p>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="inline-flex items-center gap-2 bg-red-600 text-white px-5 py-2.5 rounded-xl hover:bg-red-700 transition text-sm shadow">
                        <i class="fa-solid fa-right-from-bracket"></i> Logout
                    </button>
                </form>
            </div>

            {{-- Alert Box --}}
            <div class="mt-6 bg-blue-50 border-l-4 border-blue-400 text-blue-700 p-4 rounded-md text-sm">
                <i class="fa-solid fa-circle-info mr-2"></i> Kamu memiliki 3 proyek yang butuh update data unit.
            </div>
        </div>

        {{-- Stat Cards --}}
        <livewire:statistik-dashboard />

        {{-- Grafik Statistik --}}
        <livewire:grafik-statistik />

        {{-- Tabel Proyek Terbaru --}}
        <div class="bg-white rounded-2xl p-8 shadow border border-gray-100">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-xl font-bold text-gray-700">Proyek Terbaru</h2>
                <a href="{{ route('admin.proyek.create') }}"
                    class="inline-flex items-center gap-2 bg-blue-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-blue-700 transition">
                    <i class="fa-solid fa-plus"></i> Tambah Proyek
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full text-sm">
                    <thead>
                        <tr class="text-left text-gray-600 border-b">
                            <th class="py-2">Nama Proyek</th>
                            <th class="py-2">Lokasi</th>
                            <th class="py-2">Jumlah Unit</th>
                            <th class="py-2">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($proyekTerbaru as $proyek)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="py-2">{{ $proyek->nama }}</td>
                                <td class="py-2">{{ $proyek->lokasi }}</td>
                                <td class="py-2">{{ $proyek->units_count }}</td>
                                <td class="py-2">
                                    @if ($proyek->status === 'aktif')
                                        <span class="text-green-600 font-semibold capitalize">{{ $proyek->status }}</span>
                                    @elseif ($proyek->status === 'pending')
                                        <span class="text-yellow-600 font-semibold capitalize">{{ $proyek->status }}</span>
                                    @else
                                        <span class="text-gray-600 font-semibold capitalize">{{ $proyek->status }}</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="py-4 text-center text-gray-500">Belum ada proyek terbaru.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</section>
@endsection