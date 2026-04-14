@extends('layouts.admin')

@section('title', 'Data Kegiatan')

@section('content')
<!-- Header -->
<div class="mb-8 bg-gradient-to-r from-blue-600 to-blue-700 rounded-2xl p-8 text-white shadow-xl">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
        <div>
            <h1 class="text-3xl font-extrabold mb-1 flex items-center gap-2"><iconify-icon icon="mdi:calendar" class="text-2xl"></iconify-icon> Data Kegiatan</h1>
            <p class="text-blue-100">Kelola semua kegiatan Karang Taruna</p>
        </div>
        <a href="{{ route('admin.kegiatan.create') }}" class="bg-white text-blue-700 hover:bg-blue-50 rounded-xl px-5 py-2.5 text-sm font-semibold transition-all inline-flex items-center gap-2 shadow-lg">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            Tambah Kegiatan
        </a>
    </div>
</div>

<!-- Mini Stats -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
    <div class="bg-white rounded-xl p-5 shadow-lg border border-blue-100">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 text-sm font-semibold">Total Kegiatan</p>
                <p class="text-2xl font-extrabold mt-1 text-blue-600">{{ $kegiatan->total() }}</p>
            </div>
            <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                <iconify-icon icon="mdi:calendar" class="text-xl text-blue-600"></iconify-icon>
            </div>
        </div>
    </div>
    <div class="bg-white rounded-xl p-5 shadow-lg border border-blue-100">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 text-sm font-semibold">Rencana</p>
                <p class="text-2xl font-extrabold mt-1 text-yellow-600">{{ $kegiatan->where('status', 'rencana')->count() }}</p>
            </div>
            <div class="w-10 h-10 bg-yellow-100 rounded-lg flex items-center justify-center">
                <iconify-icon icon="mdi:clock-outline" class="text-xl text-yellow-600"></iconify-icon>
            </div>
        </div>
    </div>
    <div class="bg-white rounded-xl p-5 shadow-lg border border-blue-100">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 text-sm font-semibold">Berlangsung</p>
                <p class="text-2xl font-extrabold mt-1 text-green-600">{{ $kegiatan->where('status', 'berlangsung')->count() }}</p>
            </div>
            <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                <iconify-icon icon="mdi:play-circle" class="text-xl text-green-600"></iconify-icon>
            </div>
        </div>
    </div>
    <div class="bg-white rounded-xl p-5 shadow-lg border border-blue-100">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 text-sm font-semibold">Selesai</p>
                <p class="text-2xl font-extrabold mt-1 text-gray-600">{{ $kegiatan->where('status', 'selesai')->count() }}</p>
            </div>
            <div class="w-10 h-10 bg-gray-100 rounded-lg flex items-center justify-center">
                <iconify-icon icon="mdi:check-circle" class="text-xl text-gray-600"></iconify-icon>
            </div>
        </div>
    </div>
</div>

<div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-blue-100">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gradient-to-r from-blue-50 to-blue-100">
                <tr>
                    <th class="text-left py-4 px-6 font-bold text-gray-700">No</th>
                    <th class="text-left py-4 px-6 font-bold text-gray-700">Foto</th>
                    <th class="text-left py-4 px-6 font-bold text-gray-700">Nama Kegiatan</th>
                    <th class="text-left py-4 px-6 font-bold text-gray-700">Jenis</th>
                    <th class="text-left py-4 px-6 font-bold text-gray-700">Tanggal</th>
                    <th class="text-left py-4 px-6 font-bold text-gray-700">Lokasi</th>
                    <th class="text-left py-4 px-6 font-bold text-gray-700">Status</th>
                    <th class="text-center py-4 px-6 font-bold text-gray-700">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($kegiatan as $index => $item)
                <tr class="border-b border-blue-50 hover:bg-blue-50 transition-colors">
                    <td class="py-4 px-6">{{ $kegiatan->firstItem() + $index }}</td>
                    <td class="py-4 px-6">
                        @if($item->foto)
                            <img src="{{ asset('storage/' . $item->foto) }}" 
                                 alt="{{ $item->nama_kegiatan }}" 
                                 class="w-16 h-16 object-cover rounded-lg border-2 border-gray-200">
                        @else
                            <div class="w-16 h-16 bg-gradient-to-br from-blue-400 to-blue-600 rounded-lg flex items-center justify-center">
                                <span class="text-white text-2xl">📅</span>
                            </div>
                        @endif
                    </td>
                    <td class="py-4 px-6">
                        <div class="font-semibold text-gray-800">{{ $item->nama_kegiatan }}</div>
                    </td>
                    <td class="py-4 px-6">
                        <span class="px-3 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-700">
                            {{ ucfirst($item->jenis_kegiatan) }}
                        </span>
                    </td>
                    <td class="py-4 px-6 text-sm text-gray-600">
                        {{ $item->tanggal_mulai->format('d M Y') }}
                    </td>
                    <td class="py-4 px-6 text-sm text-gray-600">{{ $item->lokasi }}</td>
                    <td class="py-4 px-6">
                        @if($item->status == 'rencana')
                        <span class="px-3 py-1 rounded-full text-xs font-semibold bg-yellow-100 text-yellow-700">Rencana</span>
                        @elseif($item->status == 'berlangsung')
                        <span class="px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-700">Berlangsung</span>
                        @else
                        <span class="px-3 py-1 rounded-full text-xs font-semibold bg-gray-100 text-gray-700">Selesai</span>
                        @endif
                    </td>
                    <td class="py-4 px-6">
                        <div class="flex justify-center space-x-2">
                            <a href="{{ route('admin.kegiatan.pendaftaran', $item->id) }}" class="bg-purple-50 text-purple-600 px-3 py-2 rounded-lg hover:bg-purple-100 transition font-semibold text-sm">
                                <iconify-icon icon="mdi:account-group" class="text-sm"></iconify-icon>
                            </a>
                            <a href="{{ route('admin.kegiatan.edit', $item->id) }}" class="bg-blue-50 text-blue-600 px-3 py-2 rounded-lg hover:bg-blue-100 transition font-semibold text-sm">
                                <iconify-icon icon="mdi:pencil" class="text-sm"></iconify-icon>
                            </a>
                            <form id="delete-form-{{ $item->id }}" method="POST" action="{{ route('admin.kegiatan.destroy', $item->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="button" onclick="if(confirm('Yakin ingin menghapus kegiatan ini?')) document.getElementById('delete-form-{{ $item->id }}').submit();" class="bg-red-50 text-red-600 px-3 py-2 rounded-lg hover:bg-red-100 transition font-semibold text-sm border border-red-200">
                                    <iconify-icon icon="mdi:trash-can" class="text-sm"></iconify-icon>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center py-16">
                        <div class="flex flex-col items-center">
                            <iconify-icon icon="mdi:calendar-blank" class="text-6xl text-gray-300 mb-4"></iconify-icon>
                            <p class="text-gray-500 font-semibold text-lg">Belum ada data kegiatan</p>
                            <p class="text-gray-400 text-sm mt-1">Klik tombol "Tambah Kegiatan" untuk menambahkan data</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    @if($kegiatan->hasPages())
    <div class="px-6 py-4 border-t border-blue-100 bg-blue-50">
        {{ $kegiatan->links() }}
    </div>
    @endif
</div>
@endsection
