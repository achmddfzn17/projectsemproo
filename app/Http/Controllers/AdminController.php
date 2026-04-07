<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Kegiatan;
use App\Models\Program;
use App\Models\Berita;
use App\Models\Artikel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalAnggota = Anggota::count();
        $anggotaAktif = Anggota::where('status', 'aktif')->count();
        $totalKegiatan = Kegiatan::count();
        $totalProgram = Program::count();
        $totalBerita = Berita::count();
        $totalArtikel = Artikel::count();

        $kegiatanTerbaru = Kegiatan::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalAnggota',
            'anggotaAktif',
            'totalKegiatan',
            'totalProgram',
            'totalBerita',
            'totalArtikel',
            'kegiatanTerbaru'
        ));
    }

    // Anggota CRUD
    public function anggotaIndex()
    {
        $anggota = Anggota::latest()->paginate(15);
        return view('admin.anggota.index', compact('anggota'));
    }

    public function anggotaCreate()
    {
        return view('admin.anggota.create');
    }

    public function anggotaStore(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|string|unique:anggota,nik',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat' => 'required|string',
            'no_hp' => 'required|string',
            'username' => 'required|string|unique:anggota,username',
            'email' => 'required|email|unique:anggota,email',
            'password' => 'required|string|min:6',
            'pendidikan_terakhir' => 'required|string',
            'pekerjaan' => 'required|string',
            'status' => 'required|in:aktif,non-aktif',
        ]);

        $validated['password'] = Hash::make($validated['password']);

        Anggota::create($validated);

        return redirect()->route('admin.anggota.index')->with('success', 'Anggota berhasil ditambahkan');
    }

    public function anggotaEdit($id)
    {
        $anggota = Anggota::findOrFail($id);
        return view('admin.anggota.edit', compact('anggota'));
    }

    public function anggotaUpdate(Request $request, $id)
    {
        $anggota = Anggota::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|string|unique:anggota,nik,' . $id,
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat' => 'required|string',
            'no_hp' => 'required|string',
            'username' => 'required|string|unique:anggota,username,' . $id,
            'email' => 'required|email|unique:anggota,email,' . $id,
            'password' => 'nullable|string|min:6',
            'pendidikan_terakhir' => 'required|string',
            'pekerjaan' => 'required|string',
            'status' => 'required|in:aktif,non-aktif',
        ]);

        if ($request->filled('password')) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        $anggota->update($validated);

        return redirect()->route('admin.anggota.index')->with('success', 'Anggota berhasil diupdate');
    }

    public function anggotaDestroy($id)
    {
        $anggota = Anggota::findOrFail($id);
        $anggota->delete();

        return redirect()->route('admin.anggota.index')->with('success', 'Anggota berhasil dihapus');
    }

    // Kegiatan CRUD
    public function kegiatanIndex()
    {
        $kegiatan = Kegiatan::latest()->paginate(15);
        return view('admin.kegiatan.index', compact('kegiatan'));
    }

    public function kegiatanCreate()
    {
        return view('admin.kegiatan.create');
    }

    public function kegiatanStore(Request $request)
    {
        $validated = $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'jenis_kegiatan' => 'required|in:sosial,pendidikan,olahraga,seni,lingkungan',
            'deskripsi' => 'required|string',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'lokasi' => 'required|string',
            'status' => 'required|in:rencana,berlangsung,selesai',
            'kuota_peserta' => 'nullable|integer|min:1',
            'is_pendaftaran_open' => 'nullable|boolean',
            'foto' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('kegiatan', 'public');
        }

        $validated['is_pendaftaran_open'] = $request->has('is_pendaftaran_open') ? true : false;

        $kegiatan = Kegiatan::create($validated);

        // Generate QR Token untuk kegiatan
        $kegiatan->generateQRToken();

        return redirect()->route('admin.kegiatan.index')->with('success', 'Kegiatan berhasil ditambahkan');
    }

    public function kegiatanEdit($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        return view('admin.kegiatan.edit', compact('kegiatan'));
    }

    public function kegiatanUpdate(Request $request, $id)
    {
        $kegiatan = Kegiatan::findOrFail($id);

        $validated = $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'jenis_kegiatan' => 'required|in:sosial,pendidikan,olahraga,seni,lingkungan',
            'deskripsi' => 'required|string',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'lokasi' => 'required|string',
            'status' => 'required|in:rencana,berlangsung,selesai',
            'kuota_peserta' => 'nullable|integer|min:1',
            'is_pendaftaran_open' => 'nullable|boolean',
            'foto' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            if ($kegiatan->foto) {
                \Storage::disk('public')->delete($kegiatan->foto);
            }
            $validated['foto'] = $request->file('foto')->store('kegiatan', 'public');
        }

        $validated['is_pendaftaran_open'] = $request->has('is_pendaftaran_open') ? true : false;

        $kegiatan->update($validated);

        return redirect()->route('admin.kegiatan.index')->with('success', 'Kegiatan berhasil diupdate');
    }

    public function kegiatanDestroy($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        if ($kegiatan->foto) {
            \Storage::disk('public')->delete($kegiatan->foto);
        }
        $kegiatan->delete();

        return redirect()->route('admin.kegiatan.index')->with('success', 'Kegiatan berhasil dihapus');
    }

    // Program CRUD
    public function programIndex()
    {
        $program = Program::latest()->paginate(15);
        return view('admin.program.index', compact('program'));
    }

    public function programCreate()
    {
        return view('admin.program.create');
    }

    public function programStore(Request $request)
    {
        $validated = $request->validate([
            'nama_program' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'koordinator' => 'nullable|string',
            'anggaran' => 'nullable|numeric',
            'target_capaian' => 'nullable|string',
            'status' => 'required|in:aktif,non-aktif',
        ]);

        Program::create($validated);

        return redirect()->route('admin.program.index')->with('success', 'Program berhasil ditambahkan');
    }

    public function programEdit($id)
    {
        $program = Program::findOrFail($id);
        return view('admin.program.edit', compact('program'));
    }

    public function programUpdate(Request $request, $id)
    {
        $program = Program::findOrFail($id);

        $validated = $request->validate([
            'nama_program' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'koordinator' => 'nullable|string',
            'anggaran' => 'nullable|numeric',
            'target_capaian' => 'nullable|string',
            'status' => 'required|in:aktif,non-aktif',
        ]);

        $program->update($validated);

        return redirect()->route('admin.program.index')->with('success', 'Program berhasil diupdate');
    }

    public function programDestroy($id)
    {
        $program = Program::findOrFail($id);
        $program->delete();

        return redirect()->route('admin.program.index')->with('success', 'Program berhasil dihapus');
    }

    // Berita CRUD
    public function beritaIndex()
    {
        $berita = Berita::latest()->paginate(15);
        return view('admin.berita.index', compact('berita'));
    }

    public function beritaCreate()
    {
        return view('admin.berita.create');
    }

    public function beritaStore(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'slug' => 'required|string|unique:berita,slug',
            'konten' => 'required|string',
            'gambar' => 'nullable|image|max:2048',
            'is_published' => 'nullable|boolean',
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('berita', 'public');
        }

        $validated['user_id'] = auth()->id();
        $validated['is_published'] = $request->has('is_published') ? true : false;

        Berita::create($validated);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil ditambahkan');
    }

    public function beritaEdit($id)
    {
        $berita = Berita::findOrFail($id);
        return view('admin.berita.edit', compact('berita'));
    }

    public function beritaUpdate(Request $request, $id)
    {
        $berita = Berita::findOrFail($id);

        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'slug' => 'required|string|unique:berita,slug,' . $id,
            'konten' => 'required|string',
            'gambar' => 'nullable|image|max:2048',
            'is_published' => 'nullable|boolean',
        ]);

        if ($request->hasFile('gambar')) {
            if ($berita->gambar) {
                \Storage::disk('public')->delete($berita->gambar);
            }
            $validated['gambar'] = $request->file('gambar')->store('berita', 'public');
        }

        $validated['is_published'] = $request->has('is_published') ? true : false;
        $validated['user_id'] = $berita->user_id ?? auth()->id();

        $berita->update($validated);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diupdate');
    }

    public function beritaDestroy($id)
    {
        $berita = Berita::findOrFail($id);
        if ($berita->gambar) {
            \Storage::disk('public')->delete($berita->gambar);
        }
        $berita->delete();

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil dihapus');
    }

    // Artikel CRUD
    public function artikelIndex()
    {
        $artikel = Artikel::latest()->paginate(15);
        return view('admin.artikel.index', compact('artikel'));
    }

    public function artikelCreate()
    {
        return view('admin.artikel.create');
    }

    public function artikelStore(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'slug' => 'required|string|unique:artikel,slug',
            'konten' => 'required|string',
            'kategori' => 'required|string',
            'gambar' => 'nullable|image|max:2048',
            'is_published' => 'nullable|boolean',
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('artikel', 'public');
        }

        $validated['user_id'] = auth()->id();
        $validated['is_published'] = $request->has('is_published') ? true : false;

        Artikel::create($validated);

        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil ditambahkan');
    }

    public function artikelEdit($id)
    {
        $artikel = Artikel::findOrFail($id);
        return view('admin.artikel.edit', compact('artikel'));
    }

    public function artikelUpdate(Request $request, $id)
    {
        $artikel = Artikel::findOrFail($id);

        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'slug' => 'required|string|unique:artikel,slug,' . $id,
            'konten' => 'required|string',
            'kategori' => 'required|string',
            'gambar' => 'nullable|image|max:2048',
            'is_published' => 'nullable|boolean',
        ]);

        if ($request->hasFile('gambar')) {
            if ($artikel->gambar) {
                \Storage::disk('public')->delete($artikel->gambar);
            }
            $validated['gambar'] = $request->file('gambar')->store('artikel', 'public');
        }

        $validated['is_published'] = $request->has('is_published') ? true : false;
        $validated['user_id'] = $artikel->user_id ?? auth()->id();

        $artikel->update($validated);

        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil diupdate');
    }

    public function artikelDestroy($id)
    {
        $artikel = Artikel::findOrFail($id);
        if ($artikel->gambar) {
            \Storage::disk('public')->delete($artikel->gambar);
        }
        $artikel->delete();

        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil dihapus');
    }

    // Admin Users Management
    public function usersIndex()
    {
        $users = User::latest()->paginate(15);
        return view('admin.users.index', compact('users'));
    }

    public function usersCreate()
    {
        return view('admin.users.create');
    }

    public function usersStore(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $validated['password'] = Hash::make($validated['password']);

        User::create($validated);

        return redirect()->route('admin.users.index')->with('success', 'Admin berhasil ditambahkan');
    }

    public function usersEdit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function usersUpdate(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|unique:users,username,' . $id,
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        if ($request->filled('password')) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        $user->update($validated);

        return redirect()->route('admin.users.index')->with('success', 'Admin berhasil diupdate');
    }

    public function usersDestroy($id)
    {
        $user = User::findOrFail($id);

        // Prevent deleting own account
        if ($user->id === auth()->id()) {
            return redirect()->route('admin.users.index')->with('error', 'Tidak dapat menghapus akun sendiri');
        }

        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'Admin berhasil dihapus');
    }
}
