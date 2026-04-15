

<?php $__env->startSection('title', $kegiatan->nama_kegiatan . ' - Karang Taruna'); ?>

<?php $__env->startSection('content'); ?>
<!-- Breadcrumb -->
<div class="bg-blue-50 border-b border-blue-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
        <div class="flex items-center text-sm text-gray-600">
            <a href="<?php echo e(route('home')); ?>" class="hover:text-blue-600">Beranda</a>
            <svg class="w-4 h-4 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
            <a href="<?php echo e(route('kegiatan.index')); ?>" class="hover:text-blue-600">Kegiatan</a>
            <svg class="w-4 h-4 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
            <span class="text-blue-600 font-semibold">Detail</span>
        </div>
    </div>
</div>

<!-- Content -->
<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <!-- Back Button -->
    <a href="<?php echo e(route('kegiatan.index')); ?>" class="inline-flex items-center text-blue-600 hover:text-blue-700 font-semibold mb-8 group">
        <svg class="w-5 h-5 mr-2 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
        </svg>
        Kembali ke Kegiatan
    </a>
    
    <!-- Main Card -->
    <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-blue-100">
        <!-- Image -->
        <div class="relative h-96">
            <?php if($kegiatan->foto): ?>
            <img src="<?php echo e(asset('storage/' . $kegiatan->foto)); ?>" alt="<?php echo e($kegiatan->nama_kegiatan); ?>" class="w-full h-full object-cover">
            <?php else: ?>
            <div class="w-full h-full bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center">
                <svg class="w-32 h-32 text-white opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
            </div>
            <?php endif; ?>
            
            <!-- Badges -->
            <div class="absolute top-6 left-6 flex gap-3">
                <span class="bg-white px-4 py-2 rounded-full text-sm font-bold text-blue-600 shadow-lg">
                    <?php echo e(ucfirst($kegiatan->jenis_kegiatan)); ?>

                </span>
                <?php if($kegiatan->status == 'rencana'): ?>
                <span class="bg-blue-100 text-blue-700 px-4 py-2 rounded-full text-sm font-bold">
                    Rencana
                </span>
                <?php elseif($kegiatan->status == 'berlangsung'): ?>
                <span class="bg-green-100 text-green-700 px-4 py-2 rounded-full text-sm font-bold">
                    Berlangsung
                </span>
                <?php else: ?>
                <span class="bg-gray-100 text-gray-700 px-4 py-2 rounded-full text-sm font-bold">
                    Selesai
                </span>
                <?php endif; ?>
            </div>
        </div>
        
        <!-- Content -->
        <div class="p-10">
            <h1 class="text-4xl font-extrabold text-gray-800 mb-8"><?php echo e($kegiatan->nama_kegiatan); ?></h1>
            
            <!-- Info Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">
                <div class="bg-blue-50 rounded-2xl p-6 border border-blue-100">
                    <div class="flex items-start">
                        <div class="w-12 h-12 bg-blue-600 rounded-xl flex items-center justify-center mr-4 flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600 mb-1">Tanggal Pelaksanaan</p>
                            <p class="font-bold text-gray-800"><?php echo e($kegiatan->tanggal_mulai->format('d F Y')); ?></p>
                            <?php if($kegiatan->tanggal_selesai): ?>
                            <p class="text-sm text-gray-600 mt-1">s/d <?php echo e($kegiatan->tanggal_selesai->format('d F Y')); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                
                <div class="bg-blue-50 rounded-2xl p-6 border border-blue-100">
                    <div class="flex items-start">
                        <div class="w-12 h-12 bg-blue-600 rounded-xl flex items-center justify-center mr-4 flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600 mb-1">Lokasi</p>
                            <p class="font-bold text-gray-800"><?php echo e($kegiatan->lokasi); ?></p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-blue-50 rounded-2xl p-6 border border-blue-100">
                    <div class="flex items-start">
                        <div class="w-12 h-12 bg-blue-600 rounded-xl flex items-center justify-center mr-4 flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600 mb-1">Penanggung Jawab</p>
                            <p class="font-bold text-gray-800"><?php echo e($kegiatan->penanggung_jawab); ?></p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-blue-50 rounded-2xl p-6 border border-blue-100">
                    <div class="flex items-start">
                        <div class="w-12 h-12 bg-blue-600 rounded-xl flex items-center justify-center mr-4 flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600 mb-1">Jumlah Peserta</p>
                            <p class="font-bold text-gray-800"><?php echo e($kegiatan->jumlah_peserta); ?> Orang</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Pendaftaran Section -->
            <?php if($kegiatan->kuota_peserta): ?>
            <div class="bg-gradient-to-r from-purple-50 to-blue-50 rounded-2xl p-6 border-2 border-purple-200 mb-8">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-xl font-bold text-gray-800 mb-2 flex items-center gap-2"><iconify-icon icon="mdi:clipboard-text" class="text-blue-500"></iconify-icon> Pendaftaran Peserta</h3>
                        <div class="flex items-center space-x-4">
                            <div>
                                <p class="text-sm text-gray-600">Kuota Tersedia</p>
                                <p class="text-2xl font-black text-purple-600"><?php echo e($kegiatan->sisaKuota()); ?> / <?php echo e($kegiatan->kuota_peserta); ?></p>
                            </div>
                            <div class="h-12 w-px bg-gray-300"></div>
                            <div>
                                <p class="text-sm text-gray-600">Status Pendaftaran</p>
                                <?php if($kegiatan->is_pendaftaran_open && !$kegiatan->isFull()): ?>
                                <p class="text-lg font-bold text-green-600 flex items-center gap-1"><iconify-icon icon="mdi:check" class="text-green-500"></iconify-icon> Dibuka</p>
                                <?php elseif($kegiatan->isFull()): ?>
                                <p class="text-lg font-bold text-red-600 flex items-center gap-1"><iconify-icon icon="mdi:close" class="text-red-500"></iconify-icon> Penuh</p>
                                <?php else: ?>
                                <p class="text-lg font-bold text-gray-600 flex items-center gap-1"><iconify-icon icon="mdi:close" class="text-gray-500"></iconify-icon> Ditutup</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php if($kegiatan->is_pendaftaran_open && !$kegiatan->isFull()): ?>
                    <a href="<?php echo e(route('kegiatan.daftar', $kegiatan->id)); ?>" 
                       class="bg-gradient-to-r from-blue-600 to-purple-600 text-white px-8 py-4 rounded-xl hover:from-blue-700 hover:to-purple-700 transition-all shadow-lg font-bold text-lg flex items-center gap-2">
                        <iconify-icon icon="mdi:clipboard-text"></iconify-icon> Daftar Sekarang
                    </a>
                    <?php elseif($kegiatan->isFull()): ?>
                    <button disabled 
                            class="bg-gray-300 text-gray-600 px-8 py-4 rounded-xl font-bold text-lg cursor-not-allowed">
                        Kuota Penuh
                    </button>
                    <?php else: ?>
                    <button disabled 
                            class="bg-gray-300 text-gray-600 px-8 py-4 rounded-xl font-bold text-lg cursor-not-allowed">
                        Pendaftaran Ditutup
                    </button>
                    <?php endif; ?>
                </div>
            </div>
            <?php endif; ?>

            <!-- Description -->
            <div class="border-t border-blue-100 pt-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Deskripsi Kegiatan</h2>
                <div class="prose max-w-none text-lg text-gray-700 leading-relaxed">
                    <?php echo nl2br(e($kegiatan->deskripsi)); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\projectsempro\resources\views/kegiatan/detail.blade.php ENDPATH**/ ?>