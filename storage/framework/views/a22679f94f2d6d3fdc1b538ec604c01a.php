

<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
<!-- Welcome Card -->
<div class="bg-gradient-to-r from-blue-500 to-blue-600 rounded-2xl p-8 text-white mb-8 shadow-xl">
    <h1 class="text-3xl font-black mb-2 flex items-center gap-2">Selamat Datang, <?php echo e($anggota->nama); ?>! <iconify-icon icon="mdi:hand-wave" class="text-3xl"></iconify-icon></h1>
    <p class="text-blue-100">Terima kasih telah menjadi bagian dari Karang Taruna Generasi Emas</p>
</div>

<!-- Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
    <div class="bg-white rounded-2xl p-6 shadow-lg border border-blue-100">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 text-sm mb-1">Status</p>
                <p class="text-2xl font-black text-green-600"><?php echo e(ucfirst($anggota->status)); ?></p>
            </div>
            <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                <iconify-icon icon="mdi:star" class="text-2xl text-green-500"></iconify-icon>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-2xl p-6 shadow-lg border border-blue-100">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 text-sm mb-1">Umur</p>
                <p class="text-2xl font-black text-blue-600"><?php echo e($anggota->umur); ?> Th</p>
            </div>
            <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                <iconify-icon icon="mdi:cake-variant" class="text-2xl text-blue-500"></iconify-icon>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-2xl p-6 shadow-lg border border-blue-100">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 text-sm mb-1">Bergabung</p>
                <p class="text-2xl font-black text-purple-600"><?php echo e($lamaBergabungText); ?></p>
                <p class="text-xs text-gray-500 mt-1"><?php echo e($anggota->created_at->format('d M Y')); ?></p>
            </div>
            <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center">
                <iconify-icon icon="mdi:calendar" class="text-2xl text-purple-500"></iconify-icon>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-2xl p-6 shadow-lg border border-blue-100">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 text-sm mb-1">Total Anggota</p>
                <p class="text-2xl font-black text-orange-600"><?php echo e($totalAnggota); ?></p>
            </div>
            <div class="w-12 h-12 bg-orange-100 rounded-xl flex items-center justify-center">
                <iconify-icon icon="mdi:account-group" class="text-2xl text-orange-500"></iconify-icon>
            </div>
        </div>
    </div>
</div>

<!-- Achievement Badges -->
<?php if(count($badges) > 0): ?>
<div class="bg-white rounded-2xl shadow-lg p-6 border border-blue-100 mb-8">
    <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center gap-2"><iconify-icon icon="mdi:trophy" class="text-yellow-500"></iconify-icon> Achievement & Badges</h3>
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
        <?php $__currentLoopData = $badges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $badge): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="rounded-xl p-4 border-2 text-center
            <?php if($badge['color'] == 'blue'): ?> bg-blue-50 border-blue-200
            <?php elseif($badge['color'] == 'green'): ?> bg-green-50 border-green-200
            <?php elseif($badge['color'] == 'purple'): ?> bg-purple-50 border-purple-200
            <?php elseif($badge['color'] == 'yellow'): ?> bg-yellow-50 border-yellow-200
            <?php endif; ?>">
            <iconify-icon icon="<?php echo e($badge['icon']); ?>" class="text-4xl mb-2 text-<?php echo e($badge['color']); ?>-500"></iconify-icon>
            <h4 class="font-bold mb-1
                <?php if($badge['color'] == 'blue'): ?> text-blue-700
                <?php elseif($badge['color'] == 'green'): ?> text-green-700
                <?php elseif($badge['color'] == 'purple'): ?> text-purple-700
                <?php elseif($badge['color'] == 'yellow'): ?> text-yellow-700
                <?php endif; ?>"><?php echo e($badge['name']); ?></h4>
            <p class="text-xs
                <?php if($badge['color'] == 'blue'): ?> text-blue-600
                <?php elseif($badge['color'] == 'green'): ?> text-green-600
                <?php elseif($badge['color'] == 'purple'): ?> text-purple-600
                <?php elseif($badge['color'] == 'yellow'): ?> text-yellow-600
                <?php endif; ?>"><?php echo e($badge['description']); ?></p>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php endif; ?>

<!-- Profile Info & Quick Actions -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
    <!-- Profile Info -->
    <div class="lg:col-span-2 bg-white rounded-2xl shadow-lg p-6 border border-blue-100">
        <h3 class="text-xl font-bold text-gray-800 mb-4">Informasi Profile</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <p class="text-sm text-gray-600">NIK</p>
                <p class="font-semibold text-gray-800"><?php echo e($anggota->nik); ?></p>
            </div>
            <div>
                <p class="text-sm text-gray-600">Email</p>
                <p class="font-semibold text-gray-800"><?php echo e($anggota->email); ?></p>
            </div>
            <div>
                <p class="text-sm text-gray-600">No. HP</p>
                <p class="font-semibold text-gray-800"><?php echo e($anggota->no_hp); ?></p>
            </div>
            <div>
                <p class="text-sm text-gray-600">Bergabung Sejak</p>
                <p class="font-semibold text-gray-800"><?php echo e($anggota->created_at->format('d M Y')); ?></p>
            </div>
        </div>
        <div class="mt-4 flex space-x-3">
            <a href="<?php echo e(route('anggota.profile')); ?>" 
               class="inline-block bg-blue-600 text-white px-6 py-2 rounded-xl hover:bg-blue-700 transition-all font-semibold flex items-center gap-2">
                <iconify-icon icon="mdi:pencil"></iconify-icon> Edit Profile
            </a>
            <a href="<?php echo e(route('anggota.export-profile')); ?>" 
               class="inline-block bg-green-600 text-white px-6 py-2 rounded-xl hover:bg-green-700 transition-all font-semibold flex items-center gap-2">
                <iconify-icon icon="mdi:file-download"></iconify-icon> Export Profile
            </a>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="bg-white rounded-2xl shadow-lg p-6 border border-blue-100">
        <h3 class="text-xl font-bold text-gray-800 mb-4">Quick Actions</h3>
        <div class="space-y-3">
            <a href="<?php echo e(route('anggota.qr-card')); ?>" 
               class="block bg-purple-50 hover:bg-purple-100 p-4 rounded-xl border-2 border-purple-200 transition-all">
                <div class="flex items-center">
                    <iconify-icon icon="mdi:qrcode" class="text-3xl mr-3 text-purple-500"></iconify-icon>
                    <div>
                        <p class="font-bold text-purple-700">Kartu Anggota Digital</p>
                        <p class="text-xs text-purple-600">QR Code & Info</p>
                    </div>
                </div>
            </a>
            
            <a href="<?php echo e(route('kegiatan.index')); ?>" target="_blank"
               class="block bg-blue-50 hover:bg-blue-100 p-4 rounded-xl border-2 border-blue-200 transition-all">
                <div class="flex items-center">
                    <iconify-icon icon="mdi:calendar" class="text-3xl mr-3 text-blue-500"></iconify-icon>
                    <div>
                        <p class="font-bold text-blue-700">Lihat Kegiatan</p>
                        <p class="text-xs text-blue-600"><?php echo e($kegiatanBerlangsung); ?> sedang berlangsung</p>
                    </div>
                </div>
            </a>
            
            <a href="<?php echo e(route('home')); ?>" target="_blank"
               class="block bg-green-50 hover:bg-green-100 p-4 rounded-xl border-2 border-green-200 transition-all">
                <div class="flex items-center">
                    <iconify-icon icon="mdi:web" class="text-3xl mr-3 text-green-500"></iconify-icon>
                    <div>
                        <p class="font-bold text-green-700">Website Utama</p>
                        <p class="text-xs text-green-600">Berita & Artikel</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>

<!-- Activity Timeline -->
<div class="bg-white rounded-2xl shadow-lg p-6 border border-blue-100 mb-8">
    <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center gap-2"><iconify-icon icon="mdi:chart-line" class="text-blue-500"></iconify-icon> Activity Timeline</h3>
    <div class="space-y-4">
        <?php $__currentLoopData = $activities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="flex items-start">
            <div class="w-10 h-10 rounded-full flex items-center justify-center mr-4 flex-shrink-0
                <?php if($activity['color'] == 'blue'): ?> bg-blue-100
                <?php elseif($activity['color'] == 'green'): ?> bg-green-100
                <?php elseif($activity['color'] == 'purple'): ?> bg-purple-100
                <?php elseif($activity['color'] == 'orange'): ?> bg-orange-100
                <?php endif; ?>">
                <iconify-icon icon="<?php echo e($activity['icon']); ?>" class="text-xl text-<?php echo e($activity['color']); ?>-500"></iconify-icon>
            </div>
            <div class="flex-1">
                <h4 class="font-bold text-gray-800"><?php echo e($activity['title']); ?></h4>
                <p class="text-sm text-gray-600"><?php echo e($activity['description']); ?></p>
                <p class="text-xs text-gray-400 mt-1"><?php echo e($activity['time']->diffForHumans()); ?></p>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>

<!-- Kegiatan Terbaru -->
<div class="bg-white rounded-2xl shadow-lg p-6 border border-blue-100 mb-8">
    <h3 class="text-xl font-bold text-gray-800 mb-4">Kegiatan Terbaru</h3>
    <div class="space-y-4">
        <?php $__empty_1 = true; $__currentLoopData = $kegiatanTerbaru; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kegiatan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="flex items-center justify-between p-4 bg-blue-50 rounded-xl border border-blue-100">
            <div class="flex-1">
                <h4 class="font-semibold text-gray-800"><?php echo e($kegiatan->nama_kegiatan); ?></h4>
                <p class="text-sm text-gray-600 flex items-center gap-2">
                    <iconify-icon icon="mdi:calendar" class="text-blue-500"></iconify-icon> <?php echo e($kegiatan->tanggal_mulai->format('d M Y')); ?> • 
                    <iconify-icon icon="mdi:map-marker" class="text-red-500"></iconify-icon> <?php echo e($kegiatan->lokasi); ?>

                </p>
            </div>
            <span class="px-3 py-1 bg-blue-600 text-white rounded-lg text-sm font-semibold">
                <?php echo e(ucfirst($kegiatan->jenis_kegiatan)); ?>

            </span>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <p class="text-gray-500 text-center py-8">Belum ada kegiatan</p>
        <?php endif; ?>
    </div>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.anggota', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\projectsempro - Copy\resources\views/anggota/dashboard.blade.php ENDPATH**/ ?>