@extends('layouts.admin')

@section('title', 'Kas Masuk')

@section('content')
<!-- Header -->
<div class="mb-8 bg-gradient-to-r from-blue-600 to-blue-700 rounded-2xl p-8 text-white shadow-xl">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
        <div>
            <h1 class="text-4xl font-extrabold mb-2">💰 Kas Masuk</h1>
            <p class="text-blue-100 text-lg">Kelola pemasukan keuangan Karang Taruna</p>
        </div>
        <div class="flex gap-2">
            <a href="{{ route('admin.keuangan.index') }}" class="bg-white/20 hover:bg-white/30 backdrop-blur-sm rounded-xl px-4 py-2 text-sm font-semibold transition-all">
                ← Dashboard
            </a>
            <a href="{{ route('admin.keuangan.laporan') }}" class="bg-white/20 hover:bg-white/30 backdrop-blur-sm rounded-xl px-4 py-2 text-sm font-semibold transition-all">
                📊 Laporan
            </a>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Form Tambah -->
    <div class="lg:col-span-1">
        <div class="bg-white rounded-2xl shadow-lg border border-blue-200 p-6 sticky top-6">
            <h2 class="text-xl font-bold text-gray-800 mb-6">➕ Tambah Kas Masuk</h2>
            
            <form action="{{ route('admin.keuangan.store-masuk') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Tanggal Transaksi</label>
                        <input type="date" name="tanggal" value="{{ old('tanggal', now()->format('Y-m-d')) }}" 
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('tanggal') border-red-500 @enderror">
                        @error('tanggal')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Kategori</label>
                        <select name="kategori_id" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('kategori_id') border-red-500 @enderror">
                            <option value="">-- Pilih Kategori --</option>
                            @foreach($kategoris as $kategori)
                            <option value="{{ $kategori->id }}" {{ old('kategori_id') == $kategori->id ? 'selected' : '' }}>
                                {{ $kategori->nama_kategori }}
                            </option>
                            @endforeach
                        </select>
                        @error('kategori_id')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Keterangan</label>
                        <textarea name="keterangan" rows="3" 
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('keterangan') border-red-500 @enderror"
                            placeholder="Contoh: Iuran bulanan anggota">{{ old('keterangan') }}</textarea>
                        @error('keterangan')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Jumlah (Rp)</label>
                        <input type="number" name="jumlah" value="{{ old('jumlah') }}" min="1"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('jumlah') border-red-500 @enderror"
                            placeholder="Contoh: 50000">
                        @error('jumlah')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Sumber Dana</label>
                        <input type="text" name="sumber_dana" value="{{ old('sumber_dana') }}"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            placeholder="Contoh: Iuran Anggota, Donasi, dll">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Bukti Transaksi (Opsional)</label>
                        <input type="file" name="bukti_transaksi" accept="image/*"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('bukti_transaksi') border-red-500 @enderror">
                        @error('bukti_transaksi')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                        <p class="text-gray-500 text-xs mt-1">Format: JPG, PNG, Maks 2MB</p>
                    </div>
                </div>

                <button type="submit" class="w-full mt-6 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white font-bold py-3 px-6 rounded-xl transition-all transform hover:-translate-y-1 shadow-lg">
                    💾 Simpan Transaksi
                </button>
            </form>

            <!-- Quick Add Kategori -->
            <div class="mt-6 pt-6 border-t border-gray-200">
                <h3 class="text-sm font-semibold text-gray-700 mb-3">⚡ Quick Add Kategori</h3>
                <form action="{{ route('admin.keuangan.kategori.store') }}" method="POST" class="flex gap-2">
                    @csrf
                    <input type="hidden" name="jenis" value="masuk">
                    <input type="text" name="nama_kategori" placeholder="Nama kategori"
                        class="flex-1 px-3 py-2 text-sm rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-500">
                    <button type="submit" class="bg-blue-100 text-blue-700 px-3 py-2 rounded-lg text-sm font-semibold hover:bg-blue-200">
                        +
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Tabel Kas Masuk -->
    <div class="lg:col-span-2">
        <div class="bg-white rounded-2xl shadow-lg border border-blue-200">
            <div class="p-6 border-b border-blue-200">
                <div class="flex items-center justify-between">
                    <h2 class="text-xl font-bold text-gray-800">📋 Daftar Kas Masuk</h2>
                    <a href="{{ route('admin.keuangan.export-pdf', ['jenis' => 'masuk']) }}" class="bg-blue-100 text-blue-700 px-4 py-2 rounded-lg text-sm font-semibold hover:bg-blue-200 transition-all">
                        📥 Export PDF
                    </a>
                </div>
            </div>
            
            <div class="p-6">
                @if(session('success'))
                <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded-xl mb-6">
                    {{ session('success') }}
                </div>
                @endif

                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b border-blue-200">
                                <th class="text-left py-3 px-4 text-sm font-semibold text-gray-700">Tanggal</th>
                                <th class="text-left py-3 px-4 text-sm font-semibold text-gray-700">Kategori</th>
                                <th class="text-left py-3 px-4 text-sm font-semibold text-gray-700">Keterangan</th>
                                <th class="text-left py-3 px-4 text-sm font-semibold text-gray-700">Sumber</th>
                                <th class="text-right py-3 px-4 text-sm font-semibold text-gray-700">Jumlah</th>
                                <th class="text-center py-3 px-4 text-sm font-semibold text-gray-700">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($transaksi as $item)
                            <tr class="border-b border-blue-50 hover:bg-blue-50 transition-colors">
                                <td class="py-4 px-4 text-sm text-gray-600">
                                    {{ $item->tanggal->format('d/m/Y') }}
                                </td>
                                <td class="py-4 px-4">
                                    <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs font-semibold">
                                        {{ $item->kategori->nama_kategori ?? 'Tanpa Kategori' }}
                                    </span>
                                </td>
                                <td class="py-4 px-4 text-sm text-gray-800">
                                    {{ Str::limit($item->keterangan, 40) }}
                                </td>
                                <td class="py-4 px-4 text-sm text-gray-600">
                                    {{ $item->sumber_dana ?? '-' }}
                                </td>
                                <td class="py-4 px-4 text-right">
                                    <span class="font-bold text-blue-600">
                                        Rp {{ number_format($item->jumlah, 0, ',', '.') }}
                                    </span>
                                </td>
                                <td class="py-4 px-4 text-center">
                                    <div class="flex items-center justify-center gap-2">
                                        @if($item->bukti_transaksi)
                                        <a href="{{ asset('storage/' . $item->bukti_transaksi) }}" target="_blank"
                                            class="text-blue-600 hover:text-blue-800" title="Lihat Bukti">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                            </svg>
                                        </a>
                                        @endif
                                        <form action="{{ route('admin.keuangan.destroy', $item->id) }}" method="POST" 
                                            onsubmit="return confirm('Yakin hapus transaksi ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-800" title="Hapus">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center py-12">
                                    <div class="flex flex-col items-center text-gray-500">
                                        <svg class="w-16 h-16 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                        </svg>
                                        <p class="font-semibold">Belum ada data kas masuk</p>
                                        <p class="text-sm">Tambahkan transaksi pertama Anda</p>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    {{ $transaksi->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
