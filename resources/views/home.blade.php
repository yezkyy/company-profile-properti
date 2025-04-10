@extends('layouts.app')

@section('content')
    {{-- Hero Section --}}
    <section class="relative bg-gradient-to-b from-blue-50 to-white overflow-hidden" data-aos="fade-up">
        <!-- Background dekoratif -->
        <div class="absolute -top-20 -left-20 w-72 h-72 bg-blue-100 rounded-full mix-blend-multiply filter blur-2xl opacity-70 animate-pulse"></div>
        <div class="absolute bottom-0 -right-20 w-96 h-96 bg-blue-200 rounded-full mix-blend-multiply filter blur-2xl opacity-50 animate-pulse"></div>

        <!-- Konten utama -->
        <div class="relative z-10 max-w-7xl mx-auto px-6 py-28 flex flex-col-reverse md:flex-row items-center justify-between gap-12">
            <!-- Konten Kiri -->
            <div class="flex-1 text-center md:text-left" data-aos="fade-up" data-aos-delay="100">
                <h1 class="text-4xl md:text-5xl font-extrabold text-gray-800 leading-tight mb-6">
                    Wujudkan Hunian <span class="text-blue-600">Impian</span> Anda<br>
                    di Lokasi Terbaik & Strategis
                </h1>
                <p class="text-gray-600 text-lg mb-8 max-w-xl">
                    Temukan rumah ideal bersama PropertiKu — didesain dengan konsep modern, lingkungan asri, dan akses yang mudah.
                </p>
                <a href="#proyek" class="inline-flex items-center gap-2 bg-blue-600 text-white px-6 py-3 rounded-full font-semibold hover:bg-blue-700 transition shadow-md">
                    <i class="fa-solid fa-eye"></i> Jelajahi Proyek
                </a>
            </div>

            <!-- Gambar Kanan -->
            <div class="flex-1" data-aos="fade-left" data-aos-delay="200">
                <div class="relative">
                    <img src="images/hunian-modern.png" alt="Properti" class="rounded-2xl shadow-xl w-full object-cover">
                    <div class="absolute bottom-4 right-4 bg-white text-blue-600 px-4 py-2 rounded-full shadow font-medium text-sm">
                        Hunian Modern 2025
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Fitur Section --}}
    <section class="py-20 bg-gradient-to-b from-white to-blue-50" data-aos="fade-up">
        <div class="max-w-6xl mx-auto px-6">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">Kenapa Memilih PropertiKu?</h2>
            <div class="grid md:grid-cols-3 gap-10 text-center">
                @foreach([
                    ['icon' => 'fa-shield-halved', 'title' => 'Keamanan 24 Jam', 'desc' => 'Akses one gate system dengan CCTV dan satpam aktif.'],
                    ['icon' => 'fa-seedling', 'title' => 'Lingkungan Asri', 'desc' => 'Kawasan hijau yang sehat dan ideal untuk tumbuh kembang keluarga.'],
                    ['icon' => 'fa-house-chimney-window', 'title' => 'Desain Modern', 'desc' => 'Rumah minimalis modern dengan kualitas material terbaik.'],
                ] as $fitur)
                    <div class="p-6 bg-blue-50 rounded-xl shadow hover:shadow-md transition" data-aos="zoom-in" data-aos-delay="{{ $loop->index * 150 }}">
                        <i class="fa-solid {{ $fitur['icon'] }} text-3xl text-blue-600 mb-4"></i>
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $fitur['title'] }}</h3>
                        <p class="text-gray-600">{{ $fitur['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Tentang Section --}}
    <section id="tentang" class="py-20 bg-gradient-to-b from-blue-50 to-white" data-aos="fade-up">
        <div class="max-w-6xl mx-auto px-6 flex flex-col md:flex-row items-center gap-12">
            <div class="flex-1" data-aos="zoom-in-right" data-aos-duration="1000">
                <img src="images/mascot.png" alt="Tentang Kami" class="rounded-xl w-full hover:scale-105 transition-transform duration-500">
            </div>
            <div class="flex-1" data-aos="fade-left" data-aos-duration="1000">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Tentang PropertiKu</h2>
                <p class="text-gray-600 mb-4 leading-relaxed">
                    Kami adalah developer properti yang telah membangun puluhan proyek hunian strategis di berbagai kota.
                </p>
                <ul class="space-y-3 text-gray-700">
                    <li class="flex items-center gap-2" data-aos="fade-up" data-aos-delay="100">
                        <i class="fa-solid fa-check-circle text-blue-600"></i>
                        Legalitas aman & terjamin
                    </li>
                    <li class="flex items-center gap-2" data-aos="fade-up" data-aos-delay="200">
                        <i class="fa-solid fa-check-circle text-blue-600"></i>
                        Tim profesional & berpengalaman
                    </li>
                    <li class="flex items-center gap-2" data-aos="fade-up" data-aos-delay="300">
                        <i class="fa-solid fa-check-circle text-blue-600"></i>
                        Lokasi strategis & berkembang
                    </li>
                </ul>
            </div>
        </div>
    </section>

    {{-- Proyek Section --}}
    <section id="proyek" class="py-20 bg-gradient-to-b from-white to-blue-50" data-aos="fade-up">
        <div class="max-w-6xl mx-auto px-6">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">Proyek Terbaru</h2>
            <div class="grid md:grid-cols-3 gap-8">
                @forelse($proyeks as $proyek)
                    <div class="bg-blue-100 rounded-xl overflow-hidden shadow hover:shadow-lg transition" data-aos="flip-left" data-aos-delay="{{ $loop->index * 200 }}">
                        <img src="https://source.unsplash.com/400x300/?realestate,home,{{ $loop->iteration }}" alt="{{ $proyek->nama }}" class="w-full h-52 object-cover">
                        <div class="p-4">
                            <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $proyek->nama }}</h3>
                            <p class="text-gray-600 text-sm">{{ $proyek->lokasi }}</p>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center text-gray-500">
                        Belum ada proyek yang tersedia.
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    {{-- Testimoni Section --}}
    <section class="py-20 bg-blue-50" data-aos="fade-up">
        <div class="max-w-5xl mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold text-gray-800 mb-12">Apa Kata Mereka?</h2>
            <div class="grid md:grid-cols-2 gap-8">
                <div class="bg-white p-6 rounded-xl shadow text-left" data-aos="fade-up" data-aos-delay="100">
                    <p class="text-gray-600 mb-4 italic">"Pelayanan cepat dan lokasi rumah sangat strategis. Terima kasih PropertiKu!"</p>
                    <div class="font-semibold text-gray-800">- Budi Santoso</div>
                </div>
                <div class="bg-white p-6 rounded-xl shadow text-left" data-aos="fade-up" data-aos-delay="200">
                    <p class="text-gray-600 mb-4 italic">"Hunian yang nyaman dengan lingkungan asri. Anak-anak betah bermain!"</p>
                    <div class="font-semibold text-gray-800">- Rina Aulia</div>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="py-20 bg-gradient-to-r from-blue-600 to-blue-500 text-white" data-aos="zoom-in">
        <div class="max-w-5xl mx-auto text-center px-6">
            <h2 class="text-3xl font-bold mb-4">Ingin Tahu Detail Lebih Lanjut?</h2>
            <p class="text-lg mb-6">Kami siap membantu Anda memiliki rumah idaman. Yuk konsultasi gratis sekarang!</p>
            <a href="#hubungi" class="inline-flex items-center gap-2 bg-white text-blue-600 px-6 py-3 rounded-full font-semibold shadow hover:bg-gray-100 transition">
                <i class="fa-solid fa-phone-volume"></i> Hubungi Kami Sekarang
            </a>
        </div>
    </section>
@endsection