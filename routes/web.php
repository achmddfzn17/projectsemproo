<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/berita', [HomeController::class, 'berita'])->name('berita.index');
Route::get('/berita/{slug}', [HomeController::class, 'beritaDetail'])->name('berita.detail');
Route::get('/artikel', [HomeController::class, 'artikel'])->name('artikel.index');
Route::get('/artikel/{slug}', [HomeController::class, 'artikelDetail'])->name('artikel.detail');
Route::get('/kegiatan', [HomeController::class, 'kegiatan'])->name('kegiatan.index');
Route::get('/kegiatan/{id}', [HomeController::class, 'kegiatanDetail'])->name('kegiatan.detail');
Route::get('/tentang', [HomeController::class, 'tentang'])->name('tentang');
Route::get('/leaderboard', [\App\Http\Controllers\MemberController::class, 'leaderboard'])->name('leaderboard');

// Admin Login Route
Route::get('/auth', function () {
    return view('auth.login');
})->name('login')->middleware('guest');

Route::post('/auth', function (\Illuminate\Http\Request $request) {
    $request->validate([
        'login' => 'required|string',
        'password' => 'required',
    ]);

    $loginType = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

    $credentials = [
        $loginType => $request->login,
        'password' => $request->password
    ];

    if (\Illuminate\Support\Facades\Auth::attempt($credentials, $request->filled('remember'))) {
        $request->session()->regenerate();
        return redirect()->intended(route('admin.dashboard'));
    }

    return back()->withErrors([
        'login' => 'Email/Username atau password salah.',
    ])->onlyInput('login');
})->middleware('guest');

Route::post('/logout', function (\Illuminate\Http\Request $request) {
    \Illuminate\Support\Facades\Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('home');
})->name('logout');

// Anggota Auth Routes
Route::get('/anggota/login', [\App\Http\Controllers\AnggotaDashboardController::class, 'loginPage'])->name('anggota.login');
Route::post('/anggota/login', [\App\Http\Controllers\AnggotaDashboardController::class, 'login'])->name('anggota.login.submit');

// Anggota Dashboard Routes (Protected)
Route::middleware('anggota.auth')->prefix('anggota')->name('anggota.')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\AnggotaDashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [\App\Http\Controllers\AnggotaDashboardController::class, 'profile'])->name('profile');
    Route::put('/profile', [\App\Http\Controllers\AnggotaDashboardController::class, 'updateProfile'])->name('profile.update');
    Route::put('/password', [\App\Http\Controllers\AnggotaDashboardController::class, 'updatePassword'])->name('password.update');
    Route::get('/riwayat', [\App\Http\Controllers\AnggotaDashboardController::class, 'riwayatKegiatan'])->name('riwayat');
    Route::get('/qr-card', [\App\Http\Controllers\AnggotaDashboardController::class, 'generateQRCard'])->name('qr-card');
    Route::get('/export-profile', [\App\Http\Controllers\AnggotaDashboardController::class, 'exportProfile'])->name('export-profile');
    Route::get('/digital-id', [\App\Http\Controllers\MemberController::class, 'generateCard'])->name('digital-id');
    Route::post('/logout', [\App\Http\Controllers\AnggotaDashboardController::class, 'logout'])->name('logout');
});

// Pendaftaran Kegiatan (Public)
Route::get('/kegiatan/{id}/daftar', [\App\Http\Controllers\PendaftaranKegiatanController::class, 'create'])->name('kegiatan.daftar');
Route::post('/kegiatan/{id}/daftar', [\App\Http\Controllers\PendaftaranKegiatanController::class, 'store'])->name('kegiatan.daftar.store');
Route::get('/pendaftaran/{id}/success', [\App\Http\Controllers\PendaftaranKegiatanController::class, 'success'])->name('pendaftaran.success');

// Admin Routes (Protected)
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    // Anggota
    Route::get('/anggota', [AdminController::class, 'anggotaIndex'])->name('anggota.index');
    Route::get('/anggota/create', [AdminController::class, 'anggotaCreate'])->name('anggota.create');
    Route::post('/anggota', [AdminController::class, 'anggotaStore'])->name('anggota.store');
    Route::get('/anggota/{id}/edit', [AdminController::class, 'anggotaEdit'])->name('anggota.edit');
    Route::put('/anggota/{id}', [AdminController::class, 'anggotaUpdate'])->name('anggota.update');
    Route::delete('/anggota/{id}', [AdminController::class, 'anggotaDestroy'])->name('anggota.destroy');

    // Kegiatan
    Route::get('/kegiatan', [AdminController::class, 'kegiatanIndex'])->name('kegiatan.index');
    Route::get('/kegiatan/create', [AdminController::class, 'kegiatanCreate'])->name('kegiatan.create');
    Route::post('/kegiatan', [AdminController::class, 'kegiatanStore'])->name('kegiatan.store');
    Route::get('/kegiatan/{id}/edit', [AdminController::class, 'kegiatanEdit'])->name('kegiatan.edit');
    Route::put('/kegiatan/{id}', [AdminController::class, 'kegiatanUpdate'])->name('kegiatan.update');
    Route::delete('/kegiatan/{id}', [AdminController::class, 'kegiatanDestroy'])->name('kegiatan.destroy');

    // Pendaftaran Kegiatan Management
    Route::get('/kegiatan/{id}/pendaftaran', [\App\Http\Controllers\PendaftaranKegiatanController::class, 'index'])->name('kegiatan.pendaftaran');
    Route::post('/pendaftaran/{id}/approve', [\App\Http\Controllers\PendaftaranKegiatanController::class, 'approve'])->name('pendaftaran.approve');
    Route::post('/pendaftaran/{id}/reject', [\App\Http\Controllers\PendaftaranKegiatanController::class, 'reject'])->name('pendaftaran.reject');
    Route::post('/pendaftaran/{id}/checkin', [\App\Http\Controllers\PendaftaranKegiatanController::class, 'checkIn'])->name('pendaftaran.checkin');

    // QR Scanner & Absensi
    Route::get('/kegiatan/scan-qr', [\App\Http\Controllers\PendaftaranKegiatanController::class, 'scanQR'])->name('kegiatan.scan');
    Route::post('/kegiatan/process-qr', [\App\Http\Controllers\PendaftaranKegiatanController::class, 'processQR'])->name('kegiatan.process-qr');
    Route::post('/scan-attendance', [\App\Http\Controllers\MemberController::class, 'scanAttendance'])->name('scan-attendance');
    Route::get('/kegiatan/{id}/export-absensi', [\App\Http\Controllers\PendaftaranKegiatanController::class, 'exportAbsensi'])->name('kegiatan.export-absensi');

    // Program
    Route::get('/program', [AdminController::class, 'programIndex'])->name('program.index');
    Route::get('/program/create', [AdminController::class, 'programCreate'])->name('program.create');
    Route::post('/program', [AdminController::class, 'programStore'])->name('program.store');
    Route::get('/program/{id}/edit', [AdminController::class, 'programEdit'])->name('program.edit');
    Route::put('/program/{id}', [AdminController::class, 'programUpdate'])->name('program.update');
    Route::delete('/program/{id}', [AdminController::class, 'programDestroy'])->name('program.destroy');

    // Berita
    Route::get('/berita', [AdminController::class, 'beritaIndex'])->name('berita.index');
    Route::get('/berita/create', [AdminController::class, 'beritaCreate'])->name('berita.create');
    Route::post('/berita', [AdminController::class, 'beritaStore'])->name('berita.store');
    Route::get('/berita/{id}/edit', [AdminController::class, 'beritaEdit'])->name('berita.edit');
    Route::put('/berita/{id}', [AdminController::class, 'beritaUpdate'])->name('berita.update');
    Route::delete('/berita/{id}', [AdminController::class, 'beritaDestroy'])->name('berita.destroy');

    // Artikel
    Route::get('/artikel', [AdminController::class, 'artikelIndex'])->name('artikel.index');
    Route::get('/artikel/create', [AdminController::class, 'artikelCreate'])->name('artikel.create');
    Route::post('/artikel', [AdminController::class, 'artikelStore'])->name('artikel.store');
    Route::get('/artikel/{id}/edit', [AdminController::class, 'artikelEdit'])->name('artikel.edit');
    Route::put('/artikel/{id}', [AdminController::class, 'artikelUpdate'])->name('artikel.update');
    Route::delete('/artikel/{id}', [AdminController::class, 'artikelDestroy'])->name('artikel.destroy');

    // Admin Users Management
    Route::get('/users', [AdminController::class, 'usersIndex'])->name('users.index');
    Route::get('/users/create', [AdminController::class, 'usersCreate'])->name('users.create');
    Route::post('/users', [AdminController::class, 'usersStore'])->name('users.store');
    Route::get('/users/{id}/edit', [AdminController::class, 'usersEdit'])->name('users.edit');
    Route::put('/users/{id}', [AdminController::class, 'usersUpdate'])->name('users.update');
    Route::delete('/users/{id}', [AdminController::class, 'usersDestroy'])->name('users.destroy');
});
