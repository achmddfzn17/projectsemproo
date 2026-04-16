<?php $__env->startSection('title', 'Kas Masuk'); ?>

<?php $__env->startSection('content'); ?>
<!-- Header -->
<div class="mb-8 bg-gradient-to-r from-blue-600 to-blue-700 rounded-2xl p-8 text-white shadow-xl">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
        <div>
            <h1 class="text-4xl font-extrabold mb-2 flex items-center gap-2"><iconify-icon icon="mdi:cash-plus" class="text-2xl"></iconify-icon> Kas Masuk</h1>
            <p class="text-blue-100 text-lg">Kelola pemasukan keuangan Karang Taruna</p>
        </div>
        <div class="flex gap-2">
            <a href="<?php echo e(route('admin.keuangan.index')); ?>" class="bg-white/20 hover:bg-white/30 backdrop-blur-sm rounded-xl px-4 py-2 text-sm font-semibold transition-all">
                ← Dashboard
            </a>
            <a href="<?php echo e(route('admin.keuangan.laporan')); ?>" class="bg-white/20 hover:bg-white/30 backdrop-blur-sm rounded-xl px-4 py-2 text-sm font-semibold transition-all flex items-center gap-1">
                <iconify-icon icon="mdi:chart-bar"></iconify-icon> Laporan
            </a>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Form Tambah -->
    <div class="lg:col-span-1">
        <div class="bg-white rounded-2xl shadow-lg border border-blue-200 p-6 sticky top-6">
            <h2 class="text-xl font-bold text-gray-800 mb-6 flex items-center gap-2"><iconify-icon icon="mdi:plus-circle" class="text-green-500"></iconify-icon> Tambah Kas Masuk</h2>
            
            <form action="<?php echo e(route('admin.keuangan.store-masuk')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Tanggal Transaksi</label>
                        <input type="date" name="tanggal" value="<?php echo e(old('tanggal', now()->format('Y-m-d'))); ?>" 
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent <?php $__errorArgs = ['tanggal'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                        <?php $__errorArgs = ['tanggal'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Kategori</label>
                        <select name="kategori_id" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent <?php $__errorArgs = ['kategori_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                            <option value="">-- Pilih Kategori --</option>
                            <?php $__currentLoopData = $kategoris; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kategori): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($kategori->id); ?>" <?php echo e(old('kategori_id') == $kategori->id ? 'selected' : ''); ?>>
                                <?php echo e($kategori->nama_kategori); ?>

                            </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['kategori_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Keterangan</label>
                        <textarea name="keterangan" rows="3" 
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent <?php $__errorArgs = ['keterangan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            placeholder="Contoh: Iuran bulanan anggota"><?php echo e(old('keterangan')); ?></textarea>
                        <?php $__errorArgs = ['keterangan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Jumlah (Rp)</label>
                        <input type="number" name="jumlah" value="<?php echo e(old('jumlah')); ?>" min="1"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent <?php $__errorArgs = ['jumlah'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            placeholder="Contoh: 50000">
                        <?php $__errorArgs = ['jumlah'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Sumber Dana</label>
                        <input type="text" name="sumber_dana" value="<?php echo e(old('sumber_dana')); ?>"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            placeholder="Contoh: Iuran Anggota, Donasi, dll">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Bukti Transaksi (Opsional)</label>
                        <input type="file" name="bukti_transaksi" accept="image/*"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent <?php $__errorArgs = ['bukti_transaksi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                        <?php $__errorArgs = ['bukti_transaksi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <p class="text-gray-500 text-xs mt-1">Format: JPG, PNG, Maks 2MB</p>
                    </div>
                </div>

                <button type="submit" class="w-full mt-6 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white font-bold py-3 px-6 rounded-xl transition-all transform hover:-translate-y-1 shadow-lg flex items-center justify-center gap-2">
                    <iconify-icon icon="mdi:content-save" class="text-lg"></iconify-icon> Simpan Transaksi
                </button>
            </form>

            <!-- Quick Add Kategori -->
            <div class="mt-6 pt-6 border-t border-gray-200">
                <h3 class="text-sm font-semibold text-gray-700 mb-3 flex items-center gap-1"><iconify-icon icon="mdi:flash" class="text-yellow-500"></iconify-icon> Quick Add Kategori</h3>
                <form action="<?php echo e(route('admin.keuangan.kategori.store')); ?>" method="POST" class="flex gap-2">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="jenis" value="masuk">
                    <input type="text" name="nama_kategori" placeholder="Nama kategori"
                        class="flex-1 px-3 py-2 text-sm rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-500">
                    <button type="submit" class="bg-blue-100 text-blue-700 px-3 py-2 rounded-lg text-sm font-semibold hover:bg-blue-200">
                        +
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Tabel Kas Masuk -->
    <div class="lg:col-span-2">
        <div class="bg-white rounded-2xl shadow-lg border border-blue-200">
            <div class="p-6 border-b border-blue-200">
                <div class="flex items-center justify-between">
                    <h2 class="text-xl font-bold text-gray-800 flex items-center gap-2"><iconify-icon icon="mdi:format-list-bulleted" class="text-blue-500"></iconify-icon> Daftar Kas Masuk</h2>
                    <a href="<?php echo e(route('admin.keuangan.export-pdf', ['jenis' => 'masuk'])); ?>" class="bg-blue-100 text-blue-700 px-4 py-2 rounded-lg text-sm font-semibold hover:bg-blue-200 transition-all flex items-center gap-1">
                        <iconify-icon icon="mdi:file-download"></iconify-icon> Export PDF
                    </a>
                </div>
            </div>
            
            <div class="p-6">
                <?php if(session('success')): ?>
                <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded-xl mb-6">
                    <?php echo e(session('success')); ?>

                </div>
                <?php endif; ?>

                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b border-blue-200">
                                <th class="text-left py-3 px-4 text-sm font-semibold text-gray-700">Tanggal</th>
                                <th class="text-left py-3 px-4 text-sm font-semibold text-gray-700">Kategori</th>
                                <th class="text-left py-3 px-4 text-sm font-semibold text-gray-700">Keterangan</th>
                                <th class="text-left py-3 px-4 text-sm font-semibold text-gray-700">Sumber</th>
                                <th class="text-right py-3 px-4 text-sm font-semibold text-gray-700">Jumlah</th>
                                <th class="text-center py-3 px-4 text-sm font-semibold text-gray-700">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $transaksi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr class="border-b border-blue-50 hover:bg-blue-50 transition-colors">
                                <td class="py-4 px-4 text-sm text-gray-600">
                                    <?php echo e($item->tanggal->format('d/m/Y')); ?>

                                </td>
                                <td class="py-4 px-4">
                                    <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs font-semibold">
                                        <?php echo e($item->kategori->nama_kategori ?? 'Tanpa Kategori'); ?>

                                    </span>
                                </td>
                                <td class="py-4 px-4 text-sm text-gray-800">
                                    <?php echo e(Str::limit($item->keterangan, 40)); ?>

                                </td>
                                <td class="py-4 px-4 text-sm text-gray-600">
                                    <?php echo e($item->sumber_dana ?? '-'); ?>

                                </td>
                                <td class="py-4 px-4 text-right">
                                    <span class="font-bold text-blue-600">
                                        Rp <?php echo e(number_format($item->jumlah, 0, ',', '.')); ?>

                                    </span>
                                </td>
                                <td class="py-4 px-4 text-center">
                                    <div class="flex items-center justify-center gap-2">
                                        <?php if($item->bukti_transaksi): ?>
                                        <a href="<?php echo e(asset('storage/' . $item->bukti_transaksi)); ?>" target="_blank"
                                            class="text-blue-600 hover:text-blue-800" title="Lihat Bukti">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                            </svg>
                                        </a>
                                        <?php endif; ?>
                                        <form id="delete-form-<?php echo e($item->id); ?>" action="<?php echo e(route('admin.keuangan.destroy', $item->id)); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="button" onclick="if(confirm('Yakin ingin menghapus data ini?')) document.getElementById('delete-form-<?php echo e($item->id); ?>').submit();"
                                                class="bg-red-50 text-red-600 px-3 py-2 rounded-lg hover:bg-red-100 transition font-semibold text-xs border border-red-200">
                                                <iconify-icon icon="mdi:trash-can" class="text-base"></iconify-icon>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="6" class="text-center py-12">
                                    <div class="flex flex-col items-center text-gray-500">
                                        <svg class="w-16 h-16 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                        </svg>
                                        <p class="font-semibold">Belum ada data kas masuk</p>
                                        <p class="text-sm">Tambahkan transaksi pertama Anda</p>
                                    </div>
                                </td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    <?php echo e($transaksi->links()); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\projectsempro\resources\views/admin/keuangan/masuk.blade.php ENDPATH**/ ?>