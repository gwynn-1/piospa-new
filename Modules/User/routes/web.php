<?php

Route::group(['middleware' => ['web', 'auth'], 'prefix' => 'user', 'namespace' => 'Modules\User\Http\Controllers'], function()
{
    Route::get('/', 'IndexController@indexAction')->name('user');
    Route::post('/list', 'IndexController@listAction')->name('user.list');
    Route::post('/remove/{id}', 'IndexController@removeAction')->name('user.remove');
    Route::get('/add', 'IndexController@addAction')->name('user.add');
    Route::post('/add', 'IndexController@submitAddAction')->name('user.submitadd');
});

Route::group(['middleware' => ['web'], 'namespace' => 'Modules\User\Http\Controllers'], function()
{
    Route::match(['get', 'post'], '/login', 'LoginController@indexAction')->name('login');
    Route::match(['get'], '/logout', 'LoginController@logoutAction')->name('logout');
});
