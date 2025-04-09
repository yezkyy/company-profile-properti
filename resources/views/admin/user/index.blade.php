@extends('admin.layout')

@section('content')
<div class="bg-white rounded-2xl p-8 shadow-md border border-gray-100">
    <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-6 gap-4">
        <h2 class="text-2xl font-bold text-gray-800">👥 Manajemen Pengguna</h2>
        <a href="{{ route('admin.user.create') }}"
            class="inline-flex items-center gap-2 bg-gradient-to-r from-blue-500 to-blue-600 text-white px-5 py-2.5 rounded-full text-sm shadow hover:from-blue-600 hover:to-blue-700 transition duration-300">
            <i class="fa-solid fa-user-plus"></i> Tambah Pengguna
        </a>
    </div>

    {{-- Search --}}
    <form method="GET" class="flex flex-col md:flex-row gap-4 mb-6">
        <input type="text" name="search" placeholder="Cari nama atau email pengguna..."
            value="{{ request('search') }}"
            class="w-full md:w-1/3 px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300 text-sm">
        
        <button type="submit"
            class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-blue-700 transition">
            <i class="fa-solid fa-magnifying-glass mr-1"></i> Cari
        </button>
    </form>

    @if (session('success'))
        <div class="mb-4 px-4 py-3 rounded bg-green-100 text-green-800 border border-green-200">
            <i class="fa-solid fa-check-circle mr-2"></i> {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto rounded-xl shadow-sm">
        <table class="min-w-full text-sm text-gray-700 border border-gray-100">
            <thead>
                <tr class="bg-gray-50 text-gray-600 text-left uppercase text-xs tracking-wider">
                    <th class="py-3 px-4">Nama</th>
                    <th class="py-3 px-4">Email</th>
                    <th class="py-3 px-4">Tanggal Daftar</th>
                    <th class="py-3 px-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($users as $user)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="py-3 px-4 font-medium">{{ $user->name }}</td>
                        <td class="py-3 px-4">{{ $user->email }}</td>
                        <td class="py-3 px-4">{{ $user->created_at->format('d M Y') }}</td>
                        <td class="py-3 px-4 text-center">
                            <div class="flex justify-center items-center gap-3">
                                <a href="{{ route('admin.user.edit', $user->id) }}"
                                    class="text-indigo-600 hover:text-indigo-800 transition text-sm font-medium flex items-center gap-1">
                                    <i class="fa-solid fa-pen-to-square"></i> Edit
                                </a>
                                <form action="{{ route('admin.user.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus pengguna ini?');">
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
                        <td colspan="4" class="py-6 px-4 text-center text-gray-500">Data pengguna tidak ditemukan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $users->withQueryString()->links() }}
    </div>
</div>
@endsection