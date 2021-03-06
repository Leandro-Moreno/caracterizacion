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
    return redirect('caracterizacion');
});

Auth::routes();

Route::get('login/local', 'Auth\LoginController@local')->name('login-local');
Route::get('auth', 'Auth\LoginController@redirectToProvider');
Route::get('auth/callback', 'Auth\LoginController@handleProviderCallback');
Route::get('register', function () { return redirect('home'); });
Route::post('register', function () { return redirect('home'); });
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::get('dash', function () {
    return view('dashboard');
});
###################  Rutas para servicioscampus y super admin  ###################
Route::group(['middleware' => ['auth']], function () {

	Route::resource('user', 'UserController')->names([
    	'create' => 'user.create',
    	'show' => 'user.show',
    	'edit' => 'user.edit',
    	'update' => 'user.update',
		'destroy' => 'user.destroy',
	])->middleware(['role:Superadmin']); //TODO: eliminar middlewares


  Route::resource('caracterizacion', 'Caracterizacion\CaracterizacionController')->names([
     'index' => 'caracterizacion',
    	'show' => 'caracterizacion.show',
    	'edit' => 'caracterizacion.edit',
      'store' => 'caracterizacion.store',
    	'update' => 'caracterizacion.update',
		'destroy' => 'caracterizacion.destroy',
	]);
  Route::get('caracterizaciones/avanzada', 'Caracterizacion\CaracterizacionController@avanzada')->name('avanzada');

	Route::get('viabilidad', 'UserController@busquedaAvanzada')->name('viabilidad')->middleware('auth');

	Route::post('nuevo/usuario', 'UserController@storeUser')->name('createuser')->middleware('auth');

	Route::get('importar/caracterizacion', 'Caracterizacion\CaracterizacionController@importar')->name('caracterizacion.importar')->middleware(['role:Superadmin,ServiciosCampus,ServiciosSalud,Facultad']);

	Route::post('importar/caracterizacion', 'Caracterizacion\CaracterizacionController@importarCrear')->name('caracterizacion.importarCrear')->middleware(['role:Superadmin,ServiciosCampus,ServiciosSalud,Facultad']);

	Route::get('exportar/usuario', 'Caracterizacion\CaracterizacionController@To.do')->middleware('auth')->name('user.export');
	Route::get('exportar/viabilidad', 'Reporte\ReporteController@exportarViabilidad')->middleware('auth')->name('viabilidad.export');

	Route::resource('reporte', 'Reporte\ReporteController')->names([
		'index' => 'reporte',
	])->middleware('role:Superadmin,ServiciosCampus');//TODO: eliminar middlewares

	Route::get('caracterizacion/chart','Caracterizacion\CaracterizacionController@chart')->middleware(['role:Superadmin,ServiciosCampus']);

	Route::get('grafico','Reporte\ReporteController@grafico')->middleware(['role:Superadmin,Servicios Campus'])->name('reporte.grafico');

	Route::get('admin/profile', 'UserController@admin')->name('user.admin')->middleware('administrador');

	Route::get('caracterizacion/{id}/crear', 'userController@createCaracterizacion')->name('caracterizacion.ucreate')->middleware('role:Superadmin');//TODO:eliminar esta ruta

  Route::get('busqueda/caracterizacion', 'Caracterizacion\CaracterizacionController@busqueda')->name('buscarCaracterizacion')->middleware('administrador');
  Route::get('busqueda/usuario', 'UserController@busqueda')->name('buscarUsuario')->middleware('administrador');
});
