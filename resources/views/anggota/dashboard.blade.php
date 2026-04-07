@extends('layouts.anggota')

@section('title', 'Dashboard')

@section('content')
<!-- Welcome Card -->
<div class="bg-gradient-to-r from-blue-500 to-blue-600 rounded-2xl p-8 text-white mb-8 shadow-xl">
    <h1 class="text-3xl font-black mb-2">Selamat Datang, {{ $anggota->nama }}! 👋</h1>
    <p class="text-blue-100">Terima kasih telah menjadi bagian dari Karang Taruna Generasi Emas</p>
</div>

<!-- Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
    <div class="bg-white rounded-2xl p-6 shadow-lg border border-blue-100">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 text-sm mb-1">Status</p>
                <p class="text-2xl font-black text-green-600">{{ ucfirst($anggota->status) }}</p>
            </div>
            <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                <span class="text-2xl">⭐</span>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-2xl p-6 shadow-lg border border-blue-100">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 text-sm mb-1">Umur</p>
                <p class="text-2xl font-black text-blue-600">{{ $anggota->umur }} Th</p>
            </div>
            <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                <span class="text-2xl">🎂</span>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-2xl p-6 shadow-lg border border-blue-100">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 text-sm mb-1">Bergabung</p>
                <p class="text-2xl font-black text-purple-600">{{ $lamaBergabungText }}</p>
                <p class="text-xs text-gray-500 mt-1">{{ $anggota->created_at->format('d M Y') }}</p>
            </div>
            <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center">
                <span class="text-2xl">📅</span>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-2xl p-6 shadow-lg border border-blue-100">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 text-sm mb-1">Total Anggota</p>
                <p class="text-2xl font-black text-orange-600">{{ $totalAnggota }}</p>
            </div>
            <div class="w-12 h-12 bg-orange-100 rounded-xl flex items-center justify-center">
                <span class="text-2xl">👥</span>
            </div>
        </div>
    </div>
</div>

<!-- Achievement Badges -->
@if(count($badges) > 0)
<div class="bg-white rounded-2xl shadow-lg p-6 border border-blue-100 mb-8">
    <h3 class="text-xl font-bold text-gray-800 mb-4">🏆 Achievement & Badges</h3>
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
        @foreach($badges as $badge)
        <div class="rounded-xl p-4 border-2 text-center
            @if($badge['color'] == 'blue') bg-blue-50 border-blue-200
            @elseif($badge['color'] == 'green') bg-green-50 border-green-200
            @elseif($badge['color'] == 'purple') bg-purple-50 border-purple-200
            @elseif($badge['color'] == 'yellow') bg-yellow-50 border-yellow-200
            @endif">
            <div class="text-4xl mb-2">{{ $badge['icon'] }}</div>
            <h4 class="font-bold mb-1
                @if($badge['color'] == 'blue') text-blue-700
                @elseif($badge['color'] == 'green') text-green-700
                @elseif($badge['color'] == 'purple') text-purple-700
                @elseif($badge['color'] == 'yellow') text-yellow-700
                @endif">{{ $badge['name'] }}</h4>
            <p class="text-xs
                @if($badge['color'] == 'blue') text-blue-600
                @elseif($badge['color'] == 'green') text-green-600
                @elseif($badge['color'] == 'purple') text-purple-600
                @elseif($badge['color'] == 'yellow') text-yellow-600
                @endif">{{ $badge['description'] }}</p>
        </div>
        @endforeach
    </div>
</div>
@endif

<!-- Profile Info & Quick Actions -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
    <!-- Profile Info -->
    <div class="lg:col-span-2 bg-white rounded-2xl shadow-lg p-6 border border-blue-100">
        <h3 class="text-xl font-bold text-gray-800 mb-4">Informasi Profile</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <p class="text-sm text-gray-600">NIK</p>
                <p class="font-semibold text-gray-800">{{ $anggota->nik }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-600">Email</p>
                <p class="font-semibold text-gray-800">{{ $anggota->email }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-600">No. HP</p>
                <p class="font-semibold text-gray-800">{{ $anggota->no_hp }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-600">Bergabung Sejak</p>
                <p class="font-semibold text-gray-800">{{ $anggota->created_at->format('d M Y') }}</p>
            </div>
        </div>
        <div class="mt-4 flex space-x-3">
            <a href="{{ route('anggota.profile') }}" 
               class="inline-block bg-blue-600 text-white px-6 py-2 rounded-xl hover:bg-blue-700 transition-all font-semibold">
                ✏️ Edit Profile
            </a>
            <a href="{{ route('anggota.export-profile') }}" 
               class="inline-block bg-green-600 text-white px-6 py-2 rounded-xl hover:bg-green-700 transition-all font-semibold">
                📥 Export Profile
            </a>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="bg-white rounded-2xl shadow-lg p-6 border border-blue-100">
        <h3 class="text-xl font-bold text-gray-800 mb-4">Quick Actions</h3>
        <div class="space-y-3">
            <a href="{{ route('anggota.qr-card') }}" 
               class="block bg-purple-50 hover:bg-purple-100 p-4 rounded-xl border-2 border-purple-200 transition-all">
                <div class="flex items-center">
                    <span class="text-3xl mr-3">📱</span>
                    <div>
                        <p class="font-bold text-purple-700">Kartu Anggota Digital</p>
                        <p class="text-xs text-purple-600">QR Code & Info</p>
                    </div>
                </div>
            </a>
            
            <a href="{{ route('kegiatan.index') }}" target="_blank"
               class="block bg-blue-50 hover:bg-blue-100 p-4 rounded-xl border-2 border-blue-200 transition-all">
                <div class="flex items-center">
                    <span class="text-3xl mr-3">📅</span>
                    <div>
                        <p class="font-bold text-blue-700">Lihat Kegiatan</p>
                        <p class="text-xs text-blue-600">{{ $kegiatanBerlangsung }} sedang berlangsung</p>
                    </div>
                </div>
            </a>
            
            <a href="{{ route('home') }}" target="_blank"
               class="block bg-green-50 hover:bg-green-100 p-4 rounded-xl border-2 border-green-200 transition-all">
                <div class="flex items-center">
                    <span class="text-3xl mr-3">🌐</span>
                    <div>
                        <p class="font-bold text-green-700">Website Utama</p>
                        <p class="text-xs text-green-600">Berita & Artikel</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>

<!-- Activity Timeline -->
<div class="bg-white rounded-2xl shadow-lg p-6 border border-blue-100 mb-8">
    <h3 class="text-xl font-bold text-gray-800 mb-4">📊 Activity Timeline</h3>
    <div class="space-y-4">
        @foreach($activities as $activity)
        <div class="flex items-start">
            <div class="w-10 h-10 rounded-full flex items-center justify-center mr-4 flex-shrink-0
                @if($activity['color'] == 'blue') bg-blue-100
                @elseif($activity['color'] == 'green') bg-green-100
                @elseif($activity['color'] == 'purple') bg-purple-100
                @elseif($activity['color'] == 'orange') bg-orange-100
                @endif">
                <span class="text-xl">{{ $activity['icon'] }}</span>
            </div>
            <div class="flex-1">
                <h4 class="font-bold text-gray-800">{{ $activity['title'] }}</h4>
                <p class="text-sm text-gray-600">{{ $activity['description'] }}</p>
                <p class="text-xs text-gray-400 mt-1">{{ $activity['time']->diffForHumans() }}</p>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Kegiatan Terbaru -->
<div class="bg-white rounded-2xl shadow-lg p-6 border border-blue-100 mb-8">
    <h3 class="text-xl font-bold text-gray-800 mb-4">Kegiatan Terbaru</h3>
    <div class="space-y-4">
        @forelse($kegiatanTerbaru as $kegiatan)
        <div class="flex items-center justify-between p-4 bg-blue-50 rounded-xl border border-blue-100">
            <div class="flex-1">
                <h4 class="font-semibold text-gray-800">{{ $kegiatan->nama_kegiatan }}</h4>
                <p class="text-sm text-gray-600">📅 {{ $kegiatan->tanggal_mulai->format('d M Y') }} • 📍 {{ $kegiatan->lokasi }}</p>
            </div>
            <span class="px-3 py-1 bg-blue-600 text-white rounded-lg text-sm font-semibold">
                {{ ucfirst($kegiatan->jenis_kegiatan) }}
            </span>
        </div>
        @empty
        <p class="text-gray-500 text-center py-8">Belum ada kegiatan</p>
        @endforelse
    </div>
</div>


@endsection
