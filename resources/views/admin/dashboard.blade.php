@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
<!-- Welcome Section with Time -->
<div class="mb-8 bg-gradient-to-r from-blue-600 to-blue-700 rounded-2xl p-8 text-white shadow-xl">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
        <div>
            <h1 class="text-4xl font-extrabold mb-2">Selamat Datang Kembali! 👋</h1>
            <p class="text-blue-100 text-lg">{{ auth()->user()->name }} - Administrator</p>
            <p class="text-blue-200 text-sm mt-1">{{ now()->isoFormat('dddd, D MMMM Y') }}</p>
        </div>
        <div class="bg-white/20 backdrop-blur-sm rounded-xl px-6 py-4">
            <div class="text-sm text-blue-100">Waktu Server</div>
            <div class="text-2xl font-bold">{{ now()->format('H:i') }} WIB</div>
        </div>
    </div>
</div>

<!-- Stats Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6 mb-8">
    <!-- Card 1 - Anggota -->
    <a href="{{ route('admin.anggota.index') }}" class="block bg-white rounded-2xl shadow-lg p-6 border border-blue-100 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 hover:border-blue-300">
        <div class="flex items-center justify-between mb-4">
            <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center shadow-lg">
                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
            </div>
            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </div>
        <div class="text-3xl font-extrabold text-gray-800 mb-1">{{ $totalAnggota }}</div>
        <div class="text-sm text-gray-600 mb-3">Total Anggota</div>
        <div class="flex items-center justify-between pt-3 border-t border-gray-100">
            <span class="text-xs text-green-600 font-semibold inline-flex items-center">
                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                {{ $anggotaAktif }} Aktif
            </span>
            <span class="text-xs text-blue-600 font-semibold">Lihat Detail →</span>
        </div>
    </a>

    <!-- Card 2 - Kegiatan -->
    <a href="{{ route('admin.kegiatan.index') }}" class="block bg-white rounded-2xl shadow-lg p-6 border border-blue-100 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 hover:border-blue-300">
        <div class="flex items-center justify-between mb-4">
            <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center shadow-lg">
                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
            </div>
            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </div>
        <div class="text-3xl font-extrabold text-gray-800 mb-1">{{ $totalKegiatan }}</div>
        <div class="text-sm text-gray-600 mb-3">Total Kegiatan</div>
        <div class="flex items-center justify-between pt-3 border-t border-gray-100">
            <span class="text-xs text-blue-600 font-semibold">Semua kegiatan</span>
            <span class="text-xs text-blue-600 font-semibold">Lihat Detail →</span>
        </div>
    </a>

    <!-- Card 3 - Program -->
    <a href="{{ route('admin.program.index') }}" class="block bg-white rounded-2xl shadow-lg p-6 border border-blue-100 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 hover:border-blue-300">
        <div class="flex items-center justify-between mb-4">
            <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center shadow-lg">
                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                </svg>
            </div>
            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </div>
        <div class="text-3xl font-extrabold text-gray-800 mb-1">{{ $totalProgram }}</div>
        <div class="text-sm text-gray-600 mb-3">Total Program</div>
        <div class="flex items-center justify-between pt-3 border-t border-gray-100">
            <span class="text-xs text-blue-600 font-semibold">Program aktif</span>
            <span class="text-xs text-blue-600 font-semibold">Lihat Detail →</span>
        </div>
    </a>

    <!-- Card 4 - Berita -->
    <a href="{{ route('admin.berita.index') }}" class="block bg-white rounded-2xl shadow-lg p-6 border border-blue-100 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 hover:border-blue-300">
        <div class="flex items-center justify-between mb-4">
            <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center shadow-lg">
                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                </svg>
            </div>
            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </div>
        <div class="text-3xl font-extrabold text-gray-800 mb-1">{{ $totalBerita }}</div>
        <div class="text-sm text-gray-600 mb-3">Total Berita</div>
        <div class="flex items-center justify-between pt-3 border-t border-gray-100">
            <span class="text-xs text-blue-600 font-semibold">Berita published</span>
            <span class="text-xs text-blue-600 font-semibold">Lihat Detail →</span>
        </div>
    </a>

    <!-- Card 5 - Artikel -->
    <a href="{{ route('admin.artikel.index') }}" class="block bg-white rounded-2xl shadow-lg p-6 border border-blue-100 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 hover:border-blue-300">
        <div class="flex items-center justify-between mb-4">
            <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center shadow-lg">
                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
            </div>
            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </div>
        <div class="text-3xl font-extrabold text-gray-800 mb-1">{{ $totalArtikel }}</div>
        <div class="text-sm text-gray-600 mb-3">Total Artikel</div>
        <div class="flex items-center justify-between pt-3 border-t border-gray-100">
            <span class="text-xs text-blue-600 font-semibold">Artikel edukatif</span>
            <span class="text-xs text-blue-600 font-semibold">Lihat Detail →</span>
        </div>
    </a>
</div>

<!-- Content Grid -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Kegiatan Terbaru -->
    <div class="lg:col-span-2 bg-white rounded-2xl shadow-lg border border-blue-100">
        <div class="p-6 border-b border-blue-100">
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-bold text-gray-800">Kegiatan Terbaru</h2>
                <a href="{{ route('admin.kegiatan.index') }}" class="text-sm text-blue-600 hover:text-blue-700 font-semibold">Lihat Semua →</a>
            </div>
        </div>
        <div class="p-6">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-blue-100">
                            <th class="text-left py-3 px-4 text-sm font-semibold text-gray-700">Nama Kegiatan</th>
                            <th class="text-left py-3 px-4 text-sm font-semibold text-gray-700">Jenis</th>
                            <th class="text-left py-3 px-4 text-sm font-semibold text-gray-700">Tanggal</th>
                            <th class="text-left py-3 px-4 text-sm font-semibold text-gray-700">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($kegiatanTerbaru as $kegiatan)
                        <tr class="border-b border-blue-50 hover:bg-blue-50 transition-colors">
                            <td class="py-4 px-4">
                                <div class="font-semibold text-gray-800">{{ $kegiatan->nama_kegiatan }}</div>
                                <div class="text-xs text-gray-500">{{ $kegiatan->lokasi }}</div>
                            </td>
                            <td class="py-4 px-4">
                                <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs font-semibold">
                                    {{ ucfirst($kegiatan->jenis_kegiatan) }}
                                </span>
                            </td>
                            <td class="py-4 px-4 text-sm text-gray-600">
                                {{ $kegiatan->tanggal_mulai->format('d M Y') }}
                            </td>
                            <td class="py-4 px-4">
                                @if($kegiatan->status == 'rencana')
                                <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs font-semibold">Rencana</span>
                                @elseif($kegiatan->status == 'berlangsung')
                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-semibold">Berlangsung</span>
                                @else
                                <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-xs font-semibold">Selesai</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center py-12 text-gray-500">
                                <div class="flex flex-col items-center">
                                    <svg class="w-16 h-16 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    <p class="font-semibold">Belum ada kegiatan</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="bg-white rounded-2xl shadow-lg border border-blue-100">
        <div class="p-6 border-b border-blue-100">
            <h2 class="text-xl font-bold text-gray-800">Quick Actions</h2>
        </div>
        <div class="p-6 space-y-3">
            <a href="{{ route('admin.anggota.create') }}" class="flex items-center p-4 bg-blue-50 hover:bg-blue-100 rounded-xl transition-all group border border-blue-100">
                <div class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center mr-4">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                </div>
                <div class="flex-1">
                    <div class="font-semibold text-gray-800 group-hover:text-blue-600">Tambah Anggota</div>
                    <div class="text-xs text-gray-500">Daftarkan anggota baru</div>
                </div>
                <svg class="w-5 h-5 text-gray-400 group-hover:text-blue-600 group-hover:translate-x-1 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>

            <a href="{{ route('admin.kegiatan.create') }}" class="flex items-center p-4 bg-blue-50 hover:bg-blue-100 rounded-xl transition-all group border border-blue-100">
                <div class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center mr-4">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                </div>
                <div class="flex-1">
                    <div class="font-semibold text-gray-800 group-hover:text-blue-600">Tambah Kegiatan</div>
                    <div class="text-xs text-gray-500">Buat kegiatan baru</div>
                </div>
                <svg class="w-5 h-5 text-gray-400 group-hover:text-blue-600 group-hover:translate-x-1 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>

            <a href="{{ route('admin.berita.create') }}" class="flex items-center p-4 bg-blue-50 hover:bg-blue-100 rounded-xl transition-all group border border-blue-100">
                <div class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center mr-4">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                </div>
                <div class="flex-1">
                    <div class="font-semibold text-gray-800 group-hover:text-blue-600">Tambah Berita</div>
                    <div class="text-xs text-gray-500">Publikasi berita baru</div>
                </div>
                <svg class="w-5 h-5 text-gray-400 group-hover:text-blue-600 group-hover:translate-x-1 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>

            <a href="{{ route('admin.artikel.create') }}" class="flex items-center p-4 bg-blue-50 hover:bg-blue-100 rounded-xl transition-all group border border-blue-100">
                <div class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center mr-4">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                </div>
                <div class="flex-1">
                    <div class="font-semibold text-gray-800 group-hover:text-blue-600">Tambah Artikel</div>
                    <div class="text-xs text-gray-500">Tulis artikel baru</div>
                </div>
                <svg class="w-5 h-5 text-gray-400 group-hover:text-blue-600 group-hover:translate-x-1 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>

            <a href="{{ route('admin.program.create') }}" class="flex items-center p-4 bg-blue-50 hover:bg-blue-100 rounded-xl transition-all group border border-blue-100">
                <div class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center mr-4">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                </div>
                <div class="flex-1">
                    <div class="font-semibold text-gray-800 group-hover:text-blue-600">Tambah Program</div>
                    <div class="text-xs text-gray-500">Buat program baru</div>
                </div>
                <svg class="w-5 h-5 text-gray-400 group-hover:text-blue-600 group-hover:translate-x-1 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>

            <a href="{{ route('home') }}" target="_blank" class="flex items-center p-4 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 rounded-xl transition-all group">
                <div class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center mr-4">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                    </svg>
                </div>
                <div class="flex-1">
                    <div class="font-semibold text-white">Lihat Website</div>
                    <div class="text-xs text-blue-100">Buka halaman public</div>
                </div>
                <svg class="w-5 h-5 text-white group-hover:translate-x-1 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
        </div>
    </div>
</div>

<!-- Additional Stats -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
    <!-- Artikel Stats -->
    <div class="bg-white rounded-2xl shadow-lg p-6 border border-blue-100">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-bold text-gray-800">Konten</h3>
            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
            </svg>
        </div>
        <div class="space-y-3">
            <div class="flex items-center justify-between p-3 bg-blue-50 rounded-lg">
                <span class="text-sm font-semibold text-gray-700">Total Artikel</span>
                <span class="text-lg font-bold text-blue-600">{{ $totalArtikel }}</span>
            </div>
            <div class="flex items-center justify-between p-3 bg-blue-50 rounded-lg">
                <span class="text-sm font-semibold text-gray-700">Total Berita</span>
                <span class="text-lg font-bold text-blue-600">{{ $totalBerita }}</span>
            </div>
        </div>
    </div>

    <!-- System Info -->
    <div class="bg-gradient-to-br from-blue-600 to-blue-700 rounded-2xl shadow-lg p-6 text-white">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-bold">System Info</h3>
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
        </div>
        <div class="space-y-2 text-sm">
            <div class="flex justify-between">
                <span class="text-blue-100">Laravel Version</span>
                <span class="font-semibold">12.x</span>
            </div>
            <div class="flex justify-between">
                <span class="text-blue-100">PHP Version</span>
                <span class="font-semibold">{{ PHP_VERSION }}</span>
            </div>
            <div class="flex justify-between">
                <span class="text-blue-100">Database</span>
                <span class="font-semibold">SQLite</span>
            </div>
            <div class="flex justify-between">
                <span class="text-blue-100">Last Login</span>
                <span class="font-semibold">{{ now()->format('d M Y H:i') }}</span>
            </div>
        </div>
    </div>
</div>
@endsection
