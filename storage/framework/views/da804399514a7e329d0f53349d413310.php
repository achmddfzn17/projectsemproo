<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Admin'); ?> - Karang Taruna</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.8/iconify-icon.min.js"></script>
    <style>
        html { scroll-behavior: smooth; }
        ::-webkit-scrollbar { width: 10px; }
        ::-webkit-scrollbar-track { background: #eff6ff; }
        ::-webkit-scrollbar-thumb { background: #3b82f6; border-radius: 5px; }
        ::-webkit-scrollbar-thumb:hover { background: #2563eb; }
        
        /* Mobile Menu Animation */
        .sidebar-transition {
            transition: transform 0.3s ease-in-out;
        }
        
        /* Overlay backdrop */
        .sidebar-overlay {
            background: rgba(0, 0, 0, 0.5);
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s ease;
        }
        .sidebar-overlay.active {
            opacity: 1;
            pointer-events: auto;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-blue-50 to-gray-100 lg:flex lg:flex-row lg:min-h-screen overflow-x-hidden">
    <!-- Mobile Overlay -->
    <div id="sidebar-overlay" class="sidebar-overlay fixed inset-0 z-40 lg:hidden" onclick="toggleSidebar()"></div>
    
    <!-- Sidebar -->
    <aside id="sidebar" class="fixed lg:static inset-y-0 left-0 z-50 w-64 bg-white border-r border-blue-100 shadow-lg sidebar-transition -translate-x-full lg:translate-x-0 overflow-y-auto">
        <div class="p-6">
            <!-- Logo -->
            <div class="flex items-center justify-between mb-8 pb-6 border-b border-blue-100">
                <div class="flex items-center space-x-3">
                    <div class="w-12 h-12 rounded-xl overflow-hidden shadow-lg">
                        <img src="<?php echo e(asset('images/logokatar.png')); ?>" 
                             alt="Logo Karang Taruna" 
                             class="w-full h-full object-contain">
                    </div>
                    <div>
                        <span class="font-bold text-lg text-gray-800 block">Admin Panel</span>
                        <span class="text-xs text-gray-500">Karang Taruna</span>
                    </div>
                </div>
                <!-- Mobile Close Button -->
                <button onclick="toggleSidebar()" class="lg:hidden p-2 rounded-lg hover:bg-gray-100 text-gray-500">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <!-- Navigation -->
            <nav class="space-y-1">
                <a href="<?php echo e(route('admin.dashboard')); ?>" class="flex items-center px-4 py-3 rounded-xl transition-all <?php echo e(request()->routeIs('admin.dashboard') ? 'bg-blue-600 text-white shadow-lg' : 'text-gray-700 hover:bg-blue-50'); ?>">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    <span class="font-semibold">Dashboard</span>
                </a>
                
                <a href="<?php echo e(route('admin.anggota.index')); ?>" class="flex items-center px-4 py-3 rounded-xl transition-all <?php echo e(request()->routeIs('admin.anggota.*') ? 'bg-blue-600 text-white shadow-lg' : 'text-gray-700 hover:bg-blue-50'); ?>">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                    <span class="font-semibold">Data Anggota</span>
                </a>
                
                <a href="<?php echo e(route('admin.kegiatan.index')); ?>" class="flex items-center px-4 py-3 rounded-xl transition-all <?php echo e(request()->routeIs('admin.kegiatan.*') ? 'bg-blue-600 text-white shadow-lg' : 'text-gray-700 hover:bg-blue-50'); ?>">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    <span class="font-semibold">Data Kegiatan</span>
                </a>
                
                <a href="<?php echo e(route('admin.program.index')); ?>" class="flex items-center px-4 py-3 rounded-xl transition-all <?php echo e(request()->routeIs('admin.program.*') ? 'bg-blue-600 text-white shadow-lg' : 'text-gray-700 hover:bg-blue-50'); ?>">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                    </svg>
                    <span class="font-semibold">Data Program</span>
                </a>
                
                <a href="<?php echo e(route('admin.berita.index')); ?>" class="flex items-center px-4 py-3 rounded-xl transition-all <?php echo e(request()->routeIs('admin.berita.*') ? 'bg-blue-600 text-white shadow-lg' : 'text-gray-700 hover:bg-blue-50'); ?>">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                    </svg>
                    <span class="font-semibold">Data Berita</span>
                </a>
                
                <a href="<?php echo e(route('admin.artikel.index')); ?>" class="flex items-center px-4 py-3 rounded-xl transition-all <?php echo e(request()->routeIs('admin.artikel.*') ? 'bg-blue-600 text-white shadow-lg' : 'text-gray-700 hover:bg-blue-50'); ?>">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    <span class="font-semibold">Data Artikel</span>
                </a>
                
                <a href="<?php echo e(route('admin.keuangan.index')); ?>" class="flex items-center px-4 py-3 rounded-xl transition-all <?php echo e(request()->routeIs('admin.keuangan.*') ? 'bg-blue-600 text-white shadow-lg' : 'text-gray-700 hover:bg-blue-50'); ?>">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span class="font-semibold">Keuangan</span>
                </a>

                <a href="<?php echo e(route('admin.galeri.index')); ?>" class="flex items-center px-4 py-3 rounded-xl transition-all <?php echo e(request()->routeIs('admin.galeri.*') ? 'bg-blue-600 text-white shadow-lg' : 'text-gray-700 hover:bg-blue-50'); ?>">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    <span class="font-semibold">Galeri</span>
                </a>
                
                <!-- System Usability Scale -->
                <a href="<?php echo e(route('admin.sus.daftar')); ?>" class="flex items-center px-4 py-3 rounded-xl transition-all <?php echo e(request()->routeIs('admin.sus.*') ? 'bg-green-600 text-white shadow-lg' : 'text-gray-700 hover:bg-green-50'); ?>">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                    <span class="font-semibold">Kuisioner SUS</span>
                </a>
                
                <div class="my-4 border-t border-blue-100"></div>
                
                <a href="<?php echo e(route('admin.users.index')); ?>" class="flex items-center px-4 py-3 rounded-xl transition-all <?php echo e(request()->routeIs('admin.users.*') ? 'bg-purple-600 text-white shadow-lg' : 'text-gray-700 hover:bg-purple-50'); ?>">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                    <span class="font-semibold">Kelola Admin</span>
                </a>
                
                <a href="<?php echo e(route('home')); ?>" target="_blank" class="flex items-center px-4 py-3 rounded-xl text-gray-700 hover:bg-blue-50 transition-all">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                    </svg>
                    <span class="font-semibold">Lihat Website</span>
                </a>
                <form method="POST" action="<?php echo e(route('logout')); ?>">
                    <?php echo csrf_field(); ?>
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
    <div class="flex-1 flex flex-col min-h-screen lg:ml-0">
        <!-- Top Bar -->
        <header class="bg-white border-b border-blue-100 shadow-sm sticky top-0 z-30">
            <div class="px-4 md:px-8 py-4 md:py-5 flex justify-between items-center">
                <!-- Mobile Menu Button -->
                <button onclick="toggleSidebar()" class="lg:hidden p-2 -ml-2 rounded-lg hover:bg-gray-100 text-gray-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
                
                <!-- Page Title -->
                <div>
                    <h2 class="text-xl md:text-2xl font-bold text-gray-800"><?php echo $__env->yieldContent('title'); ?></h2>
                    <p class="text-sm text-gray-500 mt-1 hidden sm:block">Kelola data Karang Taruna</p>
                </div>
                
                <!-- Desktop User Info -->
                <div class="hidden lg:flex items-center space-x-4">
                    <div class="text-right">
                        <div class="text-sm font-semibold text-gray-800"><?php echo e(auth()->user()->name); ?></div>
                        <div class="text-xs text-gray-500">Administrator</div>
                    </div>
                    <div class="w-10 h-10 bg-blue-600 rounded-xl flex items-center justify-center">
                        <span class="text-white font-bold"><?php echo e(substr(auth()->user()->name, 0, 1)); ?></span>
                    </div>
                </div>
            </div>
        </header>

        <!-- Content -->
        <main class="p-4 md:p-8 flex-1">
            <?php if(session('success')): ?>
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-xl mb-4">
                <?php echo e(session('success')); ?>

            </div>
            <?php endif; ?>

            <?php if(session('error')): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-xl mb-4">
                <?php echo e(session('error')); ?>

            </div>
            <?php endif; ?>

            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>
    
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebar-overlay');
            
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('active');
            
            document.body.classList.toggle('overflow-hidden');
        }
        
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                const sidebar = document.getElementById('sidebar');
                if (!sidebar.classList.contains('-translate-x-full')) {
                    toggleSidebar();
                }
            }
        });
        
        window.addEventListener('resize', function() {
            if (window.innerWidth >= 1024) {
                const sidebar = document.getElementById('sidebar');
                const overlay = document.getElementById('sidebar-overlay');
                // Alway ensure sidebar hidden state is reset for mobile when scaling up to desktop
                sidebar.classList.add('-translate-x-full');
                overlay.classList.remove('active');
                document.body.classList.remove('overflow-hidden');
            }
        });
    </script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\projectsempro - Copy\resources\views/layouts/admin.blade.php ENDPATH**/ ?>