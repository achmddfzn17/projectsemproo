<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') - Anggota Karang Taruna</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-blue-50 to-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-white border-r border-blue-100 shadow-lg">
            <div class="p-6">
                <!-- Logo -->
                <div class="flex items-center space-x-3 mb-8 pb-6 border-b border-blue-100">
                    <div class="w-12 h-12 rounded-xl overflow-hidden shadow-lg">
                        <img src="{{ asset('images/logokatar.png') }}" alt="Logo" class="w-full h-full object-contain">
                    </div>
                    <div>
                        <span class="font-bold text-lg text-gray-800 block">Dashboard</span>
                        <span class="text-xs text-gray-500">Anggota</span>
                    </div>
                </div>

                <!-- Navigation -->
                <nav class="space-y-1">
                    <a href="{{ route('anggota.dashboard') }}" 
                       class="flex items-center px-4 py-3 rounded-xl transition-all {{ request()->routeIs('anggota.dashboard') ? 'bg-blue-600 text-white shadow-lg' : 'text-gray-700 hover:bg-blue-50' }}">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                        <span class="font-semibold">Dashboard</span>
                    </a>

                    <a href="{{ route('anggota.profile') }}" 
                       class="flex items-center px-4 py-3 rounded-xl transition-all {{ request()->routeIs('anggota.profile') ? 'bg-blue-600 text-white shadow-lg' : 'text-gray-700 hover:bg-blue-50' }}">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        <span class="font-semibold">Profile Saya</span>
                    </a>

                    <a href="{{ route('anggota.riwayat') }}" 
                       class="flex items-center px-4 py-3 rounded-xl transition-all {{ request()->routeIs('anggota.riwayat') ? 'bg-blue-600 text-white shadow-lg' : 'text-gray-700 hover:bg-blue-50' }}">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span class="font-semibold">Riwayat Kegiatan</span>
                    </a>

                    <div class="my-4 border-t border-blue-100"></div>

                    <a href="{{ route('home') }}" target="_blank"
                       class="flex items-center px-4 py-3 rounded-xl text-gray-700 hover:bg-blue-50 transition-all">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                        </svg>
                        <span class="font-semibold">Lihat Website</span>
                    </a>

                    <form method="POST" action="{{ route('anggota.logout') }}">
                        @csrf
                        <button type="submit" class="w-full flex items-center px-4 py-3 rounded-xl text-red-600 hover:bg-red-50 transition-all font-semibold">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                            </svg>
                            Logout
                        </button>
                    </form>
                </nav>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 overflow-y-auto">
            <!-- Top Bar -->
            <header class="bg-white border-b border-blue-100 shadow-sm sticky top-0 z-10">
                <div class="px-8 py-5 flex justify-between items-center">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800">@yield('title')</h2>
                        <p class="text-sm text-gray-500 mt-1">Selamat datang, {{ auth()->guard('anggota')->user()->nama }}</p>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="text-right">
                            <div class="text-sm font-semibold text-gray-800">{{ auth()->guard('anggota')->user()->nama }}</div>
                            <div class="text-xs text-gray-500">Anggota Aktif</div>
                        </div>
                        @if(auth()->guard('anggota')->user()->foto_profil)
                        <img src="{{ asset('storage/' . auth()->guard('anggota')->user()->foto_profil) }}" 
                             class="w-10 h-10 rounded-xl object-cover">
                        @else
                        <div class="w-10 h-10 bg-blue-600 rounded-xl flex items-center justify-center">
                            <span class="text-white font-bold">{{ substr(auth()->guard('anggota')->user()->nama, 0, 1) }}</span>
                        </div>
                        @endif
                    </div>
                </div>
            </header>

            <!-- Content -->
            <main class="p-8">
                @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
                @endif

                @if(session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    {{ session('error') }}
                </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
