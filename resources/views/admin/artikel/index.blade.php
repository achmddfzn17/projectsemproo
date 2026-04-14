@extends('layouts.admin')

@section('title', 'Data Artikel')

@section('content')
<!-- Header -->
<div class="mb-8 bg-gradient-to-r from-blue-600 to-blue-700 rounded-2xl p-8 text-white shadow-xl">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
        <div>
            <h1 class="text-3xl font-extrabold mb-1 flex items-center gap-2"><iconify-icon icon="mdi:file-document" class="text-2xl"></iconify-icon> Data Artikel</h1>
            <p class="text-blue-100">Kelola artikel dan konten edukatif Karang Taruna</p>
        </div>
        <a href="{{ route('admin.artikel.create') }}" class="bg-white text-blue-700 hover:bg-blue-50 rounded-xl px-5 py-2.5 text-sm font-semibold transition-all inline-flex items-center gap-2 shadow-lg">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            Tambah Artikel
        </a>
    </div>
</div>

<!-- Mini Stats -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
    <div class="bg-white rounded-xl p-5 shadow-lg border border-blue-100">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 text-sm font-semibold">Total Artikel</p>
                <p class="text-2xl font-extrabold mt-1 text-blue-600">{{ $artikel->total() }}</p>
            </div>
            <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                <iconify-icon icon="mdi:file-document" class="text-xl text-blue-600"></iconify-icon>
            </div>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @forelse($artikel as $item)
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-blue-100 hover:shadow-xl transition-all transform hover:-translate-y-1">
        @if($item->gambar)
            <img src="{{ asset('storage/' . $item->gambar) }}" class="w-full h-48 object-cover">
        @else
            <div class="w-full h-48 bg-gradient-to-br from-purple-400 to-purple-600 flex items-center justify-center">
                <iconify-icon icon="mdi:file-document-outline" class="text-5xl text-white"></iconify-icon>
            </div>
        @endif
        <div class="p-5">
            <div class="flex items-center justify-between mb-2">
                <span class="inline-block px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-semibold">
                    {{ $item->kategori }}
                </span>
                @if(isset($item->is_published) && $item->is_published)
                <span class="px-2 py-1 bg-green-100 text-green-700 rounded-full text-xs font-semibold">Published</span>
                @else
                <span class="px-2 py-1 bg-gray-100 text-gray-600 rounded-full text-xs font-semibold">Draft</span>
                @endif
            </div>
            <h3 class="text-lg font-bold text-gray-800 mb-2 line-clamp-2">{{ $item->judul }}</h3>
            <p class="text-sm text-gray-600 mb-4 line-clamp-2">{{ Str::limit(strip_tags($item->konten), 80) }}</p>
            <div class="flex space-x-2">
                <a href="{{ route('admin.artikel.edit', $item->id) }}" class="flex-1 text-center bg-blue-50 text-blue-600 px-4 py-2.5 rounded-xl hover:bg-blue-100 transition font-semibold text-sm inline-flex items-center justify-center gap-1">
                    <iconify-icon icon="mdi:pencil" class="text-sm"></iconify-icon> Edit
                </a>
                <form id="delete-form-{{ $item->id }}" method="POST" action="{{ route('admin.artikel.destroy', $item->id) }}" class="flex-1">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="if(confirm('Yakin ingin menghapus artikel ini?')) document.getElementById('delete-form-{{ $item->id }}').submit();" class="w-full bg-red-50 text-red-600 px-4 py-2.5 rounded-xl hover:bg-red-100 transition font-semibold text-sm border border-red-200 inline-flex items-center justify-center gap-1">
                        <iconify-icon icon="mdi:trash-can" class="text-sm"></iconify-icon> Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
    @empty
    <div class="col-span-3 text-center py-16">
        <div class="flex flex-col items-center">
            <iconify-icon icon="mdi:file-document-outline" class="text-6xl text-gray-300 mb-4"></iconify-icon>
            <p class="text-gray-500 font-semibold text-lg">Belum ada artikel</p>
            <p class="text-gray-400 text-sm mt-1">Klik tombol "Tambah Artikel" untuk menambahkan data</p>
        </div>
    </div>
    @endforelse
</div>

@if($artikel->hasPages())
<div class="mt-6 bg-white rounded-xl shadow-lg border border-blue-100 px-6 py-4">
    {{ $artikel->links() }}
</div>
@endif
@endsection
