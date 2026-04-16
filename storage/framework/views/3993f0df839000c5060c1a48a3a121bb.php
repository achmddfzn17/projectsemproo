

<?php $__env->startSection('title', 'Pendaftaran Berhasil'); ?>

<?php $__env->startSection('content'); ?>
<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto">
        <!-- Success Message -->
        <div class="bg-green-50 border-2 border-green-500 rounded-2xl p-8 text-center mb-8">
            <iconify-icon icon="mdi:check-circle" class="text-6xl mb-4 text-green-500"></iconify-icon>
            <h1 class="text-3xl font-black text-green-700 mb-2">Pendaftaran Berhasil!</h1>
            <p class="text-green-600">Terima kasih telah mendaftar</p>
        </div>

        <!-- Info Pendaftaran -->
        <div class="bg-white rounded-2xl shadow-lg p-6 border border-blue-100 mb-6">
            <h3 class="text-xl font-bold text-gray-800 mb-4">Informasi Pendaftaran</h3>
            <div class="space-y-3">
                <div class="flex justify-between">
                    <span class="text-gray-600">Nomor Pendaftaran:</span>
                    <span class="font-bold text-blue-600">#<?php echo e(str_pad($pendaftaran->nomor_urut, 4, '0', STR_PAD_LEFT)); ?></span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">Nama:</span>
                    <span class="font-semibold"><?php echo e($pendaftaran->nama_lengkap); ?></span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">Email:</span>
                    <span class="font-semibold"><?php echo e($pendaftaran->email); ?></span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">Kegiatan:</span>
                    <span class="font-semibold"><?php echo e($pendaftaran->kegiatan->nama_kegiatan); ?></span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">Status:</span>
                    <span class="px-3 py-1 bg-yellow-100 text-yellow-700 rounded-full text-sm font-bold">
                        <?php echo e(strtoupper($pendaftaran->status)); ?>

                    </span>
                </div>
            </div>
        </div>

        <!-- QR Code -->
        <div class="bg-white rounded-2xl shadow-lg p-8 border border-blue-100 text-center mb-6">
            <h3 class="text-xl font-bold text-gray-800 mb-4">QR Code Check-in</h3>
            <p class="text-gray-600 mb-6">Simpan QR Code ini untuk check-in di hari kegiatan</p>
            
            <div class="inline-block bg-white p-6 rounded-xl border-4 border-blue-200 mb-4">
                <img src="https://api.qrserver.com/v1/create-qr-code/?size=300x300&data=<?php echo e(urlencode($pendaftaran->qr_token)); ?>" 
                     alt="QR Code" 
                     class="w-64 h-64">
            </div>

            <p class="text-sm text-gray-500 mb-4">
                Nomor: #<?php echo e(str_pad($pendaftaran->nomor_urut, 4, '0', STR_PAD_LEFT)); ?>

            </p>

            <div class="flex justify-center space-x-4">
                <button onclick="downloadQR()" 
                        class="bg-blue-600 text-white px-6 py-3 rounded-xl hover:bg-blue-700 transition-all shadow-lg font-semibold flex items-center gap-2">
                    <iconify-icon icon="mdi:download"></iconify-icon> Download QR Code
                </button>
                <button onclick="window.print()" 
                        class="bg-green-600 text-white px-6 py-3 rounded-xl hover:bg-green-700 transition-all shadow-lg font-semibold flex items-center gap-2">
                    <iconify-icon icon="mdi:printer"></iconify-icon> Print
                </button>
            </div>
        </div>

        <!-- Status Info -->
        <div class="bg-blue-50 rounded-xl p-6 border border-blue-200 mb-6">
            <h4 class="font-bold text-blue-800 mb-3 flex items-center gap-2"><iconify-icon icon="mdi:clipboard-list" class="text-blue-500"></iconify-icon> Status Pendaftaran: PENDING</h4>
            <p class="text-blue-700 mb-3">Pendaftaran Anda sedang dalam proses verifikasi oleh admin.</p>
            <ul class="text-sm text-blue-600 space-y-2 list-disc list-inside">
                <li>Anda akan menerima email konfirmasi setelah pendaftaran disetujui</li>
                <li>Proses verifikasi biasanya memakan waktu 1-2 hari kerja</li>
                <li>Setelah disetujui, Anda dapat menggunakan QR Code untuk check-in</li>
                <li>Simpan screenshot halaman ini sebagai bukti pendaftaran</li>
            </ul>
        </div>

        <!-- Actions -->
        <div class="flex space-x-4">
            <a href="<?php echo e(route('kegiatan.detail', $pendaftaran->kegiatan_id)); ?>" 
               class="flex-1 text-center bg-gray-100 text-gray-700 px-6 py-3 rounded-xl hover:bg-gray-200 transition-all font-semibold">
                ← Kembali ke Detail Kegiatan
            </a>
            <a href="<?php echo e(route('home')); ?>" 
               class="flex-1 text-center bg-blue-600 text-white px-6 py-3 rounded-xl hover:bg-blue-700 transition-all font-semibold flex items-center justify-center gap-2">
                 <iconify-icon icon="mdi:home"></iconify-icon> Ke Beranda
             </a>
        </div>
    </div>
</div>

<script>
function downloadQR() {
    const qrImage = document.querySelector('img[alt="QR Code"]');
    const link = document.createElement('a');
    link.href = qrImage.src;
    link.download = 'qr_pendaftaran_<?php echo e($pendaftaran->nomor_urut); ?>.png';
    link.click();
}
</script>

<style>
@media print {
    body * {
        visibility: hidden;
    }
    .bg-white.rounded-2xl, .bg-white.rounded-2xl * {
        visibility: visible;
    }
    .bg-white.rounded-2xl {
        position: absolute;
        left: 0;
        top: 0;
    }
    button {
        display: none !important;
    }
}
</style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\projectsempro\resources\views/kegiatan/pendaftaran-success.blade.php ENDPATH**/ ?>