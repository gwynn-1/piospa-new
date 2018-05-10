<?php

Route::group(['middleware' =>  ['web', 'auth'], 'prefix' => 'staff', 'namespace' => 'Modules\Staff\Http\Controllers'], function()
{
    Route::get('/', 'StaffController@indexAction')->name("staff");
});
