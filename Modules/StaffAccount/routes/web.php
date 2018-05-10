<?php

Route::group(['middleware' => ['web', 'auth'], 'prefix' => 'staff-account', 'namespace' => 'Modules\StaffAccount\Http\Controllers'], function()
{
    Route::get('/', 'StaffAccountController@index')->name('staff-account');
    //STAFF ACCOUNT

    Route::group(['prefix' => 'staff-account'], function () {

        Route::get('/', 'StaffAccountController@indexAction')->name('staff-account');
        Route::post('list', 'StaffAccountController@listAction')->name('staff-account.list');
        Route::post('remove/{id}', 'StaffAccountController@removeAction')->name('staff-account.remove');
        Route::get('add', 'StaffAccountController@addAction')->name('staff-account.add');
        Route::post('add', 'StaffAccountController@submitaddAction')->name('staff-account.submitadd');
        Route::get('edit/{id}', 'StaffAccountController@editAction')->name('staff-account.edit');
        Route::post('edit/{id}', 'StaffAccountController@submitEditAction')->name('staff-account.submitedit');
        Route::post('change-status', 'StaffAccountController@changeStatusAction')->name('staff-account.change-status');
    });
});






