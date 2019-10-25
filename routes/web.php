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
  return view('auth.login');
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/verUsuarios', 'UserController@index')->name('index');

// Route::get('/tutoriais', 'TutorialController@index')->name('tutotiais.index');
// Route::get('/tutoriais/create', 'TutorialController@create')->name('tutotiais.create');

Route::get('/tutoriais', 'TutorialController@index')
	->middleware('auth')
	->name('tutoriais.index');
Route::get('/tutoriais/create', 'TutorialController@create')
	->name('tutoriais.create')->middleware(['auth', 'auth.admin']);
Route::post('/tutoriais', 'TutorialController@store')
	->name('tutoriais.store');
Route::get('/tutoriais/criarConteudo', 'TutorialController@criarConteudo')
	->name('tutoriais.criarConteudo')->middleware(['auth', 'auth.admin']);

	
Route::namespace('Admin')->prefix('admin')->middleware(['auth', 'auth.admin'])->name('admin.')->group(function(){
	Route::resource('users', 'UserController', ['except' => ['show', 'create', 'store']]);
});