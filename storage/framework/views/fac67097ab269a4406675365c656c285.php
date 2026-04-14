<?php $__env->startSection('title', 'Detail Hasil SUS - ' . $hasil->nama); ?>

<?php $__env->startSection('content'); ?>
<!-- Back Button -->
<div class="mb-6">
    <a href="<?php echo e(route('admin.sus.daftar')); ?>" class="inline-flex items-center gap-2 text-gray-600 hover:text-gray-800 transition-colors">
        <iconify-icon icon="mdi:arrow-left" class="text-xl"></iconify-icon>
        <span class="font-medium">Kembali ke Daftar</span>
    </a>
</div>

<!-- Hero Section: Score Display -->
<div class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden mb-8">
    <div class="bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-600 p-8 text-white relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-10">
            <svg class="w-full h-full" viewBox="0 0 100 100" preserveAspectRatio="none">
                <defs>
                    <pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse">
                        <path d="M 10 0 L 0 0 0 10" fill="none" stroke="white" stroke-width="0.5"/>
                    </pattern>
                </defs>
                <rect width="100" height="100" fill="url(#grid)"/>
            </svg>
        </div>
        
        <div class="relative z-10 flex flex-col lg:flex-row items-center justify-between gap-8">
            <!-- Score Display -->
            <div class="text-center lg:text-left">
                <p class="text-blue-100 text-sm font-medium mb-1">Hasil Kuisioner SUS</p>
                <div class="flex items-baseline gap-3 justify-center lg:justify-start">
                    <span class="text-7xl lg:text-8xl font-black"><?php echo e(number_format($hasil->sus_score, 1)); ?></span>
                    <span class="text-2xl text-blue-200">/ 100</span>
                </div>
                
                <!-- Grade Badge -->
                <?php
                    $gradeColors = [
                        'A' => ['bg' => 'bg-green-500', 'text' => 'text-green-600', 'border' => 'border-green-300', 'bg_light' => 'bg-green-100'],
                        'B' => ['bg' => 'bg-blue-500', 'text' => 'text-blue-600', 'border' => 'border-blue-300', 'bg_light' => 'bg-blue-100'],
                        'C' => ['bg' => 'bg-yellow-500', 'text' => 'text-yellow-600', 'border' => 'border-yellow-300', 'bg_light' => 'bg-yellow-100'],
                        'D' => ['bg' => 'bg-orange-500', 'text' => 'text-orange-600', 'border' => 'border-orange-300', 'bg_light' => 'bg-orange-100'],
                        'F' => ['bg' => 'bg-red-500', 'text' => 'text-red-600', 'border' => 'border-red-300', 'bg_light' => 'bg-red-100'],
                    ];
                    $score = $hasil->sus_score;
                    if ($score >= 80.3) { $grade = 'A'; $gradeLabel = 'Excellent'; $gradeDesc = 'Sistem sangat mudah digunakan'; }
                    elseif ($score >= 68) { $grade = 'B'; $gradeLabel = 'Good'; $gradeDesc = 'Sistem mudah digunakan'; }
                    elseif ($score >= 51) { $grade = 'D'; $gradeLabel = 'Poor'; $gradeDesc = 'Sistem perlu peningkatan'; }
                    else { $grade = 'F'; $gradeLabel = 'Worst'; $gradeDesc = 'Sistem perlu perbaikan mendasar'; }
                    $gc = $gradeColors[$grade];
                ?>
                
                <div class="mt-4 flex items-center gap-3 justify-center lg:justify-start">
                    <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-bold <?php echo e($gc['bg']); ?> text-white shadow-lg">
                        Grade <?php echo e($grade); ?>

                    </span>
                    <span class="text-xl font-semibold text-white/90"><?php echo e($gradeLabel); ?></span>
                </div>
                <p class="mt-2 text-blue-100"><?php echo e($gradeDesc); ?></p>
            </div>
            
            <!-- Gauge Meter -->
            <div class="relative w-48 h-48 flex-shrink-0">
                <svg class="w-full h-full transform -rotate-90" viewBox="0 0 100 100">
                    <!-- Background Arc -->
                    <circle cx="50" cy="50" r="40" fill="none" stroke="rgba(255,255,255,0.2)" stroke-width="8"/>
                    <!-- Colored Zones -->
                    <path d="M 50 10 A 40 40 0 0 1 90 50" fill="none" stroke="#22c55e" stroke-width="8" stroke-linecap="round" opacity="0.3"/>
                    <path d="M 90 50 A 40 40 0 0 1 50 90" fill="none" stroke="#3b82f6" stroke-width="8" stroke-linecap="round" opacity="0.3"/>
                    <path d="M 50 90 A 40 40 0 0 1 10 50" fill="none" stroke="#eab308" stroke-width="8" stroke-linecap="round" opacity="0.3"/>
                    <path d="M 10 50 A 40 40 0 0 1 50 10" fill="none" stroke="#ef4444" stroke-width="8" stroke-linecap="round" opacity="0.3"/>
                    <!-- Score Arc -->
                    <?php
                        $scorePercent = min($hasil->sus_score / 100, 1);
                        $circumference = 2 * pi() * 40;
                        $dashOffset = $circumference * (1 - $scorePercent);
                    ?>
                    <circle cx="50" cy="50" r="40" fill="none" stroke="white" stroke-width="8" stroke-linecap="round"
                            stroke-dasharray="<?php echo e($circumference); ?>"
                            stroke-dashoffset="<?php echo e($dashOffset); ?>"
                            class="transition-all duration-1000 ease-out"/>
                </svg>
                <div class="absolute inset-0 flex flex-col items-center justify-center">
                    <span class="text-4xl font-black"><?php echo e(number_format($hasil->sus_score, 0)); ?></span>
                    <span class="text-sm text-blue-200">Skor</span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Two Column Layout -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">
    <!-- Respondent Info -->
    <div class="lg:col-span-1">
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden h-full">
            <div class="p-5 border-b border-gray-100 bg-gradient-to-r from-gray-50 to-gray-100">
                <h3 class="font-bold text-gray-800 flex items-center gap-2">
                    <iconify-icon icon="mdi:account-circle" class="text-xl text-blue-600"></iconify-icon>
                    Data Responden
                </h3>
            </div>
            <div class="p-6">
                <!-- Avatar & Name -->
                <div class="flex items-center gap-4 mb-6 pb-6 border-b border-gray-100">
                    <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center text-white text-2xl font-bold shadow-lg">
                        <?php echo e(substr($hasil->nama, 0, 1)); ?>

                    </div>
                    <div>
                        <h4 class="font-bold text-gray-800 text-lg"><?php echo e($hasil->nama); ?></h4>
                        <p class="text-gray-500 text-sm"><?php echo e($hasil->email); ?></p>
                    </div>
                </div>
                
                <!-- Info List -->
                <div class="space-y-4">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center">
                            <iconify-icon icon="mdi:calendar-account" class="text-blue-600"></iconify-icon>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500">Usia</p>
                            <p class="font-semibold text-gray-800"><?php echo e($hasil->usia); ?> tahun</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-purple-50 flex items-center justify-center">
                            <iconify-icon icon="mdi:school" class="text-purple-600"></iconify-icon>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500">Pendidikan</p>
                            <p class="font-semibold text-gray-800"><?php echo e($hasil->pendidikan); ?></p>
                        </div>
                    </div>
                    
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-green-50 flex items-center justify-center">
                            <iconify-icon icon="mdi:laptop" class="text-green-600"></iconify-icon>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500">Pengalaman Komputer</p>
                            <p class="font-semibold text-gray-800"><?php echo e($hasil->pengalaman_komputer); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Question Breakdown -->
    <div class="lg:col-span-2">
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
            <div class="p-5 border-b border-gray-100 bg-gradient-to-r from-blue-50 to-indigo-50">
                <h3 class="font-bold text-gray-800 flex items-center gap-2">
                    <iconify-icon icon="mdi:clipboard-list" class="text-xl text-blue-600"></iconify-icon>
                    Detail Jawaban
                </h3>
            </div>
            <div class="p-6">
                <?php
                    $pertanyaan = [
                        1 => ['text' => 'Saya ingin menggunakan sistem ini sering', 'positif' => true],
                        2 => ['text' => 'Saya merasa sistem ini sulit digunakan', 'positif' => false],
                        3 => ['text' => 'Saya merasa sistem ini mudah digunakan', 'positif' => true],
                        4 => ['text' => 'Saya membutuhkan bantuan orang lain', 'positif' => false],
                        5 => ['text' => 'Saya merasa fitur-fitur berjalan dengan baik', 'positif' => true],
                        6 => ['text' => 'Saya merasa ada banyak hal tidak konsisten', 'positif' => false],
                        7 => ['text' => 'Orang lain akan memahami dengan cepat', 'positif' => true],
                        8 => ['text' => 'Saya merasa sistem ini membingungkan', 'positif' => false],
                        9 => ['text' => 'Saya merasa percaya diri menggunakan', 'positif' => true],
                        10 => ['text' => 'Saya perlu belajar banyak sebelumnya', 'positif' => false],
                    ];
                ?>
                
                <div class="space-y-4">
                    <?php for($i = 1; $i <= 10; $i++): ?>
                    <?php
                        $jawaban = $hasil->{'q'.$i};
                        $q = $pertanyaan[$i];
                        $skor = $q['positif'] ? ($jawaban - 1) : (5 - $jawaban);
                        
                        // Visual indicator
                        if ($skor >= 3) {
                            $statusColor = 'bg-green-100 text-green-700 border-green-200';
                            $iconColor = 'text-green-500';
                        } elseif ($skor >= 2) {
                            $statusColor = 'bg-yellow-100 text-yellow-700 border-yellow-200';
                            $iconColor = 'text-yellow-500';
                        } else {
                            $statusColor = 'bg-red-100 text-red-700 border-red-200';
                            $iconColor = 'text-red-500';
                        }
                    ?>
                    
                    <div class="flex items-center gap-4 p-4 rounded-xl border border-gray-100 hover:border-blue-200 hover:bg-blue-50/30 transition-all">
                        <!-- Question Number -->
                        <div class="w-10 h-10 rounded-xl <?php echo e($q['positif'] ? 'bg-blue-100 text-blue-600' : 'bg-purple-100 text-purple-600'); ?> flex items-center justify-center font-bold text-sm flex-shrink-0">
                            <?php echo e($i); ?>

                        </div>
                        
                        <!-- Question Text -->
                        <div class="flex-1 min-w-0">
                            <p class="font-medium text-gray-800 text-sm leading-relaxed"><?php echo e($q['text']); ?></p>
                            <div class="flex items-center gap-2 mt-1">
                                <span class="text-xs text-gray-500"><?php echo e($q['positif'] ? 'Positif' : 'Negatif'); ?></span>
                                <span class="text-gray-300">•</span>
                                <span class="text-xs text-gray-500">Skor: <?php echo e($skor); ?>/4</span>
                            </div>
                        </div>
                        
                        <!-- Answer & Score -->
                        <div class="flex items-center gap-3 flex-shrink-0">
                            <!-- Score Bar -->
                            <div class="hidden sm:flex items-center gap-2">
                                <div class="w-16 bg-gray-100 rounded-full h-2 overflow-hidden">
                                    <div class="h-full rounded-full transition-all <?php if($skor >= 3): ?> bg-green-500 <?php elseif($skor >= 2): ?> bg-yellow-500 <?php else: ?> bg-red-500 <?php endif; ?>" style="width: <?php echo e($skor * 25); ?>%"></div>
                                </div>
                            </div>
                            
                            <!-- Answer Badge -->
                            <div class="flex flex-col items-center">
                                <span class="w-10 h-10 rounded-xl <?php echo e($statusColor); ?> border flex items-center justify-center font-bold text-lg">
                                    <?php echo e($jawaban); ?>

                                </span>
                                <iconify-icon icon="<?php echo e($skor >= 2 ? 'mdi:check-circle' : 'mdi:close-circle'); ?>" class="<?php echo e($iconColor); ?> text-lg mt-1"></iconify-icon>
                            </div>
                        </div>
                    </div>
                    <?php endfor; ?>
                </div>
                
                <!-- Total Score Summary -->
                <div class="mt-6 pt-6 border-t border-gray-200 flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <iconify-icon icon="mdi:calculator" class="text-2xl text-blue-600"></iconify-icon>
                        <div>
                            <p class="text-sm text-gray-500">Total Skor</p>
                            <p class="font-bold text-gray-800"><?php echo e($hasil->total_score); ?> / 40</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <iconify-icon icon="mdi:percent" class="text-2xl text-indigo-600"></iconify-icon>
                        <div class="text-right">
                            <p class="text-sm text-gray-500">Skor SUS (x 2.5)</p>
                            <p class="font-bold text-xl text-indigo-600"><?php echo e(number_format($hasil->sus_score, 1)); ?> / 100</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Score Scale Reference -->
<div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden mb-8">
    <div class="p-5 border-b border-gray-100">
        <h3 class="font-bold text-gray-800 flex items-center gap-2">
            <iconify-icon icon="mdi:ruler" class="text-xl text-blue-600"></iconify-icon>
            Skala Penilaian SUS
        </h3>
    </div>
    <div class="p-6">
        <div class="grid grid-cols-2 md:grid-cols-5 gap-4">
            <?php
                $scales = [
                    ['range' => '≥ 80.3', 'grade' => 'A', 'label' => 'Excellent', 'color' => 'green', 'desc' => 'Sangat mudah'],
                    ['range' => '68 - 80.29', 'grade' => 'B', 'label' => 'Good', 'color' => 'blue', 'desc' => 'Mudah'],
                    ['range' => '= 68', 'grade' => 'C', 'label' => 'Average', 'color' => 'yellow', 'desc' => 'Netral'],
                    ['range' => '51 - 67.99', 'grade' => 'D', 'label' => 'Poor', 'color' => 'orange', 'desc' => 'Sulit'],
                    ['range' => '< 51', 'grade' => 'F', 'label' => 'Worst', 'color' => 'red', 'desc' => 'Sangat Sulit'],
                ];
            ?>
            
            <?php $__currentLoopData = $scales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $isActive = false;
                if ($s['grade'] == 'A' && $hasil->sus_score >= 80.3) $isActive = true;
                elseif ($s['grade'] == 'B' && $hasil->sus_score >= 68 && $hasil->sus_score < 80.3) $isActive = true;
                elseif ($s['grade'] == 'C' && $hasil->sus_score == 68) $isActive = true;
                elseif ($s['grade'] == 'D' && $hasil->sus_score >= 51 && $hasil->sus_score < 68) $isActive = true;
                elseif ($s['grade'] == 'F' && $hasil->sus_score < 51) $isActive = true;
                
                $borderColor = $isActive ? "border-{$s['color']}-500" : "border-gray-200";
                $bgColor = $isActive ? "bg-{$s['color']}-50" : "bg-gray-50";
            ?>
            
            <div class="p-4 rounded-xl border-2 <?php echo e($borderColor); ?> <?php echo e($bgColor); ?> text-center transition-all relative <?php echo e($isActive ? 'ring-2 ring-offset-2 ring-' . $s['color'] . '-400' : ''); ?>">
                <?php if($isActive): ?>
                <div class="absolute -top-3 left-1/2 -translate-x-1/2 bg-<?php echo e($s['color']); ?>-500 text-white text-xs font-bold px-3 py-1 rounded-full">
                    Anda Disini
                </div>
                <?php endif; ?>
                <span class="inline-block w-12 h-12 rounded-full bg-<?php echo e($s['color']); ?>-100 text-<?php echo e($s['color']); ?>-600 font-black text-xl mb-2 flex items-center justify-center mx-auto"><?php echo e($s['grade']); ?></span>
                <p class="font-bold text-gray-800 text-sm"><?php echo e($s['label']); ?></p>
                <p class="text-xs text-gray-500"><?php echo e($s['desc']); ?></p>
                <p class="text-xs font-medium text-<?php echo e($s['color']); ?>-600 mt-1"><?php echo e($s['range']); ?></p>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>

<!-- Actions -->
<div class="flex flex-col sm:flex-row items-center justify-between gap-4">
    <a href="<?php echo e(route('admin.sus.daftar')); ?>" class="w-full sm:w-auto flex items-center justify-center gap-2 bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold py-3 px-6 rounded-xl transition-all">
        <iconify-icon icon="mdi:arrow-left" class="text-xl"></iconify-icon>
        <span>Kembali ke Daftar</span>
    </a>
    
    <div class="flex items-center gap-3 w-full sm:w-auto">
        <form action="<?php echo e(route('admin.sus.destroy', $hasil->id)); ?>" method="POST" class="flex-1 sm:flex-none">
            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>
            <button type="submit" class="w-full sm:w-auto flex items-center justify-center gap-2 bg-red-50 hover:bg-red-100 text-red-600 font-semibold py-3 px-6 rounded-xl transition-all" onclick="return confirm('Yakin hapus data ini?')">
                <iconify-icon icon="mdi:delete" class="text-xl"></iconify-icon>
                <span>Hapus</span>
            </button>
        </form>
        
        <a href="<?php echo e(route('admin.sus.index')); ?>" class="flex-1 sm:flex-none flex items-center justify-center gap-2 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-semibold py-3 px-6 rounded-xl transition-all shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
            <iconify-icon icon="mdi:plus-circle" class="text-xl"></iconify-icon>
            <span>Kuisioner Baru</span>
        </a>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\projectsempro\resources\views/admin/sus/hasil.blade.php ENDPATH**/ ?>