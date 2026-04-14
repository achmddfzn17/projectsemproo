

<?php $__env->startSection('title', 'Tambah Kegiatan'); ?>

<?php $__env->startSection('content'); ?>
<div class="mb-6">
    <a href="<?php echo e(route('admin.kegiatan.index')); ?>" class="text-blue-600 hover:text-blue-700 font-semibold">← Kembali</a>
</div>

<div class="bg-white rounded-2xl shadow-lg p-8 border border-blue-100">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Tambah Kegiatan Baru</h2>
    
    <form method="POST" action="<?php echo e(route('admin.kegiatan.store')); ?>" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Kegiatan *</label>
                <input type="text" name="nama_kegiatan" value="<?php echo e(old('nama_kegiatan')); ?>" 
                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                       required>
                <?php $__errorArgs = ['nama_kegiatan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
                <?php $__errorArgs = ['jenis_kegiatan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Tanggal Mulai *</label>
                <input type="date" name="tanggal_mulai" value="<?php echo e(old('tanggal_mulai')); ?>" 
                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                       required>
                <?php $__errorArgs = ['tanggal_mulai'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Tanggal Selesai *</label>
                <input type="date" name="tanggal_selesai" value="<?php echo e(old('tanggal_selesai')); ?>" 
                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                       required>
                <?php $__errorArgs = ['tanggal_selesai'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Lokasi *</label>
                <input type="text" name="lokasi" value="<?php echo e(old('lokasi')); ?>" 
                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                       required>
                <?php $__errorArgs = ['lokasi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Status *</label>
                <select name="status" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                    <option value="">Pilih Status</option>
                    <option value="rencana">Rencana</option>
                    <option value="berlangsung">Berlangsung</option>
                    <option value="selesai">Selesai</option>
                </select>
                <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Kuota Peserta</label>
                <input type="number" name="kuota_peserta" value="<?php echo e(old('kuota_peserta')); ?>" min="0"
                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                       placeholder="Kosongkan jika tidak ada batasan">
                <p class="text-sm text-gray-500 mt-1">Kosongkan jika tidak ada batasan kuota</p>
                <?php $__errorArgs = ['kuota_peserta'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
                      required><?php echo e(old('deskripsi')); ?></textarea>
            <?php $__errorArgs = ['deskripsi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
            <?php $__errorArgs = ['foto'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
            <a href="<?php echo e(route('admin.kegiatan.index')); ?>" class="bg-gray-200 text-gray-700 px-8 py-3 rounded-xl hover:bg-gray-300 transition-all font-semibold">
                Batal
            </a>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\projectsempro\resources\views/admin/kegiatan/create.blade.php ENDPATH**/ ?>