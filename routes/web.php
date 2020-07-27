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

Route::group(['middleware' => 'auth'], function () {

	Route::resource('eventos', 'Eventos\EventoController')->names([
    	'index' => 'eventos',
    	'create' => 'eventos.create',
    	'show' => 'eventos.show',
    	'edit' => 'eventos.edit',
    	'update' => 'eventos.update',
    	'destroy' => 'eventos.destroy',
	])->middleware('administrador');

	Route::resource('asistentes', 'Eventos\AsistenteController')->names([
    	'index' => 'asistentes',
    	'create' => 'asistentes.create',
    	'show' => 'asistentes.show',
    	'edit' => 'asistentes.edit',
    	'destroy' => 'asistentes.destroy',
	])->middleware('administrador');

  Route::resource('firmas', 'Eventos\FirmaController')->names([
      'index' => 'firmas',
      'create' => 'firmas.create',
      'edit' => 'firmas.edit'
  ])->middleware('administrador');

  Route::resource('correo', 'CorreoController')->names([
      'index' => 'correo',
      'update' => 'correo.update',
  ])->middleware('administrador');

  Route::get('descargar/asistentes/{id}', 'Eventos\AsistenteController@descargar');

  Route::post('add/asistentes/{id}', 'Eventos\AsistenteController@addAsistente')->middleware('auth');
  Route::post('add/asistenteexistente/{id}', 'Eventos\AsistenteController@addAsistenteExistente')->middleware('auth');
  Route::post('find/asistentes', 'Eventos\AsistenteController@findAsistente')->middleware('auth');
  Route::get('find/asistentes', 'Eventos\AsistenteController@findAsistente')->middleware('auth');
  Route::get('certificado/asistentes/{id}', 'Eventos\AsistenteController@Enviocertificados')->middleware('auth');

	Route::get('certificados', ['as' => 'certificados', 'uses' => 'Eventos\CertificadoController@index'])->middleware('auth');
  Route::get('certificados/{evento}/{user}', 'Eventos\CertificadoController@pdf')->middleware('auth');
	Route::get('certificadosb/{evento}/{user}', 'Eventos\CertificadoController@pdfb')->middleware('auth');

  Route::get('admin/profile', 'UserController@admin')->name('user.admin')->middleware('administrador');

});

Route::get('certificados/publico', 'Eventos\CertificadoController@publico');
Route::post('certificados/publico', 'Eventos\CertificadoController@validar');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});
