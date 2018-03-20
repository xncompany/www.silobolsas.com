<?php

Route::get('/', 'HomeController@getIndex');
Route::get('/lands', function () {
    return view('lands');
});
Route::get('/silobags', function () {
    return view('silobags');
});
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
Route::get('/lands/{id_land}/silobags', 'LandsController@getSilobags');
Route::get('/devices/{id_device}', 'DevicesController@getById');
Route::get('/devices/{id_device}/metrics', 'DevicesController@getMetrics');
Route::get('/devices/{id_device}/alerts', 'DevicesController@getAlerts');

