<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Artikel;
use App\Models\Berita;
use App\Models\Galeri;
use App\Models\Kegiatan;
use App\Models\Program;

class HomeController extends Controller
{
    public function index()
    {
        $beritaTerbaru = Berita::where('is_published', true)
            ->latest()
            ->take(3)
            ->get();

        $kegiatanTerbaru = Kegiatan::latest()
            ->take(4)
            ->get();

        $totalAnggota = Anggota::where('status', 'aktif')->count();
        $totalKegiatan = Kegiatan::count();
        $totalProgram = Program::where('status', 'aktif')->count();

        return view('home', compact('beritaTerbaru', 'kegiatanTerbaru', 'totalAnggota', 'totalKegiatan', 'totalProgram'));
    }

    public function berita()
    {
        $berita = Berita::where('is_published', true)
            ->latest()
            ->paginate(9);

        return view('berita.index', compact('berita'));
    }

    public function beritaDetail($slug)
    {
        $berita = Berita::where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        $berita->increment('views');

        return view('berita.detail', compact('berita'));
    }

    public function artikel()
    {
        $artikel = Artikel::where('is_published', true)
            ->latest()
            ->paginate(9);

        return view('artikel.index', compact('artikel'));
    }

    public function artikelDetail($slug)
    {
        $artikel = Artikel::where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        $artikel->increment('views');

        return view('artikel.detail', compact('artikel'));
    }

    public function kegiatan()
    {
        $kegiatan = Kegiatan::latest()->paginate(12);

        return view('kegiatan.index', compact('kegiatan'));
    }

    public function kegiatanDetail($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);

        return view('kegiatan.detail', compact('kegiatan'));
    }

    public function galeri()
    {
        $galeris = Galeri::with('kegiatan')
            ->orderBy('urutan')
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        return view('galeri.index', compact('galeris'));
    }

    public function tentang()
    {
        $totalAnggota = Anggota::where('status', 'aktif')->count();
        $totalKegiatan = Kegiatan::count();
        $totalProgram = Program::count();

        return view('tentang', compact('totalAnggota', 'totalKegiatan', 'totalProgram'));
    }
}
