<?php



Route::post('/register',               'Auth\AuthController@register');
Route::post('/login',                  'Auth\AuthController@login');



Route::post('/logout',                 'Auth\AuthController@logout');
Route::get('/user',                    'Auth\AuthController@user');



Route::post('shop_store',              'ShopController@store');

Route::put('shop_put_selection',       'ShopController@put_selection');

Route::delete('shop_destroy/{id}',      'ShopController@destroy');

Route::get('shop',                      'ShopController@get_all');
Route::get('shop_show/{id}',            'ShopController@show');
Route::get('shop_get_filter',           'ShopController@get_filter');
Route::get('shop_get_selection',        'ShopController@get_selection');



Route::get('log',                       'LogController@index');
