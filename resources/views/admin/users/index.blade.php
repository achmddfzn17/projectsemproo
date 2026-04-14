@extends('layouts.admin')

@section('title', 'Kelola Admin')

@section('content')
<!-- Header -->
<div class="mb-8 bg-gradient-to-r from-purple-600 to-purple-700 rounded-2xl p-8 text-white shadow-xl">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
        <div>
            <h1 class="text-3xl font-extrabold mb-1 flex items-center gap-2"><iconify-icon icon="mdi:account-cog" class="text-2xl"></iconify-icon> Kelola Admin</h1>
            <p class="text-purple-100">Manajemen akun administrator sistem</p>
        </div>
        <a href="{{ route('admin.users.create') }}" class="bg-white text-purple-700 hover:bg-purple-50 rounded-xl px-5 py-2.5 text-sm font-semibold transition-all inline-flex items-center gap-2 shadow-lg">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            Tambah Admin
        </a>
    </div>
</div>

<!-- Stats Mini -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
    <div class="bg-white rounded-xl p-5 shadow-lg border border-purple-100">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 text-sm font-semibold">Total Admin</p>
                <p class="text-3xl font-extrabold mt-1 text-purple-600">{{ $users->total() }}</p>
            </div>
            <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                <iconify-icon icon="mdi:account-multiple" class="text-xl text-purple-600"></iconify-icon>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl p-5 shadow-lg border border-purple-100">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 text-sm font-semibold">Admin Aktif</p>
                <p class="text-3xl font-extrabold mt-1 text-purple-600">{{ $users->count() }}</p>
            </div>
            <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                <iconify-icon icon="mdi:check-circle" class="text-xl text-purple-600"></iconify-icon>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl p-5 shadow-lg border border-purple-100">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 text-sm font-semibold">Anda Login Sebagai</p>
                <p class="text-xl font-extrabold mt-1 text-purple-600 truncate">{{ auth()->user()->name }}</p>
            </div>
            <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                <iconify-icon icon="mdi:account" class="text-xl text-purple-600"></iconify-icon>
            </div>
        </div>
    </div>
</div>

<!-- Table -->
<div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-blue-100">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gradient-to-r from-purple-50 to-purple-100">
                <tr>
                    <th class="text-left py-4 px-6 font-bold text-gray-700">No</th>
                    <th class="text-left py-4 px-6 font-bold text-gray-700">Nama Admin</th>
                    <th class="text-left py-4 px-6 font-bold text-gray-700">Email</th>
                    <th class="text-left py-4 px-6 font-bold text-gray-700">Terdaftar</th>
                    <th class="text-center py-4 px-6 font-bold text-gray-700">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $index => $user)
                <tr class="border-b border-blue-50 hover:bg-blue-50 transition-colors">
                    <td class="py-4 px-6 text-gray-600">{{ $users->firstItem() + $index }}</td>
                    <td class="py-4 px-6">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-blue-600 rounded-full flex items-center justify-center text-white font-bold mr-3">
                                {{ substr($user->name, 0, 1) }}
                            </div>
                            <div>
                                <div class="font-semibold text-gray-800">{{ $user->name }}</div>
                                @if($user->id === auth()->id())
                                <span class="text-xs bg-blue-100 text-blue-700 px-2 py-1 rounded-full font-semibold">Anda</span>
                                @endif
                            </div>
                        </div>
                    </td>
                    <td class="py-4 px-6 text-sm text-gray-600">{{ $user->email }}</td>
                    <td class="py-4 px-6 text-sm text-gray-600">{{ $user->created_at->format('d M Y') }}</td>
                    <td class="py-4 px-6">
                        <div class="flex justify-center space-x-2">
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="bg-blue-50 text-blue-600 px-4 py-2 rounded-xl hover:bg-blue-100 transition font-semibold text-sm inline-flex items-center gap-1">
                                <iconify-icon icon="mdi:pencil" class="text-sm"></iconify-icon> Edit
                            </a>
                            @if($user->id !== auth()->user()->id)
                            <form method="POST" action="{{ route('admin.users.destroy', $user->id) }}" onsubmit="return confirm('Yakin ingin menghapus admin ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-50 text-red-600 px-4 py-2 rounded-xl hover:bg-red-100 transition font-semibold text-sm border border-red-200 inline-flex items-center gap-1">
                                    <iconify-icon icon="mdi:trash-can" class="text-sm"></iconify-icon> Hapus
                                </button>
                            </form>
                            @else
                            <button disabled class="bg-gray-100 text-gray-400 px-4 py-2 rounded-xl cursor-not-allowed font-semibold text-sm inline-flex items-center gap-1">
                                <iconify-icon icon="mdi:trash-can" class="text-sm"></iconify-icon> Hapus
                            </button>
                            @endif
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center py-16">
                        <div class="flex flex-col items-center">
                            <iconify-icon icon="mdi:account-off" class="text-6xl text-gray-300 mb-4"></iconify-icon>
                            <p class="text-gray-500 font-semibold text-lg">Belum ada admin</p>
                            <p class="text-gray-400 text-sm mt-1">Klik tombol "Tambah Admin" untuk menambahkan data</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    <div class="px-6 py-4 border-t border-blue-100 bg-blue-50">
        {{ $users->links() }}
    </div>
</div>
@endsection
