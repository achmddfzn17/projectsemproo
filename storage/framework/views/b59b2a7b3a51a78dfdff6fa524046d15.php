

<?php $__env->startSection('title', 'Data Program'); ?>

<?php $__env->startSection('content'); ?>
<div class="mb-6 flex justify-between items-center">
    <div>
        <h1 class="text-2xl font-bold text-gray-800">Data Program</h1>
        <p class="text-sm text-gray-600 mt-1">Kelola program Karang Taruna</p>
    </div>
    <a href="<?php echo e(route('admin.program.create')); ?>" class="bg-blue-600 text-white px-6 py-3 rounded-xl hover:bg-blue-700 transition-all shadow-lg hover:shadow-xl font-semibold">
        + Tambah Program
    </a>
</div>

<div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-blue-100">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-blue-50">
                <tr>
                    <th class="text-left py-4 px-6 font-bold text-gray-700">No</th>
                    <th class="text-left py-4 px-6 font-bold text-gray-700">Nama Program</th>
                    <th class="text-left py-4 px-6 font-bold text-gray-700">Target Peserta</th>
                    <th class="text-left py-4 px-6 font-bold text-gray-700">Durasi</th>
                    <th class="text-left py-4 px-6 font-bold text-gray-700">Status</th>
                    <th class="text-left py-4 px-6 font-bold text-gray-700">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $program; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr class="border-b border-blue-50 hover:bg-blue-50 transition-colors">
                    <td class="py-4 px-6"><?php echo e($program->firstItem() + $index); ?></td>
                    <td class="py-4 px-6">
                        <div class="font-semibold text-gray-800"><?php echo e($item->nama_program); ?></div>
                        <div class="text-sm text-gray-500"><?php echo e(Str::limit($item->deskripsi, 50)); ?></div>
                    </td>
                    <td class="py-4 px-6 text-sm text-gray-600"><?php echo e($item->target_peserta); ?></td>
                    <td class="py-4 px-6 text-sm text-gray-600"><?php echo e($item->durasi); ?></td>
                    <td class="py-4 px-6">
                        <span class="px-3 py-1 rounded-full text-xs font-semibold <?php echo e($item->status == 'aktif' ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-700'); ?>">
                            <?php echo e(ucfirst($item->status)); ?>

                        </span>
                    </td>
                    <td class="py-4 px-6">
                        <div class="flex space-x-3">
                            <a href="<?php echo e(route('admin.program.edit', $item->id)); ?>" class="text-blue-600 hover:text-blue-700 font-semibold">Edit</a>
                            <form id="delete-form-<?php echo e($item->id); ?>" method="POST" action="<?php echo e(route('admin.program.destroy', $item->id)); ?>">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="button" onclick="if(confirm('Yakin ingin menghapus program ini?')) document.getElementById('delete-form-<?php echo e($item->id); ?>').submit();" class="text-red-600 hover:text-red-700 font-semibold">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="6" class="text-center py-12">
                        <div class="flex flex-col items-center">
                            <svg class="w-16 h-16 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                            </svg>
                            <p class="text-gray-500 font-semibold">Belum ada data program</p>
                        </div>
                    </td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    
    <div class="px-6 py-4 border-t border-blue-100 bg-blue-50">
        <?php echo e($program->links()); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\projectsempro\resources\views/admin/program/index.blade.php ENDPATH**/ ?>