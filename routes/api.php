<?php


//Auth Routes
Route::post('auth/login', 'Auth\LoginController@login');

Route::get('auth/me', 'Auth\MeController@getMe')->middleware('auth:api');

Route::post('auth/logout' , 'Auth\LogoutController@logout')->middleware('auth:api');

//Admin 

Route::get('users', 'UserController@getUsers')->middleware(['auth:api', 'permission:see users']);

Route::get('/user/{id}', 'UserController@getUser')->middleware(['auth:api', 'permission:edit user']);

Route::post('/user/{id}', 'UserController@editUser')->middleware(['auth:api', 'permission:edit user']);

Route::get('roles', 'RoleController@getRoles')->middleware(['auth:api', 'permission:see roles']);

Route::post('role', 'RoleController@postRole')->middleware(['auth:api', 'permission:add role']);

Route::get('role/{id}', 'RoleController@getRole')->middleware(['auth:api', 'permission:edit role']);

Route::post('role/{id}', 'RoleController@editRole')->middleware(['auth:api', 'permission:edit role']);

Route::get('allRoleNames', 'RoleController@getAllRoleName')->middleware('auth:api');

Route::get('/permissions', 'PermissionController@getPermissionsName')->middleware('auth:api');
