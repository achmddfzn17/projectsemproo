<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AnggotaDashboardController extends Controller
{
    // Halaman Login
    public function loginPage()
    {
        if (auth()->guard('anggota')->check()) {
            return redirect()->route('anggota.dashboard');
        }
        return view('anggota.login');
    }

    // Proses Login
    public function login(Request $request)
    {
        $request->validate([
            'login' => 'required|string',
            'password' => 'required',
        ]);

        $loginType = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        $credentials = [
            $loginType => $request->login,
            'password' => $request->password
        ];

        if (auth()->guard('anggota')->attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();
            return redirect()->route('anggota.dashboard')->with('success', 'Selamat datang!');
        }

        return back()->withErrors([
            'login' => 'Email/Username atau password salah.',
        ])->onlyInput('login');
    }

    // Dashboard Anggota
    public function dashboard()
    {
        $anggota = auth()->guard('anggota')->user();

        // Kegiatan
        $kegiatanTerbaru = Kegiatan::latest()->take(5)->get();
        $totalKegiatan = Kegiatan::count();
        $kegiatanBerlangsung = Kegiatan::where('status', 'berlangsung')->count();

        // Statistik Anggota
        $totalAnggota = \App\Models\Anggota::where('status', 'aktif')->count();
        $lamaBergabung = (int) $anggota->created_at->diffInDays(now());

        // Format lama bergabung yang lebih readable
        $lamaBergabungText = $this->formatDuration($anggota->created_at);

        // Achievement/Badge
        $badges = $this->calculateBadges($anggota);

        // Activity Timeline (5 terakhir)
        $activities = $this->getRecentActivities($anggota);

        return view('anggota.dashboard', compact(
            'anggota',
            'kegiatanTerbaru',
            'totalKegiatan',
            'kegiatanBerlangsung',
            'totalAnggota',
            'lamaBergabung',
            'lamaBergabungText',
            'badges',
            'activities'
        ));
    }

    // Format Duration
    private function formatDuration($date)
    {
        $days = (int) $date->diffInDays(now());

        if ($days == 0) {
            return 'Hari Ini';
        } elseif ($days == 1) {
            return '1 Hari';
        } elseif ($days < 7) {
            return $days . ' Hari';
        } elseif ($days < 30) {
            $weeks = floor($days / 7);
            return $weeks . ' Minggu';
        } elseif ($days < 365) {
            $months = floor($days / 30);
            return $months . ' Bulan';
        } else {
            $years = floor($days / 365);
            return $years . ' Tahun';
        }
    }

    // Calculate Badges/Achievements
    private function calculateBadges($anggota)
    {
        $badges = [];

        // Badge: Member Baru
        if ($anggota->created_at->diffInDays(now()) < 30) {
            $badges[] = [
                'name' => 'Member Baru',
                'icon' => '🌟',
                'color' => 'blue',
                'description' => 'Bergabung kurang dari 30 hari'
            ];
        }

        // Badge: Member Aktif
        if ($anggota->status == 'aktif') {
            $badges[] = [
                'name' => 'Member Aktif',
                'icon' => '✅',
                'color' => 'green',
                'description' => 'Status keanggotaan aktif'
            ];
        }

        // Badge: Profile Lengkap
        if ($anggota->email && $anggota->no_hp && $anggota->alamat) {
            $badges[] = [
                'name' => 'Profile Lengkap',
                'icon' => '📋',
                'color' => 'purple',
                'description' => 'Semua data profile terisi'
            ];
        }

        // Badge: Veteran (lebih dari 1 tahun)
        if ($anggota->created_at->diffInYears(now()) >= 1) {
            $badges[] = [
                'name' => 'Veteran',
                'icon' => '🏆',
                'color' => 'yellow',
                'description' => 'Bergabung lebih dari 1 tahun'
            ];
        }

        return $badges;
    }

    // Get Recent Activities
    private function getRecentActivities($anggota)
    {
        $activities = [];

        // Activity: Bergabung
        $activities[] = [
            'icon' => '🎉',
            'title' => 'Bergabung dengan Karang Taruna',
            'description' => 'Selamat datang di keluarga besar kami!',
            'time' => $anggota->created_at,
            'color' => 'blue'
        ];

        // Activity: Update Profile (jika ada updated_at berbeda dari created_at)
        if ($anggota->updated_at->gt($anggota->created_at)) {
            $activities[] = [
                'icon' => '✏️',
                'title' => 'Memperbarui Profile',
                'description' => 'Data profile telah diperbarui',
                'time' => $anggota->updated_at,
                'color' => 'green'
            ];
        }

        // Sort by time descending
        usort($activities, function ($a, $b) {
            return $b['time']->timestamp - $a['time']->timestamp;
        });

        return array_slice($activities, 0, 5);
    }

    // Generate QR Code Kartu Anggota
    public function generateQRCard()
    {
        $anggota = auth()->guard('anggota')->user();

        // Data untuk QR Code
        $qrData = json_encode([
            'id' => $anggota->id,
            'nama' => $anggota->nama,
            'nik' => $anggota->nik,
            'email' => $anggota->email,
            'status' => $anggota->status,
        ]);

        return view('anggota.qr-card', compact('anggota', 'qrData'));
    }

    // Export Profile to PDF
    public function exportProfile()
    {
        $anggota = auth()->guard('anggota')->user();

        // Simple HTML to PDF conversion
        $html = view('anggota.profile-pdf', compact('anggota'))->render();

        $filename = 'profile_' . $anggota->nik . '_' . date('Y-m-d') . '.html';

        return response($html)
            ->header('Content-Type', 'text/html')
            ->header('Content-Disposition', 'attachment; filename="' . $filename . '"');
    }

    // Profile
    public function profile()
    {
        $anggota = auth()->guard('anggota')->user();
        return view('anggota.profile', compact('anggota'));
    }

    // Update Profile
    public function updateProfile(Request $request)
    {
        $anggota = auth()->guard('anggota')->user();

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:anggota,email,' . $anggota->id,
            'no_hp' => 'required|string',
            'alamat' => 'required|string',
            'pendidikan_terakhir' => 'required|string',
            'pekerjaan' => 'required|string',
            'foto_profil' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('foto_profil')) {
            if ($anggota->foto_profil) {
                \Storage::disk('public')->delete($anggota->foto_profil);
            }
            $validated['foto_profil'] = $request->file('foto_profil')->store('profil', 'public');
        }

        $anggota->update($validated);

        return back()->with('success', 'Profile berhasil diupdate!');
    }

    // Update Password
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $anggota = auth()->guard('anggota')->user();

        if (!Hash::check($request->current_password, $anggota->password)) {
            return back()->withErrors(['current_password' => 'Password lama tidak sesuai']);
        }

        $anggota->update([
            'password' => Hash::make($request->password)
        ]);

        return back()->with('success', 'Password berhasil diubah!');
    }

    // Riwayat Kegiatan
    public function riwayatKegiatan()
    {
        $anggota = auth()->guard('anggota')->user();

        // Ambil riwayat pendaftaran dari model PendaftaranKegiatan yang berelasi dengan email anggota
        $riwayat = \App\Models\PendaftaranKegiatan::with('kegiatan')
            ->where('email', $anggota->email)
            ->latest()
            ->get();

        return view('anggota.riwayat', compact('riwayat'));
    }

    // Logout
    public function logout(Request $request)
    {
        auth()->guard('anggota')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home')->with('success', 'Berhasil logout');
    }
}
