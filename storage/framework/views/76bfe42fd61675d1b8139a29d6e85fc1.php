

<?php $__env->startSection('title', 'Kegiatan - Karang Taruna'); ?>

<?php $__env->startSection('content'); ?>
<!-- Hero Section -->
<div class="relative bg-gradient-to-br from-blue-50 via-white to-blue-100 overflow-hidden">
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute -top-40 -right-40 w-96 h-96 bg-blue-200 opacity-20 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-40 -left-40 w-96 h-96 bg-blue-300 opacity-20 rounded-full blur-3xl"></div>
    </div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="text-center">
            <div class="inline-flex items-center bg-blue-100 px-4 py-2 rounded-full mb-6">
                <span class="text-sm font-semibold text-blue-700">📅 Kegiatan Kami</span>
            </div>
            <h1 class="text-5xl md:text-6xl font-extrabold mb-6 text-gray-800">
                Kegiatan Karang Taruna
            </h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Berbagai kegiatan positif untuk pengembangan dan pemberdayaan pemuda Indonesia
            </p>
        </div>
    </div>
</div>

<!-- Filter Section -->
<div class="bg-white border-b border-blue-100 sticky top-20 z-40 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <div class="flex flex-wrap gap-3 justify-center">
            <button class="px-6 py-2 bg-blue-600 text-white rounded-xl font-semibold hover:bg-blue-700 transition-all">
                Semua
            </button>
            <button class="px-6 py-2 bg-white text-gray-700 rounded-xl font-semibold hover:bg-blue-50 border border-blue-200 transition-all">
                Sosial
            </button>
            <button class="px-6 py-2 bg-white text-gray-700 rounded-xl font-semibold hover:bg-blue-50 border border-blue-200 transition-all">
                Olahraga
            </button>
            <button class="px-6 py-2 bg-white text-gray-700 rounded-xl font-semibold hover:bg-blue-50 border border-blue-200 transition-all">
                Pendidikan
            </button>
            <button class="px-6 py-2 bg-white text-gray-700 rounded-xl font-semibold hover:bg-blue-50 border border-blue-200 transition-all">
                Keagamaan
            </button>
            <button class="px-6 py-2 bg-white text-gray-700 rounded-xl font-semibold hover:bg-blue-50 border border-blue-200 transition-all">
                Lingkungan
            </button>
        </div>
    </div>
</div>

<!-- Kegiatan Grid -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <?php $__empty_1 = true; $__currentLoopData = $kegiatan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="group bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border border-blue-100">
            <!-- Image -->
            <div class="relative overflow-hidden h-56">
                <?php if($item->foto): ?>
                <img src="<?php echo e(asset('storage/' . $item->foto)); ?>" alt="<?php echo e($item->nama_kegiatan); ?>" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                <?php else: ?>
                <div class="w-full h-full bg-gradient-to-br from-blue-400 to-blue-600 group-hover:scale-110 transition-transform duration-500 flex items-center justify-center">
                    <svg class="w-20 h-20 text-white opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <?php endif; ?>
                
                <!-- Badge -->
                <div class="absolute top-4 left-4">
                    <span class="inline-block bg-white px-3 py-1 rounded-full text-xs font-bold text-blue-600 shadow-lg">
                        <?php echo e(ucfirst($item->jenis_kegiatan)); ?>

                    </span>
                </div>
                
                <!-- Status Badge -->
                <div class="absolute top-4 right-4">
                    <?php if($item->status == 'rencana'): ?>
                    <span class="inline-block bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs font-bold">
                        Rencana
                    </span>
                    <?php elseif($item->status == 'berlangsung'): ?>
                    <span class="inline-block bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-bold">
                        Berlangsung
                    </span>
                    <?php else: ?>
                    <span class="inline-block bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-xs font-bold">
                        Selesai
                    </span>
                    <?php endif; ?>
                </div>
            </div>
            
            <!-- Content -->
            <div class="p-6">
                <h3 class="text-xl font-bold text-gray-800 mb-3 group-hover:text-blue-600 transition-colors line-clamp-2">
                    <?php echo e($item->nama_kegiatan); ?>

                </h3>
                
                <p class="text-gray-600 mb-4 line-clamp-2">
                    <?php echo e(Str::limit($item->deskripsi, 100)); ?>

                </p>
                
                <!-- Info -->
                <div class="space-y-2 mb-4">
                    <div class="flex items-center text-sm text-gray-600">
                        <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <?php echo e($item->tanggal_mulai->format('d M Y')); ?>

                        <?php if($item->tanggal_selesai): ?>
                        - <?php echo e($item->tanggal_selesai->format('d M Y')); ?>

                        <?php endif; ?>
                    </div>
                    
                    <div class="flex items-center text-sm text-gray-600">
                        <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <?php echo e($item->lokasi); ?>

                    </div>
                    
                    <div class="flex items-center text-sm text-gray-600">
                        <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                        <?php echo e($item->jumlah_peserta); ?> Peserta
                    </div>
                </div>
                
                <!-- Button -->
                <a href="<?php echo e(route('kegiatan.detail', $item->id)); ?>" class="inline-flex items-center text-blue-600 hover:text-blue-700 font-bold group-hover:gap-2 transition-all">
                    Lihat Detail
                    <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div class="col-span-3 text-center py-20">
            <div class="w-24 h-24 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-12 h-12 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
            </div>
            <h3 class="text-2xl font-bold text-gray-800 mb-2">Belum Ada Kegiatan</h3>
            <p class="text-gray-600">Kegiatan akan segera ditambahkan</p>
        </div>
        <?php endif; ?>
    </div>
    
    <!-- Pagination -->
    <?php if($kegiatan->hasPages()): ?>
    <div class="mt-12">
        <?php echo e($kegiatan->links()); ?>

    </div>
    <?php endif; ?>
</div>

<!-- CTA Section -->
<div class="bg-gradient-to-r from-blue-600 to-blue-700 py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-4xl md:text-5xl font-extrabold text-white mb-6">Ingin Ikut Kegiatan?</h2>
        <p class="text-xl text-blue-100 mb-10 max-w-2xl mx-auto">
            Bergabunglah dengan kami dan jadilah bagian dari perubahan positif
        </p>
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="<?php echo e(route('tentang')); ?>" class="bg-white text-blue-600 px-8 py-4 rounded-xl font-bold hover:bg-blue-50 transition-all transform hover:scale-105 shadow-2xl">
                Tentang Kami
            </a>
            <a href="<?php echo e(route('berita.index')); ?>" class="bg-blue-500 text-white px-8 py-4 rounded-xl font-bold hover:bg-blue-400 transition-all transform hover:scale-105 shadow-2xl border-2 border-white/30">
                Baca Berita
            </a>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\projectsempro\resources\views/kegiatan/index.blade.php ENDPATH**/ ?>