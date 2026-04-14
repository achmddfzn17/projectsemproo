<?php $__env->startSection('title', 'Upload Foto Galeri'); ?>

<?php $__env->startSection('content'); ?>
<!-- Header -->
<div class="mb-8 bg-gradient-to-r from-blue-600 to-blue-700 rounded-2xl p-8 text-white shadow-xl">
    <div class="flex items-center gap-4">
        <a href="<?php echo e(route('admin.galeri.index')); ?>" class="bg-white/20 hover:bg-white/30 rounded-xl p-2 transition-all">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
        </a>
        <div>
            <h1 class="text-4xl font-extrabold mb-2 flex items-center gap-2"><iconify-icon icon="mdi:image-plus" class="text-2xl"></iconify-icon> Upload Foto</h1>
            <p class="text-blue-100 text-lg">Tambah foto baru ke galeri</p>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <!-- Form -->
    <div class="bg-white rounded-2xl shadow-lg border border-blue-200 p-6">
        <form action="<?php echo e(route('admin.galeri.store')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Judul Foto *</label>
                    <input type="text" name="judul" value="<?php echo e(old('judul')); ?>" required
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent <?php $__errorArgs = ['judul'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                        placeholder="Contoh: Kerja Bakti membersihan selokan">
                    <?php $__errorArgs = ['judul'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Kegiatan (Opsional)</label>
                    <input type="text" name="nama_kegiatan" value="<?php echo e(old('nama_kegiatan')); ?>"
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent <?php $__errorArgs = ['nama_kegiatan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                        placeholder="Contoh: Kerja Bakti Membersihkan Selokan">
                    <?php $__errorArgs = ['nama_kegiatan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    <p class="text-gray-500 text-xs mt-1">Isi manual nama kegiatan terkait foto ini</p>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi (Opsional)</label>
                    <textarea name="deskripsi" rows="3"
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500 <?php $__errorArgs = ['deskripsi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                        placeholder="Deskripsi atau caption foto..."><?php echo e(old('deskripsi')); ?></textarea>
                    <?php $__errorArgs = ['deskripsi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Foto *</label>
                    <input type="file" name="foto" accept="image/*" required
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500 <?php $__errorArgs = ['foto'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                        id="foto-input" onchange="previewImage(this)">
                    <?php $__errorArgs = ['foto'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    <p class="text-gray-500 text-xs mt-1">Format: JPG, PNG, JPEG. Maks: 5MB</p>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Urutan Tampilan</label>
                    <input type="number" name="urutan" value="<?php echo e(old('urutan', 0)); ?>" min="0"
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        placeholder="0">
                    <p class="text-gray-500 text-xs mt-1">Angka kecil = tampil lebih dulu</p>
                </div>
            </div>

            <button type="submit" class="w-full mt-6 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white font-bold py-3 px-6 rounded-xl transition-all transform hover:-translate-y-1 shadow-lg flex items-center justify-center gap-2">
                <iconify-icon icon="mdi:content-save" class="text-lg"></iconify-icon> Upload Foto
            </button>
        </form>
    </div>

    <!-- Preview -->
    <div class="bg-white rounded-2xl shadow-lg border border-blue-200 p-6">
        <h3 class="font-bold text-gray-800 mb-4">Preview Foto</h3>
        <div id="preview-container" class="aspect-square rounded-xl border-2 border-dashed border-gray-300 bg-gray-50 overflow-hidden flex items-center justify-center">
            <div class="text-center p-8" id="placeholder">
                <svg class="w-20 h-20 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                <p class="text-gray-400">Pilih foto untuk preview</p>
            </div>
            <img id="preview-img" class="hidden w-full h-full object-cover">
        </div>
    </div>
</div>

<script>
function previewImage(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('preview-img').src = e.target.result;
            document.getElementById('preview-img').classList.remove('hidden');
            document.getElementById('placeholder')?.classList.add('hidden');
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\projectsempro\resources\views/admin/galeri/create.blade.php ENDPATH**/ ?>