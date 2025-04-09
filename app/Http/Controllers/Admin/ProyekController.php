<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Proyek;
use Illuminate\Http\Request;

class ProyekController extends Controller
{
    public function index()
    {
        $proyeks = Proyek::latest()->paginate(10);
        return view('admin.proyek.index', compact('proyeks'));
    }

    public function create()
    {
        return view('admin.proyek.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_proyek' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'status' => 'required|in:Aktif,Pending,Nonaktif'
        ]);

        Proyek::create($request->only('nama_proyek', 'lokasi', 'status'));

        return redirect()->route('admin.proyek.index')->with('success', 'Proyek berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $proyek = Proyek::findOrFail($id);
        return view('admin.proyek.edit', compact('proyek'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_proyek' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'status' => 'required|in:Aktif,Pending,Nonaktif'
        ]);
    
        $proyek = Proyek::findOrFail($id);
        $proyek->update([
            'nama_proyek' => $request->nama_proyek,
            'lokasi' => $request->lokasi,
            'status' => $request->status
        ]);
    
        return redirect()->route('admin.proyek.index')->with('success', 'Proyek berhasil diperbarui.');
    }
    
    public function destroy($id)
    {
        $proyek = Proyek::findOrFail($id);
        $proyek->delete();
    
        return redirect()->route('admin.proyek.index')->with('success', 'Proyek berhasil dihapus.');
    }    
}