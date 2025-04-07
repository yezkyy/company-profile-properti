<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Proyek;
use App\Models\Unit;

class StatistikDashboard extends Component
{
    public $totalProyek;
    public $totalUnitTerjual;
    public $pengunjungHariIni;

    public function mount()
    {
        $this->totalProyek = Proyek::count();
        $this->totalUnitTerjual = Unit::where('status', 'terjual')->count();
        $this->pengunjungHariIni = rand(100, 1000); // sementara dummy
    }

    public function render()
    {
        return view('livewire.statistik-dashboard');
    }
}