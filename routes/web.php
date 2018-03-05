<?php

Route::get('/silobags/{id_silobag}', 'SilobagsController@getById');
Route::get('/users/{id_user}/lands', 'UsersController@getLands');

