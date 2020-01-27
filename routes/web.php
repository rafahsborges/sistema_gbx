<?php

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

Route::get('/', function () {
    return redirect('/admin/login');
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::prefix('admin-users')->name('admin-users/')->group(static function () {
            Route::get('/', 'AdminUsersController@index')->name('index');
            Route::get('/create', 'AdminUsersController@create')->name('create');
            Route::post('/', 'AdminUsersController@store')->name('store');
            Route::get('/{adminUser}/edit', 'AdminUsersController@edit')->name('edit');
            Route::post('/{adminUser}', 'AdminUsersController@update')->name('update');
            Route::delete('/{adminUser}', 'AdminUsersController@destroy')->name('destroy');
            Route::get('/{adminUser}/resend-activation', 'AdminUsersController@resendActivationEmail')->name('resendActivationEmail');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::get('/profile', 'ProfileController@editProfile')->name('edit-profile');
        Route::post('/profile', 'ProfileController@updateProfile')->name('update-profile');
        Route::get('/password', 'ProfileController@editPassword')->name('edit-password');
        Route::post('/password', 'ProfileController@updatePassword')->name('update-password');
    });
});


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::prefix('representantes')->name('representantes/')->group(static function () {
            Route::get('/', 'RepresentantesController@index')->name('index');
            Route::get('/create', 'RepresentantesController@create')->name('create');
            Route::post('/', 'RepresentantesController@store')->name('store');
            Route::get('/{representante}/edit', 'RepresentantesController@edit')->name('edit');
            Route::post('/bulk-destroy', 'RepresentantesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{representante}', 'RepresentantesController@update')->name('update');
            Route::delete('/{representante}', 'RepresentantesController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::prefix('servicos')->name('servicos/')->group(static function () {
            Route::get('/', 'ServicosController@index')->name('index');
            Route::get('/create', 'ServicosController@create')->name('create');
            Route::post('/', 'ServicosController@store')->name('store');
            Route::get('/{servico}/edit', 'ServicosController@edit')->name('edit');
            Route::post('/bulk-destroy', 'ServicosController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{servico}', 'ServicosController@update')->name('update');
            Route::delete('/{servico}', 'ServicosController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::prefix('pontos')->name('pontos/')->group(static function () {
            Route::get('/', 'PontosController@index')->name('index');
            Route::get('/create', 'PontosController@create')->name('create');
            Route::post('/', 'PontosController@store')->name('store');
            Route::get('/{ponto}/edit', 'PontosController@edit')->name('edit');
            Route::post('/bulk-destroy', 'PontosController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{ponto}', 'PontosController@update')->name('update');
            Route::delete('/{ponto}', 'PontosController@destroy')->name('destroy');
        });
    });
});
