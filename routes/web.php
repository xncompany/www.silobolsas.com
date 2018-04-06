<?php

Route::get('/', 'HomeController@list');

# Lands

Route::get('/lands', 'LandsController@list');
Route::post('/lands', 'LandsController@create');
Route::delete('/lands/{id_land}', 'LandsController@delete');

# Silobags
Route::get('/silobags', 'SilobagsController@list');
Route::post('/silobags', 'SilobagsController@create');
Route::delete('/silobags/{id_silobag}', 'SilobagsController@delete');

# Devices
Route::get('/spears', 'DevicesController@list');
Route::post('/spears', 'DevicesController@create');
Route::delete('/spears/{id_device}', 'DevicesController@delete');
Route::get('/spears/{id_device}', 'DevicesController@get');

# Alerts
Route::get('/alerts', 'AlertsController@list');

# User
Route::get('/logout', function () {
	return redirect('/login');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});