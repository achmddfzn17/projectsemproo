

<?php $__env->startSection('title', 'Edit Program'); ?>

<?php $__env->startSection('content'); ?>
<div class="mb-6">
    <a href="<?php echo e(route('admin.program.index')); ?>" class="text-blue-600 hover:text-blue-700 font-semibold">← Kembali</a>
</div>

<div class="bg-white rounded-2xl shadow-lg p-8 border border-blue-100">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Edit Program</h2>
    
    <form method="POST" action="<?php echo e(route('admin.program.update', $program->id)); ?>">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        
        <div class="space-y-6">
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Program *</label>
                <input type="text" name="nama_program" value="<?php echo e(old('nama_program', $program->nama_program)); ?>" 
                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                       required>
                <?php $__errorArgs = ['nama_program'];
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
                <label class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi *</label>
                <textarea name="deskripsi" rows="4" 
                          class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                          required><?php echo e(old('deskripsi', $program->deskripsi)); ?></textarea>
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

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Tujuan *</label>
                <textarea name="tujuan" rows="3" 
                          class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                          required><?php echo e(old('tujuan', $program->tujuan)); ?></textarea>
                <?php $__errorArgs = ['tujuan'];
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

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Target Peserta *</label>
                    <input type="text" name="target_peserta" value="<?php echo e(old('target_peserta', $program->target_peserta)); ?>" 
                           class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                           required>
                    <?php $__errorArgs = ['target_peserta'];
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
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Durasi *</label>
                    <input type="text" name="durasi" value="<?php echo e(old('durasi', $program->durasi)); ?>" 
                           class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                           required>
                    <?php $__errorArgs = ['durasi'];
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
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Status *</label>
                <select name="status" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                    <option value="">Pilih Status</option>
                    <option value="aktif" <?php echo e($program->status == 'aktif' ? 'selected' : ''); ?>>Aktif</option>
                    <option value="non-aktif" <?php echo e($program->status == 'non-aktif' ? 'selected' : ''); ?>>Non-Aktif</option>
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
        </div>

        <div class="mt-8 flex space-x-4">
            <button type="submit" class="bg-blue-600 text-white px-8 py-3 rounded-xl hover:bg-blue-700 transition-all shadow-lg font-semibold">
                Update Program
            </button>
            <a href="<?php echo e(route('admin.program.index')); ?>" class="bg-gray-200 text-gray-700 px-8 py-3 rounded-xl hover:bg-gray-300 transition-all font-semibold">
                Batal
            </a>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\projectsempro\resources\views/admin/program/edit.blade.php ENDPATH**/ ?>