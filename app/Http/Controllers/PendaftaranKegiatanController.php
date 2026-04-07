<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\PendaftaranKegiatan;
use Illuminate\Http\Request;

class PendaftaranKegiatanController extends Controller
{
    // Halaman Form Pendaftaran (Public)
    public function create($kegiatanId)
    {
        $kegiatan = Kegiatan::findOrFail($kegiatanId);
        
        // Cek apakah pendaftaran masih dibuka
        if (!$kegiatan->is_pendaftaran_open) {
            return redirect()->route('kegiatan.detail', $kegiatanId)
                ->with('error', 'Pendaftaran untuk kegiatan ini sudah ditutup');
        }
        
        // Cek apakah kuota sudah penuh
        if ($kegiatan->isFull()) {
            return redirect()->route('kegiatan.detail', $kegiatanId)
                ->with('error', 'Kuota peserta sudah penuh');
        }
        
        return view('kegiatan.daftar', compact('kegiatan'));
    }
    
    // Proses Pendaftaran
    public function store(Request $request, $kegiatanId)
    {
        $kegiatan = Kegiatan::findOrFail($kegiatanId);
        
        // Validasi
        if (!$kegiatan->is_pendaftaran_open) {
            return back()->with('error', 'Pendaftaran sudah ditutup');
        }
        
        if ($kegiatan->isFull()) {
            return back()->with('error', 'Kuota peserta sudah penuh');
        }
        
        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email',
            'no_hp' => 'required|string',
            'alamat' => 'nullable|string',
            'instansi' => 'nullable|string',
            'alasan' => 'nullable|string',
        ]);
        
        // Cek apakah email sudah terdaftar untuk kegiatan ini
        $existing = PendaftaranKegiatan::where('kegiatan_id', $kegiatanId)
            ->where('email', $validated['email'])
            ->first();
            
        if ($existing) {
            return back()->with('error', 'Email Anda sudah terdaftar untuk kegiatan ini');
        }
        
        $validated['kegiatan_id'] = $kegiatanId;
        $validated['status'] = 'pending';
        
        // Hitung nomor urut
        $lastNumber = PendaftaranKegiatan::where('kegiatan_id', $kegiatanId)->max('nomor_urut') ?? 0;
        $validated['nomor_urut'] = $lastNumber + 1;
        
        $pendaftaran = PendaftaranKegiatan::create($validated);
        
        // Generate QR Token
        $pendaftaran->generateQRToken();
        
        return redirect()->route('pendaftaran.success', $pendaftaran->id)
            ->with('success', 'Pendaftaran berhasil! Silakan cek email untuk konfirmasi.');
    }
    
    // Halaman Success dengan QR Code
    public function success($id)
    {
        $pendaftaran = PendaftaranKegiatan::with('kegiatan')->findOrFail($id);
        return view('kegiatan.pendaftaran-success', compact('pendaftaran'));
    }
    
    // Admin: Lihat Daftar Pendaftaran
    public function index($kegiatanId)
    {
        $kegiatan = Kegiatan::findOrFail($kegiatanId);
        $pendaftaran = PendaftaranKegiatan::where('kegiatan_id', $kegiatanId)
            ->latest()
            ->paginate(20);
            
        return view('admin.kegiatan.pendaftaran', compact('kegiatan', 'pendaftaran'));
    }
    
    // Admin: Approve Pendaftaran
    public function approve($id)
    {
        $pendaftaran = PendaftaranKegiatan::findOrFail($id);
        $kegiatan = $pendaftaran->kegiatan;
        
        // Cek kuota
        if ($kegiatan->isFull()) {
            return back()->with('error', 'Kuota peserta sudah penuh');
        }
        
        $pendaftaran->status = 'approved';
        $pendaftaran->save();
        
        // TODO: Send email notification
        
        return back()->with('success', 'Pendaftaran berhasil disetujui');
    }
    
    // Admin: Reject Pendaftaran
    public function reject(Request $request, $id)
    {
        $pendaftaran = PendaftaranKegiatan::findOrFail($id);
        
        $pendaftaran->status = 'rejected';
        $pendaftaran->catatan_admin = $request->catatan_admin;
        $pendaftaran->save();
        
        // TODO: Send email notification
        
        return back()->with('success', 'Pendaftaran ditolak');
    }
    
    // Admin: Check-in Manual
    public function checkIn($id)
    {
        $pendaftaran = PendaftaranKegiatan::findOrFail($id);
        
        if ($pendaftaran->status !== 'approved') {
            return back()->with('error', 'Hanya pendaftaran yang disetujui yang bisa check-in');
        }
        
        $pendaftaran->checkIn();
        
        return back()->with('success', 'Check-in berhasil');
    }
    
    // Scan QR untuk Check-in
    public function scanQR()
    {
        return view('admin.kegiatan.scan-qr');
    }
    
    // Proses Scan QR
    public function processQR(Request $request)
    {
        $request->validate([
            'qr_token' => 'required|string',
        ]);
        
        $pendaftaran = PendaftaranKegiatan::where('qr_token', $request->qr_token)
            ->with('kegiatan')
            ->first();
            
        if (!$pendaftaran) {
            return response()->json([
                'success' => false,
                'message' => 'QR Code tidak valid'
            ], 404);
        }
        
        if ($pendaftaran->status !== 'approved') {
            return response()->json([
                'success' => false,
                'message' => 'Pendaftaran belum disetujui'
            ], 400);
        }
        
        if ($pendaftaran->hadir) {
            return response()->json([
                'success' => false,
                'message' => 'Sudah melakukan check-in pada ' . $pendaftaran->waktu_hadir->format('d M Y H:i'),
                'data' => $pendaftaran
            ], 400);
        }
        
        $pendaftaran->checkIn();
        
        return response()->json([
            'success' => true,
            'message' => 'Check-in berhasil!',
            'data' => $pendaftaran
        ]);
    }
    
    // Export Absensi
    public function exportAbsensi($kegiatanId)
    {
        $kegiatan = Kegiatan::findOrFail($kegiatanId);
        $pendaftaran = PendaftaranKegiatan::where('kegiatan_id', $kegiatanId)
            ->where('status', 'approved')
            ->orderBy('nomor_urut')
            ->get();
            
        return view('admin.kegiatan.export-absensi', compact('kegiatan', 'pendaftaran'));
    }
}
