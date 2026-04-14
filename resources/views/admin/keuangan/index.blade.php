@extends('layouts.admin')

@section('title', 'Manajemen Keuangan')

@section('content')
<!-- Header -->
<div class="mb-8 bg-gradient-to-r from-blue-600 to-blue-700 rounded-2xl p-8 text-white shadow-xl">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
        <div>
            <h1 class="text-4xl font-extrabold mb-2">💰 Manajemen Keuangan</h1>
            <p class="text-blue-100 text-lg">Karang Taruna "Generasi Emas"</p>
            <p class="text-blue-200 text-sm mt-1">{{ now()->isoFormat('dddd, D MMMM Y') }}</p>
        </div>
        <div class="flex gap-2">
            <a href="{{ route('admin.keuangan.masuk') }}" class="bg-white/20 hover:bg-white/30 backdrop-blur-sm rounded-xl px-4 py-2 text-sm font-semibold transition-all">
                + Kas Masuk
            </a>
            <a href="{{ route('admin.keuangan.keluar') }}" class="bg-white/20 hover:bg-white/30 backdrop-blur-sm rounded-xl px-4 py-2 text-sm font-semibold transition-all">
                + Kas Keluar
            </a>
            <a href="{{ route('admin.keuangan.laporan') }}" class="bg-white text-blue-700 hover:bg-blue-50 rounded-xl px-4 py-2 text-sm font-semibold transition-all">
                📊 Laporan
            </a>
        </div>
    </div>
</div>

<!-- Summary Cards -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
    <!-- Total Kas Masuk -->
    <div class="bg-white rounded-2xl shadow-lg p-6 border border-blue-200">
        <div class="flex items-center justify-between mb-4">
            <div class="w-14 h-14 bg-gradient-to-br from-blue-400 to-blue-500 rounded-xl flex items-center justify-center shadow-lg">
                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
        </div>
        <div class="text-3xl font-extrabold text-blue-600 mb-1">Rp {{ number_format($totalMasuk, 0, ',', '.') }}</div>
        <div class="text-sm text-gray-600">Total Kas Masuk</div>
    </div>

    <!-- Total Kas Keluar -->
    <div class="bg-white rounded-2xl shadow-lg p-6 border border-red-100">
        <div class="flex items-center justify-between mb-4">
            <div class="w-14 h-14 bg-gradient-to-br from-red-400 to-red-500 rounded-xl flex items-center justify-center shadow-lg">
                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
            </div>
        </div>
        <div class="text-3xl font-extrabold text-red-600 mb-1">Rp {{ number_format($totalKeluar, 0, ',', '.') }}</div>
        <div class="text-sm text-gray-600">Total Kas Keluar</div>
    </div>

    <!-- Saldo -->
    <div class="bg-white rounded-2xl shadow-lg p-6 border border-blue-100">
        <div class="flex items-center justify-between mb-4">
            <div class="w-14 h-14 bg-gradient-to-br from-blue-400 to-blue-500 rounded-xl flex items-center justify-center shadow-lg">
                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                </svg>
            </div>
        </div>
        <div class="text-3xl font-extrabold text-blue-600 mb-1">Rp {{ number_format($saldo, 0, ',', '.') }}</div>
        <div class="text-sm text-gray-600">Saldo Kas</div>
    </div>

    <!-- Bulan Ini -->
    <div class="bg-white rounded-2xl shadow-lg p-6 border border-purple-100">
        <div class="flex items-center justify-between mb-4">
            <div class="w-14 h-14 bg-gradient-to-br from-purple-400 to-purple-500 rounded-xl flex items-center justify-center shadow-lg">
                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
            </div>
        </div>
        <div class="text-lg font-bold text-purple-600 mb-1">
            <span class="text-blue-600">+{{ number_format($kasMasukBulanIni, 0, ',', '.') }}</span> /
            <span class="text-red-500">{{ number_format($kasKeluarBulanIni, 0, ',', '.') }}</span>
        </div>
        <div class="text-sm text-gray-600">Bulan {{ now()->format('F Y') }}</div>
    </div>
</div>

<!-- Grafik dan Transaksi Terbaru -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Grafik -->
    <div class="lg:col-span-2 bg-white rounded-2xl shadow-lg border border-blue-100">
        <div class="p-6 border-b border-blue-100">
            <h2 class="text-xl font-bold text-gray-800">📈 Grafik Arus Kas (12 Bulan Terakhir)</h2>
        </div>
        <div class="p-6">
            <canvas id="keuanganChart" height="200"></canvas>
        </div>
    </div>

    <!-- Transaksi Terbaru -->
    <div class="bg-white rounded-2xl shadow-lg border border-blue-100">
        <div class="p-6 border-b border-blue-100">
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-bold text-gray-800">🕐 Transaksi Terbaru</h2>
                <a href="{{ route('admin.keuangan.masuk') }}" class="text-sm text-blue-600 hover:text-blue-700 font-semibold">Lihat Semua →</a>
            </div>
        </div>
        <div class="p-6 max-h-96 overflow-y-auto">
            @forelse($transaksiTerbaru as $transaksi)
            <div class="flex items-center justify-between py-3 border-b border-gray-100 last:border-0">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full flex items-center justify-center {{ $transaksi->jenis == 'masuk' ? 'bg-blue-100 text-blue-600' : 'bg-red-100 text-red-600' }}">
                        @if($transaksi->jenis == 'masuk')
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11l5-5m0 0l5 5m-5-5v12"></path>
                        </svg>
                        @else
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 13l-5 5m0 0l-5-5m5 5V6"></path>
                        </svg>
                        @endif
                    </div>
                    <div>
                        <div class="font-semibold text-gray-800 text-sm">{{ Str::limit($transaksi->keterangan, 30) }}</div>
                        <div class="text-xs text-gray-500">{{ $transaksi->kategori->nama_kategori ?? 'Tanpa Kategori' }}</div>
                    </div>
                </div>
                <div class="text-right">
                    <div class="font-bold {{ $transaksi->jenis == 'masuk' ? 'text-blue-600' : 'text-red-600' }}">
                        {{ $transaksi->jenis == 'masuk' ? '+' : '-' }}Rp {{ number_format($transaksi->jumlah, 0, ',', '.') }}
                    </div>
                    <div class="text-xs text-gray-500">{{ $transaksi->tanggal->format('d/m/Y') }}</div>
                </div>
            </div>
            @empty
            <div class="text-center py-8 text-gray-500">
                <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                </svg>
                <p>Belum ada transaksi</p>
            </div>
            @endforelse
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
    <a href="{{ route('admin.keuangan.masuk') }}" class="bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 rounded-2xl p-6 text-white shadow-lg transition-all transform hover:-translate-y-1">
        <div class="flex items-center gap-4">
            <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
            </div>
            <div>
                <div class="font-bold text-lg">Kas Masuk</div>
                <div class="text-sm text-blue-100">Tambah pemasukan</div>
            </div>
        </div>
    </a>

    <a href="{{ route('admin.keuangan.keluar') }}" class="bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 rounded-2xl p-6 text-white shadow-lg transition-all transform hover:-translate-y-1">
        <div class="flex items-center gap-4">
            <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
            </div>
            <div>
                <div class="font-bold text-lg">Kas Keluar</div>
                <div class="text-sm text-red-100">Catat pengeluaran</div>
            </div>
        </div>
    </a>

    <a href="{{ route('admin.keuangan.laporan') }}" class="bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 rounded-2xl p-6 text-white shadow-lg transition-all transform hover:-translate-y-1">
        <div class="flex items-center gap-4">
            <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
            </div>
            <div>
                <div class="font-bold text-lg">Cetak Laporan</div>
                <div class="text-sm text-blue-100">Export PDF/Excel</div>
            </div>
        </div>
    </a>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const ctx = document.getElementById('keuanganChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($bulanLabels) !!},
            datasets: [{
                label: 'Kas Masuk',
                data: {!! json_encode($kasMasukPerBulan) !!},
                backgroundColor: 'rgba(59, 130, 246, 0.7)',
                borderColor: 'rgb(59, 130, 246)',
                borderWidth: 1
            }, {
                label: 'Kas Keluar',
                data: {!! json_encode($kasKeluarPerBulan) !!},
                backgroundColor: 'rgba(239, 68, 68, 0.7)',
                borderColor: 'rgb(239, 68, 68)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return 'Rp ' + value.toLocaleString('id-ID');
                        }
                    }
                }
            }
        }
    });
});
</script>
@endpush
