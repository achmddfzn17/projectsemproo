@extends('layouts.admin')

@section('title', 'Tambah Program')

@section('content')
<div class="mb-6">
    <a href="{{ route('admin.program.index') }}" class="text-blue-600 hover:text-blue-700 font-semibold">← Kembali</a>
</div>

<div class="bg-white rounded-2xl shadow-lg p-8 border border-blue-100">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Tambah Program Baru</h2>
    
    <form method="POST" action="{{ route('admin.program.store') }}">
        @csrf
        
        <div class="space-y-6">
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Program *</label>
                <input type="text" name="nama_program" value="{{ old('nama_program') }}" 
                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                       required>
                @error('nama_program')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi *</label>
                <textarea name="deskripsi" rows="4" 
                          class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                          required>{{ old('deskripsi') }}</textarea>
                @error('deskripsi')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Tujuan *</label>
                <textarea name="tujuan" rows="3" 
                          class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                          required>{{ old('tujuan') }}</textarea>
                @error('tujuan')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Target Peserta *</label>
                    <input type="text" name="target_peserta" value="{{ old('target_peserta') }}" 
                           placeholder="Contoh: Pemuda 17-30 tahun"
                           class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                           required>
                    @error('target_peserta')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Durasi *</label>
                    <input type="text" name="durasi" value="{{ old('durasi') }}" 
                           placeholder="Contoh: 6 bulan"
                           class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                           required>
                    @error('durasi')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Status *</label>
                <select name="status" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                    <option value="">Pilih Status</option>
                    <option value="aktif">Aktif</option>
                    <option value="non-aktif">Non-Aktif</option>
                </select>
                @error('status')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="mt-8 flex space-x-4">
            <button type="submit" class="bg-blue-600 text-white px-8 py-3 rounded-xl hover:bg-blue-700 transition-all shadow-lg font-semibold">
                Simpan Program
            </button>
            <a href="{{ route('admin.program.index') }}" class="bg-gray-200 text-gray-700 px-8 py-3 rounded-xl hover:bg-gray-300 transition-all font-semibold">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection
