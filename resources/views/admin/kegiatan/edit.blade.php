@extends('layouts.admin')

@section('title', 'Edit Kegiatan')

@section('content')
<div class="mb-6">
    <a href="{{ route('admin.kegiatan.index') }}" class="text-blue-600 hover:text-blue-700 font-semibold">← Kembali</a>
</div>

<div class="bg-white rounded-2xl shadow-lg p-8 border border-blue-100">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Edit Kegiatan</h2>
    
    <form method="POST" action="{{ route('admin.kegiatan.update', $kegiatan->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Kegiatan *</label>
                <input type="text" name="nama_kegiatan" value="{{ old('nama_kegiatan', $kegiatan->nama_kegiatan) }}" 
                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                       required>
                @error('nama_kegiatan')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Jenis Kegiatan *</label>
                <select name="jenis_kegiatan" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                    <option value="">Pilih Jenis</option>
                    <option value="sosial" {{ $kegiatan->jenis_kegiatan == 'sosial' ? 'selected' : '' }}>Sosial</option>
                    <option value="pendidikan" {{ $kegiatan->jenis_kegiatan == 'pendidikan' ? 'selected' : '' }}>Pendidikan</option>
                    <option value="olahraga" {{ $kegiatan->jenis_kegiatan == 'olahraga' ? 'selected' : '' }}>Olahraga</option>
                    <option value="seni" {{ $kegiatan->jenis_kegiatan == 'seni' ? 'selected' : '' }}>Seni</option>
                    <option value="lingkungan" {{ $kegiatan->jenis_kegiatan == 'lingkungan' ? 'selected' : '' }}>Lingkungan</option>
                </select>
                @error('jenis_kegiatan')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Tanggal Mulai *</label>
                <input type="date" name="tanggal_mulai" value="{{ old('tanggal_mulai', $kegiatan->tanggal_mulai ? $kegiatan->tanggal_mulai->format('Y-m-d') : '') }}" 
                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                       required>
                @error('tanggal_mulai')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Tanggal Selesai *</label>
                <input type="date" name="tanggal_selesai" value="{{ old('tanggal_selesai', $kegiatan->tanggal_selesai ? $kegiatan->tanggal_selesai->format('Y-m-d') : '') }}" 
                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                       required>
                @error('tanggal_selesai')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Lokasi *</label>
                <input type="text" name="lokasi" value="{{ old('lokasi', $kegiatan->lokasi) }}" 
                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                       required>
                @error('lokasi')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Status *</label>
                <select name="status" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                    <option value="">Pilih Status</option>
                    <option value="rencana" {{ $kegiatan->status == 'rencana' ? 'selected' : '' }}>Rencana</option>
                    <option value="berlangsung" {{ $kegiatan->status == 'berlangsung' ? 'selected' : '' }}>Berlangsung</option>
                    <option value="selesai" {{ $kegiatan->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                </select>
                @error('status')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="mt-6">
            <label class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi *</label>
            <textarea name="deskripsi" rows="5" 
                      class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                      required>{{ old('deskripsi', $kegiatan->deskripsi) }}</textarea>
            @error('deskripsi')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mt-6">
            <label class="block text-sm font-semibold text-gray-700 mb-2">Foto Kegiatan</label>
            
            <!-- Current Image -->
            @if($kegiatan->foto)
                <div id="currentImage" class="mb-4">
                    <p class="text-sm text-gray-600 mb-2">Foto Saat Ini:</p>
                    <img src="{{ asset('storage/' . $kegiatan->foto) }}" class="w-48 h-48 object-cover rounded-xl border-2 border-gray-200">
                </div>
            @endif
            
            <!-- Preview New Image -->
            <div id="imagePreview" class="hidden mb-4">
                <p class="text-sm text-gray-600 mb-2">Preview Foto Baru:</p>
                <img id="preview" src="" alt="Preview" class="w-48 h-48 object-cover rounded-xl border-2 border-blue-200">
                <button type="button" onclick="removeImage()" class="mt-2 text-red-600 hover:text-red-700 text-sm font-semibold">
                    ✕ Hapus Gambar Baru
                </button>
            </div>
            
            <!-- Upload Button -->
            <div class="relative">
                <input type="file" name="foto" id="fotoInput" accept="image/*" 
                       class="hidden" onchange="previewImage(event)">
                <label for="fotoInput" class="cursor-pointer inline-flex items-center px-6 py-3 bg-blue-50 border-2 border-blue-300 border-dashed rounded-xl hover:bg-blue-100 transition-all">
                    <svg class="w-6 h-6 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    <span class="text-blue-600 font-semibold">{{ $kegiatan->foto ? 'Ganti Foto' : 'Pilih Foto' }}</span>
                </label>
                <span id="fileName" class="ml-3 text-gray-600"></span>
            </div>
            <p class="text-sm text-gray-500 mt-2">Format: JPG, PNG. Max: 2MB. Kosongkan jika tidak ingin mengubah foto.</p>
            @error('foto')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <script>
            function previewImage(event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById('preview').src = e.target.result;
                        document.getElementById('imagePreview').classList.remove('hidden');
                        document.getElementById('fileName').textContent = file.name;
                        
                        // Hide current image when new image is selected
                        const currentImage = document.getElementById('currentImage');
                        if (currentImage) {
                            currentImage.style.opacity = '0.5';
                        }
                    }
                    reader.readAsDataURL(file);
                }
            }

            function removeImage() {
                document.getElementById('fotoInput').value = '';
                document.getElementById('imagePreview').classList.add('hidden');
                document.getElementById('fileName').textContent = '';
                
                // Show current image again
                const currentImage = document.getElementById('currentImage');
                if (currentImage) {
                    currentImage.style.opacity = '1';
                }
            }
        </script>

        <div class="mt-8 flex space-x-4">
            <button type="submit" class="bg-blue-600 text-white px-8 py-3 rounded-xl hover:bg-blue-700 transition-all shadow-lg font-semibold">
                Update Kegiatan
            </button>
            <a href="{{ route('admin.kegiatan.index') }}" class="bg-gray-200 text-gray-700 px-8 py-3 rounded-xl hover:bg-gray-300 transition-all font-semibold">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection
