<?php $__env->startSection('title', 'Beranda - Karang Taruna'); ?>

<?php $__env->startSection('content'); ?>

<section class="relative bg-gradient-to-br from-blue-50 to-white py-20 md:py-32">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            
            <div class="text-center lg:text-left">
                <div class="inline-flex items-center bg-blue-100 px-4 py-2 rounded-full mb-6 border border-blue-200">
                    <span class="w-2 h-2 bg-blue-500 rounded-full mr-2 animate-pulse" aria-hidden="true"></span>
                    <span class="text-sm font-bold text-blue-700">Organisasi Kepemudaan Indonesia</span>
                </div>

                <h1 class="text-4xl md:text-5xl lg:text-6xl font-black text-gray-800 mb-6 leading-tight">
                    Karang Taruna
                    <br>
                    <span class="text-blue-500">Generasi Emas</span>
                </h1>

                <p class="text-xl text-gray-600 mb-8 leading-relaxed">
                    Bersama membangun pemuda yang kreatif, inovatif, dan berprestasi untuk Indonesia yang lebih baik
                </p>

                <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start mb-12">
                    <a href="<?php echo e(route('tentang')); ?>" 
                       class="bg-blue-500 text-white px-8 py-4 rounded-xl font-bold hover:bg-blue-600 transition-all shadow-lg hover:shadow-xl">
                        Tentang Kami
                    </a>
                    <a href="<?php echo e(route('kegiatan.index')); ?>" 
                       class="bg-white text-blue-500 px-8 py-4 rounded-xl font-bold hover:bg-blue-50 transition-all shadow-lg border-2 border-blue-200">
                        Lihat Kegiatan
                    </a>
                </div>

                
                <div class="grid grid-cols-3 gap-6">
                    <div class="text-center lg:text-left">
                        <div class="text-3xl font-black text-blue-500"><?php echo e($totalAnggota); ?></div>
                        <div class="text-sm text-gray-600">Anggota</div>
                    </div>
                    <div class="text-center lg:text-left">
                        <div class="text-3xl font-black text-blue-500"><?php echo e($totalKegiatan); ?></div>
                        <div class="text-sm text-gray-600">Kegiatan</div>
                    </div>
                    <div class="text-center lg:text-left">
                        <div class="text-3xl font-black text-blue-500"><?php echo e($totalProgram); ?></div>
                        <div class="text-sm text-gray-600">Program</div>
                    </div>
                </div>
            </div>

            
            <div class="flex justify-center lg:justify-end">
                <div class="w-full max-w-lg">
                    <img src="<?php echo e(asset('images/logokatar.png')); ?>" 
                         alt="Logo Karang Taruna Generasi Emas" 
                         class="w-full h-auto object-contain">
                </div>
            </div>
        </div>
    </div>
</section>


<section class="bg-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-black text-gray-800 mb-4">
                Mengapa <span class="text-blue-500">Bergabung?</span>
            </h2>
            <p class="text-xl text-gray-600">Temukan manfaat bergabung dengan Karang Taruna</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <?php
                $features = [
                    ['icon' => 'mdi:school', 'title' => 'Pengembangan Diri', 'desc' => 'Tingkatkan skill melalui pelatihan'],
                    ['icon' => 'mdi:handshake', 'title' => 'Networking', 'desc' => 'Bangun relasi dengan pemuda'],
                    ['icon' => 'mdi:briefcase', 'title' => 'Pengalaman', 'desc' => 'Dapatkan pengalaman organisasi'],
                    ['icon' => 'mdi:trophy', 'title' => 'Prestasi', 'desc' => 'Raih penghargaan dan sertifikat'],
                ];
            ?>

            <?php $__currentLoopData = $features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="bg-blue-50 rounded-2xl p-6 border border-blue-100 hover:shadow-lg transition-all">
                <iconify-icon icon="<?php echo e($feature['icon']); ?>" class="text-4xl mb-4 text-blue-500" aria-hidden="true"></iconify-icon>
                <h3 class="text-lg font-bold text-gray-800 mb-2"><?php echo e($feature['title']); ?></h3>
                <p class="text-gray-600"><?php echo e($feature['desc']); ?></p>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>


<section class="bg-blue-50 py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-12">
            <div>
                <h2 class="text-4xl font-black text-gray-800 mb-2">Berita Terbaru</h2>
                <p class="text-gray-600">Update terkini seputar kegiatan</p>
            </div>
            <a href="<?php echo e(route('berita.index')); ?>" 
               class="bg-blue-500 text-white px-6 py-3 rounded-xl font-bold hover:bg-blue-600 transition-all whitespace-nowrap">
                Lihat Semua
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <?php $__empty_1 = true; $__currentLoopData = $beritaTerbaru; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $berita): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <article class="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-xl transition-all border border-blue-100">
                <div class="relative h-48">
                    <?php if($berita->gambar): ?>
                        <img src="<?php echo e(asset('storage/' . $berita->gambar)); ?>" 
                             alt="<?php echo e($berita->judul); ?>" 
                             class="w-full h-full object-cover">
                    <?php else: ?>
                        <div class="w-full h-full bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center">
                            <iconify-icon icon="mdi:newspaper" class="text-white text-5xl" aria-hidden="true"></iconify-icon>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="p-6">
                    <time class="text-sm text-gray-500 mb-2 block">
                        <?php echo e($berita->created_at ? $berita->created_at->diffForHumans() : '-'); ?>

                    </time>
                    <h3 class="text-lg font-bold text-gray-800 mb-3 line-clamp-2"><?php echo e($berita->judul); ?></h3>
                    <p class="text-gray-600 mb-4 line-clamp-2"><?php echo e(Str::limit(strip_tags($berita->konten ?? ''), 100)); ?></p>
                    <a href="<?php echo e(route('berita.detail', $berita->slug)); ?>" 
                       class="text-blue-500 font-bold hover:text-blue-600 inline-flex items-center">
                        Baca Selengkapnya →
                    </a>
                </div>
            </article>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="col-span-3 text-center py-12">
                <iconify-icon icon="mdi:newspaper" class="text-6xl mb-4 text-gray-400" aria-hidden="true"></iconify-icon>
                <p class="text-gray-500">Belum ada berita tersedia</p>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>


<section class="bg-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-12">
            <div>
                <h2 class="text-4xl font-black text-gray-800 mb-2">Kegiatan Terbaru</h2>
                <p class="text-gray-600">Aksi nyata pemuda untuk masyarakat</p>
            </div>
            <a href="<?php echo e(route('kegiatan.index')); ?>" 
               class="bg-blue-500 text-white px-6 py-3 rounded-xl font-bold hover:bg-blue-600 transition-all whitespace-nowrap">
                Lihat Semua
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <?php $__empty_1 = true; $__currentLoopData = $kegiatanTerbaru; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kegiatan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <article class="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-xl transition-all border border-blue-100">
                <div class="relative h-48">
                    <?php if($kegiatan->foto): ?>
                        <img src="<?php echo e(asset('storage/' . $kegiatan->foto)); ?>" 
                             alt="<?php echo e($kegiatan->nama_kegiatan); ?>" 
                             class="w-full h-full object-cover">
                    <?php else: ?>
                        <div class="w-full h-full bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center">
                            <iconify-icon icon="mdi:calendar" class="text-white text-4xl" aria-hidden="true"></iconify-icon>
                        </div>
                    <?php endif; ?>
                    <div class="absolute top-3 left-3">
                        <span class="bg-blue-500 text-white px-3 py-1 rounded-lg text-xs font-bold">
                            <?php echo e(ucfirst($kegiatan->jenis_kegiatan)); ?>

                        </span>
                    </div>
                </div>
                <div class="p-5">
                    <h3 class="text-base font-bold text-gray-800 mb-2 line-clamp-2"><?php echo e($kegiatan->nama_kegiatan); ?></h3>
                    <time class="text-sm text-gray-600 mb-3 block flex items-center gap-1">
                        <iconify-icon icon="mdi:calendar" class="text-blue-500"></iconify-icon>
                        <?php echo e($kegiatan->tanggal_mulai ? $kegiatan->tanggal_mulai->format('d M Y') : '-'); ?>

                    </time>
                    <a href="<?php echo e(route('kegiatan.detail', $kegiatan->id)); ?>" 
                       class="text-blue-500 font-bold hover:text-blue-600 text-sm inline-flex items-center">
                        Lihat Detail →
                    </a>
                </div>
            </article>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="col-span-4 text-center py-12">
                <iconify-icon icon="mdi:calendar-blank" class="text-6xl mb-4 text-gray-400" aria-hidden="true"></iconify-icon>
                <p class="text-gray-500">Belum ada kegiatan tersedia</p>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>


<section class="bg-blue-50 py-20">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-3xl p-12 shadow-xl">
            <h2 class="text-4xl font-black text-white mb-4">
                Bergabunglah Bersama Kami!
            </h2>
            <p class="text-xl text-white/90 mb-8">
                Mari bersama membangun Indonesia yang lebih baik
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="<?php echo e(route('tentang')); ?>" 
                   class="bg-white text-blue-600 px-8 py-4 rounded-xl font-bold hover:bg-blue-50 transition-all shadow-lg">
                    Pelajari Lebih Lanjut
                </a>
                <a href="<?php echo e(route('kegiatan.index')); ?>" 
                   class="bg-blue-400 text-white px-8 py-4 rounded-xl font-bold hover:bg-blue-300 transition-all shadow-lg">
                    Ikuti Kegiatan
                </a>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\projectsempro - Copy\resources\views/home.blade.php ENDPATH**/ ?>