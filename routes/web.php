<?php

use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\IkuMstController;
use App\Http\Controllers\Admin\IkuDtlController;
use App\Http\Controllers\Pengusaha\DashboardControllerPengusaha;
use App\Http\Controllers\Pengusaha\PermohonanNkvControllerPengusaha;
use App\Http\Controllers\Pengusaha\SurveilansNkvControllerPengusaha;
use App\Http\Controllers\Sudin\PermohonanNkvControllerSudin;
use App\Http\Controllers\Sudin\DashboardControllerSudin;
use App\Http\Controllers\User\DashboardControllerUser;
use App\Http\Controllers\Dinas\SurveilansNkvControllerDinas;
use App\Http\Controllers\Dinas\DashboardControllerDinas;
use App\Http\Controllers\Dinas\UserControllerDinas;
use App\Http\Controllers\NotifikasiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Models\Category;
use App\Models\PermohonanNkv;
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




Route::controller(AuthController::class)->group(function() {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('register-save');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::post('/nkv-authenticate', 'nkv_authenticate')->name('nkv-authenticate');
    // Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::get('/logout', 'logout')->name('logout');
});
Route::get('/login', function (){
    return view('auth.login');

})->name('login');

Route::get('/nkv-login', function (){
    return view('auth.nkv-login');

})->name('nkv-login');


Route::get('/', [ClientController::class, "home"])->name("/");
Route::get('/blog', [BlogController::class, "index"]);

Route::get('/profil', [ClientController::class, "profile"]);

Route::get('/blogs', [ClientController::class, "blogs"])->name("blogs");

Route::get('/news/{slug}/', [ClientController::class, "blog"])->name("news.slug");





// Route::get("/blog/{category_id?}/category", [ClientController::class, "blogs"])->name("blogs.category");
// Route::get("/blog/{category_id?}/{tag_id?}/category", [ClientController::class, "blogs"])->name("blogs.tag");

Route::get('/data', function () {
    return view('data', [
        "title" => "Data Statistik"
    ]);
});

Route::get('/pjlp', function () {
    return view('pjlp', [
        "title" => "Penerimaan PJLP"
    ]);
});

Route::get('/nkv', function () {
    return view('nkv', [
        "title" => "Pelayanan NKV"
    ]);
});

Route::get('ppid', [ClientController::class, "ppid"]);
Route::get('ppid-navbar/{slug}/{id}', [ClientController::class, "ppidnavbar"]);

Route::get('/ppid/struktur', function () {
    return view('struktur', [
        "title" => "Struktur"
    ]);
});

Route::get('/ppid/informasi-berkala', function () {
    return view('informasi-berkala', [
        "title" => "Informasi Berkala"
    ]);
});

Route::get('/ppid/informasi-serta-merta', function () {
    return view('informasi-serta-merta', [
        "title" => "Informasi Serta Merta"
    ]);
});

Route::get('/ppid/informasi-setiap-saat', function () {
    return view('informasi-setiap-saat', [
        "title" => "Informasi Setiap Saat"
    ]);
});

Route::get('/hargapangan', function () {
    return view('hargapangan', [
        "title" => "Harga Pangan"
    ]);
});

Route::get('/peternakan', function () {
    return view('peternakan', [
        "title" => "Izin Peternakan"
    ]);
});

Route::get('/perikanan', function () {
    return view('perikanan', [
        "title" => "Izin Perikanan"
    ]);
});


Route::middleware(['auth'])->group(function () {
    Route::controller(ProfileController::class)->group(function() {
        Route::get('profile', 'index')->name('profile');
        Route::put('profile', 'update')->name('profile.update');
    });
    // Route::get('/profile', 'ProfileController@index')->name('profile');
    // Route::put('/profile', 'ProfileController@update')->name('profile.update');
    
    Route::controller(NotifikasiController::class)->group(function() {
        Route::get('notifikasi', 'index')->name('notifikasi');
        Route::get('notifikasi/ubahstatus/{id}', 'ubahstatus')->name('notifikasi.ubahstatus');
    });

    Route::get('/autocomplete', 'NotifikasiController@autocomplete')->name('autocomplete');

    Route::get('/errorpage', 'NotifikasiController@errorpage')->name('user.error.page');
});

Route::prefix('dinas')->middleware(['auth','dinas'])->group(function () {
    Route::controller(DashboardControllerDinas::class)->group(function() {
        Route::get('dashboard', 'index')->name('dinas.dashboard');
    });
    Route::controller(SurveilansNkvControllerDinas::class)->group(function() {
        Route::get('surveilansnkv', 'index')->name('dinas.surveilansnkv');
        Route::get('surveilansnkv/getdata/{id}', 'getdata')->name('dinas.surveilansnkv.getdata');
        Route::get('surveilansnkv/cekdata/{id}', 'cekdata')->name('dinas.surveilansnkv.cekdata');
        Route::get('surveilansnkv/peninjauan/{id}', 'peninjauan')->name('dinas.surveilansnkv.peninjauan');
        Route::get('surveilansnkv/notifperpanjang/{id}', 'notifperpanjang')->name('dinas.surveilansnkv.notifperpanjang');
        Route::post('surveilansnkv/ubahstatus', 'ubahstatus')->name('dinas.surveilansnkv.ubahstatus');
        Route::post('surveilansnkv/ubahstatuspeninjauan', 'ubahstatuspeninjauan')->name('dinas.surveilansnkv.ubahstatuspeninjauan');
        Route::get('surveilansnkv/show/{id}', 'show')->name('dinas.surveilansnkv.show');
    });

    Route::controller(SurveilansNkvControllerPengusaha::class)->group(function() {
        Route::get('surveilansnkv/create', 'create')->name('dinas.surveilansnkv.create');
        Route::get('surveilansnkv/edit/{id}', 'edit')->name('dinas.surveilansnkv.edit');
    });

    Route::controller(UserControllerDinas::class)->group(function() {
        Route::get('user', 'index')->name('dinas.user');
        Route::get('user/show/{id}', 'show')->name('dinas.user.show');
        Route::post('user/edit', 'edit')->name('dinas.user.edit');
        Route::get('user/ubahstatus/{id}', 'ubahstatus')->name('dinas.user.ubahstatus');
        Route::delete('user/delete/{id}', 'destroy')->name('dinas.user.delete');
    });
});

Route::prefix('sudin')->middleware(['auth','sudin'])->group(function () {
    Route::controller(DashboardControllerSudin::class)->group(function() {
        Route::get('dashboard', 'index')->name('sudin.dashboard');
    });
    Route::controller(PermohonanNkvControllerSudin::class)->group(function() {
        Route::get('permohonannkv', 'index')->name('sudin.permohonannkv');
        Route::get('permohonannkv/getdata/{id}', 'getdata')->name('sudin.permohonannkv.getdata');
        Route::get('permohonannkv/cekdata/{id}', 'cekdata')->name('sudin.permohonannkv.cekdata');
        Route::post('permohonannkv/ubahstatus', 'ubahstatus')->name('sudin.permohonannkv.ubahstatus');
        Route::get('permohonannkv/show/{id}', 'show')->name('sudin.permohonannkv.show');
    });
});

Route::prefix('pengusaha')->middleware(['auth','pengusaha'])->group(function () {
    Route::controller(DashboardControllerPengusaha::class)->group(function() {
        Route::get('dashboard', 'index')->name('pengusaha.dashboard');
    });
    Route::controller(PermohonanNkvControllerPengusaha::class)->group(function() {
        Route::get('permohonannkv', 'index')->name('pengusaha.permohonannkv');
        Route::get('permohonannkv/create', 'create')->name('pengusaha.permohonannkv.create');
        Route::post('permohonannkv/store', 'store')->name('pengusaha.permohonannkv.store');
        Route::get('permohonannkv/edit/{id}', 'edit')->name('pengusaha.permohonannkv.edit');
        Route::get('permohonannkv/show/{id}', 'show')->name('pengusaha.permohonannkv.show');
        Route::post('permohonannkv/update', 'update')->name('pengusaha.permohonannkv.update');
        Route::delete('permohonannkv/delete/{id}', 'destroy')->name('pengusaha.permohonannkv.delete');
        Route::get('permohonannkv/ajukandata/{id}', 'ajukandata')->name('pengusaha.permohonannkv.ajukandata');
    });

    Route::controller(SurveilansNkvControllerPengusaha::class)->group(function() {
        Route::get('surveilansnkv', 'index')->name('pengusaha.surveilansnkv');
        Route::get('surveilansnkv/create', 'create')->name('pengusaha.surveilansnkv.create');
        Route::post('surveilansnkv/store', 'store')->name('pengusaha.surveilansnkv.store');
        Route::get('surveilansnkv/edit/{id}', 'edit')->name('pengusaha.surveilansnkv.edit');
        Route::get('surveilansnkv/show/{id}', 'show')->name('pengusaha.surveilansnkv.show');
        Route::post('surveilansnkv/update', 'update')->name('pengusaha.surveilansnkv.update');
        Route::delete('surveilansnkv/delete/{id}', 'destroy')->name('pengusaha.surveilansnkv.delete');
        Route::get('surveilansnkv/ajukandata/{id}', 'ajukandata')->name('pengusaha.surveilansnkv.ajukandata');
    });
});

Route::prefix('user')->middleware(['auth','user'])->group(function () {
    Route::controller(DashboardControllerUser::class)->group(function() {
        Route::get('dashboard', 'index')->name('user.dashboard');
    });
    // Route::controller(PermohonanNkvControllerSudin::class)->group(function() {
    //     Route::get('permohonannkv', 'index')->name('sudin.permohonannkv');
    //     Route::get('permohonannkv/getdata/{id}', 'getdata')->name('sudin.permohonannkv.getdata');
    //     Route::get('permohonannkv/cekdata/{id}', 'cekdata')->name('sudin.permohonannkv.cekdata');
    //     Route::post('permohonannkv/ubahstatus', 'ubahstatus')->name('sudin.permohonannkv.ubahstatus');
    //     Route::get('permohonannkv/show/{id}', 'show')->name('sudin.permohonannkv.show');
    // });
});

Route::middleware(['auth','adminuser'])->group(function () {

    Route::resource('ikumst', IkuMstController::class);
    
    Route::get('ikudtl/{id}', [IkuDtlController::class, "index"]);
    Route::post('createtujuan', [IkuDtlController::class, "createtujuan"]);
    Route::post('edittujuan', [IkuDtlController::class, "edittujuan"]);
    Route::post('storetujuan', [IkuDtlController::class, "storetujuan"]);
    Route::delete('deletetujuan/{id}', [IkuDtlController::class, "deletetujuan"]);
    Route::post('createsasaran', [IkuDtlController::class, "createsasaran"]);
    Route::post('editsasaran', [IkuDtlController::class, "editsasaran"]);
    Route::post('storesasaran', [IkuDtlController::class, "storesasaran"]);
    Route::delete('deletesasaran/{id}', [IkuDtlController::class, "deletesasaran"]);

    Route::post('edittujuan-user', [IkuDtlController::class, "edittujuanuser"]);
    Route::post('storetujuan-user', [IkuDtlController::class, "storetujuanuser"]);
    Route::post('editsasaran-user', [IkuDtlController::class, "editsasaranuser"]);
    Route::post('storesasaran-user', [IkuDtlController::class, "storesasaranuser"]);

});


