<?php

Route::group(['middleware' =>  ['web', 'auth'], 'prefix' => 'customer', 'namespace' => 'Modules\Customer\Http\Controllers'], function()
{
    Route::get('/', 'CustomerController@indexAction');

    Route::group(['prefix' => 'customer'], function () {

        Route::get('/', 'CustomerController@indexAction')->name('customer');
        Route::post('list', 'CustomerController@listAction')->name('customer.list');
        Route::post('remove/{id}', 'CustomerController@removeAction')->name('customer.remove');
        Route::post('change-province','DistrictController@changeProvinceAction')->name('customer.change-province');
        Route::post('change-district','WardController@changeDistrictAction')->name('customer.change-district');
        Route::get('add', 'CustomerController@addAction')->name('customer.add');
        Route::post('add', 'CustomerController@submitaddAction')->name('customer.submitadd');
        Route::get('edit/{id}', 'CustomerController@editAction')->name('customer.edit');
        Route::post('edit/{id}', 'CustomerController@submitEditAction')->name('customer.submitedit');
        Route::post('change-status', 'CustomerController@changeStatusAction')->name('customer.change-status');
        Route::post('uploads', 'CustomerController@uploadsAction')->name('customer.uploads');
    });
});
