@extends('layouts.admin')

@section('title', 'Tambah Kegiatan')

@section('content')
<div class="mb-6">
    <a href="{{ route('admin.kegiatan.index') }}" class="text-blue-600 hover:text-blue-700 font-semibold">← Kembali</a>
</div>

<div class="bg-white rounded-2xl shadow-lg p-8 border border-blue-100">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Tambah Kegiatan Baru</h2>
    
    <form method="POST" action="{{ route('admin.kegiatan.store') }}" enctype="multipart/form-data">
        @csrf
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Kegiatan *</label>
                <input type="text" name="nama_kegiatan" value="{{ old('nama_kegiatan') }}" 
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
                    <option value="sosial">Sosial</option>
                    <option value="pendidikan">Pendidikan</option>
                    <option value="olahraga">Olahraga</option>
                    <option value="seni">Seni</option>
                    <option value="lingkungan">Lingkungan</option>
                </select>
                @error('jenis_kegiatan')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Tanggal Mulai *</label>
                <input type="date" name="tanggal_mulai" value="{{ old('tanggal_mulai') }}" 
                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                       required>
                @error('tanggal_mulai')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Tanggal Selesai *</label>
                <input type="date" name="tanggal_selesai" value="{{ old('tanggal_selesai') }}" 
                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                       required>
                @error('tanggal_selesai')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Lokasi *</label>
                <input type="text" name="lokasi" value="{{ old('lokasi') }}" 
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
                    <option value="rencana">Rencana</option>
                    <option value="berlangsung">Berlangsung</option>
                    <option value="selesai">Selesai</option>
                </select>
                @error('status')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Kuota Peserta</label>
                <input type="number" name="kuota_peserta" value="{{ old('kuota_peserta') }}" min="0"
                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                       placeholder="Kosongkan jika tidak ada batasan">
                <p class="text-sm text-gray-500 mt-1">Kosongkan jika tidak ada batasan kuota</p>
                @error('kuota_peserta')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Pendaftaran Online</label>
                <div class="flex items-center">
                    <input type="checkbox" name="is_pendaftaran_open" value="1" checked
                           class="w-5 h-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                    <span class="ml-2 text-gray-700">Buka pendaftaran online</span>
                </div>
                <p class="text-sm text-gray-500 mt-1">Centang untuk mengaktifkan pendaftaran online</p>
            </div>
        </div>

        <div class="mt-6">
            <label class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi *</label>
            <textarea name="deskripsi" rows="5" 
                      class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                      required>{{ old('deskripsi') }}</textarea>
            @error('deskripsi')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mt-6">
            <label class="block text-sm font-semibold text-gray-700 mb-2">Foto Kegiatan</label>
            
            <!-- Preview Image -->
            <div id="imagePreview" class="hidden mb-4">
                <img id="preview" src="" alt="Preview" class="w-48 h-48 object-cover rounded-xl border-2 border-blue-200">
                <button type="button" onclick="removeImage()" class="mt-2 text-red-600 hover:text-red-700 text-sm font-semibold">
                    ✕ Hapus Gambar
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
                    <span class="text-blue-600 font-semibold">Pilih Foto</span>
                </label>
                <span id="fileName" class="ml-3 text-gray-600"></span>
            </div>
            <p class="text-sm text-gray-500 mt-2">Format: JPG, PNG. Max: 2MB</p>
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
                    }
                    reader.readAsDataURL(file);
                }
            }

            function removeImage() {
                document.getElementById('fotoInput').value = '';
                document.getElementById('imagePreview').classList.add('hidden');
                document.getElementById('fileName').textContent = '';
            }
        </script>

        <div class="mt-8 flex space-x-4">
            <button type="submit" class="bg-blue-600 text-white px-8 py-3 rounded-xl hover:bg-blue-700 transition-all shadow-lg font-semibold">
                Simpan Kegiatan
            </button>
            <a href="{{ route('admin.kegiatan.index') }}" class="bg-gray-200 text-gray-700 px-8 py-3 rounded-xl hover:bg-gray-300 transition-all font-semibold">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection
