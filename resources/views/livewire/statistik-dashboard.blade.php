<div class="grid sm:grid-cols-2 md:grid-cols-3 gap-6">
    <div class="bg-blue-100 p-6 rounded-2xl shadow-sm border border-blue-200">
        <div class="flex items-center gap-3 mb-3">
            <i class="fa-solid fa-building-columns text-blue-600 text-xl"></i>
            <h3 class="text-lg font-bold text-blue-800">Total Proyek</h3>
        </div>
        <p class="text-3xl font-extrabold text-blue-700">{{ $totalProyek }}</p>
    </div>

    <div class="bg-green-100 p-6 rounded-2xl shadow-sm border border-green-200">
        <div class="flex items-center gap-3 mb-3">
            <i class="fa-solid fa-house-circle-check text-green-600 text-xl"></i>
            <h3 class="text-lg font-bold text-green-800">Unit Terjual</h3>
        </div>
        <p class="text-3xl font-extrabold text-green-700">{{ $totalUnitTerjual }}</p>
    </div>

    <div class="bg-yellow-100 p-6 rounded-2xl shadow-sm border border-yellow-200">
        <div class="flex items-center gap-3 mb-3">
            <i class="fa-solid fa-chart-line text-yellow-600 text-xl"></i>
            <h3 class="text-lg font-bold text-yellow-800">Pengunjung Hari Ini</h3>
        </div>
        <p class="text-3xl font-extrabold text-yellow-700">{{ $pengunjungHariIni }}</p>
    </div>
</div>