@extends('layouts.admin')

@section('title', 'Data Berita')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div>
        <h1 class="text-2xl font-bold text-gray-800">Data Berita</h1>
        <p class="text-sm text-gray-600 mt-1">Kelola berita dan publikasi</p>
    </div>
    <a href="{{ route('admin.berita.create') }}" class="bg-blue-600 text-white px-6 py-3 rounded-xl hover:bg-blue-700 transition-all shadow-lg hover:shadow-xl font-semibold">
        + Tambah Berita
    </a>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @forelse($berita as $item)
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-blue-100 hover:shadow-xl transition-all">
        @if($item->gambar)
            <img src="{{ asset('storage/' . $item->gambar) }}" class="w-full h-48 object-cover">
        @else
            <div class="w-full h-48 bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center">
                <span class="text-white text-5xl">📰</span>
            </div>
        @endif
        <div class="p-6">
            <div class="text-xs text-gray-500 mb-2">{{ $item->created_at->format('d M Y') }}</div>
            <h3 class="text-lg font-bold text-gray-800 mb-2 line-clamp-2">{{ $item->judul }}</h3>
            <p class="text-sm text-gray-600 mb-4 line-clamp-2">{{ Str::limit(strip_tags($item->konten), 100) }}</p>
            <div class="flex space-x-3">
                <a href="{{ route('admin.berita.edit', $item->id) }}" class="flex-1 text-center bg-blue-50 text-blue-600 px-4 py-2 rounded-lg hover:bg-blue-100 transition font-semibold">
                    Edit
                </a>
                <form method="POST" action="{{ route('admin.berita.destroy', $item->id) }}" onsubmit="return confirm('Yakin ingin menghapus?')" class="flex-1">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full bg-blue-50 text-blue-600 px-4 py-2 rounded-lg hover:bg-blue-100 transition font-semibold border border-blue-200">
                        Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
    @empty
    <div class="col-span-3 text-center py-12">
        <svg class="w-16 h-16 text-gray-300 mb-4 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
        </svg>
        <p class="text-gray-500 font-semibold">Belum ada berita</p>
    </div>
    @endforelse
</div>

<div class="mt-6">
    {{ $berita->links() }}
</div>
@endsection
