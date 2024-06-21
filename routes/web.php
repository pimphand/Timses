<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

require __DIR__ . '/auth.php';
Route::view('login', 'auth.login');

Route::get('province', [\App\Http\Controllers\IndonesianTerritoryController::class, 'province'])->name('get.province');
Route::get('city', [\App\Http\Controllers\IndonesianTerritoryController::class, 'city'])->name('get.city');
Route::get('district', [\App\Http\Controllers\IndonesianTerritoryController::class, 'district'])->name('get.district');
Route::get('village', [\App\Http\Controllers\IndonesianTerritoryController::class, 'village'])->name('get.village');
Route::get('tps-data', [\App\Http\Controllers\Admin\TpsController::class, 'data'])->name('tps.data');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/dashboard/data', [\App\Http\Controllers\Admin\DashboardController::class, 'data'])->name('dashboard.data');

    Route::get('/quick-count', [\App\Http\Controllers\Admin\DashboardController::class, 'quickCount'])->name('quickCount');
    Route::get('/quick-count/data', [\App\Http\Controllers\Admin\DashboardController::class, 'quickCountData'])->name('quickCount.data');

    Route::resource('data-recap', \App\Http\Controllers\Admin\DataRecapController::class);
    Route::group(['middleware' => ['isAdmin']], function () {
        Route::get('get-images', [\App\Http\Controllers\FileController::class, 'show'])->name('file.show')->middleware('auth');
        Route::resource('volunteers', \App\Http\Controllers\Admin\VolunteerController::class);
        Route::resource('voters', \App\Http\Controllers\Admin\VoterController::class);
        Route::post('voters-create-pdf', [\App\Http\Controllers\Admin\VoterController::class, 'createPdf'])->name('voters.pdf');
        Route::resource('news', \App\Http\Controllers\Admin\NewsController::class);
        Route::resource('witnesses', \App\Http\Controllers\Admin\WitnessController::class);
        Route::post('generateWitness', [\App\Http\Controllers\Admin\WitnessController::class, 'generateWitness'])->name('generateWitness');
        Route::get('generateWitness-export', [\App\Http\Controllers\Admin\WitnessController::class, 'export'])->name('witnessexport');

        Route::resource('tps', \App\Http\Controllers\Admin\TpsController::class);
        Route::resource('candidates', \App\Http\Controllers\Admin\CandidateController::class);
        Route::resource('settings', \App\Http\Controllers\Admin\SettingController::class);

        Route::post('iori', [\App\Http\Controllers\Admin\SettingController::class, 'storeIori'])->name('iori.store');
        Route::delete('iori', [\App\Http\Controllers\Admin\SettingController::class, 'destroyIori'])->name('iori.destroy');
    });
});

Route::get('/', [\App\Http\Controllers\FrontendController::class, 'index']);
Route::get('/data', [\App\Http\Controllers\FrontendController::class, 'data'])->name('data');
Route::get('/semua-berita', [\App\Http\Controllers\FrontendController::class, 'news'])->name('all-news');
Route::get('/detail-berita/{slug}', [\App\Http\Controllers\FrontendController::class, 'detail'])->name('news-detail');
Route::get('/daftar-relawan', [\App\Http\Controllers\FrontendController::class, 'register'])->name('register');
Route::post('/daftar-relawan', [\App\Http\Controllers\FrontendController::class, 'storeRegister']);
Route::get('/download/{qrcode}', [\App\Http\Controllers\FrontendController::class, 'downloadQrCode'])->name('downloadQrCode');
