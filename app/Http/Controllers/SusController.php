<?php

namespace App\Http\Controllers;

use App\Models\HasilSus;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class SusController extends Controller
{
    /**
     * Menampilkan halaman kuisioner SUS
     */
    public function index()
    {
        return view('admin.sus.index');
    }

    /**
     * Menyimpan hasil kuisioner SUS
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email',
            'usia' => 'required|integer|min:17|max:100',
            'pendidikan' => 'required|string',
            'pengalaman_komputer' => 'required|string',
            'q1' => 'required|integer|min:1|max:5',
            'q2' => 'required|integer|min:1|max:5',
            'q3' => 'required|integer|min:1|max:5',
            'q4' => 'required|integer|min:1|max:5',
            'q5' => 'required|integer|min:1|max:5',
            'q6' => 'required|integer|min:1|max:5',
            'q7' => 'required|integer|min:1|max:5',
            'q8' => 'required|integer|min:1|max:5',
            'q9' => 'required|integer|min:1|max:5',
            'q10' => 'required|integer|min:1|max:5',
        ]);

        // Hitung skor SUS
        // Untuk pertanyaan ganjil (1,3,5,7,9): skor = jawaban - 1
        // Untuk pertanyaan genap (2,4,6,8,10): skor = 5 - jawaban
        $scores = [
            ($validated['q1'] - 1),
            (5 - $validated['q2']),
            ($validated['q3'] - 1),
            (5 - $validated['q4']),
            ($validated['q5'] - 1),
            (5 - $validated['q6']),
            ($validated['q7'] - 1),
            (5 - $validated['q8']),
            ($validated['q9'] - 1),
            (5 - $validated['q10']),
        ];

        $totalScore = array_sum($scores);
        $susScore = $totalScore * 2.5;

        // Simpan hasil
        $hasil = new HasilSus;
        $hasil->nama = $validated['nama'];
        $hasil->email = $validated['email'];
        $hasil->usia = $validated['usia'];
        $hasil->pendidikan = $validated['pendidikan'];
        $hasil->pengalaman_komputer = $validated['pengalaman_komputer'];
        $hasil->q1 = $validated['q1'];
        $hasil->q2 = $validated['q2'];
        $hasil->q3 = $validated['q3'];
        $hasil->q4 = $validated['q4'];
        $hasil->q5 = $validated['q5'];
        $hasil->q6 = $validated['q6'];
        $hasil->q7 = $validated['q7'];
        $hasil->q8 = $validated['q8'];
        $hasil->q9 = $validated['q9'];
        $hasil->q10 = $validated['q10'];
        $hasil->total_score = $totalScore;
        $hasil->sus_score = $susScore;
        $hasil->save();

        // Redirect ke halaman hasil
        return redirect()->route('admin.sus.hasil', $hasil->id)
            ->with('success', 'Terima kasih! Kuisioner berhasil disubmit.');
    }

    /**
     * Menampilkan hasil SUS individual
     */
    public function hasil($id)
    {
        $hasil = HasilSus::findOrFail($id);
        $kategori = $this->getKategori($hasil->sus_score);

        return view('admin.sus.hasil', compact('hasil', 'kategori'));
    }

    /**
     * Halaman daftar hasil SUS (admin)
     */
    public function daftar()
    {
        $hasilSus = HasilSus::latest()->paginate(15);

        // Statistik
        $totalResponden = HasilSus::count();
        $rataRataSkor = $totalResponden > 0 ? number_format(HasilSus::avg('sus_score'), 2) : 0;

        return view('admin.sus.daftar', compact('hasilSus', 'totalResponden', 'rataRataSkor'));
    }

    /**
     * Hapus hasil SUS
     */
    public function destroy($id)
    {
        $hasil = HasilSus::findOrFail($id);
        $hasil->delete();

        return redirect()->route('admin.sus.daftar')->with('success', 'Data berhasil dihapus');
    }

    /**
     * Export hasil SUS ke PDF
     */
    public function exportPdf()
    {
        $hasilSus = HasilSus::all();
        $totalResponden = $hasilSus->count();
        $rataRataSkor = $totalResponden > 0 ? number_format($hasilSus->avg('sus_score'), 2) : 0;

        // Kategori breakdown
        $kategoriCount = [
            'A - Excellent' => $hasilSus->whereBetween('sus_score', [80.3, 100])->count(),
            'B - Good' => $hasilSus->whereBetween('sus_score', [68, 80.29])->count(),
            'C - Average' => $hasilSus->where('sus_score', 68)->count(),
            'D - Poor' => $hasilSus->whereBetween('sus_score', [51, 67.99])->count(),
            'F - Worst' => $hasilSus->where('sus_score', '<', 51)->count(),
        ];

        $pdf = Pdf::loadView('admin.sus.export-pdf', compact('hasilSus', 'totalResponden', 'rataRataSkor', 'kategoriCount'));
        $pdf->setPaper('A4', 'landscape');

        return $pdf->download('hasil_sus_'.date('Y-m-d').'.pdf');
    }

    /**
     * Menampilkan kategori berdasarkan skor SUS
     */
    private function getKategori($score)
    {
        if ($score >= 80.3) {
            return [
                'grade' => 'A',
                'label' => 'Excellent',
                'color' => 'success',
                'description' => 'Sistem sangat mudah digunakan dan memenuhi standar usability.',
            ];
        } elseif ($score >= 68) {
            return [
                'grade' => 'B',
                'label' => 'Good',
                'color' => 'info',
                'description' => 'Sistem mudah digunakan dan diterima pengguna.',
            ];
        } elseif ($score >= 51) {
            return [
                'grade' => 'D',
                'label' => 'Poor',
                'color' => 'warning',
                'description' => 'Sistem masih perlu peningkatan dalam hal usability.',
            ];
        } else {
            return [
                'grade' => 'F',
                'label' => 'Worst',
                'color' => 'danger',
                'description' => 'Sistem sulit digunakan dan perlu perbaikan mendasar.',
            ];
        }
    }
}
