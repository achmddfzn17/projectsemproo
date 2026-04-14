@extends('layouts.admin')

@section('title', 'Scan QR Check-in')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-800 flex items-center gap-2"><iconify-icon icon="mdi:qrcode-scan" class="text-blue-500"></iconify-icon> Scan QR Check-in</h1>
        <p class="text-gray-600 mt-1">Scan QR Code peserta untuk check-in kegiatan</p>
    </div>

    <!-- Scanner -->
    <div class="bg-white rounded-2xl shadow-lg p-8 border border-blue-100 mb-6">
        <div id="scanner" class="mb-6"></div>
        
        <div class="text-center">
            <button id="startBtn" onclick="startScanner()" 
                    class="bg-blue-600 text-white px-8 py-4 rounded-xl hover:bg-blue-700 transition-all shadow-lg font-bold text-lg flex items-center gap-2">
                <iconify-icon icon="mdi:camera" class="text-xl"></iconify-icon> Mulai Scan
            </button>
            <button id="stopBtn" onclick="stopScanner()" style="display:none;"
                    class="bg-red-600 text-white px-8 py-4 rounded-xl hover:bg-red-700 transition-all shadow-lg font-bold text-lg flex items-center gap-2">
                <iconify-icon icon="mdi:stop" class="text-xl"></iconify-icon> Stop Scan
            </button>
        </div>
    </div>

    <!-- Result -->
    <div id="result" class="hidden bg-white rounded-2xl shadow-lg p-8 border border-blue-100">
        <div id="resultContent"></div>
    </div>
</div>

<script src="https://unpkg.com/html5-qrcode"></script>
<script>
let html5QrcodeScanner;

function startScanner() {
    document.getElementById('startBtn').style.display = 'none';
    document.getElementById('stopBtn').style.display = 'inline-block';
    
    html5QrcodeScanner = new Html5QrcodeScanner("scanner", { 
        fps: 10, 
        qrbox: 250 
    });
    
    html5QrcodeScanner.render(onScanSuccess);
}

function stopScanner() {
    html5QrcodeScanner.clear();
    document.getElementById('startBtn').style.display = 'inline-block';
    document.getElementById('stopBtn').style.display = 'none';
}

function onScanSuccess(decodedText) {
    fetch('{{ route("admin.kegiatan.process-qr") }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ qr_token: decodedText })
    })
    .then(response => response.json())
    .then(data => {
        const resultDiv = document.getElementById('result');
        const contentDiv = document.getElementById('resultContent');
        
        if (data.success) {
            contentDiv.innerHTML = `
                <div class="text-center">
                    <iconify-icon icon="mdi:check-circle" class="text-6xl mb-4 text-green-500"></iconify-icon>
                    <h3 class="text-2xl font-bold text-green-600 mb-4">Check-in Berhasil!</h3>
                    <div class="bg-green-50 rounded-xl p-6 text-left">
                        <p class="mb-2"><strong>Nama:</strong> ${data.data.nama_lengkap}</p>
                        <p class="mb-2"><strong>Email:</strong> ${data.data.email}</p>
                        <p class="mb-2"><strong>Waktu:</strong> ${new Date().toLocaleString('id-ID')}</p>
                    </div>
                </div>
            `;
        } else {
            contentDiv.innerHTML = `
                <div class="text-center">
                    <iconify-icon icon="mdi:close-circle" class="text-6xl mb-4 text-red-500"></iconify-icon>
                    <h3 class="text-2xl font-bold text-red-600 mb-4">Check-in Gagal</h3>
                    <p class="text-gray-700">${data.message}</p>
                </div>
            `;
        }
        
        resultDiv.classList.remove('hidden');
        setTimeout(() => resultDiv.classList.add('hidden'), 5000);
    });
}
</script>
@endsection
