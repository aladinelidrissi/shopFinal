<?php

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@logout');

// Registration routes...
Route::get('auth/register', ['as' => 'registerGet', 'uses' => 'Auth\AuthController@getRegister' ]);
Route::post('auth/register', ['as' => 'registerPost', 'uses' => 'Auth\AuthController@postRegister']);

// Administration routes...
Route::get('/admin/users', ['as' => 'usersList', 'uses' =>'UserControl@usersIndex']);
Route::get('/admin/user/new', 'UserControl@newUser');
Route::get('/admin/user/delete/{id}', 'UserControl@deleteUser');
Route::get('/admin/user/edit/{id}', 'UserControl@editUser');
Route::get('/admin/product/new', 'ProductControl@newProduct');
Route::get('/admin/products', 'ProductControl@index');
Route::get('/admin/product/destroy/{id}', 'ProductControl@destroy');
Route::post('/admin/product/save', 'ProductControl@add');

// Other routes...
Route::get('/', 'MainControl@index');

