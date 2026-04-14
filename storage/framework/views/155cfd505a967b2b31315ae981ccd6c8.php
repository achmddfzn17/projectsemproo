<?php $__env->startSection('title', 'Data Berita'); ?>

<?php $__env->startSection('content'); ?>
<!-- Header -->
<div class="mb-8 bg-gradient-to-r from-blue-600 to-blue-700 rounded-2xl p-8 text-white shadow-xl">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
        <div>
            <h1 class="text-3xl font-extrabold mb-1 flex items-center gap-2"><iconify-icon icon="mdi:newspaper" class="text-2xl"></iconify-icon> Data Berita</h1>
            <p class="text-blue-100">Kelola berita dan publikasi Karang Taruna</p>
        </div>
        <a href="<?php echo e(route('admin.berita.create')); ?>" class="bg-white text-blue-700 hover:bg-blue-50 rounded-xl px-5 py-2.5 text-sm font-semibold transition-all inline-flex items-center gap-2 shadow-lg">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            Tambah Berita
        </a>
    </div>
</div>

<!-- Mini Stats -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
    <div class="bg-white rounded-xl p-5 shadow-lg border border-blue-100">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 text-sm font-semibold">Total Berita</p>
                <p class="text-2xl font-extrabold mt-1 text-blue-600"><?php echo e($berita->total()); ?></p>
            </div>
            <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                <iconify-icon icon="mdi:newspaper" class="text-xl text-blue-600"></iconify-icon>
            </div>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    <?php $__empty_1 = true; $__currentLoopData = $berita; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-blue-100 hover:shadow-xl transition-all transform hover:-translate-y-1">
        <?php if($item->gambar): ?>
            <img src="<?php echo e(asset('storage/' . $item->gambar)); ?>" class="w-full h-48 object-cover">
        <?php else: ?>
            <div class="w-full h-48 bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center">
                <iconify-icon icon="mdi:newspaper" class="text-5xl text-white"></iconify-icon>
            </div>
        <?php endif; ?>
        <div class="p-5">
            <div class="flex items-center justify-between mb-2">
                <span class="text-xs text-gray-500"><?php echo e($item->created_at->format('d M Y')); ?></span>
                <?php if(isset($item->is_published) && $item->is_published): ?>
                <span class="px-2 py-1 bg-green-100 text-green-700 rounded-full text-xs font-semibold">Published</span>
                <?php else: ?>
                <span class="px-2 py-1 bg-gray-100 text-gray-600 rounded-full text-xs font-semibold">Draft</span>
                <?php endif; ?>
            </div>
            <h3 class="text-lg font-bold text-gray-800 mb-2 line-clamp-2"><?php echo e($item->judul); ?></h3>
            <p class="text-sm text-gray-600 mb-4 line-clamp-2"><?php echo e(Str::limit(strip_tags($item->konten), 80)); ?></p>
            <div class="flex space-x-2">
                <a href="<?php echo e(route('admin.berita.edit', $item->id)); ?>" class="flex-1 text-center bg-blue-50 text-blue-600 px-4 py-2.5 rounded-xl hover:bg-blue-100 transition font-semibold text-sm inline-flex items-center justify-center gap-1">
                    <iconify-icon icon="mdi:pencil" class="text-sm"></iconify-icon> Edit
                </a>
                <form id="delete-form-<?php echo e($item->id); ?>" method="POST" action="<?php echo e(route('admin.berita.destroy', $item->id)); ?>" class="flex-1">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="button" onclick="if(confirm('Yakin ingin menghapus berita ini?')) document.getElementById('delete-form-<?php echo e($item->id); ?>').submit();" class="w-full bg-red-50 text-red-600 px-4 py-2.5 rounded-xl hover:bg-red-100 transition font-semibold text-sm border border-red-200 inline-flex items-center justify-center gap-1">
                        <iconify-icon icon="mdi:trash-can" class="text-sm"></iconify-icon> Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <div class="col-span-3 text-center py-16">
        <div class="flex flex-col items-center">
            <iconify-icon icon="mdi:newspaper-variant-outline" class="text-6xl text-gray-300 mb-4"></iconify-icon>
            <p class="text-gray-500 font-semibold text-lg">Belum ada berita</p>
            <p class="text-gray-400 text-sm mt-1">Klik tombol "Tambah Berita" untuk menambahkan data</p>
        </div>
    </div>
    <?php endif; ?>
</div>

<?php if($berita->hasPages()): ?>
<div class="mt-6 bg-white rounded-xl shadow-lg border border-blue-100 px-6 py-4">
    <?php echo e($berita->links()); ?>

</div>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\projectsempro\resources\views/admin/berita/index.blade.php ENDPATH**/ ?>