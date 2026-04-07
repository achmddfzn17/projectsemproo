@extends('layouts.admin')

@section('title', 'Data Anggota')

@section('content')
<div class="mb-6 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
    <div>
        <h1 class="text-3xl font-extrabold text-gray-800">Data Anggota</h1>
        <p class="text-sm text-gray-600 mt-1">Kelola data anggota Karang Taruna</p>
    </div>
    <a href="{{ route('admin.anggota.create') }}" class="bg-blue-600 text-white px-6 py-3 rounded-xl hover:bg-blue-700 transition-all shadow-lg hover:shadow-xl font-semibold inline-flex items-center">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
        </svg>
        Tambah Anggota
    </a>
</div>

<!-- Mini Stats -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
    <div class="bg-white rounded-xl p-5 shadow-lg border border-blue-100">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 text-sm font-semibold">Total Anggota</p>
                <p class="text-3xl font-extrabold mt-1 text-blue-600">{{ $anggota->total() }}</p>
            </div>
            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl p-5 shadow-lg border border-blue-100">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 text-sm font-semibold">Anggota Aktif</p>
                <p class="text-3xl font-extrabold mt-1 text-blue-600">{{ $anggota->where('status', 'aktif')->count() }}</p>
            </div>
            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl p-5 shadow-lg border border-blue-100">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 text-sm font-semibold">Non-Aktif</p>
                <p class="text-3xl font-extrabold mt-1 text-blue-600">{{ $anggota->where('status', 'non-aktif')->count() }}</p>
            </div>
            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"></path>
                </svg>
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
                    <th class="text-left py-4 px-6 font-bold text-gray-700">Nama Lengkap</th>
                    <th class="text-left py-4 px-6 font-bold text-gray-700">NIK</th>
                    <th class="text-left py-4 px-6 font-bold text-gray-700">Jenis Kelamin</th>
                    <th class="text-left py-4 px-6 font-bold text-gray-700">No HP</th>
                    <th class="text-left py-4 px-6 font-bold text-gray-700">Status</th>
                    <th class="text-center py-4 px-6 font-bold text-gray-700">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($anggota as $index => $item)
                <tr class="border-b border-blue-50 hover:bg-blue-50 transition-colors">
                    <td class="py-4 px-6 text-gray-600">{{ $anggota->firstItem() + $index }}</td>
                    <td class="py-4 px-6">
                        <div class="font-semibold text-gray-800">{{ $item->nama }}</div>
                        <div class="text-xs text-gray-500">{{ $item->email ?? '-' }}</div>
                    </td>
                    <td class="py-4 px-6 text-sm text-gray-600">{{ $item->nik }}</td>
                    <td class="py-4 px-6">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-700">
                            {{ $item->jenis_kelamin == 'L' ? '👨 Laki-laki' : '👩 Perempuan' }}
                        </span>
                    </td>
                    <td class="py-4 px-6 text-sm text-gray-600">{{ $item->no_hp }}</td>
                    <td class="py-4 px-6">
                        <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $item->status == 'aktif' ? 'bg-blue-100 text-blue-700' : 'bg-gray-100 text-gray-600' }}">
                            {{ ucfirst($item->status) }}
                        </span>
                    </td>
                    <td class="py-4 px-6">
                        <div class="flex justify-center space-x-2">
                            <a href="{{ route('admin.anggota.edit', $item->id) }}" class="bg-blue-50 text-blue-600 px-4 py-2 rounded-lg hover:bg-blue-100 transition font-semibold text-sm">
                                Edit
                            </a>
                            <form method="POST" action="{{ route('admin.anggota.destroy', $item->id) }}" onsubmit="return confirm('Yakin ingin menghapus anggota ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-blue-50 text-blue-600 px-4 py-2 rounded-lg hover:bg-blue-100 transition font-semibold text-sm border border-blue-200">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center py-16">
                        <div class="flex flex-col items-center">
                            <svg class="w-20 h-20 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                            <p class="text-gray-500 font-semibold text-lg">Belum ada data anggota</p>
                            <p class="text-gray-400 text-sm mt-1">Klik tombol "Tambah Anggota" untuk menambahkan data</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    <div class="px-6 py-4 border-t border-blue-100 bg-blue-50">
        {{ $anggota->links() }}
    </div>
</div>
@endsection
