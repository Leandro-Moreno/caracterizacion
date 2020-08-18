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
    return redirect('home');
});

Auth::routes();

Route::get('login/local', 'Auth\LoginController@local')->name('login-local');
Route::get('auth', 'Auth\LoginController@redirectToProvider');
Route::get('auth/callback', 'Auth\LoginController@handleProviderCallback');
Route::get('register', function () { return redirect('home'); });
Route::post('register', function () { return redirect('home'); });
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

###################  Rutas para servicioscampus y super admin  ###################
Route::group(['middleware' => ['auth']], function () {

	Route::resource('user', 'UserController')->names([
    	'create' => 'user.create',
    	'show' => 'user.show',
    	'edit' => 'user.edit',
    	'update' => 'user.update',
		'destroy' => 'user.destroy',
	])->middleware(['role:Superadmin,ServiciosCampus,ServiciosSalud,Facultad']);


  Route::resource('caracterizacion', 'Caracterizacion\CaracterizacionController')->names([
    'create' => 'caracterizacion.create',
    	'show' => 'caracterizacion.show',
    	'edit' => 'caracterizacion.edit',
      'store' => 'caracterizacion.store',
    	'update' => 'caracterizacion.update',
		'destroy' => 'caracterizacion.destroy',
	]);

	//Rutas para gestion de caracterizacion

  //   Route::get('caracterizacion', 'Caracterizacion\CaracterizacionController@index')->name('caracterizacion')->middleware(['role:Superadmin,ServiciosCampus,ServiciosSalud,Facultad']);
  //
  //   Route::get('caracterizacion/create', 'Caracterizacion\CaracterizacionController@create')->name('caracterizacion.create')->middleware(['role:Superadmin,ServiciosCampus,ServiciosSalud,Facultad']);
  //
  //   Route::post('caracterizacion/store', 'Caracterizacion\CaracterizacionController@store')->name('caracterizacion.store')->middleware(['role:Superadmin,ServiciosCampus,ServiciosSalud,Facultad']);
  //
  //   Route::get('caracterizacion/{id}', 'Caracterizacion\CaracterizacionController@show')->name('caracterizacion.show')->middleware(['role:Superadmin,ServiciosCampus,ServiciosSalud,Facultad']);
  //
  //   Route::get('caracterizacion/{id}/edit', 'Caracterizacion\CaracterizacionController@edit')->name('caracterizacion.edit')->middleware(['role:Superadmin,ServiciosCampus,ServiciosSalud,Facultad']);
  //
	// Route::put('caracterizacion/update', 'Caracterizacion\CaracterizacionController@update')->name('caracterizacion.update')->middleware(['role:Superadmin,ServiciosCampus,ServiciosSalud,Facultad']);

	Route::get('nuevo/usuario', 'UserController@storeUser')->name('createuser')->middleware('auth');

	Route::get('importar/caracterizacion', 'Caracterizacion\CaracterizacionController@importar')->name('caracterizacion.importar')->middleware(['role:Superadmin,ServiciosCampus,ServiciosSalud,Facultad']);

	Route::post('importar/caracterizacion', 'Caracterizacion\CaracterizacionController@importarCrear')->name('caracterizacion.importarCrear')->middleware(['role:Superadmin,ServiciosCampus,ServiciosSalud,Facultad']);

	Route::get('exportar/usuario', 'Caracterizacion\CaracterizacionController@To.do')->middleware('auth')->name('user.export');

	Route::resource('reporte', 'Reporte\ReporteController')->names([
		'index' => 'reporte',
		'create' => 'reporte.create',
		'show' => 'reporte.show',
		'edit' => 'reporte.edit',
		'update' => 'reporte.update',
		'destroy' => 'reporte.destroy',
	])->middleware('role:Superadmin');

	Route::get('caracterizacion/chart','Caracterizacion\CaracterizacionController@chart')->middleware(['role:Superadmin,ServiciosCampus']);

	Route::get('grafico','Reporte\ReporteController@grafico')->middleware(['role:Superadmin,Servicios Campus'])->name('reporte.grafico');

	Route::get('admin/profile', 'UserController@admin')->name('user.admin')->middleware('administrador');

	Route::get('caracterizacion/{id}/crear', 'userController@createCaracterizacion')->name('caracterizacion.ucreate')->middleware('role:Superadmin');

  Route::get('busqueda/caracterizacion', 'Caracterizacion\CaracterizacionController@busqueda')->name('buscarCaracterizacion');
  Route::get('busqueda/usuario', 'UserController@busqueda')->name('buscarUsuario');
});
Route::group(['middleware' => 'auth'], function () {

	Route::get('busqueda/caracterizacion', 'Caracterizacion\CaracterizacionController@busqueda')->name('buscarCaracterizacion');
	Route::get('busqueda/usuario', 'UserController@busqueda')->name('buscarUsuario');
	Route::get('perfil/usuario', 'ProfileController@index')->name('profile.index');
	Route::get('profile/{id}/edit', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});
