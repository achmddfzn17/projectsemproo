@extends('layouts.app')

@section('title', 'Daftar Kegiatan - ' . $kegiatan->nama_kegiatan)

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-3xl mx-auto">
        <!-- Header -->
        <div class="bg-gradient-to-r from-blue-500 to-blue-600 rounded-2xl p-8 text-white mb-8 shadow-xl">
            <h1 class="text-3xl font-black mb-2">📝 Pendaftaran Kegiatan</h1>
            <p class="text-blue-100">{{ $kegiatan->nama_kegiatan }}</p>
        </div>

        <!-- Info Kegiatan -->
        <div class="bg-white rounded-2xl shadow-lg p-6 border border-blue-100 mb-6">
            <h3 class="text-xl font-bold text-gray-800 mb-4">Informasi Kegiatan</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <p class="text-sm text-gray-600">📅 Tanggal</p>
                    <p class="font-semibold text-gray-800">{{ $kegiatan->tanggal_mulai->format('d M Y') }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-600">📍 Lokasi</p>
                    <p class="font-semibold text-gray-800">{{ $kegiatan->lokasi }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-600">🎯 Jenis</p>
                    <p class="font-semibold text-gray-800">{{ ucfirst($kegiatan->jenis_kegiatan) }}</p>
                </div>
                @if($kegiatan->kuota_peserta)
                <div>
                    <p class="text-sm text-gray-600">👥 Kuota</p>
                    <p class="font-semibold text-gray-800">
                        {{ $kegiatan->sisaKuota() }} / {{ $kegiatan->kuota_peserta }} tersisa
                    </p>
                </div>
                @endif
            </div>
        </div>

        <!-- Form Pendaftaran -->
        <div class="bg-white rounded-2xl shadow-lg p-8 border border-blue-100">
            <h3 class="text-xl font-bold text-gray-800 mb-6">Form Pendaftaran</h3>

            @if(session('error'))
            <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-6">
                <p class="text-red-700">{{ session('error') }}</p>
            </div>
            @endif

            <form action="{{ route('kegiatan.daftar.store', $kegiatan->id) }}" method="POST">
                @csrf
                
                <div class="space-y-6">
                    <!-- Nama Lengkap -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Nama Lengkap <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap') }}" required
                               class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        @error('nama_lengkap')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Email <span class="text-red-500">*</span>
                        </label>
                        <input type="email" name="email" value="{{ old('email') }}" required
                               class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- No HP -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            No. HP/WhatsApp <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="no_hp" value="{{ old('no_hp') }}" required
                               class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        @error('no_hp')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Alamat -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Alamat
                        </label>
                        <textarea name="alamat" rows="3"
                                  class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ old('alamat') }}</textarea>
                        @error('alamat')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Instansi -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Instansi/Organisasi
                        </label>
                        <input type="text" name="instansi" value="{{ old('instansi') }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        @error('instansi')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Alasan -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Alasan Mengikuti Kegiatan
                        </label>
                        <textarea name="alasan" rows="4"
                                  class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ old('alasan') }}</textarea>
                        @error('alasan')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="mt-8 flex space-x-4">
                    <button type="submit" 
                            class="flex-1 bg-blue-600 text-white px-8 py-4 rounded-xl hover:bg-blue-700 transition-all shadow-lg font-bold text-lg">
                        ✅ Daftar Sekarang
                    </button>
                    <a href="{{ route('kegiatan.detail', $kegiatan->id) }}" 
                       class="px-8 py-4 border-2 border-gray-300 text-gray-700 rounded-xl hover:bg-gray-50 transition-all font-semibold">
                        Batal
                    </a>
                </div>
            </form>
        </div>

        <!-- Info -->
        <div class="bg-yellow-50 rounded-xl p-4 border border-yellow-200 mt-6">
            <p class="font-semibold text-gray-800 mb-2">📌 Informasi Penting:</p>
            <ul class="text-sm text-gray-600 space-y-1 list-disc list-inside">
                <li>Pendaftaran akan diverifikasi oleh admin</li>
                <li>Anda akan menerima email konfirmasi setelah pendaftaran disetujui</li>
                <li>Simpan QR Code yang diberikan untuk check-in di hari kegiatan</li>
                <li>Pastikan data yang diisi sudah benar</li>
            </ul>
        </div>
    </div>
</div>
@endsection
