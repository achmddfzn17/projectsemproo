@extends('layouts.admin')

@section('title', 'Tambah Artikel')

@section('content')
<div class="mb-6">
    <a href="{{ route('admin.artikel.index') }}" class="text-blue-600 hover:text-blue-700 font-semibold">← Kembali</a>
</div>

<div class="bg-white rounded-2xl shadow-lg p-8 border border-blue-100">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Tambah Artikel Baru</h2>
    
    <form method="POST" action="{{ route('admin.artikel.store') }}" enctype="multipart/form-data">
        @csrf
        
        <div class="space-y-6">
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Judul Artikel *</label>
                <input type="text" name="judul" value="{{ old('judul') }}" 
                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                       required>
                @error('judul')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Slug (URL) *</label>
                <input type="text" name="slug" value="{{ old('slug') }}" 
                       placeholder="contoh: tips-menjadi-pemuda-produktif"
                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                       required>
                <p class="text-sm text-gray-500 mt-1">Gunakan huruf kecil, tanpa spasi, pisahkan dengan tanda -</p>
                @error('slug')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Kategori *</label>
                <input type="text" name="kategori" value="{{ old('kategori') }}" 
                       placeholder="Contoh: Pendidikan, Kesehatan, Teknologi"
                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                       required>
                @error('kategori')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Konten Artikel *</label>
                <textarea name="konten" rows="12" 
                          class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                          required>{{ old('konten') }}</textarea>
                @error('konten')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Gambar Artikel</label>
                <input type="file" name="gambar" accept="image/*" 
                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <p class="text-sm text-gray-500 mt-1">Format: JPG, PNG. Max: 2MB</p>
                @error('gambar')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="mt-8 flex space-x-4">
            <button type="submit" class="bg-blue-600 text-white px-8 py-3 rounded-xl hover:bg-blue-700 transition-all shadow-lg font-semibold">
                Publikasi Artikel
            </button>
            <a href="{{ route('admin.artikel.index') }}" class="bg-gray-200 text-gray-700 px-8 py-3 rounded-xl hover:bg-gray-300 transition-all font-semibold">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection
