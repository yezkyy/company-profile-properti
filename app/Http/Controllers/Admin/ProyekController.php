<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Proyek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
        try {
            return view('admin.proyek.create');
        } catch (\Exception $e) {
            Log::error('Error saat membuka form create proyek: ' . $e->getMessage());
            return redirect()->route('admin.proyek.index')->with('error', 'Terjadi kesalahan saat membuka form.');
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'nama_proyek' => 'required|string|max:255',
                'lokasi' => 'required|string|max:255',
                'jumlah_unit' => 'required|integer|min:0',
                'status' => 'required|in:Aktif,Pending,Nonaktif',
                'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);

            $gambarPath = $request->hasFile('gambar')
                ? $request->file('gambar')->store('proyeks', 'public')
                : null;

            Proyek::create([
                'nama' => $request->nama_proyek,
                'lokasi' => $request->lokasi,
                'jumlah_unit' => $request->jumlah_unit,
                'status' => $request->status,
                'gambar' => $gambarPath,
            ]);

            return redirect()->route('admin.proyek.index')->with('success', 'Proyek berhasil ditambahkan.');
        } catch (\Exception $e) {
            Log::error('Gagal menyimpan proyek: ' . $e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan saat menyimpan proyek.');
        }
    }

    public function edit($id)
    {
        try {
            $proyek = Proyek::findOrFail($id);
            return view('admin.proyek.edit', compact('proyek'));
        } catch (\Exception $e) {
            Log::error('Gagal membuka halaman edit proyek: ' . $e->getMessage());
            return redirect()->route('admin.proyek.index')->with('error', 'Proyek tidak ditemukan.');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'nama_proyek' => 'required|string|max:255',
                'lokasi' => 'required|string|max:255',
                'jumlah_unit' => 'required|integer|min:0',
                'status' => 'required|in:Aktif,Pending,Nonaktif',
                'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
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
        } catch (\Exception $e) {
            Log::error('Gagal memperbarui proyek: ' . $e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan saat memperbarui proyek.');
        }
    }

    public function destroy($id)
    {
        try {
            $proyek = Proyek::findOrFail($id);
            $proyek->delete();

            return redirect()->route('admin.proyek.index')->with('success', 'Proyek berhasil dihapus.');
        } catch (\Exception $e) {
            Log::error('Gagal menghapus proyek: ' . $e->getMessage());
            return redirect()->route('admin.proyek.index')->with('error', 'Terjadi kesalahan saat menghapus proyek.');
        }
    }
}