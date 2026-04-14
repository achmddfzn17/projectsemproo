<?php

namespace App\Http\Controllers;

use App\Models\KategoriTransaksi;
use App\Models\Transaksi;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class KeuanganController extends Controller
{
    /**
     * Display dashboard keuangan (ringkasan)
     */
    public function index()
    {
        $totalMasuk = Transaksi::masuk()->sum('jumlah');
        $totalKeluar = Transaksi::keluar()->sum('jumlah');
        $saldo = $totalMasuk - $totalKeluar;

        $transaksiTerbaru = Transaksi::with(['kategori', 'user'])
            ->latest()
            ->take(10)
            ->get();

        $kasMasukBulanIni = Transaksi::masuk()
            ->whereMonth('tanggal', now()->month)
            ->whereYear('tanggal', now()->year)
            ->sum('jumlah');

        $kasKeluarBulanIni = Transaksi::keluar()
            ->whereMonth('tanggal', now()->month)
            ->whereYear('tanggal', now()->year)
            ->sum('jumlah');

        // Grafik kas masuk per bulan (12 bulan terakhir)
        $bulanLabels = [];
        $kasMasukPerBulan = [];
        $kasKeluarPerBulan = [];

        for ($i = 11; $i >= 0; $i--) {
            $date = now()->subMonths($i);
            $bulanLabels[] = $date->format('M');
            $kasMasukPerBulan[] = Transaksi::masuk()
                ->whereMonth('tanggal', $date->month)
                ->whereYear('tanggal', $date->year)
                ->sum('jumlah');
            $kasKeluarPerBulan[] = Transaksi::keluar()
                ->whereMonth('tanggal', $date->month)
                ->whereYear('tanggal', $date->year)
                ->sum('jumlah');
        }

        return view('admin.keuangan.index', compact(
            'totalMasuk',
            'totalKeluar',
            'saldo',
            'transaksiTerbaru',
            'kasMasukBulanIni',
            'kasKeluarBulanIni',
            'bulanLabels',
            'kasMasukPerBulan',
            'kasKeluarPerBulan'
        ));
    }

    /**
     * Halaman Kas Masuk
     */
    public function kasMasuk(Request $request)
    {
        $query = Transaksi::masuk()->with(['kategori', 'user']);

        if ($request->filled('search')) {
            $query->where('keterangan', 'like', '%'.$request->search.'%');
        }

        if ($request->filled('bulan')) {
            $query->whereMonth('tanggal', $request->bulan);
        }

        if ($request->filled('tahun')) {
            $query->whereYear('tanggal', $request->tahun);
        }

        $transaksi = $query->latest('tanggal')->paginate(15);
        $totalPerHalaman = $query->sum('jumlah');

        $kategoris = KategoriTransaksi::masuk()->get();

        return view('admin.keuangan.masuk', compact(
            'transaksi',
            'kategoris',
            'totalPerHalaman'
        ));
    }

    /**
     * Halaman Kas Keluar
     */
    public function kasKeluar(Request $request)
    {
        $query = Transaksi::keluar()->with(['kategori', 'user']);

        if ($request->filled('search')) {
            $query->where('keterangan', 'like', '%'.$request->search.'%');
        }

        if ($request->filled('bulan')) {
            $query->whereMonth('tanggal', $request->bulan);
        }

        if ($request->filled('tahun')) {
            $query->whereYear('tanggal', $request->tahun);
        }

        $transaksi = $query->latest('tanggal')->paginate(15);

        $kategoris = KategoriTransaksi::keluar()->get();

        return view('admin.keuangan.keluar', compact(
            'transaksi',
            'kategoris'
        ));
    }

    /**
     * Simpan transaksi kas masuk
     */
    public function storeKasMasuk(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'kategori_id' => 'required|exists:kategori_transaksi,id',
            'keterangan' => 'required|string|max:255',
            'jumlah' => 'required|numeric|min:1',
            'sumber_dana' => 'nullable|string|max:255',
            'bukti_transaksi' => 'nullable|image|max:2048',
        ]);

        // Validasi kategori harus masuk
        $kategori = KategoriTransaksi::find($request->kategori_id);
        if ($kategori->jenis !== 'masuk') {
            return back()->withErrors(['kategori_id' => 'Kategori tidak sesuai dengan jenis transaksi']);
        }

        if ($request->hasFile('bukti_transaksi')) {
            $validated['bukti_transaksi'] = $request->file('bukti_transaksi')->store('bukti-transaksi', 'public');
        }

        $validated['jenis'] = 'masuk';
        $validated['user_id'] = auth()->id();

        Transaksi::create($validated);

        return redirect()->route('admin.keuangan.masuk')->with('success', 'Transaksi kas masuk berhasil disimpan');
    }

    /**
     * Simpan transaksi kas keluar
     */
    public function storeKasKeluar(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'kategori_id' => 'required|exists:kategori_transaksi,id',
            'keterangan' => 'required|string|max:255',
            'jumlah' => 'required|numeric|min:1',
            'penerima' => 'nullable|string|max:255',
            'bukti_transaksi' => 'nullable|image|max:2048',
        ]);

        // Validasi kategori harus keluar
        $kategori = KategoriTransaksi::find($request->kategori_id);
        if ($kategori->jenis !== 'keluar') {
            return back()->withErrors(['kategori_id' => 'Kategori tidak sesuai dengan jenis transaksi']);
        }

        if ($request->hasFile('bukti_transaksi')) {
            $validated['bukti_transaksi'] = $request->file('bukti_transaksi')->store('bukti-transaksi', 'public');
        }

        $validated['jenis'] = 'keluar';
        $validated['user_id'] = auth()->id();

        Transaksi::create($validated);

        return redirect()->route('admin.keuangan.keluar')->with('success', 'Transaksi kas keluar berhasil disimpan');
    }

    /**
     * Hapus transaksi
     */
    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);

        if ($transaksi->bukti_transaksi) {
            \Storage::disk('public')->delete($transaksi->bukti_transaksi);
        }

        $transaksi->delete();

        return back()->with('success', 'Transaksi berhasil dihapus');
    }

    /**
     * Halaman Laporan Keuangan
     */
    public function laporan(Request $request)
    {
        $tanggalAwal = $request->filled('tanggal_awal') ? $request->tanggal_awal : now()->startOfMonth()->format('Y-m-d');
        $tanggalAkhir = $request->filled('tanggal_akhir') ? $request->tanggal_akhir : now()->endOfMonth()->format('Y-m-d');

        $kasMasuk = Transaksi::masuk()
            ->whereBetween('tanggal', [$tanggalAwal, $tanggalAkhir])
            ->with('kategori')
            ->get();

        $kasKeluar = Transaksi::keluar()
            ->whereBetween('tanggal', [$tanggalAwal, $tanggalAkhir])
            ->with('kategori')
            ->get();

        $totalMasuk = $kasMasuk->sum('jumlah');
        $totalKeluar = $kasKeluar->sum('jumlah');
        $saldo = $totalMasuk - $totalKeluar;

        // Rekap per kategori
        $rekapMasuk = $kasMasuk->groupBy('kategori_id')->map(function ($items, $key) {
            return [
                'kategori' => $items->first()->kategori->nama_kategori ?? 'Lainnya',
                'jumlah' => $items->sum('jumlah'),
                'total' => $items->count(),
            ];
        })->values();

        $rekapKeluar = $kasKeluar->groupBy('kategori_id')->map(function ($items, $key) {
            return [
                'kategori' => $items->first()->kategori->nama_kategori ?? 'Lainnya',
                'jumlah' => $items->sum('jumlah'),
                'total' => $items->count(),
            ];
        })->values();

        return view('admin.keuangan.laporan', compact(
            'kasMasuk',
            'kasKeluar',
            'totalMasuk',
            'totalKeluar',
            'saldo',
            'rekapMasuk',
            'rekapKeluar',
            'tanggalAwal',
            'tanggalAkhir'
        ));
    }

    /**
     * Export PDF Laporan Keuangan
     */
    public function exportPdf(Request $request)
    {
        $tanggalAwal = $request->filled('tanggal_awal') ? $request->tanggal_awal : now()->startOfMonth()->format('Y-m-d');
        $tanggalAkhir = $request->filled('tanggal_akhir') ? $request->tanggal_akhir : now()->endOfMonth()->format('Y-m-d');

        $kasMasuk = Transaksi::masuk()
            ->whereBetween('tanggal', [$tanggalAwal, $tanggalAkhir])
            ->with(['kategori', 'user'])
            ->get();

        $kasKeluar = Transaksi::keluar()
            ->whereBetween('tanggal', [$tanggalAwal, $tanggalAkhir])
            ->with(['kategori', 'user'])
            ->get();

        $totalMasuk = $kasMasuk->sum('jumlah');
        $totalKeluar = $kasKeluar->sum('jumlah');
        $saldo = $totalMasuk - $totalKeluar;

        $pdf = Pdf::loadView('admin.keuangan.laporan-pdf', [
            'kasMasuk' => $kasMasuk,
            'kasKeluar' => $kasKeluar,
            'totalMasuk' => $totalMasuk,
            'totalKeluar' => $totalKeluar,
            'saldo' => $saldo,
            'tanggalAwal' => $tanggalAwal,
            'tanggalAkhir' => $tanggalAkhir,
        ]);

        $pdf->setPaper('A4', 'portrait');

        $filename = 'laporan_keuangan_'.date('Y-m-d', strtotime($tanggalAwal)).'_'.date('Y-m-d', strtotime($tanggalAkhir)).'.pdf';

        return $pdf->download($filename);
    }

    /**
     * Export Excel Laporan Keuangan
     */
    public function exportExcel(Request $request)
    {
        $tanggalAwal = $request->filled('tanggal_awal') ? $request->tanggal_awal : now()->startOfMonth()->format('Y-m-d');
        $tanggalAkhir = $request->filled('tanggal_akhir') ? $request->tanggal_akhir : now()->endOfMonth()->format('Y-m-d');

        $kasMasuk = Transaksi::masuk()
            ->whereBetween('tanggal', [$tanggalAwal, $tanggalAkhir])
            ->with('kategori')
            ->get();

        $kasKeluar = Transaksi::keluar()
            ->whereBetween('tanggal', [$tanggalAwal, $tanggalAkhir])
            ->with('kategori')
            ->get();

        return view('admin.keuangan.laporan-excel', [
            'kasMasuk' => $kasMasuk,
            'kasKeluar' => $kasKeluar,
            'tanggalAwal' => $tanggalAwal,
            'tanggalAkhir' => $tanggalAkhir,
        ]);
    }

    /**
     * Manajemen Kategori
     */
    public function kategoriIndex()
    {
        $kategoris = KategoriTransaksi::orderBy('jenis')->orderBy('nama_kategori')->get();

        return view('admin.keuangan.kategori', compact('kategoris'));
    }

    public function kategoriStore(Request $request)
    {
        $validated = $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'jenis' => 'required|in:masuk,keluar',
            'deskripsi' => 'nullable|string',
        ]);

        KategoriTransaksi::create($validated);

        return back()->with('success', 'Kategori berhasil ditambahkan');
    }

    public function kategoriUpdate(Request $request, $id)
    {
        $kategori = KategoriTransaksi::findOrFail($id);

        $validated = $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        $kategori->update($validated);

        return back()->with('success', 'Kategori berhasil diupdate');
    }

    public function kategoriDestroy($id)
    {
        $kategori = KategoriTransaksi::findOrFail($id);

        // Cek apakah kategori masih digunakan
        if ($kategori->transaksis()->count() > 0) {
            return back()->withErrors(['error' => 'Kategori tidak dapat dihapus karena sudah digunakan dalam transaksi']);
        }

        $kategori->delete();

        return back()->with('success', 'Kategori berhasil dihapus');
    }
}
