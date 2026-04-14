@extends('layouts.admin')

@section('title', 'Data Program')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div>
        <h1 class="text-2xl font-bold text-gray-800">Data Program</h1>
        <p class="text-sm text-gray-600 mt-1">Kelola program Karang Taruna</p>
    </div>
    <a href="{{ route('admin.program.create') }}" class="bg-blue-600 text-white px-6 py-3 rounded-xl hover:bg-blue-700 transition-all shadow-lg hover:shadow-xl font-semibold">
        + Tambah Program
    </a>
</div>

<div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-blue-100">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-blue-50">
                <tr>
                    <th class="text-left py-4 px-6 font-bold text-gray-700">No</th>
                    <th class="text-left py-4 px-6 font-bold text-gray-700">Nama Program</th>
                    <th class="text-left py-4 px-6 font-bold text-gray-700">Target Peserta</th>
                    <th class="text-left py-4 px-6 font-bold text-gray-700">Durasi</th>
                    <th class="text-left py-4 px-6 font-bold text-gray-700">Status</th>
                    <th class="text-left py-4 px-6 font-bold text-gray-700">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($program as $index => $item)
                <tr class="border-b border-blue-50 hover:bg-blue-50 transition-colors">
                    <td class="py-4 px-6">{{ $program->firstItem() + $index }}</td>
                    <td class="py-4 px-6">
                        <div class="font-semibold text-gray-800">{{ $item->nama_program }}</div>
                        <div class="text-sm text-gray-500">{{ Str::limit($item->deskripsi, 50) }}</div>
                    </td>
                    <td class="py-4 px-6 text-sm text-gray-600">{{ $item->target_peserta }}</td>
                    <td class="py-4 px-6 text-sm text-gray-600">{{ $item->durasi }}</td>
                    <td class="py-4 px-6">
                        <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $item->status == 'aktif' ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-700' }}">
                            {{ ucfirst($item->status) }}
                        </span>
                    </td>
                    <td class="py-4 px-6">
                        <div class="flex space-x-3">
                            <a href="{{ route('admin.program.edit', $item->id) }}" class="text-blue-600 hover:text-blue-700 font-semibold">Edit</a>
                            <form id="delete-form-{{ $item->id }}" method="POST" action="{{ route('admin.program.destroy', $item->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="button" onclick="if(confirm('Yakin ingin menghapus program ini?')) document.getElementById('delete-form-{{ $item->id }}').submit();" class="text-red-600 hover:text-red-700 font-semibold">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-12">
                        <div class="flex flex-col items-center">
                            <svg class="w-16 h-16 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                            </svg>
                            <p class="text-gray-500 font-semibold">Belum ada data program</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    <div class="px-6 py-4 border-t border-blue-100 bg-blue-50">
        {{ $program->links() }}
    </div>
</div>
@endsection
