@extends('layouts.admin')

@section('title', 'Galeri')

@section('content')
<!-- Header -->
<div class="mb-8 bg-gradient-to-r from-blue-600 to-blue-700 rounded-2xl p-8 text-white shadow-xl">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
        <div>
            <h1 class="text-4xl font-extrabold mb-2">📷 Galeri</h1>
            <p class="text-blue-100 text-lg">Dokumentasi foto kegiatan Karang Taruna</p>
        </div>
        <a href="{{ route('admin.galeri.create') }}" class="bg-white text-blue-700 hover:bg-blue-50 rounded-xl px-4 py-2 text-sm font-semibold transition-all inline-flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            Upload Foto
        </a>
    </div>
</div>

<!-- Filter -->
<div class="bg-white rounded-2xl shadow-lg border border-blue-200 p-6 mb-6">
    <form action="{{ route('admin.galeri.index') }}" method="GET" class="flex flex-wrap gap-4 items-end">
        <div class="flex-1 min-w-[200px]">
            <label class="block text-sm font-semibold text-gray-700 mb-2">Cari</label>
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari judul foto..."
                class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent">
        </div>
        <div class="flex-1 min-w-[200px]">
            <label class="block text-sm font-semibold text-gray-700 mb-2">Filter Kegiatan</label>
            <select name="kegiatan_id" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500">
                <option value="">Semua Kegiatan</option>
                @foreach($kegiatans as $kegiatan)
                <option value="{{ $kegiatan->id }}" {{ request('kegiatan_id') == $kegiatan->id ? 'selected' : '' }}>
                    {{ $kegiatan->nama_kegiatan }}
                </option>
                @endforeach
            </select>
        </div>
        <div>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-xl transition-all">
                Filter
            </button>
        </div>
    </form>
</div>

<!-- Success Message -->
@if(session('success'))
<div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded-xl mb-6">
    {{ session('success') }}
</div>
@endif

<!-- Galeri Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
    @forelse($galeris as $item)
    <div class="bg-white rounded-2xl shadow-lg border border-blue-200 overflow-hidden group hover:shadow-xl transition-all">
        <!-- Foto -->
        <div class="relative aspect-square overflow-hidden">
            @if($item->foto)
            <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->judul }}"
                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
            @else
            <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
            </div>
            @endif
            
            <!-- Overlay Actions -->
            <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                <a href="{{ route('admin.galeri.edit', $item->id) }}"
                    class="w-10 h-10 bg-white rounded-full flex items-center justify-center text-blue-600 hover:bg-blue-600 hover:text-white transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                </a>
                <form action="{{ route('admin.galeri.destroy', $item->id) }}" method="POST"
                    onsubmit="return confirm('Yakin hapus foto ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="w-10 h-10 bg-white rounded-full flex items-center justify-center text-red-600 hover:bg-red-600 hover:text-white transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                        </svg>
                    </button>
                </form>
            </div>
        </div>
        
        <!-- Info -->
        <div class="p-4">
            <h3 class="font-bold text-gray-800 mb-1 truncate">{{ $item->judul }}</h3>
            @if($item->kegiatan)
            <p class="text-xs text-blue-600 mb-2">{{ $item->kegiatan->nama_kegiatan }}</p>
            @endif
            @if($item->deskripsi)
            <p class="text-sm text-gray-500 line-clamp-2">{{ $item->deskripsi }}</p>
            @endif
            <p class="text-xs text-gray-400 mt-2">{{ $item->created_at->format('d M Y') }}</p>
        </div>
    </div>
    @empty
    <div class="col-span-full">
        <div class="bg-white rounded-2xl shadow-lg border border-blue-200 p-12 text-center">
            <svg class="w-20 h-20 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
            </svg>
            <h3 class="text-lg font-bold text-gray-700 mb-2">Belum ada foto</h3>
            <p class="text-gray-500 mb-4">Upload foto pertama untuk galeri Karang Taruna</p>
            <a href="{{ route('admin.galeri.create') }}" class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-xl transition-all">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Upload Foto
            </a>
        </div>
    </div>
    @endforelse
</div>

<!-- Pagination -->
@if($galeris->hasPages())
<div class="mt-6">
    {{ $galeris->links() }}
</div>
@endif

<!-- Stats -->
<div class="mt-6 bg-white rounded-2xl shadow-lg border border-blue-200 p-6">
    <div class="flex items-center justify-between">
        <span class="text-gray-600">Total Foto: <strong class="text-blue-600">{{ $galeris->total() }}</strong></span>
        <a href="{{ route('admin.galeri.create') }}" class="text-blue-600 hover:text-blue-700 font-semibold inline-flex items-center gap-1">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            Tambah Foto Baru
        </a>
    </div>
</div>
@endsection
