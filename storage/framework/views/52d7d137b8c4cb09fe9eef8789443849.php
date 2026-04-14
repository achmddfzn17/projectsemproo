

<?php $__env->startSection('title', 'Artikel - Karang Taruna'); ?>

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
                <span class="text-sm font-semibold text-blue-700">📝 Artikel Pemberdayaan</span>
            </div>
            <h1 class="text-5xl md:text-6xl font-extrabold mb-6 text-gray-800">
                Artikel Pemuda
            </h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Inspirasi dan wawasan untuk pengembangan diri dan pemberdayaan pemuda Indonesia
            </p>
        </div>
    </div>
</div>

<!-- Category Filter -->
<div class="bg-white border-b border-blue-100 sticky top-20 z-40 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <div class="flex flex-wrap gap-3 justify-center">
            <button class="px-6 py-2 bg-blue-600 text-white rounded-xl font-semibold hover:bg-blue-700 transition-all">
                Semua
            </button>
            <button class="px-6 py-2 bg-white text-gray-700 rounded-xl font-semibold hover:bg-blue-50 border border-blue-200 transition-all">
                Pemberdayaan
            </button>
            <button class="px-6 py-2 bg-white text-gray-700 rounded-xl font-semibold hover:bg-blue-50 border border-blue-200 transition-all">
                Kewirausahaan
            </button>
            <button class="px-6 py-2 bg-white text-gray-700 rounded-xl font-semibold hover:bg-blue-50 border border-blue-200 transition-all">
                Kepemimpinan
            </button>
            <button class="px-6 py-2 bg-white text-gray-700 rounded-xl font-semibold hover:bg-blue-50 border border-blue-200 transition-all">
                Teknologi
            </button>
            <button class="px-6 py-2 bg-white text-gray-700 rounded-xl font-semibold hover:bg-blue-50 border border-blue-200 transition-all">
                Kesehatan
            </button>
        </div>
    </div>
</div>

<!-- Featured Article (First Item) -->
<?php if($artikel->count() > 0): ?>
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <?php $featured = $artikel->first(); ?>
    <div class="bg-white rounded-3xl shadow-2xl overflow-hidden border border-blue-100 mb-16">
        <div class="grid grid-cols-1 md:grid-cols-5 gap-0">
            <!-- Image -->
            <div class="md:col-span-2 relative h-96 md:h-auto">
                <?php if($featured->gambar): ?>
                <img src="<?php echo e(asset('storage/' . $featured->gambar)); ?>" alt="<?php echo e($featured->judul); ?>" class="w-full h-full object-cover">
                <?php else: ?>
                <div class="w-full h-full bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center">
                    <svg class="w-32 h-32 text-white opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                <?php endif; ?>
                <div class="absolute top-6 left-6">
                    <span class="bg-blue-600 text-white px-4 py-2 rounded-full text-sm font-bold shadow-lg">
                        ⭐ Artikel Pilihan
                    </span>
                </div>
            </div>
            
            <!-- Content -->
            <div class="md:col-span-3 p-10 flex flex-col justify-center">
                <div class="inline-block mb-4">
                    <span class="bg-blue-100 text-blue-700 px-4 py-2 rounded-full text-sm font-bold">
                        <?php echo e(ucfirst($featured->kategori)); ?>

                    </span>
                </div>
                
                <div class="flex items-center text-sm text-gray-500 mb-4">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <?php echo e($featured->created_at->diffForHumans()); ?>

                    <span class="mx-2">•</span>
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                    </svg>
                    <?php echo e($featured->views); ?> views
                </div>
                
                <h2 class="text-3xl font-extrabold text-gray-800 mb-4 line-clamp-3">
                    <?php echo e($featured->judul); ?>

                </h2>
                
                <p class="text-lg text-gray-600 mb-6 line-clamp-4">
                    <?php echo e(Str::limit(strip_tags($featured->konten), 200)); ?>

                </p>
                
                <a href="<?php echo e(route('artikel.detail', $featured->slug)); ?>" class="inline-flex items-center text-blue-600 hover:text-blue-700 font-bold text-lg group">
                    Baca Artikel
                    <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>
    
    <!-- All Articles Grid -->
    <div class="flex justify-between items-center mb-12">
        <h2 class="text-3xl font-extrabold text-gray-800">Semua Artikel</h2>
        <div class="text-sm text-gray-600">
            Menampilkan <?php echo e($artikel->count()); ?> dari <?php echo e($artikel->total()); ?> artikel
        </div>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <?php $__empty_1 = true; $__currentLoopData = $artikel->skip(1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <article class="group bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border border-blue-100">
            <!-- Image -->
            <div class="relative overflow-hidden h-56">
                <?php if($item->gambar): ?>
                <img src="<?php echo e(asset('storage/' . $item->gambar)); ?>" alt="<?php echo e($item->judul); ?>" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                <?php else: ?>
                <div class="w-full h-full bg-gradient-to-br from-blue-400 to-blue-600 group-hover:scale-110 transition-transform duration-500 flex items-center justify-center">
                    <svg class="w-20 h-20 text-white opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                <?php endif; ?>
                
                <!-- Category Badge -->
                <div class="absolute top-4 left-4">
                    <span class="bg-white px-3 py-1 rounded-full text-xs font-bold text-blue-600 shadow-lg">
                        <?php echo e(ucfirst($item->kategori)); ?>

                    </span>
                </div>
            </div>
            
            <!-- Content -->
            <div class="p-6">
                <!-- Meta -->
                <div class="flex items-center text-xs text-gray-500 mb-3">
                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <?php echo e($item->created_at->format('d M Y')); ?>

                    <span class="mx-2">•</span>
                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                    </svg>
                    <?php echo e($item->views); ?> views
                </div>
                
                <!-- Title -->
                <h3 class="text-xl font-bold text-gray-800 mb-3 group-hover:text-blue-600 transition-colors line-clamp-2">
                    <?php echo e($item->judul); ?>

                </h3>
                
                <!-- Excerpt -->
                <p class="text-gray-600 mb-4 line-clamp-3">
                    <?php echo e(Str::limit(strip_tags($item->konten), 120)); ?>

                </p>
                
                <!-- Read More -->
                <a href="<?php echo e(route('artikel.detail', $item->slug)); ?>" class="inline-flex items-center text-blue-600 hover:text-blue-700 font-bold group-hover:gap-2 transition-all">
                    Baca Artikel
                    <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>
        </article>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div class="col-span-3 text-center py-20">
            <div class="w-24 h-24 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-12 h-12 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
            </div>
            <h3 class="text-2xl font-bold text-gray-800 mb-2">Belum Ada Artikel</h3>
            <p class="text-gray-600">Artikel akan segera ditambahkan</p>
        </div>
        <?php endif; ?>
    </div>
    
    <!-- Pagination -->
    <?php if($artikel->hasPages()): ?>
    <div class="mt-12">
        <?php echo e($artikel->links()); ?>

    </div>
    <?php endif; ?>
</div>
<?php endif; ?>

<!-- CTA Section -->
<div class="bg-gradient-to-r from-blue-600 to-blue-700 py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-4xl md:text-5xl font-extrabold text-white mb-6">Bergabung dengan Kami</h2>
        <p class="text-xl text-blue-100 mb-10 max-w-2xl mx-auto">
            Mari bersama membangun generasi muda yang lebih baik
        </p>
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="<?php echo e(route('kegiatan.index')); ?>" class="bg-white text-blue-600 px-8 py-4 rounded-xl font-bold hover:bg-blue-50 transition-all transform hover:scale-105 shadow-2xl">
                Lihat Kegiatan
            </a>
            <a href="<?php echo e(route('tentang')); ?>" class="bg-blue-500 text-white px-8 py-4 rounded-xl font-bold hover:bg-blue-400 transition-all transform hover:scale-105 shadow-2xl border-2 border-white/30">
                Tentang Kami
            </a>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\projectsempro\resources\views/artikel/index.blade.php ENDPATH**/ ?>