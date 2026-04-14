<?php $__env->startSection('title', 'Galeri - Karang Taruna Generasi Emas'); ?>

<?php $__env->startSection('content'); ?>
<!-- Hero Section -->
<section class="bg-gradient-to-br from-blue-50 to-white py-16 md:py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="inline-flex items-center bg-blue-100 px-4 py-2 rounded-full mb-6 border border-blue-200">
            <span class="w-2 h-2 bg-blue-500 rounded-full mr-2 animate-pulse"></span>
            <span class="text-sm font-bold text-blue-700">Dokumentasi Kegiatan</span>
        </div>
        
        <h1 class="text-5xl md:text-6xl font-black text-gray-800 mb-6">
            <span class="text-blue-500">Galeri</span> Kami
        </h1>
        
        <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
            Momen berharga dari berbagai kegiatan Karang Taruna Generasi Emas yang telah kami selenggarakan
        </p>
    </div>
</section>

<!-- Galeri Grid -->
<section class="py-12 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <?php if($galeris->count() > 0): ?>
        <!-- Masonry-style Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php $__currentLoopData = $galeris; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="group relative overflow-hidden rounded-2xl shadow-lg bg-gray-100 aspect-square">
                <?php if($item->foto): ?>
                <img src="<?php echo e(asset('storage/' . $item->foto)); ?>" alt="<?php echo e($item->judul); ?>"
                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                <?php else: ?>
                <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                    <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <?php endif; ?>
                
                <!-- Overlay -->
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-300 flex flex-col justify-end p-6">
                    <h3 class="text-white font-bold text-lg mb-1"><?php echo e($item->judul); ?></h3>
                    <?php if($item->kegiatan): ?>
                    <p class="text-blue-200 text-sm mb-2"><?php echo e($item->kegiatan->nama_kegiatan); ?></p>
                    <?php endif; ?>
                    <?php if($item->deskripsi): ?>
                    <p class="text-gray-200 text-sm line-clamp-2"><?php echo e($item->deskripsi); ?></p>
                    <?php endif; ?>
                    <p class="text-gray-300 text-xs mt-2"><?php echo e($item->created_at->format('d F Y')); ?></p>
                </div>
                
                <!-- Zoom Icon -->
                <div class="absolute top-4 right-4 w-10 h-10 bg-white/90 rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all duration-300 transform translate-y-2 group-hover:translate-y-0">
                    <svg class="w-5 h-5 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"></path>
                    </svg>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        
        <!-- Pagination -->
        <?php if($galeris->hasPages()): ?>
        <div class="mt-12 flex justify-center">
            <nav class="flex items-center space-x-2">
                <?php if($galeris->onFirstPage()): ?>
                <span class="px-4 py-2 bg-gray-100 text-gray-400 rounded-lg cursor-not-allowed">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </span>
                <?php else: ?>
                <a href="<?php echo e($galeris->previousPageUrl()); ?>" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </a>
                <?php endif; ?>
                
                <span class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg">
                    Halaman <?php echo e($galeris->currentPage()); ?> dari <?php echo e($galeris->lastPage()); ?>

                </span>
                
                <?php if($galeris->hasMorePages()): ?>
                <a href="<?php echo e($galeris->nextPageUrl()); ?>" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
                <?php else: ?>
                <span class="px-4 py-2 bg-gray-100 text-gray-400 rounded-lg cursor-not-allowed">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </span>
                <?php endif; ?>
            </nav>
        </div>
        <?php endif; ?>
        
        <?php else: ?>
        <!-- Empty State -->
        <div class="text-center py-20">
            <div class="w-24 h-24 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-12 h-12 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
            </div>
            <h3 class="text-2xl font-bold text-gray-700 mb-2">Belum Ada Galeri</h3>
            <p class="text-gray-500 mb-6">Dokumentasi foto kegiatan akan segera ditambahkan.</p>
            <a href="<?php echo e(route('home')); ?>" class="inline-flex items-center gap-2 bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-xl font-semibold transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Kembali ke Beranda
            </a>
        </div>
        <?php endif; ?>
    </div>
</section>

<!-- CTA Section -->
<section class="bg-gradient-to-r from-blue-500 to-blue-600 py-12">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold text-white mb-4">Tertarik dengan Kegiatan Kami?</h2>
        <p class="text-blue-100 mb-6">Jangan lewatkan kesempatan untuk bergabung dan berkontribusi bersama kami</p>
        <a href="<?php echo e(route('kegiatan.index')); ?>" class="inline-flex items-center gap-2 bg-white text-blue-600 px-8 py-4 rounded-xl font-bold hover:bg-blue-50 transition shadow-lg">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
            </svg>
            Lihat Kegiatan
        </a>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\projectsempro\resources\views/galeri/index.blade.php ENDPATH**/ ?>