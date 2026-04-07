@extends('layouts.anggota')

@section('title', 'Kartu Anggota Digital')

@section('content')
<div class="max-w-2xl mx-auto">
    <!-- Digital Card -->
    <div class="bg-gradient-to-br from-blue-500 to-blue-700 rounded-3xl shadow-2xl p-8 text-white mb-6">
        <div class="flex justify-between items-start mb-6">
            <div>
                <h2 class="text-2xl font-black mb-1">KARTU ANGGOTA</h2>
                <p class="text-blue-100 text-sm">Karang Taruna Generasi Emas</p>
            </div>
            <div class="w-16 h-16 bg-white rounded-xl p-2">
                <img src="{{ asset('images/logokatar.png') }}" alt="Logo" class="w-full h-full object-contain">
            </div>
        </div>

        <div class="grid grid-cols-2 gap-6 mb-6">
            <div>
                <p class="text-blue-200 text-xs mb-1">Nama Lengkap</p>
                <p class="font-bold text-lg">{{ $anggota->nama }}</p>
            </div>
            <div>
                <p class="text-blue-200 text-xs mb-1">NIK</p>
                <p class="font-bold text-lg">{{ $anggota->nik }}</p>
            </div>
            <div>
                <p class="text-blue-200 text-xs mb-1">Email</p>
                <p class="font-semibold">{{ $anggota->email }}</p>
            </div>
            <div>
                <p class="text-blue-200 text-xs mb-1">Status</p>
                <span class="inline-block px-3 py-1 bg-green-500 rounded-full text-xs font-bold">
                    {{ strtoupper($anggota->status) }}
                </span>
            </div>
        </div>

        <div class="border-t border-blue-400 pt-4">
            <p class="text-blue-200 text-xs">Member ID: #{{ str_pad($anggota->id, 6, '0', STR_PAD_LEFT) }}</p>
            <p class="text-blue-200 text-xs">Bergabung: {{ $anggota->created_at->format('d M Y') }}</p>
        </div>
    </div>

    <!-- QR Code Section -->
    <div class="bg-white rounded-2xl shadow-lg p-8 border border-blue-100 text-center mb-6">
        <h3 class="text-xl font-bold text-gray-800 mb-4">QR Code Identitas</h3>
        
        <!-- QR Code -->
        <div class="inline-block bg-white p-6 rounded-xl border-4 border-blue-200 mb-4">
            <img src="https://api.qrserver.com/v1/create-qr-code/?size=250x250&data={{ urlencode($qrData) }}" 
                 alt="QR Code" 
                 class="w-64 h-64">
        </div>

        <p class="text-sm text-gray-600 mb-4">
            Scan QR Code ini untuk verifikasi identitas anggota
        </p>

        <!-- Actions -->
        <div class="flex justify-center space-x-4">
            <button onclick="printCard()" 
                    class="bg-blue-600 text-white px-6 py-3 rounded-xl hover:bg-blue-700 transition-all shadow-lg font-semibold">
                🖨️ Print Kartu
            </button>
            <button onclick="downloadQR()" 
                    class="bg-green-600 text-white px-6 py-3 rounded-xl hover:bg-green-700 transition-all shadow-lg font-semibold">
                📥 Download QR
            </button>
        </div>
    </div>

    <!-- Info -->
    <div class="bg-yellow-50 rounded-xl p-4 border border-yellow-200">
        <p class="font-semibold text-gray-800 mb-2">📌 Informasi:</p>
        <ul class="text-sm text-gray-600 space-y-1 list-disc list-inside">
            <li>Kartu ini adalah identitas digital Anda sebagai anggota</li>
            <li>QR Code berisi informasi dasar keanggotaan</li>
            <li>Simpan screenshot kartu ini untuk keperluan verifikasi</li>
            <li>Jangan bagikan QR Code ke pihak yang tidak bertanggung jawab</li>
        </ul>
    </div>
</div>

<script>
function printCard() {
    window.print();
}

function downloadQR() {
    const qrImage = document.querySelector('img[alt="QR Code"]');
    const link = document.createElement('a');
    link.href = qrImage.src;
    link.download = 'qr_anggota_{{ $anggota->nik }}.png';
    link.click();
}
</script>

<style>
@media print {
    body * {
        visibility: hidden;
    }
    .bg-gradient-to-br, .bg-gradient-to-br *, 
    .bg-white.rounded-2xl:first-of-type, .bg-white.rounded-2xl:first-of-type * {
        visibility: visible;
    }
    .bg-gradient-to-br {
        position: absolute;
        left: 0;
        top: 0;
    }
    button, .bg-yellow-50 {
        display: none !important;
    }
}
</style>
@endsection
