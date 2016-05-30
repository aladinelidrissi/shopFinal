<?php
// Main route...
Route::get('/', 'MainControl@index');
Route::get('/description/{productId}', 'ProductControl@showDescription');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@logout');

// Registration routes...
Route::get('auth/register', ['as' => 'registerGet', 'uses' => 'Auth\AuthController@getRegister' ]);
Route::post('auth/register', ['as' => 'registerPost', 'uses' => 'Auth\AuthController@postRegister']);

// Administration routes...
// Admin's users routes...
Route::get('/admin/users', ['as' => 'usersList', 'uses' =>'UserControl@usersIndex']);
Route::get('/admin/user/new', 'UserControl@newUser');
Route::get('/admin/user/delete/{id}', 'UserControl@deleteUser');
Route::get('/admin/user/edit/{id}', 'UserControl@editUser');
// Admin's products routes...
Route::get('/admin/product/new', 'ProductControl@newProduct');
Route::get('/admin/products', 'ProductControl@index');
Route::get('/admin/product/destroy/{id}', 'ProductControl@destroy');
Route::post('/admin/product/save', 'ProductControl@add');
Route::post('/admin/product/edit/{id}', 'ProductControl@editProduct');

// User routes...
Route::get('/user/edit', 'UserControl@goEdit');
Route::post('/user/edit/save/{id}', 'UserControl@selfEdit');

//Trolley routes...
Route::get('/addProduct/{productId}', 'TrolleyControl@addItem');
Route::get('/removeItem/{productId}', 'TrolleyControl@removeItem');
Route::get('/trolley', 'TrolleyControl@showTrolley');

//Charge routes...
Route::post('/checkout', 'ChargeControl@checkout');
Route::get('charge/{chargeId}', 'ChargeControl@showCharge');
Route::get('charge', 'ChargeControl@index');
Route::get('download/{chargeId}/{filename}', 'ChargeControl@download');

