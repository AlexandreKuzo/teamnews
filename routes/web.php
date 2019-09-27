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
Auth::routes();

Route::get('welcome', function () {
		return view('welcome');
	});

Route::get('login', function () {
		return view('login');
	});
Route::get('register', function () {
		return view('register');
	});

Route::get('profil', function () {
		return view('profil');
	});
Route::get('team', function () {
		return view('team');
	});

Route::get('news', function () {
		return view('news');
	});

Route::get('affaires/{id}', function ($id) {
		return $id;
	});

Route::get('developments/{id}', function ($id) {
		return $id;
	});

Route::get('mentions', function () {
		return view('mentions');

	});

Route::get('editArticle', function () {
		return view('editArticle');
	});

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('Auth\LoginController@__construct');

Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('Auth\RegisterController@register');

Route::get('/', 'HomeController@index')->name('home');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profil', 'UserProfileController@show')->middleware('auth')->name('profil.show');
Route::post('/profil', 'UserProfileController@update')->middleware('auth')->name('profil.update');
Route::get('team', 'TeamController@liste')->middleware('auth')->name('team');
Route::get('team.all', 'TeamController@liste')->middleware('auth')->name('team.all');
Route::get('team.affaires', 'TeamController@lookAffaires')->middleware('auth')->name('team.affaires');
Route::get('team.envol', 'TeamController@lookEnvol')->middleware('auth')->name('team.envol');
Route::get('team.reussir', 'TeamController@lookReussir')->middleware('auth')->name('team.reussir');
Route::get('team.inspire', 'TeamController@lookInspire')->middleware('auth')->name('team.inspire');
Route::get('team.development', 'TeamController@lookDevelopment')->middleware('auth')->name('team.development');
Route::get('team.communication', 'TeamController@lookCommunication')->middleware('auth')->name('team.communication');
Route::get('team.empowerment', 'TeamController@lookEmpowerment')->middleware('auth')->name('team.empowerment');
Route::get('/jobupdate', 'JobController@show')->middleware('auth')->name('jobupdate');
Route::post('/jobupdate', 'JobController@jobupdate')->middleware('auth')->name('jobupdate');
Route::get('/news', 'NewsController@show')->middleware('auth')->name('news');
Route::get('/news/{id}', 'NewsController@view')->middleware('auth')->name('news');
Route::post('/news', 'NewsController@write')->middleware('auth')->name('news');
Route::get('delete/news/{id}', 'NewsController@delete')->middleware('auth')->name('delete');
Route::get('/affaires', 'AffairesController@show')->middleware('auth')->name('affaires');
Route::get('affaires.{id}', 'AffairesController@view')->middleware('auth')->name('affaires.{id}');
Route::post('/affaires', 'AffairesController@write')->middleware('auth')->name('affaires');
//Route::get('affaires', 'AffairesController@edit')->middleware('auth')->name('affaires.edit');
//Route::put('update/{id}', 'AffairesController@update')->middleware('auth')->name('edit');
Route::get('delete/affaires/{id}', 'AffairesController@delete')->middleware('auth')->name('delete');
//Route::post('/affaires', 'AffairesController@store')->middleware('auth')->name('affaires.store');
Route::get('/reussites', 'ReussitesController@show')->middleware('auth')->name('reussites');
Route::get('/reussites/{id}', 'ReussitesController@view')->middleware('auth')->name('reussites');
Route::post('/reussites', 'ReussitesController@write')->middleware('auth')->name('reussites');
Route::get('delete/reussites/{id}', 'ReussitesController@delete')->middleware('auth')->name('delete');
Route::get('/inspirations', 'InspirationsController@show')->middleware('auth')->name('inspirations');
Route::get('/inspirations/{id}', 'InspirationsController@view')->middleware('auth')->name('inspirations');
Route::post('/inspirations', 'InspirationsController@write')->middleware('auth')->name('inspirations');
Route::get('delete/inspirations/{id}', 'InspirationsController@delete')->middleware('auth')->name('delete');
Route::get('/envol', 'EnvolController@show')->middleware('auth')->name('envol');
Route::get('/envol/{id}', 'EnvolController@view')->middleware('auth')->name('envol');
Route::post('/envol', 'EnvolController@write')->middleware('auth')->name('envol');
Route::get('delete/envol/{id}', 'EnvolController@delete')->middleware('auth')->name('delete');
Route::get('/developments', 'DevelopmentController@show')->middleware('auth')->name('developments');
Route::get('/developments/{id}', 'DevelopmentController@view')->middleware('auth')->name('developments');
Route::post('/developments', 'DevelopmentController@write')->middleware('auth')->name('developments');
Route::get('delete/developments/{id}', 'DevelopmentController@delete')->middleware('auth')->name('delete');
Route::get('/communication', 'CommunicationController@show')->middleware('auth')->name('communication');
Route::get('/communication/{id}', 'CommunicationController@view')->middleware('auth')->name('communication');
Route::post('/communication', 'CommunicationController@write')->middleware('auth')->name('communication');
Route::get('delete/communication/{id}', 'CommunicationController@delete')->middleware('auth')->name('delete');
Route::get('/empowerments', 'EmpowermentController@show')->middleware('auth')->name('empowerments');
Route::get('/empowerments/{id}', 'EmpowermentController@view')->middleware('auth')->name('empowerments');
Route::post('/empowerments', 'EmpowermentController@write')->middleware('auth')->name('empowerments');
Route::get('delete/empowerments/{id}', 'EmpowermentController@delete')->middleware('auth')->name('delete');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
