@extends('layouts.admin')

@section('title', 'Pendaftaran Kegiatan - ' . $kegiatan->nama_kegiatan)

@section('content')
<div class="mb-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Pendaftaran Kegiatan</h1>
            <p class="text-gray-600 mt-1">{{ $kegiatan->nama_kegiatan }}</p>
        </div>
        <div class="flex space-x-3">
            <a href="{{ route('admin.kegiatan.scan') }}" 
               class="bg-purple-600 text-white px-6 py-3 rounded-xl hover:bg-purple-700 transition-all shadow-lg font-semibold">
                📷 Scan QR Check-in
            </a>
            <a href="{{ route('admin.kegiatan.export-absensi', $kegiatan->id) }}" 
               class="bg-green-600 text-white px-6 py-3 rounded-xl hover:bg-green-700 transition-all shadow-lg font-semibold">
                📥 Export Absensi
            </a>
        </div>
    </div>
</div>

<!-- Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
    <div class="bg-white rounded-2xl p-6 shadow-lg border border-blue-100">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 text-sm mb-1">Total Pendaftar</p>
                <p class="text-3xl font-black text-blue-600">{{ $pendaftaran->total() }}</p>
            </div>
            <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                <span class="text-2xl">📝</span>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-2xl p-6 shadow-lg border border-blue-100">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 text-sm mb-1">Pending</p>
                <p class="text-3xl font-black text-yellow-600">{{ $pendaftaran->where('status', 'pending')->count() }}</p>
            </div>
            <div class="w-12 h-12 bg-yellow-100 rounded-xl flex items-center justify-center">
                <span class="text-2xl">⏳</span>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-2xl p-6 shadow-lg border border-blue-100">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 text-sm mb-1">Approved</p>
                <p class="text-3xl font-black text-green-600">{{ $pendaftaran->where('status', 'approved')->count() }}</p>
            </div>
            <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                <span class="text-2xl">✅</span>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-2xl p-6 shadow-lg border border-blue-100">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 text-sm mb-1">Hadir</p>
                <p class="text-3xl font-black text-purple-600">{{ $pendaftaran->where('hadir', true)->count() }}</p>
            </div>
            <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center">
                <span class="text-2xl">👥</span>
            </div>
        </div>
    </div>
</div>

<!-- Table -->
<div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-blue-100">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-blue-50">
                <tr>
                    <th class="text-left py-4 px-6 font-bold text-gray-700">No</th>
                    <th class="text-left py-4 px-6 font-bold text-gray-700">Nama</th>
                    <th class="text-left py-4 px-6 font-bold text-gray-700">Email</th>
                    <th class="text-left py-4 px-6 font-bold text-gray-700">No. HP</th>
                    <th class="text-left py-4 px-6 font-bold text-gray-700">Status</th>
                    <th class="text-left py-4 px-6 font-bold text-gray-700">Kehadiran</th>
                    <th class="text-center py-4 px-6 font-bold text-gray-700">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pendaftaran as $item)
                <tr class="border-t border-blue-100 hover:bg-blue-50 transition-colors">
                    <td class="py-4 px-6">
                        <span class="font-semibold text-gray-700">#{{ str_pad($item->nomor_urut, 4, '0', STR_PAD_LEFT) }}</span>
                    </td>
                    <td class="py-4 px-6">
                        <p class="font-semibold text-gray-800">{{ $item->nama_lengkap }}</p>
                        @if($item->instansi)
                        <p class="text-sm text-gray-500">{{ $item->instansi }}</p>
                        @endif
                    </td>
                    <td class="py-4 px-6 text-gray-700">{{ $item->email }}</td>
                    <td class="py-4 px-6 text-gray-700">{{ $item->no_hp }}</td>
                    <td class="py-4 px-6">
                        @if($item->status == 'pending')
                        <span class="px-3 py-1 bg-yellow-100 text-yellow-700 rounded-full text-sm font-bold">
                            PENDING
                        </span>
                        @elseif($item->status == 'approved')
                        <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-sm font-bold">
                            APPROVED
                        </span>
                        @else
                        <span class="px-3 py-1 bg-red-100 text-red-700 rounded-full text-sm font-bold">
                            REJECTED
                        </span>
                        @endif
                    </td>
                    <td class="py-4 px-6">
                        @if($item->hadir)
                        <div>
                            <span class="px-3 py-1 bg-purple-100 text-purple-700 rounded-full text-sm font-bold">
                                ✓ HADIR
                            </span>
                            <p class="text-xs text-gray-500 mt-1">{{ $item->waktu_hadir->format('d M Y H:i') }}</p>
                        </div>
                        @else
                        <span class="px-3 py-1 bg-gray-100 text-gray-600 rounded-full text-sm font-bold">
                            BELUM
                        </span>
                        @endif
                    </td>
                    <td class="py-4 px-6">
                        <div class="flex justify-center space-x-2">
                            @if($item->status == 'pending')
                            <form action="{{ route('admin.pendaftaran.approve', $item->id) }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" 
                                        class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition-all text-sm font-semibold"
                                        onclick="return confirm('Setujui pendaftaran ini?')">
                                    ✓ Approve
                                </button>
                            </form>
                            <button onclick="showRejectModal({{ $item->id }})" 
                                    class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition-all text-sm font-semibold">
                                ✗ Reject
                            </button>
                            @endif
                            
                            @if($item->status == 'approved' && !$item->hadir)
                            <form action="{{ route('admin.pendaftaran.checkin', $item->id) }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" 
                                        class="bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700 transition-all text-sm font-semibold">
                                    ✓ Check-in
                                </button>
                            </form>
                            @endif
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center py-12">
                        <div class="text-6xl mb-4">📋</div>
                        <p class="text-gray-500 font-semibold">Belum ada pendaftaran</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($pendaftaran->hasPages())
    <div class="p-6 border-t border-blue-100">
        {{ $pendaftaran->links() }}
    </div>
    @endif
</div>

<!-- Reject Modal -->
<div id="rejectModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-white rounded-2xl p-8 max-w-md w-full mx-4">
        <h3 class="text-2xl font-bold text-gray-800 mb-4">Tolak Pendaftaran</h3>
        <form id="rejectForm" method="POST">
            @csrf
            <div class="mb-6">
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Alasan Penolakan
                </label>
                <textarea name="catatan_admin" rows="4" required
                          class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent"></textarea>
            </div>
            <div class="flex space-x-4">
                <button type="submit" 
                        class="flex-1 bg-red-600 text-white px-6 py-3 rounded-xl hover:bg-red-700 transition-all font-semibold">
                    Tolak
                </button>
                <button type="button" onclick="closeRejectModal()" 
                        class="flex-1 bg-gray-200 text-gray-700 px-6 py-3 rounded-xl hover:bg-gray-300 transition-all font-semibold">
                    Batal
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function showRejectModal(id) {
    const modal = document.getElementById('rejectModal');
    const form = document.getElementById('rejectForm');
    form.action = `/admin/pendaftaran/${id}/reject`;
    modal.classList.remove('hidden');
    modal.classList.add('flex');
}

function closeRejectModal() {
    const modal = document.getElementById('rejectModal');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
}
</script>
@endsection
