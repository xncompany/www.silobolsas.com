<?php

Route::get('/silobags/{id_silobag}', 'SilobagsController@getById');
Route::get('/silobags/{id_silobag}/devices', 'SilobagsController@getDevices');
Route::get('/users/{id_user}', 'UsersController@getById');
Route::get('/users/{id_user}/lands', 'UsersController@getLands');
Route::get('/lands/{id_land}/silobags', 'LandsController@getSilobags');
Route::get('/devices/{id_device}', 'DevicesController@getById');
Route::get('/devices/{id_device}/metrics', 'DevicesController@getMetrics');
Route::get('/devices/{id_device}/alerts', 'DevicesController@getAlerts');

