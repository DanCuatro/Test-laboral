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
Auth::routes(['verify' => true]);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::post('registrar','MasterController@registrar')->name('registrar');

Route::middleware('auth')->middleware('verified')->group(function(){
	//roles
	Route::post('roles/store','RoleController@store')->name('roles.store');

	Route::get('roles','RoleController@index')->name('roles.index');
	
	Route::get('roles/create','RoleController@create')->name('roles.create');
	
	Route::put('roles/{role}','RoleController@update')->name('roles.update');
	
	Route::get('roles/{role}','RoleController@show')->name('roles.show');
	
	Route::delete('roles/{role}','RoleController@destroy')->name('roles.destroy');
	
	Route::get('roles/{role}/edit','RoleController@edit')->name('roles.edit');

	//Areas
	Route::get('areas','MasterController@AreaIndex')->name('areas.index');

	//Usersx
	Route::get('users/DatosPersonales','MasterController@UserDatosPersonal')->name('users.personal');

	Route::get('users','MasterController@UserIndex')->name('users.index');
	
	Route::get('users/{cuestionario}/cuestionario','MasterController@UserCuestionarioPDF')->name('users.cuestionario');
	
	Route::get('users/{id}/cambiarCorreo','MasterController@UserCambiarCorreo')->name('users.cambiarCorreo');
	
	//Correo
	Route::get('correos','MasterController@CorreoIndex')->name('correos.index');
	
	//Campu
	Route::get('campus','MasterController@CampuIndex')->name('campus.index');
	
	//Cuestionario
	Route::get('cuestionario','MasterController@CuestionarioResolver')->name('cuestionario.resolver');

	Route::get('cuestionario/Asignar','MasterController@CuestionarioAsignar')->name('cuestionario.asignar');
	
	//Graficos
	Route::get('graficos','MasterController@GraficosIndex')->name('graficos.index');

	Route::post('graficos/pdf','MasterController@pdfGrafico')->name('graficos.pdf');
	
	
});
