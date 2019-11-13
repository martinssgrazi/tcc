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

Route::prefix('/{username}/profile')->group(function () {
	Route::get('/', 'ProfileUsersController@show')->name('profile.show');
	Route::put('/edit', 'ProfileUsersController@update')->name('profile.update');
	Route::delete('/', 'ProfileUsersController@destroy')->name('profile.destroy');
});

Route::get('/tutoriais', 'TutorialController@index')
	->middleware('auth')
	->name('tutoriais.index');

Route::get('/tutoriais/create', 'TutorialController@create')
	->name('tutoriais.create')
	->middleware(['auth', 'auth.admin']);

Route::post('/tutoriais', 'TutorialController@store')
	->name('tutoriais.store')
	->middleware(['auth', 'auth.admin']);

Route::get('/tutoriais/{tutorial}', 'TutorialController@show')
	->name('tutoriais.show')
	->middleware('auth');

Route::resource('/tutoriais/{tutorial}/paginas', 'PaginasController')->middleware(['auth']);

Route::namespace('Admin')->prefix('admin')->middleware(['auth', 'auth.admin'])->name('admin.')->group(function(){
	Route::resource('users', 'UserController', ['except' => ['show', 'create', 'store']]);
});