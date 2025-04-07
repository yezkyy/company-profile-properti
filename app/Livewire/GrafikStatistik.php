<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Unit;
use Illuminate\Support\Facades\DB;

class GrafikStatistik extends Component
{
    public $labels = [];
    public $data = [];

    public function mount()
    {
        // Ambil data unit terjual per hari selama 7 hari terakhir
        $statistik = Unit::select(
                DB::raw("DATE(created_at) as tanggal"),
                DB::raw("COUNT(*) as jumlah")
            )
            ->where('status', 'terjual')
            ->where('created_at', '>=', now()->subDays(6)->startOfDay())
            ->groupBy('tanggal')
            ->orderBy('tanggal')
            ->get();

        // Format data untuk Chart.js
        $this->labels = $statistik->pluck('tanggal')->map(fn($tgl) => date('d M', strtotime($tgl)));
        $this->data = $statistik->pluck('jumlah');
    }

    public function render()
    {
        return view('livewire.grafik-statistik');
    }
}
