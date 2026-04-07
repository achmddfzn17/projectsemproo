@extends('layouts.admin')

@section('title', 'Data Kegiatan')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div>
        <h1 class="text-2xl font-bold text-gray-800">Data Kegiatan</h1>
        <p class="text-sm text-gray-600 mt-1">Kelola semua kegiatan Karang Taruna</p>
    </div>
    <a href="{{ route('admin.kegiatan.create') }}" class="bg-blue-600 text-white px-6 py-3 rounded-xl hover:bg-blue-700 transition-all shadow-lg hover:shadow-xl font-semibold">
        + Tambah Kegiatan
    </a>
</div>

<div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-blue-100">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-blue-50">
                <tr>
                    <th class="text-left py-4 px-6 font-bold text-gray-700">No</th>
                    <th class="text-left py-4 px-6 font-bold text-gray-700">Foto</th>
                    <th class="text-left py-4 px-6 font-bold text-gray-700">Nama Kegiatan</th>
                    <th class="text-left py-4 px-6 font-bold text-gray-700">Jenis</th>
                    <th class="text-left py-4 px-6 font-bold text-gray-700">Tanggal</th>
                    <th class="text-left py-4 px-6 font-bold text-gray-700">Lokasi</th>
                    <th class="text-left py-4 px-6 font-bold text-gray-700">Status</th>
                    <th class="text-left py-4 px-6 font-bold text-gray-700">Aksi</th>
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
                        <div class="flex space-x-3">
                            <a href="{{ route('admin.kegiatan.pendaftaran', $item->id) }}" class="text-purple-600 hover:text-purple-700 font-semibold">Pendaftaran</a>
                            <a href="{{ route('admin.kegiatan.edit', $item->id) }}" class="text-blue-600 hover:text-blue-700 font-semibold">Edit</a>
                            <form method="POST" action="{{ route('admin.kegiatan.destroy', $item->id) }}" onsubmit="return confirm('Yakin ingin menghapus kegiatan ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-700 font-semibold">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center py-12">
                        <div class="flex flex-col items-center">
                            <svg class="w-16 h-16 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <p class="text-gray-500 font-semibold">Belum ada data kegiatan</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    <div class="px-6 py-4 border-t border-blue-100 bg-blue-50">
        {{ $kegiatan->links() }}
    </div>
</div>
@endsection
