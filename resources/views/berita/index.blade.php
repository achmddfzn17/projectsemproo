@extends('layouts.app')

@section('title', 'Berita - Karang Taruna')

@section('content')
<!-- Hero Section -->
<div class="relative bg-gradient-to-br from-blue-50 via-white to-blue-100 overflow-hidden">
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute -top-40 -right-40 w-96 h-96 bg-blue-200 opacity-20 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-40 -left-40 w-96 h-96 bg-blue-300 opacity-20 rounded-full blur-3xl"></div>
    </div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="text-center">
            <div class="inline-flex items-center bg-blue-100 px-4 py-2 rounded-full mb-6">
                <span class="text-sm font-semibold text-blue-700">📰 Berita Kepemudaan</span>
            </div>
            <h1 class="text-5xl md:text-6xl font-extrabold mb-6 text-gray-800">
                Berita Terbaru
            </h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Informasi terkini seputar kegiatan dan perkembangan Karang Taruna
            </p>
        </div>
    </div>
</div>

<!-- Featured News (First Item) -->
@if($berita->count() > 0)
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-10 relative z-10">
    @php $featured = $berita->first(); @endphp
    <div class="bg-white rounded-3xl shadow-2xl overflow-hidden border border-blue-100">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-0">
            <!-- Image -->
            <div class="relative h-96 md:h-auto">
                @if($featured->gambar)
                <img src="{{ asset('storage/' . $featured->gambar) }}" alt="{{ $featured->judul }}" class="w-full h-full object-cover">
                @else
                <div class="w-full h-full bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center">
                    <svg class="w-32 h-32 text-white opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                    </svg>
                </div>
                @endif
                <div class="absolute top-6 left-6">
                    <span class="bg-blue-600 text-white px-4 py-2 rounded-full text-sm font-bold shadow-lg">
                        ⭐ Berita Utama
                    </span>
                </div>
            </div>
            
            <!-- Content -->
            <div class="p-10 flex flex-col justify-center">
                <div class="flex items-center text-sm text-gray-500 mb-4">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    {{ $featured->created_at->diffForHumans() }}
                    <span class="mx-2">•</span>
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                    </svg>
                    {{ $featured->views }} views
                </div>
                
                <h2 class="text-3xl font-extrabold text-gray-800 mb-4 line-clamp-3">
                    {{ $featured->judul }}
                </h2>
                
                <p class="text-lg text-gray-600 mb-6 line-clamp-4">
                    {{ Str::limit(strip_tags($featured->konten), 200) }}
                </p>
                
                <a href="{{ route('berita.detail', $featured->slug) }}" class="inline-flex items-center text-blue-600 hover:text-blue-700 font-bold text-lg group">
                    Baca Selengkapnya
                    <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</div>
@endif

<!-- All News Grid -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
    <div class="flex justify-between items-center mb-12">
        <h2 class="text-3xl font-extrabold text-gray-800">Semua Berita</h2>
        <div class="text-sm text-gray-600">
            Menampilkan {{ $berita->count() }} dari {{ $berita->total() }} berita
        </div>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @forelse($berita->skip(1) as $item)
        <article class="group bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border border-blue-100">
            <!-- Image -->
            <div class="relative overflow-hidden h-56">
                @if($item->gambar)
                <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                @else
                <div class="w-full h-full bg-gradient-to-br from-blue-400 to-blue-600 group-hover:scale-110 transition-transform duration-500 flex items-center justify-center">
                    <svg class="w-20 h-20 text-white opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                    </svg>
                </div>
                @endif
                
                <!-- Badge -->
                <div class="absolute top-4 right-4">
                    <span class="bg-white px-3 py-1 rounded-full text-xs font-bold text-blue-600 shadow-lg">
                        📰 Berita
                    </span>
                </div>
            </div>
            
            <!-- Content -->
            <div class="p-6">
                <!-- Meta -->
                <div class="flex items-center text-xs text-gray-500 mb-3">
                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    {{ $item->created_at->format('d M Y') }}
                    <span class="mx-2">•</span>
                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                    </svg>
                    {{ $item->views }} views
                </div>
                
                <!-- Title -->
                <h3 class="text-xl font-bold text-gray-800 mb-3 group-hover:text-blue-600 transition-colors line-clamp-2">
                    {{ $item->judul }}
                </h3>
                
                <!-- Excerpt -->
                <p class="text-gray-600 mb-4 line-clamp-3">
                    {{ Str::limit(strip_tags($item->konten), 120) }}
                </p>
                
                <!-- Read More -->
                <a href="{{ route('berita.detail', $item->slug) }}" class="inline-flex items-center text-blue-600 hover:text-blue-700 font-bold group-hover:gap-2 transition-all">
                    Baca Selengkapnya
                    <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>
        </article>
        @empty
        <div class="col-span-3 text-center py-20">
            <div class="w-24 h-24 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-12 h-12 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                </svg>
            </div>
            <h3 class="text-2xl font-bold text-gray-800 mb-2">Belum Ada Berita</h3>
            <p class="text-gray-600">Berita akan segera ditambahkan</p>
        </div>
        @endforelse
    </div>
    
    <!-- Pagination -->
    @if($berita->hasPages())
    <div class="mt-12">
        {{ $berita->links() }}
    </div>
    @endif
</div>

<!-- Newsletter Section -->
<div class="bg-gradient-to-br from-blue-50 to-white py-20">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="bg-white rounded-3xl shadow-xl p-12 border border-blue-100">
            <div class="w-16 h-16 bg-blue-100 rounded-2xl flex items-center justify-center mx-auto mb-6">
                <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                </svg>
            </div>
            <h2 class="text-3xl font-extrabold text-gray-800 mb-4">Dapatkan Berita Terbaru</h2>
            <p class="text-lg text-gray-600 mb-8">
                Subscribe untuk mendapatkan update berita dan kegiatan Karang Taruna
            </p>
            <form class="flex flex-col sm:flex-row gap-4 max-w-md mx-auto">
                <input type="email" placeholder="Email Anda" class="flex-1 px-6 py-4 rounded-xl border-2 border-blue-200 focus:border-blue-600 focus:outline-none">
                <button type="submit" class="bg-blue-600 text-white px-8 py-4 rounded-xl font-bold hover:bg-blue-700 transition-all transform hover:scale-105 shadow-lg">
                    Subscribe
                </button>
            </form>
        </div>
    </div>
</div>

<!-- CTA Section -->
<div class="bg-gradient-to-r from-blue-600 to-blue-700 py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-4xl md:text-5xl font-extrabold text-white mb-6">Ikuti Kegiatan Kami</h2>
        <p class="text-xl text-blue-100 mb-10 max-w-2xl mx-auto">
            Bergabunglah dengan berbagai kegiatan positif Karang Taruna
        </p>
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="{{ route('kegiatan.index') }}" class="bg-white text-blue-600 px-8 py-4 rounded-xl font-bold hover:bg-blue-50 transition-all transform hover:scale-105 shadow-2xl">
                Lihat Kegiatan
            </a>
            <a href="{{ route('tentang') }}" class="bg-blue-500 text-white px-8 py-4 rounded-xl font-bold hover:bg-blue-400 transition-all transform hover:scale-105 shadow-2xl border-2 border-white/30">
                Tentang Kami
            </a>
        </div>
    </div>
</div>
@endsection
