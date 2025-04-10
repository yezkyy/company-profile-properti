<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Proyek;
use Illuminate\Http\Request;

class ProyekController extends Controller
{
    public function index(Request $request)
    {
        $query = Proyek::query();
    
        if ($request->filled('search')) {
            $query->where('nama', 'like', '%' . $request->search . '%');
        }
    
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
    
        $proyeks = $query->latest()->paginate(10);
    
        return view('admin.proyek.index', compact('proyeks'));
    }

    public function create()
    {
        return view('admin.proyek.create');
    }

    // store()
    public function store(Request $request)
    {
        $request->validate([
            'nama_proyek' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'jumlah_unit' => 'required|integer|min:0',
            'status' => 'required|in:Aktif,Pending,Nonaktif',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('proyeks', 'public');
        } else {
            $gambarPath = null;
        }
        
        Proyek::create([
            'nama' => $request->nama_proyek,
            'lokasi' => $request->lokasi,
            'jumlah_unit' => $request->jumlah_unit,
            'status' => $request->status,
            'gambar' => $gambarPath,
        ]);

        return redirect()->route('admin.proyek.index')->with('success', 'Proyek berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $proyek = Proyek::findOrFail($id);
        return view('admin.proyek.edit', compact('proyek'));
    }
    
    // update()
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_proyek' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'jumlah_unit' => 'required|integer|min:0',
            'status' => 'required|in:Aktif,Pending,Nonaktif',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $proyek = Proyek::findOrFail($id);

        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('proyeks', 'public');
            $proyek->gambar = $gambarPath;
        }
        
        $proyek->update([
            'nama' => $request->nama_proyek,
            'lokasi' => $request->lokasi,
            'jumlah_unit' => $request->jumlah_unit,
            'status' => $request->status,
            'gambar' => $proyek->gambar,
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