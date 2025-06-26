<?php

namespace App\Http\Controllers;

use App\Models\Wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WisataController extends Controller
{
    public function index()
    {
        $wisatas = Wisata::all();
        return view('wisata.index', compact('wisatas'));
    }

    public function create()
    {
        return view('wisata.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'deskripsi' => 'required|string',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'gambarCarousel.*' => 'image|mimes:jpeg,png,jpg|max:2048',
            'alamat' => 'required|string',
            'jadwal_buka' => 'required|array',
            'jadwal_buka.*.buka' => 'nullable|date_format:H:i',
            'jadwal_buka.*.tutup' => 'nullable|date_format:H:i',
        ]);

        $wisata = Wisata::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'gambar' => $request->file('gambar')->store('wisata', 'public'),
            'alamat' => $request->alamat,
            'jadwal_buka' => $request->jadwal_buka,
        ]);

        if ($request->hasFile('gambarCarousel')) {
            foreach ($request->file('gambarCarousel') as $carouselImage) {
                $path = $carouselImage->store('wisata/carousel', 'public');

                $wisata->images()->create([
                    'image_path' => $path,
                ]);
            }
        }

        return redirect()->route('wisata.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit(Wisata $wisata)
    {
        return view('wisata.edit', compact('wisata'));
    }

    public function update(Request $request, Wisata $wisata)
    {
        $request->validate([
            'nama' => 'required|string',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'gambarCarousel.*' => 'image|mimes:jpeg,png,jpg|max:2048',
            'alamat' => 'required|string',
            'jadwal_buka' => 'required|array',
            'jadwal_buka.*.buka' => 'nullable|date_format:H:i',
            'jadwal_buka.*.tutup' => 'nullable|date_format:H:i',
            'hapusGambarCarousel' => 'nullable|array',
            'hapusGambarCarousel.*' => 'integer|exists:wisata_images,id',
        ]);

        $data = $request->only('nama', 'deskripsi', 'alamat', 'jadwal_buka');

        if ($request->hasFile('gambar')) {
            if ($wisata->gambar) {
                Storage::disk('public')->delete($wisata->gambar);
            }
            $imagePath = $request->file('gambar')->store('wisata', 'public');
            $data['gambar'] = $imagePath;
        }

        $wisata->update($data);

        if ($request->filled('hapusGambarCarousel')) {
            $carouselIdsToDelete = $request->input('hapusGambarCarousel');
            foreach ($wisata->images()->whereIn('id', $carouselIdsToDelete)->get() as $image) {
                Storage::disk('public')->delete($image->image_path);
                $image->delete();
            }
        }

        if ($request->hasFile('gambarCarousel')) {
            foreach ($request->file('gambarCarousel') as $carouselImage) {
                $path = $carouselImage->store('wisata/carousel', 'public');
                $wisata->images()->create([
                    'image_path' => $path,
                ]);
            }
        }

        return redirect()->route('wisata.index')->with('success', 'Data berhasil diupdate.');
    }

    public function destroy(Wisata $wisata)
    {
        if ($wisata->gambar) {
            Storage::disk('public')->delete($wisata->gambar);
        }

        foreach ($wisata->images as $image) {
            Storage::disk('public')->delete($image->image_path);
            $image->delete();
        }

        $wisata->delete();

        return redirect()->route('wisata.index')->with('success', 'Data berhasil dihapus.');
    }

    public function show(Wisata $wisata)
    {
        return view('wisata.show', compact('wisata'));
    }
}
