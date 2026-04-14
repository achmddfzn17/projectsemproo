

<?php $__env->startSection('title', 'Riwayat Kegiatan'); ?>

<?php $__env->startSection('content'); ?>
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-blue-100 mb-8">
        <div class="p-6 border-b border-blue-100 flex items-center gap-4">
            <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center text-2xl">
                📅
            </div>
            <div>
                <h3 class="text-xl font-bold text-gray-800">Riwayat Pendaftaran & Kehadiran</h3>
                <p class="text-gray-600 mt-1 text-sm">Daftar lengkap kegiatan Karang Taruna yang pernah Anda ikuti atau
                    daftarkan</p>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-gray-50 border-b border-gray-100">
                    <tr>
                        <th class="text-left font-semibold text-gray-600 py-4 px-6">Nama Kegiatan</th>
                        <th class="text-left font-semibold text-gray-600 py-4 px-6">Jenis</th>
                        <th class="text-left font-semibold text-gray-600 py-4 px-6">Status Pendaftaran</th>
                        <th class="text-left font-semibold text-gray-600 py-4 px-6">Kehadiran</th>
                        <th class="text-left font-semibold text-gray-600 py-4 px-6">Waktu Hadir</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <?php $__empty_1 = true; $__currentLoopData = $riwayat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="hover:bg-blue-50/50 transition duration-150">
                            <td class="py-4 px-6">
                                <div class="font-bold text-gray-800"><?php echo e($item->kegiatan->nama_kegiatan ?? 'Kegiatan Dihapus'); ?>

                                </div>
                                <div class="text-xs text-gray-500 mt-1">Nomor Urut:
                                    #<?php echo e(str_pad($item->nomor_urut, 3, '0', STR_PAD_LEFT)); ?></div>
                            </td>
                            <td class="py-4 px-6">
                                <span
                                    class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-semibold bg-gray-100 text-gray-700">
                                    <?php echo e(ucfirst($item->kegiatan->jenis_kegiatan ?? '-')); ?>

                                </span>
                            </td>
                            <td class="py-4 px-6">
                                <?php if($item->status == 'pending'): ?>
                                    <span
                                        class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-yellow-100 text-yellow-700 border border-yellow-200">
                                        <span class="w-1.5 h-1.5 rounded-full bg-yellow-500"></span> Menunggu
                                    </span>
                                <?php elseif($item->status == 'approved'): ?>
                                    <span
                                        class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-700 border border-green-200">
                                        <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span> Disetujui
                                    </span>
                                <?php else: ?>
                                    <span
                                        class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-red-100 text-red-700 border border-red-200">
                                        <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span> Ditolak
                                    </span>
                                    <?php if($item->catatan_admin): ?>
                                        <p class="text-xs text-red-500 mt-1 block max-w-xs"><?php echo e($item->catatan_admin); ?></p>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </td>
                            <td class="py-4 px-6 text-center">
                                <?php if($item->hadir): ?>
                                    <div class="w-8 h-8 rounded-full bg-green-100 text-green-600 flex items-center justify-center border border-green-200 mx-auto"
                                        title="Hadir">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </div>
                                <?php else: ?>
                                    <div class="w-8 h-8 rounded-full bg-gray-100 text-gray-400 flex items-center justify-center border border-gray-200 mx-auto"
                                        title="Belum / Tidak Hadir">
                                        <span class="font-bold text-lg">-</span>
                                    </div>
                                <?php endif; ?>
                            </td>
                            <td class="py-4 px-6 text-gray-600 font-medium">
                                <?php echo e($item->hadir && $item->waktu_hadir ? $item->waktu_hadir->format('d M Y, H:i') : '-'); ?>

                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="5" class="text-center py-16">
                                <div
                                    class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-blue-50 text-blue-400 mb-4">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                                        </path>
                                    </svg>
                                </div>
                                <h4 class="text-lg font-bold text-gray-800">Belum Ada Riwayat Kegiatan</h4>
                                <p class="text-gray-500 text-sm mt-1 mb-4">Anda belum mendaftar atau mengikuti kegiatan apapun.
                                </p>
                                <a href="<?php echo e(route('kegiatan.index')); ?>"
                                    class="inline-flex items-center px-4 py-2 border border-blue-600 rounded-lg text-sm font-semibold text-blue-600 hover:bg-blue-50 transition">
                                    Cari Kegiatan
                                </a>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.anggota', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\projectsempro\resources\views/anggota/riwayat.blade.php ENDPATH**/ ?>