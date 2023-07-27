<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\VidioController;
use App\Http\Controllers\SektorController;
use App\Http\Controllers\PendetaController;
use App\Http\Controllers\SejarahController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AyatharianController;
use App\Http\Controllers\BeritajemaatController;
use App\Http\Controllers\MajelisController;
use App\Http\Controllers\PeriodeController;
use App\Http\Controllers\BuletinController;
use App\Http\Controllers\GolonganController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\MerkController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\BarangController;




/*
|--------------------------------------------------------------------------
| @halomoan_nababan
|--------------------------------------------------------------------------
*/

Route::get('/', [FrontendController::class, 'index']);
Route::get('/berita', [FrontendController::class, 'news'])->name('berita');
Route::get('/berita/{categoryName}', [FrontendController::class, 'category']);
Route::get('/detail-berita/{slug}', [FrontendController::class, 'detail'])->name('detail-berita');
Route::get('/tentang', [FrontendController::class, 'about']);
Route::get('/komsel', [FrontendController::class, 'komsel']);
Route::get('/buletin', [FrontendController::class, 'buletin'])->name('buletin');
Route::get('/about', [FrontendController::class, 'about']);
Route::get('/majelis', [FrontendController::class, 'majelis']);
Route::get('/berita-jemaat', [FrontendController::class, 'beritajemaat'])->name('berita-jemaat');
Route::get('/galeri-foto', [FrontendController::class, 'galerifoto'])->name('galerifoto');
Route::get('/galeri-video', [FrontendController::class, 'galerivideo'])->name('galerivideo');
Route::get('/download-buletin/{id}', [FrontendController::class, 'downloadBuletin'])->name('downloadBuletin');

Auth::routes();

Route::get('generate', function () {
    \Illuminate\Support\Facades\Artisan::call('storage:link');
    echo 'ok';
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('kategori', KategoriController::class);
    Route::resource('news', NewsController::class);
    Route::resource('sektor', SektorController::class);
    Route::resource('beritajemaat', BeritajemaatController::class);
    Route::resource('ayatharian', AyatharianController::class);
    Route::resource('sejarah', SejarahController::class);
    Route::resource('pendeta', PendetaController::class);
    Route::resource('vidio', VidioController::class);
    Route::resource('foto', FotoController::class);
    Route::resource('majelis-info', MajelisController::class);
    Route::resource('periode', PeriodeController::class);
    Route::resource('buletin-info', BuletinController::class);
    Route::resource('golongan', GolonganController::class);
    Route::resource('ruangan', RuanganController::class);
    Route::resource('merk', MerkController::class);
    Route::resource('status', StatusController::class);
    Route::resource('barang', BarangController::class);
    Route::resource('daftaraset', DaftarAsetController::class);
    Route::resource('pemeliharaanaset', PemeliharaanAsetController::class);
    Route::resource('penghapusanaset', PenghapusanAsetController::class);
});
