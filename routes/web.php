<?php

Route::get('/', 'HomeController@getIndex');

# Lands

Route::get('/lands', 'LandsController@list');
Route::post('/lands', 'LandsController@create');
Route::delete('/lands/{id_land}', 'LandsController@delete');

# Silobags
Route::get('/silobags', 'SilobagsController@list');
Route::post('/silobags', 'SilobagsController@create');
Route::delete('/silobags/{id_silobag}', 'SilobagsController@delete');


Route::get('/spears', function () {
    return view('spears');
});
Route::get('/login', function () {
    return view('login');
});
Route::get('/logout', function () {
    return redirect('/login');
});

Route::get('/register', function () {
    return view('register');
});


Route::get('/silobags/{id_silobag}', 'SilobagsController@getById');
Route::get('/silobags/{id_silobag}/devices', 'SilobagsController@getDevices');
Route::get('/users/{id_user}', 'UsersController@getById');
Route::get('/users/{id_user}/lands', 'UsersController@getLands');
Route::get('/lands/{id_land}/silobags', 'LandsController@silobags');
Route::get('/devices/{id_device}', 'DevicesController@getById');
Route::get('/devices/{id_device}/metrics', 'DevicesController@getMetrics');
Route::get('/devices/{id_device}/alerts', 'DevicesController@getAlerts');

