@extends('layouts.admin')

@section('title', 'Kelola Kategori Transaksi')

@section('content')
<!-- Header -->
<div class="mb-8 bg-gradient-to-r from-blue-600 to-blue-700 rounded-2xl p-8 text-white shadow-xl">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
        <div>
            <h1 class="text-4xl font-extrabold mb-2">⚙️ Kelola Kategori Transaksi</h1>
            <p class="text-blue-100 text-lg">Tambah, edit, dan hapus kategori keuangan</p>
        </div>
        <a href="{{ route('admin.keuangan.index') }}" class="bg-white/20 hover:bg-white/30 backdrop-blur-sm rounded-xl px-4 py-2 text-sm font-semibold transition-all">
            ← Kembali ke Keuangan
        </a>
    </div>
</div>

@if(session('success'))
<div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded-xl mb-6">
    {{ session('success') }}
</div>
@endif

@if($errors->has('error'))
<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-xl mb-6">
    {{ $errors->first('error') }}
</div>
@endif

<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <!-- Kategori Kas Masuk -->
    <div class="bg-white rounded-2xl shadow-lg border border-blue-200">
        <div class="p-6 border-b border-blue-200 bg-gradient-to-r from-blue-50 to-white">
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-bold text-blue-700">💰 Kategori Kas Masuk</h2>
                <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm font-semibold">
                    {{ $kategoris->where('jenis', 'masuk')->count() }} kategori
                </span>
            </div>
        </div>
        
        <div class="p-6">
            <!-- Tambah Kategori -->
            <form action="{{ route('admin.keuangan.kategori.store') }}" method="POST" class="mb-6">
                @csrf
                <input type="hidden" name="jenis" value="masuk">
                <div class="flex gap-2">
                    <input type="text" name="nama_kategori" placeholder="Nama kategori baru..." required
                        class="flex-1 px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('nama_kategori') border-red-500 @enderror">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-xl transition-all">
                        Tambah
                    </button>
                </div>
                @error('nama_kategori')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </form>

            <!-- List Kategori -->
            <div class="space-y-2">
                @forelse($kategoris->where('jenis', 'masuk') as $kategori)
                <div class="flex items-center justify-between p-4 bg-blue-50 rounded-xl hover:bg-blue-100 transition-colors">
                    <div>
                        <div class="font-semibold text-gray-800">{{ $kategori->nama_kategori }}</div>
                        @if($kategori->deskripsi)
                        <div class="text-xs text-gray-500">{{ $kategori->deskripsi }}</div>
                        @endif
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="text-xs text-gray-500">{{ $kategori->transaksis->count() }} transaksi</span>
                        <form action="{{ route('admin.keuangan.kategori.destroy', $kategori->id) }}" method="POST" 
                            onsubmit="return confirm('Yakin hapus kategori ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800 p-2 rounded-lg hover:bg-red-100 transition-all">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
                @empty
                <div class="text-center py-8 text-gray-500">
                    <svg class="w-12 h-12 text-gray-300 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                    </svg>
                    <p>Belum ada kategori kas masuk</p>
                </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Kategori Kas Keluar -->
    <div class="bg-white rounded-2xl shadow-lg border border-red-100">
        <div class="p-6 border-b border-red-100 bg-gradient-to-r from-red-50 to-white">
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-bold text-red-700">❤️ Kategori Kas Keluar</h2>
                <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm font-semibold">
                    {{ $kategoris->where('jenis', 'keluar')->count() }} kategori
                </span>
            </div>
        </div>
        
        <div class="p-6">
            <!-- Tambah Kategori -->
            <form action="{{ route('admin.keuangan.kategori.store') }}" method="POST" class="mb-6">
                @csrf
                <input type="hidden" name="jenis" value="keluar">
                <div class="flex gap-2">
                    <input type="text" name="nama_kategori" placeholder="Nama kategori baru..." required
                        class="flex-1 px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-red-500 focus:border-transparent @error('nama_kategori') border-red-500 @enderror">
                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-semibold px-6 py-3 rounded-xl transition-all">
                        Tambah
                    </button>
                </div>
                @error('nama_kategori')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </form>

            <!-- List Kategori -->
            <div class="space-y-2">
                @forelse($kategoris->where('jenis', 'keluar') as $kategori)
                <div class="flex items-center justify-between p-4 bg-red-50 rounded-xl hover:bg-red-100 transition-colors">
                    <div>
                        <div class="font-semibold text-gray-800">{{ $kategori->nama_kategori }}</div>
                        @if($kategori->deskripsi)
                        <div class="text-xs text-gray-500">{{ $kategori->deskripsi }}</div>
                        @endif
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="text-xs text-gray-500">{{ $kategori->transaksis->count() }} transaksi</span>
                        <form action="{{ route('admin.keuangan.kategori.destroy', $kategori->id) }}" method="POST" 
                            onsubmit="return confirm('Yakin hapus kategori ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800 p-2 rounded-lg hover:bg-red-100 transition-all">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
                @empty
                <div class="text-center py-8 text-gray-500">
                    <svg class="w-12 h-12 text-gray-300 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                    </svg>
                    <p>Belum ada kategori kas keluar</p>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</div>

<!-- Tips -->
<div class="mt-6 bg-blue-50 border border-blue-200 rounded-2xl p-6">
    <h3 class="font-bold text-blue-800 mb-2">💡 Tips Kategori</h3>
    <ul class="text-sm text-blue-700 space-y-1">
        <li>• Gunakan nama kategori yang spesifik agar laporan lebih detail</li>
        <li>• Kategori yang sudah digunakan dalam transaksi <strong>tidak dapat dihapus</strong></li>
        <li>• Contoh kategori kas masuk: Iuran Bulanan, Donasi, Sponsor</li>
        <li>• Contoh kategori kas keluar: ATK, Konsumsi, Transport</li>
    </ul>
</div>
@endsection
