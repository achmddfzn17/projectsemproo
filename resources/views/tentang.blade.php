@extends('layouts.app')

@section('title', 'Tentang Kami - Karang Taruna')

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
                <span class="text-sm font-semibold text-blue-700">ℹ️ Tentang Kami</span>
            </div>
            <h1 class="text-5xl md:text-6xl font-extrabold mb-6 text-gray-800">
                Karang Taruna
            </h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Organisasi kepemudaan yang bergerak dalam pemberdayaan dan pengembangan potensi pemuda Indonesia
            </p>
        </div>
    </div>
</div>

<!-- Stats Section -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-10 relative z-10">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white rounded-2xl shadow-xl p-8 text-center border border-blue-100">
            <div class="text-6xl font-extrabold text-blue-600 mb-2">{{ $totalAnggota }}</div>
            <div class="text-gray-700 font-semibold text-lg">Anggota Aktif</div>
        </div>
        <div class="bg-white rounded-2xl shadow-xl p-8 text-center border border-blue-100">
            <div class="text-6xl font-extrabold text-blue-600 mb-2">{{ $totalKegiatan }}</div>
            <div class="text-gray-700 font-semibold text-lg">Kegiatan Terlaksana</div>
        </div>
        <div class="bg-white rounded-2xl shadow-xl p-8 text-center border border-blue-100">
            <div class="text-6xl font-extrabold text-blue-600 mb-2">{{ $totalProgram }}</div>
            <div class="text-gray-700 font-semibold text-lg">Program Berjalan</div>
        </div>
    </div>
</div>

<!-- Apa itu Karang Taruna -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
    <div class="bg-white rounded-3xl shadow-xl p-12 border border-blue-100">
        <div class="flex items-center mb-6">
            <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center mr-4">
                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <h2 class="text-4xl font-extrabold text-gray-800">Apa itu Karang Taruna?</h2>
        </div>
        
        <div class="space-y-6 text-lg text-gray-600 leading-relaxed">
            <p>
                <span class="font-bold text-blue-600">Karang Taruna</span> adalah organisasi sosial kemasyarakatan sebagai wadah dan sarana pengembangan setiap anggota masyarakat yang tumbuh dan berkembang atas dasar kesadaran dan tanggung jawab sosial dari, oleh dan untuk masyarakat terutama generasi muda.
            </p>
            <p>
                Kami berkomitmen untuk memberdayakan pemuda melalui berbagai program dan kegiatan yang positif, kreatif, dan inovatif untuk membangun generasi yang unggul dan berprestasi.
            </p>
            <p>
                Dengan semangat gotong royong dan kebersamaan, Karang Taruna menjadi motor penggerak pembangunan di tingkat masyarakat, khususnya dalam bidang kesejahteraan sosial dan pemberdayaan pemuda.
            </p>
        </div>
    </div>
</div>

<!-- Visi & Misi -->
<div class="bg-gradient-to-br from-blue-50 to-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-extrabold text-gray-800 mb-4">Visi & Misi</h2>
            <p class="text-xl text-gray-600">Arah dan tujuan organisasi kami</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Visi -->
            <div class="bg-white rounded-3xl shadow-xl p-10 border border-blue-100 transform hover:-translate-y-2 transition-all duration-300">
                <div class="flex items-center mb-6">
                    <div class="w-16 h-16 bg-blue-600 rounded-2xl flex items-center justify-center mr-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-3xl font-bold text-blue-600">Visi</h3>
                </div>
                <p class="text-lg text-gray-700 leading-relaxed">
                    Terwujudnya generasi muda yang berkarakter, kreatif, inovatif, dan berprestasi dalam membangun masyarakat yang sejahtera dan bermartabat.
                </p>
            </div>
            
            <!-- Misi -->
            <div class="bg-white rounded-3xl shadow-xl p-10 border border-blue-100 transform hover:-translate-y-2 transition-all duration-300">
                <div class="flex items-center mb-6">
                    <div class="w-16 h-16 bg-blue-600 rounded-2xl flex items-center justify-center mr-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                        </svg>
                    </div>
                    <h3 class="text-3xl font-bold text-blue-600">Misi</h3>
                </div>
                <ul class="space-y-4 text-lg text-gray-700">
                    <li class="flex items-start">
                        <svg class="w-6 h-6 text-blue-600 mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span>Memberdayakan potensi pemuda melalui program yang inovatif</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-6 h-6 text-blue-600 mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span>Mengembangkan kreativitas dan jiwa kewirausahaan</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-6 h-6 text-blue-600 mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span>Membangun karakter kepemimpinan yang berintegritas</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-6 h-6 text-blue-600 mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span>Melaksanakan kegiatan sosial kemasyarakatan</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Nilai-Nilai Organisasi -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
    <div class="text-center mb-16">
        <h2 class="text-4xl font-extrabold text-gray-800 mb-4">Nilai-Nilai Kami</h2>
        <p class="text-xl text-gray-600">Prinsip yang menjadi landasan organisasi</p>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <!-- Nilai 1 -->
        <div class="bg-white rounded-2xl shadow-lg p-8 text-center border border-blue-100 hover:shadow-2xl hover:-translate-y-2 transition-all duration-300">
            <div class="w-16 h-16 bg-blue-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                </svg>
            </div>
            <h3 class="text-xl font-bold text-gray-800 mb-2">Kebersamaan</h3>
            <p class="text-gray-600">Membangun solidaritas dan gotong royong</p>
        </div>
        
        <!-- Nilai 2 -->
        <div class="bg-white rounded-2xl shadow-lg p-8 text-center border border-blue-100 hover:shadow-2xl hover:-translate-y-2 transition-all duration-300">
            <div class="w-16 h-16 bg-blue-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                </svg>
            </div>
            <h3 class="text-xl font-bold text-gray-800 mb-2">Inovasi</h3>
            <p class="text-gray-600">Menciptakan solusi kreatif dan baru</p>
        </div>
        
        <!-- Nilai 3 -->
        <div class="bg-white rounded-2xl shadow-lg p-8 text-center border border-blue-100 hover:shadow-2xl hover:-translate-y-2 transition-all duration-300">
            <div class="w-16 h-16 bg-blue-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                </svg>
            </div>
            <h3 class="text-xl font-bold text-gray-800 mb-2">Integritas</h3>
            <p class="text-gray-600">Menjunjung tinggi kejujuran dan etika</p>
        </div>
        
        <!-- Nilai 4 -->
        <div class="bg-white rounded-2xl shadow-lg p-8 text-center border border-blue-100 hover:shadow-2xl hover:-translate-y-2 transition-all duration-300">
            <div class="w-16 h-16 bg-blue-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                </svg>
            </div>
            <h3 class="text-xl font-bold text-gray-800 mb-2">Aksi Nyata</h3>
            <p class="text-gray-600">Bergerak untuk perubahan positif</p>
        </div>
    </div>
</div>

<!-- Call to Action -->
<div class="bg-gradient-to-r from-blue-600 to-blue-700 py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-4xl md:text-5xl font-extrabold text-white mb-6">Mari Bergabung Bersama Kami!</h2>
        <p class="text-xl text-blue-100 mb-10 max-w-2xl mx-auto">
            Jadilah bagian dari perubahan positif untuk Indonesia yang lebih baik
        </p>
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="{{ route('kegiatan.index') }}" class="bg-white text-blue-600 px-8 py-4 rounded-xl font-bold hover:bg-blue-50 transition-all transform hover:scale-105 shadow-2xl">
                Lihat Kegiatan Kami
            </a>
            <a href="{{ route('berita.index') }}" class="bg-blue-500 text-white px-8 py-4 rounded-xl font-bold hover:bg-blue-400 transition-all transform hover:scale-105 shadow-2xl border-2 border-white/30">
                Baca Berita Terbaru
            </a>
        </div>
    </div>
</div>
@endsection
