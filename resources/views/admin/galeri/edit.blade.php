@extends('layouts.admin')

@section('title', 'Edit Foto Galeri')

@section('content')
<!-- Header -->
<div class="mb-8 bg-gradient-to-r from-blue-600 to-blue-700 rounded-2xl p-8 text-white shadow-xl">
    <div class="flex items-center gap-4">
        <a href="{{ route('admin.galeri.index') }}" class="bg-white/20 hover:bg-white/30 rounded-xl p-2 transition-all">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
        </a>
        <div>
            <h1 class="text-4xl font-extrabold mb-2">✏️ Edit Foto</h1>
            <p class="text-blue-100 text-lg">Update informasi foto galeri</p>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <!-- Form -->
    <div class="bg-white rounded-2xl shadow-lg border border-blue-200 p-6">
        <form action="{{ route('admin.galeri.update', $galeri->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Judul Foto *</label>
                    <input type="text" name="judul" value="{{ old('judul', $galeri->judul) }}" required
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('judul') border-red-500 @enderror"
                        placeholder="Contoh: Kerja Bakti membersihan selokan">
                    @error('judul')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Kegiatan (Opsional)</label>
                    <select name="kegiatan_id" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500 @error('kegiatan_id') border-red-500 @enderror">
                        <option value="">-- Tidak terkait kegiatan --</option>
                        @foreach($kegiatans as $kegiatan)
                        <option value="{{ $kegiatan->id }}" {{ old('kegiatan_id', $galeri->kegiatan_id) == $kegiatan->id ? 'selected' : '' }}>
                            {{ $kegiatan->nama_kegiatan }} ({{ $kegiatan->tanggal_mulai->format('d M Y') }})
                        </option>
                        @endforeach
                    </select>
                    @error('kegiatan_id')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi (Opsional)</label>
                    <textarea name="deskripsi" rows="3"
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500 @error('deskripsi') border-red-500 @enderror"
                        placeholder="Deskripsi atau caption foto...">{{ old('deskripsi', $galeri->deskripsi) }}</textarea>
                    @error('deskripsi')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Ganti Foto (Opsional)</label>
                    <input type="file" name="foto" accept="image/*"
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500 @error('foto') border-red-500 @enderror"
                        id="foto-input" onchange="previewImage(this)">
                    @error('foto')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                    <p class="text-gray-500 text-xs mt-1">Kosongkan jika tidak ingin mengganti foto</p>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Urutan Tampilan</label>
                    <input type="number" name="urutan" value="{{ old('urutan', $galeri->urutan) }}" min="0"
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        placeholder="0">
                    <p class="text-gray-500 text-xs mt-1">Angka kecil = tampil lebih dulu</p>
                </div>
            </div>

            <div class="flex gap-3 mt-6">
                <button type="submit" class="flex-1 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white font-bold py-3 px-6 rounded-xl transition-all transform hover:-translate-y-1 shadow-lg">
                    💾 Simpan Perubahan
                </button>
                <a href="{{ route('admin.galeri.index') }}" class="px-6 py-3 bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold rounded-xl transition-all">
                    Batal
                </a>
            </div>
        </form>
    </div>

    <!-- Preview -->
    <div class="bg-white rounded-2xl shadow-lg border border-blue-200 p-6">
        <h3 class="font-bold text-gray-800 mb-4">Preview Foto</h3>
        <div id="preview-container" class="aspect-square rounded-xl border-2 border-dashed border-gray-300 bg-gray-50 overflow-hidden flex items-center justify-center">
            @if($galeri->foto)
            <img id="preview-img" src="{{ asset('storage/' . $galeri->foto) }}" alt="{{ $galeri->judul }}" class="w-full h-full object-cover">
            @else
            <div class="text-center p-8" id="placeholder">
                <svg class="w-20 h-20 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                <p class="text-gray-400">Tidak ada foto</p>
            </div>
            @endif
            <img id="preview-img-new" class="hidden w-full h-full object-cover">
        </div>
    </div>
</div>

<script>
function previewImage(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('preview-img-new').src = e.target.result;
            document.getElementById('preview-img-new').classList.remove('hidden');
            document.getElementById('placeholder')?.classList.add('hidden');
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endsection
