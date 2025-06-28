<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\WisataController;
use App\Http\Controllers\Auth\PasswordResetController;
use App\Models\Image;
use App\Models\Package;
use App\Models\Wisata;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

// Home page
Route::get('/', function () {
    $image1 = Image::find(4);
    $image2 = Image::find(5);
    $image3 = Image::find(6);
    $image4 = Image::find(7);
    return view('home', compact('image1', 'image2', 'image3', 'image4'));
})->name('home');

Route::get('/home/gambar/{id}', [ImageUploadController::class, 'showById'])->name('home.gambar');

// Profil lengkap desa
Route::get('/profil_lengkap_desa', function () {
    $image5 = Image::find(8);
    return view('profil_lengkap_desa', compact('image5'));
});

// Daftar wisata
Route::get('/daftar_wisata', function () {
    $wisatas = Wisata::all();
    return view('daftar_wisata', compact('wisatas'));
})->name('daftar_wisata');


// Paket wisata grouped by type
Route::get('/paket_wisata', function () {
    $wisataPackages = Package::where('type', 'wisata')->get();
    $makrabPackages = Package::where('type', 'makrab')->get();
    $studyBandingPackages = Package::where('type', 'study banding')->get();

    return view('paket_wisata', compact('wisataPackages', 'makrabPackages', 'studyBandingPackages'));
});

// Static pages
Route::view('/kontak', 'kontak');
Route::view('/test', 'test');

// Contact form
Route::post('/kirim-pesan', [KontakController::class, 'kirimPesan'])->name('kirim.pesan');

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/

// Guest only
Route::middleware('guest')->group(function () {
    Route::get('/login', [SesiController::class, 'index'])->name('login');
    Route::post('/login', [SesiController::class, 'login']);
});

// Authenticated users only
Route::middleware('auth')->group(function () {
    Route::get('/logout', [SesiController::class, 'logout'])->name('logout');

    // Admin dashboard
    Route::resource('adminuser', AdminUserController::class);

    // Image upload
    Route::get('/upload', [ImageUploadController::class, 'showForm'])->name('upload.form');
    Route::post('/upload', [ImageUploadController::class, 'upload'])->name('upload.image');
});

/*
|--------------------------------------------------------------------------
| Password Reset Routes
|--------------------------------------------------------------------------
*/

Route::get('forgot-password', [PasswordResetController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('forgot-password', [PasswordResetController::class, 'sendResetLink'])->name('password.email');
Route::get('reset-password/{token}', [PasswordResetController::class, 'showResetForm'])->name('password.reset');
Route::post('reset-password', [PasswordResetController::class, 'resetPassword'])->name('password.update');

/*
|--------------------------------------------------------------------------
| Resource Controllers
|--------------------------------------------------------------------------
*/

Route::resource('packages', PackageController::class);
Route::resource('wisata', WisataController::class)->parameters([
    'wisata' => 'wisata'
]);
