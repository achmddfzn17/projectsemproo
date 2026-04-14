

<?php $__env->startSection('title', 'Profile Saya'); ?>

<?php $__env->startSection('content'); ?>
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Profile Card -->
    <div class="bg-white rounded-2xl shadow-lg p-6 border border-blue-100">
        <div class="text-center">
            <?php if($anggota->foto_profil): ?>
            <img src="<?php echo e(asset('storage/' . $anggota->foto_profil)); ?>" 
                 class="w-32 h-32 rounded-full mx-auto mb-4 object-cover border-4 border-blue-200">
            <?php else: ?>
            <div class="w-32 h-32 rounded-full mx-auto mb-4 bg-blue-600 flex items-center justify-center border-4 border-blue-200">
                <span class="text-white text-5xl font-bold"><?php echo e(substr($anggota->nama, 0, 1)); ?></span>
            </div>
            <?php endif; ?>
            <h3 class="text-xl font-bold text-gray-800"><?php echo e($anggota->nama); ?></h3>
            <p class="text-gray-600"><?php echo e($anggota->email); ?></p>
            <span class="inline-block mt-3 px-4 py-1 bg-green-100 text-green-700 rounded-full text-sm font-semibold">
                <?php echo e(ucfirst($anggota->status)); ?>

            </span>
        </div>
    </div>

    <!-- Edit Profile Form -->
    <div class="lg:col-span-2 bg-white rounded-2xl shadow-lg p-6 border border-blue-100">
        <h3 class="text-xl font-bold text-gray-800 mb-6">Edit Profile</h3>
        
        <form method="POST" action="<?php echo e(route('anggota.profile.update')); ?>" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap</label>
                    <input type="text" name="nama" value="<?php echo e(old('nama', $anggota->nama)); ?>" required
                           class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500">
                    <?php $__errorArgs = ['nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                    <input type="email" name="email" value="<?php echo e(old('email', $anggota->email)); ?>" required
                           class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500">
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">No. HP</label>
                    <input type="text" name="no_hp" value="<?php echo e(old('no_hp', $anggota->no_hp)); ?>" required
                           class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500">
                    <?php $__errorArgs = ['no_hp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Pendidikan Terakhir</label>
                    <input type="text" name="pendidikan_terakhir" value="<?php echo e(old('pendidikan_terakhir', $anggota->pendidikan_terakhir)); ?>" required
                           class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500">
                    <?php $__errorArgs = ['pendidikan_terakhir'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Pekerjaan</label>
                    <input type="text" name="pekerjaan" value="<?php echo e(old('pekerjaan', $anggota->pekerjaan)); ?>" required
                           class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500">
                    <?php $__errorArgs = ['pekerjaan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Alamat</label>
                    <textarea name="alamat" rows="3" required
                              class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500"><?php echo e(old('alamat', $anggota->alamat)); ?></textarea>
                    <?php $__errorArgs = ['alamat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Foto Profil</label>
                    <input type="file" name="foto_profil" accept="image/*"
                           class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500">
                    <p class="text-sm text-gray-500 mt-1">Format: JPG, PNG. Max: 2MB</p>
                    <?php $__errorArgs = ['foto_profil'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
    
    <form method="POST" action="<?php echo e(route('anggota.password.update')); ?>">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Password Lama</label>
                <input type="password" name="current_password" required
                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500">
                <?php $__errorArgs = ['current_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Password Baru</label>
                <input type="password" name="password" required
                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500">
                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.anggota', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\projectsempro\resources\views/anggota/profile.blade.php ENDPATH**/ ?>