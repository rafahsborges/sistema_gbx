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

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

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

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::prefix('apontamentos')->name('apontamentos/')->group(static function () {
            Route::get('/', 'ApontamentosController@index')->name('index');
            Route::get('/create', 'ApontamentosController@create')->name('create');
            Route::post('/', 'ApontamentosController@store')->name('store');
            Route::get('/{apontamento}/edit', 'ApontamentosController@edit')->name('edit');
            Route::post('/bulk-destroy', 'ApontamentosController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{apontamento}', 'ApontamentosController@update')->name('update');
            Route::delete('/{apontamento}', 'ApontamentosController@destroy')->name('destroy');
        });
    });
});


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::prefix('estados')->name('estados/')->group(static function () {
            Route::get('/', 'EstadosController@index')->name('index');
            Route::get('/create', 'EstadosController@create')->name('create');
            Route::post('/', 'EstadosController@store')->name('store');
            Route::get('/{estado}/edit', 'EstadosController@edit')->name('edit');
            Route::post('/bulk-destroy', 'EstadosController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{estado}', 'EstadosController@update')->name('update');
            Route::delete('/{estado}', 'EstadosController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::prefix('cidades')->name('cidades/')->group(static function () {
            Route::get('/', 'CidadesController@index')->name('index');
            Route::get('/create', 'CidadesController@create')->name('create');
            Route::post('/', 'CidadesController@store')->name('store');
            Route::get('/{cidade}/edit', 'CidadesController@edit')->name('edit');
            Route::post('/bulk-destroy', 'CidadesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{cidade}', 'CidadesController@update')->name('update');
            Route::delete('/{cidade}', 'CidadesController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::prefix('status')->name('status/')->group(static function () {
            Route::get('/', 'StatusController@index')->name('index');
            Route::get('/create', 'StatusController@create')->name('create');
            Route::post('/', 'StatusController@store')->name('store');
            Route::get('/{status}/edit', 'StatusController@edit')->name('edit');
            Route::post('/bulk-destroy', 'StatusController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{status}', 'StatusController@update')->name('update');
            Route::delete('/{status}', 'StatusController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::prefix('etapas')->name('etapas/')->group(static function () {
            Route::get('/', 'EtapasController@index')->name('index');
            Route::get('/create', 'EtapasController@create')->name('create');
            Route::post('/', 'EtapasController@store')->name('store');
            Route::get('/{etapa}/edit', 'EtapasController@edit')->name('edit');
            Route::post('/bulk-destroy', 'EtapasController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{etapa}', 'EtapasController@update')->name('update');
            Route::delete('/{etapa}', 'EtapasController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::prefix('itens')->name('itens/')->group(static function () {
            Route::get('/', 'ItensController@index')->name('index');
            Route::get('/create', 'ItensController@create')->name('create');
            Route::post('/', 'ItensController@store')->name('store');
            Route::get('/{item}/edit', 'ItensController@edit')->name('edit');
            Route::post('/bulk-destroy', 'ItensController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{item}', 'ItensController@update')->name('update');
            Route::delete('/{item}', 'ItensController@destroy')->name('destroy');
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
        Route::prefix('notifications')->name('notifications/')->group(static function () {
            Route::get('/', 'NotificationsController@index')->name('index');
            Route::get('/create', 'NotificationsController@create')->name('create');
            Route::post('/', 'NotificationsController@store')->name('store');
            Route::get('/{notification}', 'NotificationsController@show')->name('show');
            Route::get('/{notification}/edit', 'NotificationsController@edit')->name('edit');
            Route::post('/bulk-destroy', 'NotificationsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{notification}', 'NotificationsController@update')->name('update');
            Route::delete('/{notification}', 'NotificationsController@destroy')->name('destroy');
        });
    });
});
