<?php $__env->startSection('title', 'Dashboard SUS'); ?>

<?php $__env->startSection('content'); ?>
<!-- Header -->
<div class="mb-8 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-3xl p-8 text-white shadow-2xl relative overflow-hidden">
    <div class="absolute inset-0 -z-10 opacity-20">
        <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'0.4\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
    </div>
    <div class="relative z-10">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
            <div>
                <h1 class="text-4xl font-bold mb-2 flex items-center gap-3">
                    <iconify-icon icon="mdi:chart-bar" class="text-3xl"></iconify-icon>
                    Dashboard SUS
                </h1>
                <p class="text-blue-100 text-lg">System Usability Scale - Statistik & Analisis</p>
            </div>
            <div class="flex gap-3">
                <a href="<?php echo e(route('admin.sus.index')); ?>" class="bg-white/20 hover:bg-white/25 backdrop-blur-sm rounded-2xl px-5 py-3 text-sm font-medium transition-all flex items-center gap-3 hover:shadow-lg transform hover:scale-[1.02]">
                    <iconify-icon icon="mdi:plus-circle" class="text-xl"></iconify-icon>
                    <span>Kuisioner Baru</span>
                </a>
                <?php if($totalResponden > 0): ?>
                <a href="<?php echo e(route('admin.sus.export-pdf')); ?>" class="bg-white/20 hover:bg-white/25 backdrop-blur-sm rounded-2xl px-5 py-3 text-sm font-medium transition-all flex items-center gap-3 hover:shadow-lg transform hover:scale-[1.02]">
                    <iconify-icon icon="mdi:file-pdf-box" class="text-xl"></iconify-icon>
                    <span>Export PDF</span>
                </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<!-- Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <!-- Total Responden -->
    <div class="bg-white rounded-2xl shadow-lg border border-blue-100 p-6 hover:shadow-xl transition-all hover:-translate-y-1">
        <div class="flex items-center justify-between mb-4">
            <div class="bg-blue-100 p-3 rounded-xl">
                <iconify-icon icon="mdi:account-group" class="text-2xl text-blue-600"></iconify-icon>
            </div>
            <span class="text-xs font-semibold text-blue-600 bg-blue-50 px-3 py-1 rounded-full">Total</span>
        </div>
        <h3 class="text-4xl font-bold text-gray-800 mb-1"><?php echo e($totalResponden); ?></h3>
        <p class="text-gray-500 text-sm">Total Responden</p>
    </div>

    <!-- Rata-rata Skor -->
    <div class="bg-white rounded-2xl shadow-lg border border-green-100 p-6 hover:shadow-xl transition-all hover:-translate-y-1">
        <div class="flex items-center justify-between mb-4">
            <div class="bg-green-100 p-3 rounded-xl">
                <iconify-icon icon="mdi:calculator" class="text-2xl text-green-600"></iconify-icon>
            </div>
            <?php
                $scoreColor = $rataRataSkor >= 68 ? 'text-green-600 bg-green-50' : 'text-red-600 bg-red-50';
                $scoreLabel = $rataRataSkor >= 68 ? 'Layak' : 'Perbaikan';
            ?>
            <span class="text-xs font-semibold px-3 py-1 rounded-full <?php echo e($scoreColor); ?>"><?php echo e($scoreLabel); ?></span>
        </div>
        <h3 class="text-4xl font-bold text-gray-800 mb-1"><?php echo e($rataRataSkor); ?></h3>
        <p class="text-gray-500 text-sm">Rata-rata Skor SUS</p>
    </div>

    <!-- Kategori Overall -->
    <div class="bg-white rounded-2xl shadow-lg border border-purple-100 p-6 hover:shadow-xl transition-all hover:-translate-y-1">
        <div class="flex items-center justify-between mb-4">
            <div class="bg-purple-100 p-3 rounded-xl">
                <iconify-icon icon="mdi:medal" class="text-2xl text-purple-600"></iconify-icon>
            </div>
            <?php
                if ($rataRataSkor >= 80.3) {
                    $overallLabel = 'A - Excellent';
                    $overallColor = 'text-green-600 bg-green-50';
                } elseif ($rataRataSkor >= 68) {
                    $overallLabel = 'B - Good';
                    $overallColor = 'text-blue-600 bg-blue-50';
                } elseif ($rataRataSkor >= 51) {
                    $overallLabel = 'D - Poor';
                    $overallColor = 'text-yellow-600 bg-yellow-50';
                } else {
                    $overallLabel = 'F - Worst';
                    $overallColor = 'text-red-600 bg-red-50';
                }
            ?>
            <span class="text-xs font-semibold px-3 py-1 rounded-full <?php echo e($overallColor); ?>"><?php echo e($overallLabel); ?></span>
        </div>
        <h3 class="text-2xl font-bold text-gray-800 mb-1"><?php echo e($overallLabel); ?></h3>
        <p class="text-gray-500 text-sm">Kategori Keseluruhan</p>
    </div>

    <!-- Persentase Kelayakan -->
    <div class="bg-white rounded-2xl shadow-lg border border-indigo-100 p-6 hover:shadow-xl transition-all hover:-translate-y-1">
        <div class="flex items-center justify-between mb-4">
            <div class="bg-indigo-100 p-3 rounded-xl">
                <iconify-icon icon="mdi:check-decagram" class="text-2xl text-indigo-600"></iconify-icon>
            </div>
            <?php
                $layakCount = \App\Models\HasilSus::where('sus_score', '>=', 68)->count();
                $persenLayak = $totalResponden > 0 ? round(($layakCount / $totalResponden) * 100, 1) : 0;
            ?>
            <span class="text-xs font-semibold text-indigo-600 bg-indigo-50 px-3 py-1 rounded-full">Kelayakan</span>
        </div>
        <h3 class="text-4xl font-bold text-gray-800 mb-1"><?php echo e($persenLayak); ?>%</h3>
        <p class="text-gray-500 text-sm">Responden Merasa Layak</p>
    </div>
</div>

<!-- Grade Distribution -->
<div class="bg-white rounded-2xl shadow-lg border border-blue-100 overflow-hidden mb-8">
    <div class="p-6 border-b border-blue-100 bg-gradient-to-r from-blue-600 to-indigo-600">
        <h3 class="text-lg font-bold text-white flex items-center gap-2">
            <iconify-icon icon="mdi:chart-pie" class="text-xl"></iconify-icon>
            Distribusi Grade SUS
        </h3>
    </div>
    <div class="p-6">
        <?php
            $grades = [
                ['grade' => 'A', 'label' => 'Excellent', 'range' => '80.3 - 100', 'color' => 'bg-green-500', 'text' => 'text-green-600', 'bg' => 'bg-green-50', 'border' => 'border-green-200'],
                ['grade' => 'B', 'label' => 'Good', 'range' => '68 - 80.29', 'color' => 'bg-blue-500', 'text' => 'text-blue-600', 'bg' => 'bg-blue-50', 'border' => 'border-blue-200'],
                ['grade' => 'C', 'label' => 'Average', 'range' => '68', 'color' => 'bg-yellow-500', 'text' => 'text-yellow-600', 'bg' => 'bg-yellow-50', 'border' => 'border-yellow-200'],
                ['grade' => 'D', 'label' => 'Poor', 'range' => '51 - 67.99', 'color' => 'bg-orange-500', 'text' => 'text-orange-600', 'bg' => 'bg-orange-50', 'border' => 'border-orange-200'],
                ['grade' => 'F', 'label' => 'Worst', 'range' => '< 51', 'color' => 'bg-red-500', 'text' => 'text-red-600', 'bg' => 'bg-red-50', 'border' => 'border-red-200'],
            ];
            
            // Count for each grade
            $gradeCounts = [
                'A' => \App\Models\HasilSus::whereBetween('sus_score', [80.3, 100])->count(),
                'B' => \App\Models\HasilSus::whereBetween('sus_score', [68, 80.29])->count(),
                'C' => \App\Models\HasilSus::where('sus_score', 68)->count(),
                'D' => \App\Models\HasilSus::whereBetween('sus_score', [51, 67.99])->count(),
                'F' => \App\Models\HasilSus::where('sus_score', '<', 51)->count(),
            ];
            
            $maxCount = max($gradeCounts) ?: 1;
        ?>
        
        <div class="space-y-4">
            <?php $__currentLoopData = $grades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $g): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="flex items-center gap-4">
                <div class="w-16 text-center">
                    <span class="text-2xl font-bold <?php echo e($g['text']); ?>"><?php echo e($g['grade']); ?></span>
                </div>
                <div class="flex-1">
                    <div class="flex justify-between items-center mb-1">
                        <span class="text-sm font-medium text-gray-700"><?php echo e($g['label']); ?></span>
                        <span class="text-sm text-gray-500"><?php echo e($gradeCounts[$g['grade']]); ?> responden (<?php echo e($totalResponden > 0 ? round(($gradeCounts[$g['grade']] / $totalResponden) * 100, 1) : 0); ?>%)</span>
                    </div>
                    <div class="w-full bg-gray-100 rounded-full h-3 overflow-hidden">
                        <div class="<?php echo e($g['color']); ?> h-full rounded-full transition-all duration-500 ease-out" 
                             style="width: <?php echo e($totalResponden > 0 ? ($gradeCounts[$g['grade']] / $maxCount) * 100 : 0); ?>%"></div>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <!-- Legend -->
        <div class="mt-6 pt-4 border-t border-gray-100">
            <p class="text-xs text-gray-500 mb-2">Skala Penilaian:</p>
            <div class="flex flex-wrap gap-4 text-xs">
                <span class="flex items-center gap-1"><span class="w-3 h-3 rounded-full bg-green-500"></span> A: ≥80.3 (Excellent)</span>
                <span class="flex items-center gap-1"><span class="w-3 h-3 rounded-full bg-blue-500"></span> B: 68-80.29 (Good)</span>
                <span class="flex items-center gap-1"><span class="w-3 h-3 rounded-full bg-yellow-500"></span> C: 68 (Average)</span>
                <span class="flex items-center gap-1"><span class="w-3 h-3 rounded-full bg-orange-500"></span> D: 51-67.99 (Poor)</span>
                <span class="flex items-center gap-1"><span class="w-3 h-3 rounded-full bg-red-500"></span> F: <51 (Worst)</span>
            </div>
        </div>
    </div>
</div>

<!-- Recent Submissions Table -->
<div class="bg-white rounded-2xl shadow-lg border border-blue-100 overflow-hidden">
    <div class="p-6 border-b border-blue-100">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
            <h3 class="text-lg font-bold text-gray-800 flex items-center gap-2">
                <iconify-icon icon="mdi:format-list-bulleted" class="text-xl text-blue-600"></iconify-icon>
                Daftar Responden
            </h3>
            <span class="text-sm text-gray-500"><?php echo e($totalResponden); ?> total responden</span>
        </div>
    </div>
    
    <?php if($totalResponden > 0): ?>
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">#</th>
                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Nama</th>
                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Email</th>
                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Usia</th>
                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Pendidikan</th>
                    <th class="px-6 py-4 text-center text-xs font-bold text-gray-600 uppercase tracking-wider">Skor</th>
                    <th class="px-6 py-4 text-center text-xs font-bold text-gray-600 uppercase tracking-wider">Grade</th>
                    <th class="px-6 py-4 text-center text-xs font-bold text-gray-600 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <?php $__currentLoopData = $hasilSus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $score = $item->sus_score;
                    if ($score >= 80.3) {
                        $grade = 'A';
                        $label = 'Excellent';
                        $color = 'bg-green-100 text-green-700 border-green-200';
                        $scoreColor = 'text-green-600';
                    } elseif ($score >= 68) {
                        $grade = 'B';
                        $label = 'Good';
                        $color = 'bg-blue-100 text-blue-700 border-blue-200';
                        $scoreColor = 'text-blue-600';
                    } elseif ($score >= 51) {
                        $grade = 'D';
                        $label = 'Poor';
                        $color = 'bg-yellow-100 text-yellow-700 border-yellow-200';
                        $scoreColor = 'text-yellow-600';
                    } else {
                        $grade = 'F';
                        $label = 'Worst';
                        $color = 'bg-red-100 text-red-700 border-red-200';
                        $scoreColor = 'text-red-600';
                    }
                ?>
                <tr class="hover:bg-blue-50/50 transition-colors">
                    <td class="px-6 py-4 text-sm text-gray-500"><?php echo e($index + 1); ?></td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center text-white font-bold text-sm">
                                <?php echo e(substr($item->nama, 0, 1)); ?>

                            </div>
                            <span class="font-medium text-gray-800"><?php echo e($item->nama); ?></span>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-600"><?php echo e($item->email); ?></td>
                    <td class="px-6 py-4 text-sm text-gray-600"><?php echo e($item->usia); ?> th</td>
                    <td class="px-6 py-4 text-sm text-gray-600"><?php echo e($item->pendidikan); ?></td>
                    <td class="px-6 py-4 text-center">
                        <span class="font-bold <?php echo e($scoreColor); ?> text-lg"><?php echo e(number_format($item->sus_score, 1)); ?></span>
                        <span class="text-gray-400 text-xs">/ 100</span>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold border <?php echo e($color); ?>">
                            Grade <?php echo e($grade); ?>

                        </span>
                        <span class="block text-xs text-gray-500 mt-1"><?php echo e($label); ?></span>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <div class="flex items-center justify-center gap-2">
                            <a href="<?php echo e(route('admin.sus.hasil', $item->id)); ?>" class="p-2 rounded-xl bg-blue-100 text-blue-600 hover:bg-blue-200 transition-colors" title="Lihat Detail">
                                <iconify-icon icon="mdi:eye" class="text-lg"></iconify-icon>
                            </a>
                                <form id="delete-form-<?php echo e($item->id); ?>" action="<?php echo e(route('admin.sus.destroy', $item->id)); ?>" method="POST">
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
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
    <div class="p-4 border-t border-gray-100">
        <?php echo e($hasilSus->links()); ?>

    </div>
    <?php else: ?>
    <div class="p-12 text-center">
        <div class="w-24 h-24 mx-auto mb-6 bg-gray-100 rounded-full flex items-center justify-center">
            <iconify-icon icon="mdi:clipboard-text-outline" class="text-5xl text-gray-300"></iconify-icon>
        </div>
        <h3 class="text-xl font-bold text-gray-700 mb-2">Belum Ada Data</h3>
        <p class="text-gray-500 mb-6">Mulai dengan membuat kuisioner baru untuk mengumpulkan data responden</p>
        <a href="<?php echo e(route('admin.sus.index')); ?>" class="inline-flex items-center gap-2 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-bold py-3 px-6 rounded-xl transition-all transform hover:-translate-y-1 shadow-lg">
            <iconify-icon icon="mdi:plus-circle" class="text-xl"></iconify-icon>
            <span>Buat Kuisioner Baru</span>
        </a>
    </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\projectsempro\resources\views/admin/sus/daftar.blade.php ENDPATH**/ ?>