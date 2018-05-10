<?php


Route::get('/login', function () {
    return view('login');
})->name('login');


Route::post('/login', 'UsersController@login');


Route::middleware(['auth'])->group(function () {

	# ======= Dashboard
	Route::get('/', 'HomeController@list')->name('home');

	# ======= Configuration

	Route::get('/configurations', 'ConfigurationsController@list');
	Route::post('/configurations', 'ConfigurationsController@update');

	# ======= Lands

	Route::get('/lands', 'LandsController@list');
	Route::get('/lands/{id_land}', 'SilobagsController@listByLand');
	Route::post('/lands', 'LandsController@create');
	Route::delete('/lands/{id_land}', 'LandsController@delete');

	# ======= Silobags

	Route::get('/silobags', 'SilobagsController@list');
	Route::post('/silobags', 'SilobagsController@create');
	Route::delete('/silobags/{id_silobag}', 'SilobagsController@delete');

	# ======= Organizations

	Route::get('/organizations', 'OrganizationsController@list');
	Route::get('/organizations/{id_organization}', 'OrganizationsController@get');
	Route::post('/organizations', 'OrganizationsController@create');
	Route::delete('/organizations/{id_organization}', 'OrganizationsController@delete');

	# ======= Devices

	Route::get('/spears', 'DevicesController@list');
	Route::post('/spears', 'DevicesController@create');
	Route::delete('/spears/{id_device}', 'DevicesController@delete');
	Route::get('/spears/{id_device}', 'DevicesController@get');

	# ======= Alerts

	Route::get('/alerts', 'AlertsController@list');

	# ======= User

	Route::get('/users', 'UsersController@users');
	Route::post('/users', 'UsersController@create');
	Route::delete('/users/{id_user}', 'UsersController@delete');

	Route::post('/password', 'UsersController@resetPassword');

	Route::get('/logout', 'UsersController@logout');

});