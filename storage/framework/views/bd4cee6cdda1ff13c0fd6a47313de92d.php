

<?php $__env->startSection('title', 'Daftar Kegiatan - ' . $kegiatan->nama_kegiatan); ?>

<?php $__env->startSection('content'); ?>
<div class="container mx-auto px-4 py-8">
    <div class="max-w-3xl mx-auto">
        <!-- Header -->
        <div class="bg-gradient-to-r from-blue-500 to-blue-600 rounded-2xl p-8 text-white mb-8 shadow-xl">
            <h1 class="text-3xl font-black mb-2 flex items-center gap-2"><iconify-icon icon="mdi:clipboard-text" class="text-2xl"></iconify-icon> Pendaftaran Kegiatan</h1>
            <p class="text-blue-100"><?php echo e($kegiatan->nama_kegiatan); ?></p>
        </div>

        <!-- Info Kegiatan -->
        <div class="bg-white rounded-2xl shadow-lg p-6 border border-blue-100 mb-6">
            <h3 class="text-xl font-bold text-gray-800 mb-4">Informasi Kegiatan</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <p class="text-sm text-gray-600 flex items-center gap-1"><iconify-icon icon="mdi:calendar" class="text-blue-500"></iconify-icon> Tanggal</p>
                    <p class="font-semibold text-gray-800"><?php echo e($kegiatan->tanggal_mulai->format('d M Y')); ?></p>
                </div>
                <div>
                    <p class="text-sm text-gray-600 flex items-center gap-1"><iconify-icon icon="mdi:map-marker" class="text-red-500"></iconify-icon> Lokasi</p>
                    <p class="font-semibold text-gray-800"><?php echo e($kegiatan->lokasi); ?></p>
                </div>
                <div>
                    <p class="text-sm text-gray-600 flex items-center gap-1"><iconify-icon icon="mdi:target" class="text-purple-500"></iconify-icon> Jenis</p>
                    <p class="font-semibold text-gray-800"><?php echo e(ucfirst($kegiatan->jenis_kegiatan)); ?></p>
                </div>
                <?php if($kegiatan->kuota_peserta): ?>
                <div>
                    <p class="text-sm text-gray-600 flex items-center gap-1"><iconify-icon icon="mdi:account-group" class="text-green-500"></iconify-icon> Kuota</p>
                    <p class="font-semibold text-gray-800">
                        <?php echo e($kegiatan->sisaKuota()); ?> / <?php echo e($kegiatan->kuota_peserta); ?> tersisa
                    </p>
                </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Form Pendaftaran -->
        <div class="bg-white rounded-2xl shadow-lg p-8 border border-blue-100">
            <h3 class="text-xl font-bold text-gray-800 mb-6">Form Pendaftaran</h3>

            <?php if(session('error')): ?>
            <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-6">
                <p class="text-red-700"><?php echo e(session('error')); ?></p>
            </div>
            <?php endif; ?>

            <form action="<?php echo e(route('kegiatan.daftar.store', $kegiatan->id)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                
                <div class="space-y-6">
                    <!-- Nama Lengkap -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Nama Lengkap <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="nama_lengkap" value="<?php echo e(old('nama_lengkap')); ?>" required
                               class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <?php $__errorArgs = ['nama_lengkap'];
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

                    <!-- Email -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Email <span class="text-red-500">*</span>
                        </label>
                        <input type="email" name="email" value="<?php echo e(old('email')); ?>" required
                               class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent">
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

                    <!-- No HP -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            No. HP/WhatsApp <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="no_hp" value="<?php echo e(old('no_hp')); ?>" required
                               class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <?php $__errorArgs = ['no_hp'];
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

                    <!-- Alamat -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Alamat
                        </label>
                        <textarea name="alamat" rows="3"
                                  class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent"><?php echo e(old('alamat')); ?></textarea>
                        <?php $__errorArgs = ['alamat'];
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

                    <!-- Instansi -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Instansi/Organisasi
                        </label>
                        <input type="text" name="instansi" value="<?php echo e(old('instansi')); ?>"
                               class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <?php $__errorArgs = ['instansi'];
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

                    <!-- Alasan -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Alasan Mengikuti Kegiatan
                        </label>
                        <textarea name="alasan" rows="4"
                                  class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent"><?php echo e(old('alasan')); ?></textarea>
                        <?php $__errorArgs = ['alasan'];
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

                <!-- Submit Button -->
                <div class="mt-8 flex space-x-4">
                    <button type="submit" 
                            class="flex-1 bg-blue-600 text-white px-8 py-4 rounded-xl hover:bg-blue-700 transition-all shadow-lg font-bold text-lg flex items-center justify-center gap-2">
                        <iconify-icon icon="mdi:check" class="text-xl"></iconify-icon> Daftar Sekarang
                    </button>
                    <a href="<?php echo e(route('kegiatan.detail', $kegiatan->id)); ?>" 
                       class="px-8 py-4 border-2 border-gray-300 text-gray-700 rounded-xl hover:bg-gray-50 transition-all font-semibold">
                        Batal
                    </a>
                </div>
            </form>
        </div>

        <!-- Info -->
        <div class="bg-yellow-50 rounded-xl p-4 border border-yellow-200 mt-6">
            <p class="font-semibold text-gray-800 mb-2 flex items-center gap-2"><iconify-icon icon="mdi:alert-circle" class="text-yellow-500"></iconify-icon> Informasi Penting:</p>
            <ul class="text-sm text-gray-600 space-y-1 list-disc list-inside">
                <li>Pendaftaran akan diverifikasi oleh admin</li>
                <li>Anda akan menerima email konfirmasi setelah pendaftaran disetujui</li>
                <li>Simpan QR Code yang diberikan untuk check-in di hari kegiatan</li>
                <li>Pastikan data yang diisi sudah benar</li>
            </ul>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\projectsempro\resources\views/kegiatan/daftar.blade.php ENDPATH**/ ?>