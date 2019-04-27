<?php


//Auth Routes
Route::post('auth/login', 'Auth\LoginController@login');

Route::get('auth/me', 'Auth\MeController@getMe')->middleware('auth:api');

Route::post('auth/logout' , 'Auth\LogoutController@logout')->middleware('auth:api');

//Admin 

Route::get('users', 'UserController@getUsers')->middleware(['auth:api', 'permission:see users']);

Route::get('roles', 'RoleController@getRoles')->middleware(['auth:api', 'permission:see roles']);