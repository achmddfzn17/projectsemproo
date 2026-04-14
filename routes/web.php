<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnggotaDashboardController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\PendaftaranKegiatanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/berita', [HomeController::class, 'berita'])->name('berita.index');
Route::get('/berita/{slug}', [HomeController::class, 'beritaDetail'])->name('berita.detail');
Route::get('/artikel', [HomeController::class, 'artikel'])->name('artikel.index');
Route::get('/artikel/{slug}', [HomeController::class, 'artikelDetail'])->name('artikel.detail');
Route::get('/kegiatan', [HomeController::class, 'kegiatan'])->name('kegiatan.index');
Route::get('/kegiatan/{id}', [HomeController::class, 'kegiatanDetail'])->name('kegiatan.detail');
Route::get('/galeri', [HomeController::class, 'galeri'])->name('galeri.index');
Route::get('/tentang', [HomeController::class, 'tentang'])->name('tentang');

// Admin Login Route
Route::get('/auth', function () {
    return view('auth.login');
})->name('login')->middleware('guest');

Route::post('/auth', function (Request $request) {
    $request->validate([
        'login' => 'required|string',
        'password' => 'required',
    ]);

    $loginType = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

    $credentials = [
        $loginType => $request->login,
        'password' => $request->password,
    ];

    if (Auth::attempt($credentials, $request->filled('remember'))) {
        $request->session()->regenerate();

        return redirect()->intended(route('admin.dashboard'));
    }

    return back()->withErrors([
        'login' => 'Email/Username atau password salah.',
    ])->onlyInput('login');
})->middleware('guest');

Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('home');
})->name('logout');

// Anggota Auth Routes
Route::get('/anggota/login', [AnggotaDashboardController::class, 'loginPage'])->name('anggota.login');
Route::post('/anggota/login', [AnggotaDashboardController::class, 'login'])->name('anggota.login.submit');

// Anggota Dashboard Routes (Protected)
Route::middleware('anggota.auth')->prefix('anggota')->name('anggota.')->group(function () {
    Route::get('/dashboard', [AnggotaDashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [AnggotaDashboardController::class, 'profile'])->name('profile');
    Route::put('/profile', [AnggotaDashboardController::class, 'updateProfile'])->name('profile.update');
    Route::put('/password', [AnggotaDashboardController::class, 'updatePassword'])->name('password.update');
    Route::get('/riwayat', [AnggotaDashboardController::class, 'riwayatKegiatan'])->name('riwayat');
    Route::get('/qr-card', [AnggotaDashboardController::class, 'generateQRCard'])->name('qr-card');
    Route::get('/export-profile', [AnggotaDashboardController::class, 'exportProfile'])->name('export-profile');
    Route::post('/logout', [AnggotaDashboardController::class, 'logout'])->name('logout');
});

// Pendaftaran Kegiatan (Public)
Route::get('/kegiatan/{id}/daftar', [PendaftaranKegiatanController::class, 'create'])->name('kegiatan.daftar');
Route::post('/kegiatan/{id}/daftar', [PendaftaranKegiatanController::class, 'store'])->name('kegiatan.daftar.store');
Route::get('/pendaftaran/{id}/success', [PendaftaranKegiatanController::class, 'success'])->name('pendaftaran.success');

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
    Route::get('/kegiatan/{id}/pendaftaran', [PendaftaranKegiatanController::class, 'index'])->name('kegiatan.pendaftaran');
    Route::post('/pendaftaran/{id}/approve', [PendaftaranKegiatanController::class, 'approve'])->name('pendaftaran.approve');
    Route::post('/pendaftaran/{id}/reject', [PendaftaranKegiatanController::class, 'reject'])->name('pendaftaran.reject');
    Route::post('/pendaftaran/{id}/checkin', [PendaftaranKegiatanController::class, 'checkIn'])->name('pendaftaran.checkin');

    // QR Scanner & Absensi
    Route::get('/kegiatan/scan-qr', [PendaftaranKegiatanController::class, 'scanQR'])->name('kegiatan.scan');
    Route::post('/kegiatan/process-qr', [PendaftaranKegiatanController::class, 'processQR'])->name('kegiatan.process-qr');
    Route::get('/kegiatan/{id}/export-absensi', [PendaftaranKegiatanController::class, 'exportAbsensi'])->name('kegiatan.export-absensi');

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

    // Keuangan
    Route::get('/keuangan', [KeuanganController::class, 'index'])->name('keuangan.index');
    Route::get('/keuangan/masuk', [KeuanganController::class, 'kasMasuk'])->name('keuangan.masuk');
    Route::post('/keuangan/masuk', [KeuanganController::class, 'storeKasMasuk'])->name('keuangan.store-masuk');
    Route::get('/keuangan/keluar', [KeuanganController::class, 'kasKeluar'])->name('keuangan.keluar');
    Route::post('/keuangan/keluar', [KeuanganController::class, 'storeKasKeluar'])->name('keuangan.store-keluar');
    Route::delete('/keuangan/{id}', [KeuanganController::class, 'destroy'])->name('keuangan.destroy');
    Route::get('/keuangan/laporan', [KeuanganController::class, 'laporan'])->name('keuangan.laporan');
    Route::get('/keuangan/export-pdf', [KeuanganController::class, 'exportPdf'])->name('keuangan.export-pdf');

    // Kategori Transaksi
    Route::get('/keuangan/kategori', [KeuanganController::class, 'kategoriIndex'])->name('keuangan.kategori');
    Route::post('/keuangan/kategori', [KeuanganController::class, 'kategoriStore'])->name('keuangan.kategori.store');
    Route::put('/keuangan/kategori/{id}', [KeuanganController::class, 'kategoriUpdate'])->name('keuangan.kategori.update');
    Route::delete('/keuangan/kategori/{id}', [KeuanganController::class, 'kategoriDestroy'])->name('keuangan.kategori.destroy');

    // Galeri
    Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri.index');
    Route::get('/galeri/create', [GaleriController::class, 'create'])->name('galeri.create');
    Route::post('/galeri', [GaleriController::class, 'store'])->name('galeri.store');
    Route::get('/galeri/{id}/edit', [GaleriController::class, 'edit'])->name('galeri.edit');
    Route::put('/galeri/{id}', [GaleriController::class, 'update'])->name('galeri.update');
    Route::delete('/galeri/{id}', [GaleriController::class, 'destroy'])->name('galeri.destroy');
});
