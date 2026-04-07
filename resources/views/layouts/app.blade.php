<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Karang Taruna')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/custom-animations.css') }}">
    <style>
        /* Smooth Scrolling */
        html {
            scroll-behavior: smooth;
        }

        /* Custom Scrollbar - Biru Muda */
        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }

        ::-webkit-scrollbar-thumb {
            background: #3b82f6;
            border-radius: 5px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #2563eb;
        }

        /* Line Clamp */
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* Smooth Transitions */
        * {
            transition: all 0.3s ease;
        }

        /* Offline Notification Styles */
        .offline-notification {
            position: fixed;
            top: 80px;
            right: 20px;
            z-index: 9999;
            max-width: 400px;
            animation: slideInRight 0.5s ease-out;
        }

        @keyframes slideInRight {
            from {
                transform: translateX(100%);
                opacity: 0;
            }

            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @keyframes slideOutRight {
            from {
                transform: translateX(0);
                opacity: 1;
            }

            to {
                transform: translateX(100%);
                opacity: 0;
            }
        }

        .offline-notification.hide {
            animation: slideOutRight 0.5s ease-out forwards;
        }

        /* Connection Status Indicator */
        .connection-status {
            display: inline-flex;
            align-items: center;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .connection-status.online {
            background: #dcfce7;
            color: #166534;
        }

        .connection-status.offline {
            background: #fee2e2;
            color: #991b1b;
        }

        .status-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            margin-right: 6px;
            animation: pulse 2s infinite;
        }

        .status-dot.online {
            background: #22c55e;
        }

        .status-dot.offline {
            background: #ef4444;
        }

        @keyframes pulse {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0.5;
            }
        }
    </style>
</head>

<body class="bg-gray-50">
    <!-- Offline/Online Notification -->
    <div id="offline-notification" class="offline-notification hidden">
        <div class="bg-white rounded-2xl shadow-2xl border-l-4 border-red-500 p-5">
            <div class="flex items-start">
                <div class="flex-shrink-0">
                    <svg class="w-8 h-8 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M18.364 5.636a9 9 0 010 12.728m0 0l-2.829-2.829m2.829 2.829L21 21M15.536 8.464a5 5 0 010 7.072m0 0l-2.829-2.829m-4.243 2.829a4.978 4.978 0 01-1.414-2.83m-1.414 5.658a9 9 0 01-2.167-9.238m7.824 2.167a1 1 0 111.414 1.414m-1.414-1.414L3 3m8.293 8.293l1.414 1.414">
                        </path>
                    </svg>
                </div>
                <div class="ml-4 flex-1">
                    <h3 class="text-lg font-bold text-gray-900">Anda Sedang Offline</h3>
                    <p class="mt-1 text-sm text-gray-600">Sepertinya koneksi internet Anda terputus. Beberapa fitur
                        mungkin tidak tersedia saat ini.</p>
                    <button onclick="location.reload()"
                        class="mt-3 bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg text-sm font-semibold transition-all transform hover:scale-105">
                        🔄 Coba Lagi
                    </button>
                </div>
                <button onclick="closeOfflineNotification()" class="ml-4 text-gray-400 hover:text-gray-600">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div id="online-notification" class="offline-notification hidden">
        <div class="bg-white rounded-2xl shadow-2xl border-l-4 border-green-500 p-5">
            <div class="flex items-start">
                <div class="flex-shrink-0">
                    <svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div class="ml-4 flex-1">
                    <h3 class="text-lg font-bold text-gray-900">Kembali Online</h3>
                    <p class="mt-1 text-sm text-gray-600">Koneksi internet Anda telah pulih. Semua fitur sudah tersedia
                        kembali.</p>
                </div>
                <button onclick="closeOnlineNotification()" class="ml-4 text-gray-400 hover:text-gray-600">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Modern Navbar with Glass Effect -->
    <nav class="bg-white/95 backdrop-blur-md shadow-lg sticky top-0 z-50 border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20">
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center space-x-3 group">
                        <div
                            class="w-12 h-12 rounded-2xl overflow-hidden transform group-hover:scale-110 transition-transform shadow-lg">
                            <img src="{{ asset('images/logokatar.png') }}" alt="Logo Karang Taruna"
                                class="w-full h-full object-contain">
                        </div>
                        <div>
                            <span class="text-gray-800 font-extrabold text-xl block">Karang Taruna</span>
                            <span class="text-xs text-blue-600">Generasi Emas</span>
                        </div>
                    </a>
                </div>

                <div class="hidden md:flex items-center space-x-2">
                    <!-- Connection Status Indicator -->
                    <div id="connection-status" class="connection-status online mr-2">
                        <span class="status-dot online"></span>
                        <span id="status-text">Online</span>
                    </div>

                    <a href="{{ route('home') }}"
                        class="px-4 py-2 text-gray-700 hover:text-blue-600 font-semibold rounded-lg hover:bg-blue-50 transition-all {{ request()->routeIs('home') ? 'bg-blue-50 text-blue-600' : '' }}">
                        🏠 Beranda
                    </a>
                    <a href="{{ route('tentang') }}"
                        class="px-4 py-2 text-gray-700 hover:text-blue-600 font-semibold rounded-lg hover:bg-blue-50 transition-all {{ request()->routeIs('tentang') ? 'bg-blue-50 text-blue-600' : '' }}">
                        ℹ️ Tentang
                    </a>
                    <a href="{{ route('kegiatan.index') }}"
                        class="px-4 py-2 text-gray-700 hover:text-blue-600 font-semibold rounded-lg hover:bg-blue-50 transition-all {{ request()->routeIs('kegiatan.*') ? 'bg-blue-50 text-blue-600' : '' }}">
                        📅 Kegiatan
                    </a>
                    <a href="{{ route('berita.index') }}"
                        class="px-4 py-2 text-gray-700 hover:text-blue-600 font-semibold rounded-lg hover:bg-blue-50 transition-all {{ request()->routeIs('berita.*') ? 'bg-blue-50 text-blue-600' : '' }}">
                        📰 Berita
                    </a>
                    <a href="{{ route('artikel.index') }}"
                        class="px-4 py-2 text-gray-700 hover:text-blue-600 font-semibold rounded-lg hover:bg-blue-50 transition-all {{ request()->routeIs('artikel.*') ? 'bg-blue-50 text-blue-600' : '' }}">
                        📝 Artikel
                    </a>

                    @if(auth()->guard('web')->check())
                        <a href="{{ route('admin.dashboard') }}"
                            class="ml-2 bg-blue-600 text-white px-6 py-2 rounded-xl font-bold hover:bg-blue-700 hover:shadow-lg transform hover:scale-105 transition-all">
                            ⚡ Admin
                        </a>
                    @elseif(auth()->guard('anggota')->check())
                        <a href="{{ route('anggota.dashboard') }}"
                            class="ml-2 bg-green-600 text-white px-6 py-2 rounded-xl font-bold hover:bg-green-700 hover:shadow-lg transform hover:scale-105 transition-all">
                            👤 Dashboard
                        </a>
                    @else
                        <a href="{{ route('anggota.login') }}"
                            class="ml-2 bg-blue-600 text-white px-6 py-2 rounded-xl font-bold hover:bg-blue-700 hover:shadow-lg transform hover:scale-105 transition-all">
                            🔐 Login Anggota
                        </a>
                    @endif
                </div>

                <!-- Mobile Menu Button -->
                <div class="md:hidden flex items-center">
                    <button id="mobile-menu-btn" class="text-gray-700 hover:text-blue-600 p-2">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-gray-200">
            <div class="px-4 py-4 space-y-2">
                <a href="{{ route('home') }}"
                    class="block px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 rounded-lg font-semibold transition">🏠
                    Beranda</a>
                <a href="{{ route('tentang') }}"
                    class="block px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 rounded-lg font-semibold transition">ℹ️
                    Tentang</a>
                <a href="{{ route('kegiatan.index') }}"
                    class="block px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 rounded-lg font-semibold transition">📅
                    Kegiatan</a>
                <a href="{{ route('berita.index') }}"
                    class="block px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 rounded-lg font-semibold transition">📰
                    Berita</a>
                <a href="{{ route('artikel.index') }}"
                    class="block px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 rounded-lg font-semibold transition">📝
                    Artikel</a>
                @if(auth()->guard('web')->check())
                    <a href="{{ route('admin.dashboard') }}"
                        class="block px-4 py-3 bg-blue-600 text-white rounded-lg font-bold text-center hover:bg-blue-700 transition">⚡
                        Dashboard</a>
                @elseif(auth()->guard('anggota')->check())
                    <a href="{{ route('anggota.dashboard') }}"
                        class="block px-4 py-3 bg-blue-600 text-white rounded-lg font-bold text-center hover:bg-blue-700 transition">👤
                        Dashboard Anggota</a>
                @else
                    <a href="{{ route('anggota.login') }}"
                        class="block px-4 py-3 bg-blue-600 text-white rounded-lg font-bold text-center hover:bg-blue-700 transition">🔐
                        Login Anggota</a>
                @endif
            </div>
        </div>
    </nav>

    <script>
        // Mobile menu toggle
        document.getElementById('mobile-menu-btn')?.addEventListener('click', function () {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });

        // Connection Status Management
        let wasOffline = false;

        function updateConnectionStatus() {
            const isOnline = navigator.onLine;
            const statusElement = document.getElementById('connection-status');
            const statusText = document.getElementById('status-text');
            const statusDot = statusElement?.querySelector('.status-dot');
            const offlineNotification = document.getElementById('offline-notification');
            const onlineNotification = document.getElementById('online-notification');

            if (isOnline) {
                // Update status indicator
                statusElement?.classList.remove('offline');
                statusElement?.classList.add('online');
                statusDot?.classList.remove('offline');
                statusDot?.classList.add('online');
                if (statusText) statusText.textContent = 'Online';

                // Show online notification if was offline before
                if (wasOffline) {
                    offlineNotification?.classList.add('hidden');
                    onlineNotification?.classList.remove('hidden');

                    // Auto hide online notification after 5 seconds
                    setTimeout(() => {
                        onlineNotification?.classList.add('hide');
                        setTimeout(() => {
                            onlineNotification?.classList.add('hidden');
                            onlineNotification?.classList.remove('hide');
                        }, 500);
                    }, 5000);
                }
                wasOffline = false;
            } else {
                // Update status indicator
                statusElement?.classList.remove('online');
                statusElement?.classList.add('offline');
                statusDot?.classList.remove('online');
                statusDot?.classList.add('offline');
                if (statusText) statusText.textContent = 'Offline';

                // Show offline notification
                onlineNotification?.classList.add('hidden');
                offlineNotification?.classList.remove('hidden');
                wasOffline = true;
            }
        }

        function closeOfflineNotification() {
            const notification = document.getElementById('offline-notification');
            notification?.classList.add('hide');
            setTimeout(() => {
                notification?.classList.add('hidden');
                notification?.classList.remove('hide');
            }, 500);
        }

        function closeOnlineNotification() {
            const notification = document.getElementById('online-notification');
            notification?.classList.add('hide');
            setTimeout(() => {
                notification?.classList.add('hidden');
                notification?.classList.remove('hide');
            }, 500);
        }

        // Listen for online/offline events
        window.addEventListener('online', updateConnectionStatus);
        window.addEventListener('offline', updateConnectionStatus);

        // Check connection status on page load
        document.addEventListener('DOMContentLoaded', updateConnectionStatus);

        // Periodic connection check (every 30 seconds)
        setInterval(() => {
            // Try to fetch a small resource to verify actual connectivity
            fetch('/favicon.ico', { method: 'HEAD', cache: 'no-cache' })
                .then(() => {
                    if (!navigator.onLine) {
                        // Browser thinks we're offline but we can reach the server
                        window.dispatchEvent(new Event('online'));
                    }
                })
                .catch(() => {
                    if (navigator.onLine) {
                        // Browser thinks we're online but we can't reach the server
                        window.dispatchEvent(new Event('offline'));
                    }
                });
        }, 30000);
    </script>

    <!-- Content -->
    <main>
        @yield('content')
    </main>

    <!-- Modern Footer -->
    <footer class="bg-gray-900 text-white mt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
                <!-- Brand -->
                <div class="md:col-span-2">
                    <div class="flex items-center space-x-3 mb-6">
                        <div class="w-14 h-14 rounded-2xl overflow-hidden shadow-xl bg-white p-1">
                            <img src="{{ asset('images/logokatar.png') }}" alt="Logo Karang Taruna"
                                class="w-full h-full object-contain">
                        </div>
                        <div>
                            <h3 class="text-2xl font-extrabold">Karang Taruna</h3>
                            <p class="text-sm text-blue-300">Generasi Emas Indonesia</p>
                        </div>
                    </div>
                    <p class="text-gray-300 mb-6 leading-relaxed">
                        Organisasi kepemudaan yang bergerak dalam pemberdayaan dan pengembangan potensi pemuda untuk
                        Indonesia yang lebih baik.
                    </p>
                    <!-- Social Media -->
                    <div class="flex space-x-4">
                        <a href="#"
                            class="w-10 h-10 bg-white/10 hover:bg-blue-600 rounded-xl flex items-center justify-center transition-all transform hover:scale-110">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                            </svg>
                        </a>
                        <a href="#"
                            class="w-10 h-10 bg-white/10 hover:bg-blue-500 rounded-xl flex items-center justify-center transition-all transform hover:scale-110">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                            </svg>
                        </a>
                        <a href="#"
                            class="w-10 h-10 bg-white/10 hover:bg-red-500 rounded-xl flex items-center justify-center transition-all transform hover:scale-110">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
                            </svg>
                        </a>
                        <a href="#"
                            class="w-10 h-10 bg-white/10 hover:bg-red-500 rounded-xl flex items-center justify-center transition-all transform hover:scale-110">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h3 class="text-xl font-bold mb-6 text-blue-400">Menu Cepat</h3>
                    <ul class="space-y-3">
                        <li><a href="{{ route('home') }}"
                                class="text-gray-300 hover:text-blue-400 transition flex items-center"><span
                                    class="mr-2">→</span> Beranda</a></li>
                        <li><a href="{{ route('tentang') }}"
                                class="text-gray-300 hover:text-blue-400 transition flex items-center"><span
                                    class="mr-2">→</span> Tentang Kami</a></li>
                        <li><a href="{{ route('kegiatan.index') }}"
                                class="text-gray-300 hover:text-blue-400 transition flex items-center"><span
                                    class="mr-2">→</span> Kegiatan</a></li>
                        <li><a href="{{ route('berita.index') }}"
                                class="text-gray-300 hover:text-blue-400 transition flex items-center"><span
                                    class="mr-2">→</span> Berita</a></li>
                        <li><a href="{{ route('artikel.index') }}"
                                class="text-gray-300 hover:text-blue-400 transition flex items-center"><span
                                    class="mr-2">→</span> Artikel</a></li>
                    </ul>
                </div>

                <!-- Contact -->
                <div>
                    <h3 class="text-xl font-bold mb-6 text-blue-400">Hubungi Kami</h3>
                    <ul class="space-y-4">
                        <li class="flex items-start">
                            <svg class="w-5 h-5 mr-3 text-blue-400 mt-1" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                </path>
                            </svg>
                            <span class="text-gray-300">info@karangtaruna.id</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 mr-3 text-blue-400 mt-1" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                </path>
                            </svg>
                            <span class="text-gray-300">(021) 1234-5678</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 mr-3 text-blue-400 mt-1" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span class="text-gray-300">Jakarta, Indonesia</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Bottom Bar -->
            <div class="border-t border-white/10 pt-8 flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-400 text-sm mb-4 md:mb-0">
                    &copy; {{ date('Y') }} Karang Taruna. Made with ❤️ for Indonesian Youth
                </p>
                <div class="flex space-x-6 text-sm">
                    <a href="#" class="text-gray-400 hover:text-blue-400 transition">Privacy Policy</a>
                    <a href="#" class="text-gray-400 hover:text-blue-400 transition">Terms of Service</a>
                    <a href="#" class="text-gray-400 hover:text-blue-400 transition">Sitemap</a>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>