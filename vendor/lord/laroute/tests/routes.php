<?php

//Route::get('/hello', function () {
//    return 'hello';
//});
//
//Route::get('/', [
//    'as'   => 'home',
//    'uses' => 'HomeController@product-group',
//]);
//
//Route::get('/away/{somewhere}', [
//    'as'   => 'away',
//    'uses' => 'AwayController@somewhere',
//]);
//
//Route::get('/away/{somewhere}/very/{exotic}', [
//    'as'   => 'exotic',
//    'uses' => 'AwayController@exotic',
//]);
//
//
//Route::get('/ignored', [
//    'laroute' => false,
//    'as'      => 'ignored',
//    'uses'    => 'IgnoredController@product-group',
//]);
//
//Route::group(['prefix' => '/group'], function () {
//    Route::get('{group}', 'GroupController@product-group');
//});
//
//Route::group(['laroute' => false], function () {
//    Route::get('ignored', [
//        'as'   => 'group.ignored',
//        'uses' => 'IgnoredController@product-group'
//    ]);
//});
//
//Route::group(['prefix' => 'group/{group}'], function () {
//    Route::resource('resource/{resource}', 'GroupResourceController');
//});
