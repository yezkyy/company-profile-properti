<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyek;

class HomeController extends Controller
{
    public function index()
    {
        $proyeks = Proyek::latest()->take(6)->get(); // Ambil 6 proyek terbaru
        return view('home', compact('proyeks'));
    }
}