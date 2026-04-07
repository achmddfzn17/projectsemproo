<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    /**
     * Display the digital membership card for the logged-in anggota.
     */
    public function generateCard()
    {
        $anggota = auth('anggota')->user();
        
        if (!$anggota) {
            return redirect()->route('anggota.login')->withErrors('Please login first.');
        }

        // Generate QR code encoding the UUID
        $qrCode = QrCode::size(200)
            ->style('round')
            ->color(0, 0, 0)
            ->backgroundColor(255, 255, 255)
            ->generate($anggota->uuid);

        return view('member.digital-card', compact('anggota', 'qrCode'));
    }

    /**
     * Leaderboard showing top 10 most active members based on points.
     */
    public function leaderboard()
    {
        $topMembers = Anggota::where('status', 'aktif')
            ->orderByDesc('points')
            ->take(10)
            ->get();

        return view('member.leaderboard', compact('topMembers'));
    }

    /**
     * Admins scan attendance QR code to award points.
     */
    public function scanAttendance(Request $request)
    {
        // Only allow admins to scan and award points
        // Assuming admin uses default 'web' guard and is logged in
        if (!\Illuminate\Support\Facades\Auth::check()) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized. Only admins can scan QR.'
            ], 403);
        }

        $request->validate([
            'uuid' => 'required|string|exists:anggota,uuid'
        ]);

        $anggota = Anggota::where('uuid', $request->uuid)->first();

        // Add 50 points
        $anggota->points += 50;
        $anggota->save();

        return response()->json([
            'success' => true,
            'message' => "Successfully recorded attendance. Awarded 50 points to {$anggota->nama}.",
            'data' => [
                'nama' => $anggota->nama,
                'new_points' => $anggota->points,
                'badge' => $anggota->badge
            ]
        ]);
    }
}
