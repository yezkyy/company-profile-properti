<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Unit;
use Carbon\Carbon;

use App\Models\Proyek;

class DashboardController extends Controller
{
    public function index()
    {
        $proyekTerbaru = Proyek::withCount('units')
                        ->latest()
                        ->take(5)
                        ->get();
    
        return view('admin.dashboard', compact('proyekTerbaru'));
    }

    public function getStatistikData()
    {
        $data = [];
        $labels = [];

        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i)->toDateString();
            $labels[] = Carbon::now()->subDays($i)->format('D');
            $data[] = Unit::whereDate('created_at', $date)->where('status', 'terjual')->count();
        }

        return response()->json([
            'labels' => $labels,
            'data' => $data
        ]);
    }
}
