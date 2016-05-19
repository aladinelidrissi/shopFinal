<?php

Route::get('/admin/product/new', 'ProductControl@newProduct');
Route::get('/admin/products', 'ProductControl@index');
Route::get('/admin/product/destroy/{id}', 'ProductControl@destroy');
Route::post('/admin/product/save', 'ProductControl@add');
Route::get('/', 'MainControl@index');
