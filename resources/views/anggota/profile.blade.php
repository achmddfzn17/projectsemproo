@extends('layouts.anggota')

@section('title', 'Profile Saya')

@section('content')
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Profile Card -->
    <div class="bg-white rounded-2xl shadow-lg p-6 border border-blue-100">
        <div class="text-center">
            @if($anggota->foto_profil)
            <img src="{{ asset('storage/' . $anggota->foto_profil) }}" 
                 class="w-32 h-32 rounded-full mx-auto mb-4 object-cover border-4 border-blue-200">
            @else
            <div class="w-32 h-32 rounded-full mx-auto mb-4 bg-blue-600 flex items-center justify-center border-4 border-blue-200">
                <span class="text-white text-5xl font-bold">{{ substr($anggota->nama, 0, 1) }}</span>
            </div>
            @endif
            <h3 class="text-xl font-bold text-gray-800">{{ $anggota->nama }}</h3>
            <p class="text-gray-600">{{ $anggota->email }}</p>
            <span class="inline-block mt-3 px-4 py-1 bg-green-100 text-green-700 rounded-full text-sm font-semibold">
                {{ ucfirst($anggota->status) }}
            </span>
        </div>
    </div>

    <!-- Edit Profile Form -->
    <div class="lg:col-span-2 bg-white rounded-2xl shadow-lg p-6 border border-blue-100">
        <h3 class="text-xl font-bold text-gray-800 mb-6">Edit Profile</h3>
        
        <form method="POST" action="{{ route('anggota.profile.update') }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap</label>
                    <input type="text" name="nama" value="{{ old('nama', $anggota->nama) }}" required
                           class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500">
                    @error('nama')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                    <input type="email" name="email" value="{{ old('email', $anggota->email) }}" required
                           class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500">
                    @error('email')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">No. HP</label>
                    <input type="text" name="no_hp" value="{{ old('no_hp', $anggota->no_hp) }}" required
                           class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500">
                    @error('no_hp')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Pendidikan Terakhir</label>
                    <input type="text" name="pendidikan_terakhir" value="{{ old('pendidikan_terakhir', $anggota->pendidikan_terakhir) }}" required
                           class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500">
                    @error('pendidikan_terakhir')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Pekerjaan</label>
                    <input type="text" name="pekerjaan" value="{{ old('pekerjaan', $anggota->pekerjaan) }}" required
                           class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500">
                    @error('pekerjaan')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Alamat</label>
                    <textarea name="alamat" rows="3" required
                              class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500">{{ old('alamat', $anggota->alamat) }}</textarea>
                    @error('alamat')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Foto Profil</label>
                    <input type="file" name="foto_profil" accept="image/*"
                           class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500">
                    <p class="text-sm text-gray-500 mt-1">Format: JPG, PNG. Max: 2MB</p>
                    @error('foto_profil')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                </div>
            </div>

            <button type="submit" 
                    class="mt-6 bg-blue-600 text-white px-8 py-3 rounded-xl hover:bg-blue-700 transition-all shadow-lg font-semibold">
                Simpan Perubahan
            </button>
        </form>
    </div>
</div>

<!-- Change Password -->
<div class="mt-6 bg-white rounded-2xl shadow-lg p-6 border border-blue-100">
    <h3 class="text-xl font-bold text-gray-800 mb-6">Ubah Password</h3>
    
    <form method="POST" action="{{ route('anggota.password.update') }}">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Password Lama</label>
                <input type="password" name="current_password" required
                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500">
                @error('current_password')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Password Baru</label>
                <input type="password" name="password" required
                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500">
                @error('password')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" required
                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500">
            </div>
        </div>

        <button type="submit" 
                class="mt-6 bg-red-600 text-white px-8 py-3 rounded-xl hover:bg-red-700 transition-all shadow-lg font-semibold">
            Ubah Password
        </button>
    </form>
</div>
@endsection
