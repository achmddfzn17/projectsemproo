<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Anggota - Karang Taruna</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');

        * {
            font-family: 'Inter', sans-serif;
        }

        .input-field {
            width: 100%;
            padding: 12px 16px 12px 44px;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            font-size: 14px;
            color: #1e293b;
            background: #fff;
            outline: none;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }

        .input-field:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        .input-field::placeholder {
            color: #94a3b8;
        }

        .btn-login {
            width: 100%;
            background: #2563eb;
            color: #fff;
            padding: 13px 24px;
            border-radius: 12px;
            font-weight: 700;
            font-size: 15px;
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: background 0.2s ease, transform 0.15s ease, box-shadow 0.2s ease;
            box-shadow: 0 4px 14px rgba(37, 99, 235, 0.35);
        }

        .btn-login:hover {
            background: #1d4ed8;
            transform: translateY(-1px);
            box-shadow: 0 6px 20px rgba(37, 99, 235, 0.45);
        }

        .btn-login:active {
            transform: translateY(0);
        }

        .anggota-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: #eff6ff;
            color: #2563eb;
            border: 1px solid #bfdbfe;
            border-radius: 999px;
            padding: 4px 12px;
            font-size: 12px;
            font-weight: 600;
        }

        .custom-checkbox {
            accent-color: #2563eb;
            width: 16px;
            height: 16px;
            cursor: pointer;
        }

        .back-link {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            width: 100%;
            padding: 12px;
            border-radius: 12px;
            border: 2px solid #e2e8f0;
            color: #64748b;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            transition: border-color 0.2s ease, color 0.2s ease, background 0.2s ease;
        }

        .back-link:hover {
            border-color: #2563eb;
            color: #2563eb;
            background: #eff6ff;
        }
    </style>
</head>

<body class="bg-gradient-to-br from-blue-50 to-white min-h-screen">
    <div class="min-h-screen flex items-center justify-center px-4 py-12">
        <div class="max-w-md w-full">

            <!-- Logo & Heading -->
            <div class="text-center mb-8">
                <div class="inline-block w-20 h-20 mb-4">
                    <img src="<?php echo e(asset('images/logokatar.png')); ?>" alt="Logo Karang Taruna"
                        class="w-full h-full object-contain">
                </div>
                <span class="anggota-badge mb-3">
                    <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    Portal Anggota
                </span>
                <h1 class="text-3xl font-black text-gray-800 mt-2">Login Anggota</h1>
                <p class="text-gray-500 mt-1 text-sm">Karang Taruna Generasi Emas</p>
            </div>

            <!-- Alerts -->
            <?php if($errors->any()): ?>
                <div class="bg-red-50 border-2 border-red-400 text-red-700 px-4 py-3 rounded-xl mb-6">
                    <div class="flex items-start gap-2">
                        <svg class="w-5 h-5 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <p class="text-sm"><?php echo e($error); ?></p>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(session('success')): ?>
                <div class="bg-green-50 border-2 border-green-500 text-green-700 px-4 py-3 rounded-xl mb-6">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>

            <!-- Form Card -->
            <div class="bg-white rounded-2xl shadow-xl p-8 border border-blue-100">
                <form method="POST" action="<?php echo e(route('anggota.login.submit')); ?>">
                    <?php echo csrf_field(); ?>

                    <!-- Login Output -->
                    <div class="mb-6">
                        <label for="login" class="block text-sm font-semibold text-gray-700 mb-2">Email /
                            Username</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <input type="text" id="login" name="login" value="<?php echo e(old('login')); ?>" required autofocus
                                class="input-field" placeholder="Masukkan Email atau Username">
                        </div>
                        <?php $__errorArgs = ['login'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <!-- Password -->
                    <div class="mb-6">
                        <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">Password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </div>
                            <input type="password" id="password" name="password" required class="input-field"
                                placeholder="••••••••">
                        </div>
                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <!-- Remember Me -->
                    <div class="mb-6">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" name="remember" class="custom-checkbox">
                            <span class="text-sm text-gray-600 font-medium">Ingat Sesi Saya</span>
                        </label>
                    </div>

                    <!-- Submit -->
                    <button type="submit" class="btn-login">
                        Masuk Sekarang
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </button>
                </form>

                <!-- Back to Home -->
                <div class="mt-5">
                    <a href="<?php echo e(route('home')); ?>" class="back-link">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                        Kembali ke Beranda
                    </a>
                </div>

                <!-- Info -->
                <div class="mt-6 text-center">
                    <p class="text-gray-500 text-xs">
                        Belum punya akun? Hubungi pengurus untuk pendaftaran.
                    </p>
                </div>
            </div>

            <!-- Footer -->
            <div class="text-center mt-6">
                <p class="text-xs text-gray-400">
                    &copy; <?php echo e(date('Y')); ?> Karang Taruna. All rights reserved.
                </p>
            </div>

        </div>
    </div>
</body>

</html><?php /**PATH C:\xampp\htdocs\projectsempro\resources\views/anggota/login.blade.php ENDPATH**/ ?>