

<?php $__env->startSection('title', 'Tambah Anggota'); ?>

<?php $__env->startSection('content'); ?>
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Tambah Anggota Baru</h1>
    </div>

    <div class="bg-white rounded-lg shadow-lg p-6">
        <form method="POST" action="<?php echo e(route('admin.anggota.store')); ?>">
            <?php echo csrf_field(); ?>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Nama Lengkap *</label>
                    <input type="text" name="nama" value="<?php echo e(old('nama')); ?>" required
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 <?php $__errorArgs = ['nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                    <?php $__errorArgs = ['nama'];
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
                    <label class="block text-gray-700 font-semibold mb-2">Username *</label>
                    <input type="text" name="username" value="<?php echo e(old('username')); ?>" required
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                    <?php $__errorArgs = ['username'];
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
                    <label class="block text-gray-700 font-semibold mb-2">NIK *</label>
                    <input type="text" name="nik" value="<?php echo e(old('nik')); ?>" required
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 <?php $__errorArgs = ['nik'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                    <?php $__errorArgs = ['nik'];
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
                    <label class="block text-gray-700 font-semibold mb-2">Tempat Lahir *</label>
                    <input type="text" name="tempat_lahir" value="<?php echo e(old('tempat_lahir')); ?>" required
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Tanggal Lahir *</label>
                    <input type="date" name="tanggal_lahir" value="<?php echo e(old('tanggal_lahir')); ?>" required
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Jenis Kelamin *</label>
                    <select name="jenis_kelamin" required
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">Pilih</option>
                        <option value="L" <?php echo e(old('jenis_kelamin') == 'L' ? 'selected' : ''); ?>>Laki-laki</option>
                        <option value="P" <?php echo e(old('jenis_kelamin') == 'P' ? 'selected' : ''); ?>>Perempuan</option>
                    </select>
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2">No HP *</label>
                    <input type="text" name="no_hp" value="<?php echo e(old('no_hp')); ?>" required
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Email *</label>
                    <input type="email" name="email" value="<?php echo e(old('email')); ?>" required
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                    <?php $__errorArgs = ['email'];
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
                    <label class="block text-gray-700 font-semibold mb-2">Password *</label>
                    <input type="password" name="password" required
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                    <p class="text-sm text-gray-500 mt-1">Minimal 6 karakter</p>
                    <?php $__errorArgs = ['password'];
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
                    <label class="block text-gray-700 font-semibold mb-2">Pendidikan Terakhir *</label>
                    <input type="text" name="pendidikan_terakhir" value="<?php echo e(old('pendidikan_terakhir')); ?>" required
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Pekerjaan *</label>
                    <input type="text" name="pekerjaan" value="<?php echo e(old('pekerjaan')); ?>" required
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Status *</label>
                    <select name="status" required
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="aktif" <?php echo e(old('status') == 'aktif' ? 'selected' : ''); ?>>Aktif</option>
                        <option value="non-aktif" <?php echo e(old('status') == 'non-aktif' ? 'selected' : ''); ?>>Non-Aktif</option>
                    </select>
                </div>

                <div class="md:col-span-2">
                    <label class="block text-gray-700 font-semibold mb-2">Alamat *</label>
                    <textarea name="alamat" rows="3" required
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"><?php echo e(old('alamat')); ?></textarea>
                </div>
            </div>

            <div class="mt-6 flex space-x-4">
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">
                    Simpan
                </button>
                <a href="<?php echo e(route('admin.anggota.index')); ?>"
                    class="bg-gray-300 text-gray-700 px-6 py-2 rounded-lg hover:bg-gray-400 transition">
                    Batal
                </a>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\projectsempro\resources\views/admin/anggota/create.blade.php ENDPATH**/ ?>