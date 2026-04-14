<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Dashboard'); ?> - Anggota Karang Taruna</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.8/iconify-icon.min.js"></script>
    <style>
        /* Custom Scrollbar */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #eff6ff; }
        ::-webkit-scrollbar-thumb { background: #3b82f6; border-radius: 4px; }
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
                        <img src="<?php echo e(asset('images/logokatar.png')); ?>" alt="Logo" class="w-full h-full object-contain">
                    </div>
                    <div>
                        <span class="font-bold text-lg text-gray-800 block">Dashboard</span>
                        <span class="text-xs text-gray-500">Anggota</span>
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
                <a href="<?php echo e(route('anggota.dashboard')); ?>" 
                   class="flex items-center px-4 py-3 rounded-xl transition-all <?php echo e(request()->routeIs('anggota.dashboard') ? 'bg-blue-600 text-white shadow-lg' : 'text-gray-700 hover:bg-blue-50'); ?>">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    <span class="font-semibold">Dashboard</span>
                </a>

                <a href="<?php echo e(route('anggota.profile')); ?>" 
                   class="flex items-center px-4 py-3 rounded-xl transition-all <?php echo e(request()->routeIs('anggota.profile') ? 'bg-blue-600 text-white shadow-lg' : 'text-gray-700 hover:bg-blue-50'); ?>">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    <span class="font-semibold">Profile Saya</span>
                </a>

                <a href="<?php echo e(route('anggota.riwayat')); ?>" 
                   class="flex items-center px-4 py-3 rounded-xl transition-all <?php echo e(request()->routeIs('anggota.riwayat') ? 'bg-blue-600 text-white shadow-lg' : 'text-gray-700 hover:bg-blue-50'); ?>">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span class="font-semibold">Riwayat Kegiatan</span>
                </a>

                <div class="my-4 border-t border-blue-100"></div>

                <a href="<?php echo e(route('home')); ?>" target="_blank"
                   class="flex items-center px-4 py-3 rounded-xl text-gray-700 hover:bg-blue-50 transition-all">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                    </svg>
                    <span class="font-semibold">Lihat Website</span>
                </a>

                <form method="POST" action="<?php echo e(route('anggota.logout')); ?>">
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
                
                <!-- Page Title (hidden on mobile) -->
                <div class="hidden lg:block">
                    <h2 class="text-xl md:text-2xl font-bold text-gray-800"><?php echo $__env->yieldContent('title'); ?></h2>
                    <p class="text-sm text-gray-500 mt-1">Selamat datang, <?php echo e(auth()->guard('anggota')->user()->nama); ?></p>
                </div>
                
                <!-- Mobile Title -->
                <div class="lg:hidden">
                    <h2 class="text-lg font-bold text-gray-800"><?php echo $__env->yieldContent('title'); ?></h2>
                </div>
                
                <!-- Empty space for mobile -->
                <div class="lg:hidden w-10"></div>
                
                <!-- Desktop User Info -->
                <div class="hidden lg:flex items-center space-x-4">
                    <div class="text-right">
                        <div class="text-sm font-semibold text-gray-800"><?php echo e(auth()->guard('anggota')->user()->nama); ?></div>
                        <div class="text-xs text-gray-500">Anggota Aktif</div>
                    </div>
                    <?php if(auth()->guard('anggota')->user()->foto_profil): ?>
                    <img src="<?php echo e(asset(auth()->guard('anggota')->user()->foto_profil)); ?>" 
                         class="w-10 h-10 rounded-xl object-cover">
                    <?php else: ?>
                    <div class="w-10 h-10 bg-blue-600 rounded-xl flex items-center justify-center">
                        <span class="text-white font-bold"><?php echo e(substr(auth()->guard('anggota')->user()->nama, 0, 1)); ?></span>
                    </div>
                    <?php endif; ?>
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
            
            // Prevent body scroll when sidebar is open
            document.body.classList.toggle('overflow-hidden');
        }
        
        // Close sidebar on escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                const sidebar = document.getElementById('sidebar');
                if (!sidebar.classList.contains('-translate-x-full')) {
                    toggleSidebar();
                }
            }
        });
        
        // Close sidebar on window resize to desktop size
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
<?php /**PATH C:\xampp\htdocs\projectsempro\resources\views/layouts/anggota.blade.php ENDPATH**/ ?>