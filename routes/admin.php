<?php

use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\FieldController;
use App\Http\Controllers\Admin\LppdController;
use App\Http\Controllers\Admin\MasterIndikatorProgramController;
use App\Http\Controllers\Admin\MasterProgramController;
use App\Http\Controllers\Admin\MasterTargetController;
use App\Http\Controllers\Admin\RpjmdController;
use App\Http\Controllers\Admin\ProgramController;
use App\Http\Controllers\Admin\PurposeController;
use App\Http\Controllers\Admin\RenstraController;
use App\Http\Controllers\Admin\RenstrasasaranController;
use App\Http\Controllers\Admin\SdgsController;
use App\Http\Controllers\Admin\SdiController;
use App\Http\Controllers\Admin\UnitController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\YearController;
use App\Models\MasterIndikatorProgram;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix("admin")->name("admin.")->group(function () {
    Route::middleware(['auth', 'adminuser'])->group(function () {
        Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
        // Route::get('/blog', 'BlogController@index')->name('blog');

        Route::get('/error', 'RestrictController@index')->name('error.page');
      

        Route::get('/user/status/{id}', 'UserController@status')->name('updatestatususer');

        Route::resource('sdi', SdiController::class);
        Route::resource('renstra', RenstraController::class);
        Route::resource('renstrasasaran', RenstrasasaranController::class);
        Route::resource('program', ProgramController::class);
        Route::resource('lppd', LppdController::class);
        Route::resource('rpjmd', RpjmdController::class);
        Route::resource('sdgs', SdgsController::class);

    });

    Route::middleware(['auth', 'admin'])->group(function () {
        
        Route::resource('user', UserController::class);
        Route::resource('blog', BlogController::class);
        Route::resource('category', CategoryController::class);
        Route::resource('tag', TagController::class);
        Route::resource('bidang', BidangController::class);
        Route::resource('satuan', SatuanController::class);
        Route::resource('ppidnavbar', PpidNavbarController::class);
        Route::resource('ppidkategori', PpidKategoriController::class);
        Route::resource('ppidinformasi', PpidInformasiController::class);
        
        
        // Route::resource('ikuindikatortujuan', IkuIndikatorTujuanController::class);
//        Route::resource('post', HomeController::class);
        Route::group(['prefix' => 'master'], function () {
            Route::resource('field', FieldController::class);
            Route::resource('year', YearController::class);
            Route::resource('unit', UnitController::class);
            Route::resource('purpose', PurposeController::class);
            Route::resource('master-program', MasterProgramController::class);
            Route::resource('master-indikator-program', MasterIndikatorProgramController::class);
            Route::resource('target', MasterTargetController::class);
        });
    });
});
