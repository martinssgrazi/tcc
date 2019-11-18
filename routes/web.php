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
	if(Auth::check()) {
		return redirect()->route('home');
	}

	return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('/{username}/profile')->group(function () {
	Route::get('/', 'ProfileUsersController@show')->name('profile.show');
	Route::put('/edit', 'ProfileUsersController@update')->name('profile.update');
	Route::delete('/', 'ProfileUsersController@destroy')->name('profile.destroy');
});

Route::resource('tutoriais', 'TutorialController', ['parameters' => [
	'tutoriais' => 'tutorial',
]]);

Route::resource('/tutoriais/{tutorial}/paginas', 'PaginasController');

Route::namespace('Admin')->prefix('admin')->middleware(['auth', 'auth.admin'])->name('admin.')->group(function(){
	Route::resource('users', 'UserController', ['except' => ['show', 'create', 'store']]);
});