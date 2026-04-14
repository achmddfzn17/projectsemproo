@extends('layouts.admin')

@section('title', 'Laporan Keuangan')

@section('content')
<!-- Header -->
<div class="mb-8 bg-gradient-to-r from-blue-600 to-blue-700 rounded-2xl p-8 text-white shadow-xl">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
        <div>
            <h1 class="text-4xl font-extrabold mb-2 flex items-center gap-2"><iconify-icon icon="mdi:chart-bar" class="text-2xl"></iconify-icon> Laporan Keuangan</h1>
            <p class="text-blue-100 text-lg">Karang Taruna "Generasi Emas"</p>
        </div>
        <div class="flex gap-2">
            <a href="{{ route('admin.keuangan.index') }}" class="bg-white/20 hover:bg-white/30 backdrop-blur-sm rounded-xl px-4 py-2 text-sm font-semibold transition-all">
                ← Dashboard
            </a>
            <a href="{{ route('admin.keuangan.kategori') }}" class="bg-white/20 hover:bg-white/30 backdrop-blur-sm rounded-xl px-4 py-2 text-sm font-semibold transition-all flex items-center gap-1">
                <iconify-icon icon="mdi:cog"></iconify-icon> Kelola Kategori
            </a>
        </div>
    </div>
</div>

<!-- Filter Form -->
<div class="bg-white rounded-2xl shadow-lg border border-blue-100 p-6 mb-6">
    <h2 class="text-lg font-bold text-gray-800 mb-4 flex items-center gap-2"><iconify-icon icon="mdi:magnify" class="text-blue-500"></iconify-icon> Filter Laporan</h2>
    <form action="{{ route('admin.keuangan.laporan') }}" method="GET" class="flex flex-wrap gap-4 items-end">
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Tanggal Awal</label>
            <input type="date" name="tanggal_awal" value="{{ $tanggalAwal }}"
                class="px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent">
        </div>
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Tanggal Akhir</label>
            <input type="date" name="tanggal_akhir" value="{{ $tanggalAkhir }}"
                class="px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent">
        </div>
        <div>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-xl transition-all">
                Tampilkan
            </button>
        </div>
        <div class="flex gap-2 ml-auto">
            <a href="{{ route('admin.keuangan.export-pdf', ['tanggal_awal' => $tanggalAwal, 'tanggal_akhir' => $tanggalAkhir]) }}" 
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-xl transition-all inline-flex items-center gap-2">
                <iconify-icon icon="mdi:file-download"></iconify-icon> Download PDF
            </a>
        </div>
    </form>
    <p class="text-sm text-gray-500 mt-2">
        Periode: {{ \Carbon\Carbon::parse($tanggalAwal)->format('d F Y') }} - {{ \Carbon\Carbon::parse($tanggalAkhir)->format('d F Y') }}
    </p>
</div>

<!-- Summary Cards -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
    <div class="bg-white rounded-2xl shadow-lg border border-blue-100 p-6">
        <div class="flex items-center justify-between mb-2">
            <span class="text-sm text-gray-600">Total Kas Masuk</span>
            <span class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11l5-5m0 0l5 5m-5-5v12"></path>
                </svg>
            </span>
        </div>
        <div class="text-2xl font-bold text-blue-600">Rp {{ number_format($totalMasuk, 0, ',', '.') }}</div>
        <p class="text-xs text-gray-500 mt-1">{{ $kasMasuk->count() }} transaksi</p>
    </div>

    <div class="bg-white rounded-2xl shadow-lg border border-red-100 p-6">
        <div class="flex items-center justify-between mb-2">
            <span class="text-sm text-gray-600">Total Kas Keluar</span>
            <span class="w-10 h-10 bg-red-100 rounded-lg flex items-center justify-center">
                <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 13l-5 5m0 0l-5-5m5 5V6"></path>
                </svg>
            </span>
        </div>
        <div class="text-2xl font-bold text-red-600">Rp {{ number_format($totalKeluar, 0, ',', '.') }}</div>
        <p class="text-xs text-gray-500 mt-1">{{ $kasKeluar->count() }} transaksi</p>
    </div>

    <div class="bg-white rounded-2xl shadow-lg border border-blue-100 p-6">
        <div class="flex items-center justify-between mb-2">
            <span class="text-sm text-gray-600">Saldo Periode Ini</span>
            <span class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                </svg>
            </span>
        </div>
        <div class="text-2xl font-bold text-blue-600">Rp {{ number_format($saldo, 0, ',', '.') }}</div>
        <p class="text-xs text-gray-500 mt-1">Pemasukan - Pengeluaran</p>
    </div>

    <div class="bg-white rounded-2xl shadow-lg border border-purple-100 p-6">
        <div class="flex items-center justify-between mb-2">
            <span class="text-sm text-gray-600">Saldo Bersih</span>
            <span class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center">
                <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                </svg>
            </span>
        </div>
        <div class="text-2xl font-bold {{ $saldo >= 0 ? 'text-purple-600' : 'text-red-600' }}">
            {{ $saldo >= 0 ? '' : '-' }}Rp {{ number_format(abs($saldo), 0, ',', '.') }}
        </div>
        <p class="text-xs text-gray-500 mt-1">{{ $saldo >= 0 ? 'Surplus' : 'Defisit' }}</p>
    </div>
</div>

<!-- Rekapitulasi -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
    <!-- Rekap Kas Masuk -->
    <div class="bg-white rounded-2xl shadow-lg border border-blue-100">
        <div class="p-6 border-b border-blue-100">
            <h2 class="text-xl font-bold text-gray-800 flex items-center gap-2"><iconify-icon icon="mdi:chart-line" class="text-green-500"></iconify-icon> Rekap Kas Masuk per Kategori</h2>
        </div>
        <div class="p-6">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-gray-100">
                        <th class="text-left py-3 text-sm font-semibold text-gray-700">Kategori</th>
                        <th class="text-center py-3 text-sm font-semibold text-gray-700">Jumlah</th>
                        <th class="text-right py-3 text-sm font-semibold text-gray-700">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($rekapMasuk as $item)
                    <tr class="border-b border-gray-50">
                        <td class="py-3">{{ $item['kategori'] }}</td>
                        <td class="py-3 text-center">{{ $item['total'] }}x</td>
                        <td class="py-3 text-right font-semibold text-blue-600">
                            Rp {{ number_format($item['jumlah'], 0, ',', '.') }}
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="py-4 text-center text-gray-500">Tidak ada data</td>
                    </tr>
                    @endforelse
                </tbody>
                <tfoot class="bg-blue-50">
                    <tr>
                        <td class="py-3 font-bold">TOTAL</td>
                        <td class="py-3 text-center"></td>
                        <td class="py-3 text-right font-bold text-blue-700">
                            Rp {{ number_format($totalMasuk, 0, ',', '.') }}
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <!-- Rekap Kas Keluar -->
    <div class="bg-white rounded-2xl shadow-lg border border-red-100">
        <div class="p-6 border-b border-red-100">
            <h2 class="text-xl font-bold text-gray-800 flex items-center gap-2"><iconify-icon icon="mdi:chart-line-variant" class="text-red-500"></iconify-icon> Rekap Kas Keluar per Kategori</h2>
        </div>
        <div class="p-6">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-gray-100">
                        <th class="text-left py-3 text-sm font-semibold text-gray-700">Kategori</th>
                        <th class="text-center py-3 text-sm font-semibold text-gray-700">Jumlah</th>
                        <th class="text-right py-3 text-sm font-semibold text-gray-700">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($rekapKeluar as $item)
                    <tr class="border-b border-gray-50">
                        <td class="py-3">{{ $item['kategori'] }}</td>
                        <td class="py-3 text-center">{{ $item['total'] }}x</td>
                        <td class="py-3 text-right font-semibold text-red-600">
                            Rp {{ number_format($item['jumlah'], 0, ',', '.') }}
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="py-4 text-center text-gray-500">Tidak ada data</td>
                    </tr>
                    @endforelse
                </tbody>
                <tfoot class="bg-red-50">
                    <tr>
                        <td class="py-3 font-bold">TOTAL</td>
                        <td class="py-3 text-center"></td>
                        <td class="py-3 text-right font-bold text-red-700">
                            Rp {{ number_format($totalKeluar, 0, ',', '.') }}
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

<!-- Detail Transaksi -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <!-- Detail Kas Masuk -->
    <div class="bg-white rounded-2xl shadow-lg border border-blue-100">
        <div class="p-6 border-b border-blue-100">
            <h2 class="text-xl font-bold text-gray-800 flex items-center gap-2"><iconify-icon icon="mdi:file-document" class="text-blue-500"></iconify-icon> Detail Kas Masuk</h2>
        </div>
        <div class="p-6 max-h-96 overflow-y-auto">
            @forelse($kasMasuk as $item)
            <div class="flex items-center justify-between py-3 border-b border-gray-50 last:border-0">
                <div>
                    <div class="font-semibold text-gray-800 text-sm">{{ Str::limit($item->keterangan, 35) }}</div>
                    <div class="text-xs text-gray-500">{{ $item->kategori->nama_kategori ?? '-' }} • {{ $item->tanggal->format('d/m/Y') }}</div>
                </div>
                <div class="text-right">
                    <div class="font-bold text-blue-600">+ Rp {{ number_format($item->jumlah, 0, ',', '.') }}</div>
                </div>
            </div>
            @empty
            <p class="text-center text-gray-500 py-8">Tidak ada transaksi masuk</p>
            @endforelse
        </div>
    </div>

    <!-- Detail Kas Keluar -->
    <div class="bg-white rounded-2xl shadow-lg border border-red-100">
        <div class="p-6 border-b border-red-100">
            <h2 class="text-xl font-bold text-gray-800 flex items-center gap-2"><iconify-icon icon="mdi:file-document" class="text-red-500"></iconify-icon> Detail Kas Keluar</h2>
        </div>
        <div class="p-6 max-h-96 overflow-y-auto">
            @forelse($kasKeluar as $item)
            <div class="flex items-center justify-between py-3 border-b border-gray-50 last:border-0">
                <div>
                    <div class="font-semibold text-gray-800 text-sm">{{ Str::limit($item->keterangan, 35) }}</div>
                    <div class="text-xs text-gray-500">{{ $item->kategori->nama_kategori ?? '-' }} • {{ $item->tanggal->format('d/m/Y') }}</div>
                </div>
                <div class="text-right">
                    <div class="font-bold text-red-600">- Rp {{ number_format($item->jumlah, 0, ',', '.') }}</div>
                </div>
            </div>
            @empty
            <p class="text-center text-gray-500 py-8">Tidak ada transaksi keluar</p>
            @endforelse
        </div>
    </div>
</div>
@endsection
