<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Galeri::with('kegiatan');

        if ($request->filled('search')) {
            $query->where('judul', 'like', '%'.$request->search.'%');
        }

        if ($request->filled('kegiatan_id')) {
            $query->where('kegiatan_id', $request->kegiatan_id);
        }

        $galeris = $query->orderBy('urutan')->orderBy('created_at', 'desc')->paginate(12);
        $kegiatans = Kegiatan::where('status', 'selesai')->orderBy('tanggal_mulai', 'desc')->get();

        return view('admin.galeri.index', compact('galeris', 'kegiatans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kegiatans = Kegiatan::where('status', 'selesai')->orderBy('tanggal_mulai', 'desc')->get();

        return view('admin.galeri.create', compact('kegiatans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kegiatan_id' => 'nullable|exists:kegiatan,id',
            'nama_kegiatan' => 'nullable|string|max:255',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'foto' => 'required|image|max:5120',
            'urutan' => 'nullable|integer',
        ]);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = Str::uuid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('images/galeri'), $filename);
            $validated['foto'] = 'images/galeri/'.$filename;
        }

        Galeri::create($validated);

        return redirect()->route('admin.galeri.index')->with('success', 'Foto berhasil diupload');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $galeri = Galeri::findOrFail($id);
        $kegiatans = Kegiatan::where('status', 'selesai')->orderBy('tanggal_mulai', 'desc')->get();

        return view('admin.galeri.edit', compact('galeri', 'kegiatans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $galeri = Galeri::findOrFail($id);

        $validated = $request->validate([
            'kegiatan_id' => 'nullable|exists:kegiatan,id',
            'nama_kegiatan' => 'nullable|string|max:255',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|max:5120',
            'urutan' => 'nullable|integer',
        ]);

        if ($request->hasFile('foto')) {
            // Delete old foto
            if ($galeri->foto && File::exists(public_path($galeri->foto))) {
                File::delete(public_path($galeri->foto));
            }
            $file = $request->file('foto');
            $filename = Str::uuid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('images/galeri'), $filename);
            $validated['foto'] = 'images/galeri/'.$filename;
        }

        $galeri->update($validated);

        return redirect()->route('admin.galeri.index')->with('success', 'Foto berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $galeri = Galeri::findOrFail($id);

        if ($galeri->foto && File::exists(public_path($galeri->foto))) {
            File::delete(public_path($galeri->foto));
        }

        $galeri->delete();

        return back()->with('success', 'Foto berhasil dihapus');
    }
}
