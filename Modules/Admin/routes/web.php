<?php

//$this->app['router']->aliasMiddleware('scopes',\Modules\Admin\Http\Middleware\Cors::class);
//anh update code anh sinh thu xem

Route::group(['middleware' => ['web', 'auth'], 'prefix' => 'admin', 'namespace' => 'Modules\Admin\Http\Controllers'], function () {
    Route::get('/', 'AdminController@indexAction')->name('admin');
    // SERVICE GROUP
    Route::group(['prefix' => 'service-group'], function () {
        Route::get('/', 'ServiceGroupController@indexAction')->name('service-group');
        Route::post('change-status', 'ServiceGroupController@changeStatusAction')->name('service-group.change-status');
        Route::post('list', 'ServiceGroupController@listAction')->name('service-group.list');
        Route::post('remove/{id}', 'ServiceGroupController@removeAction')->name('service-group.remove');
        Route::get('add', 'ServiceGroupController@addAction')->name('service-group.add');
        Route::post('add', 'ServiceGroupController@submitAddAction')->name('service-group.add');
        Route::get('edit/{service_group_id}', 'ServiceGroupController@editAction')->name('service-group.edit');
        Route::post('edit/{service_group_id}', 'ServiceGroupController@submitEditAction')->name('service-group.edit');
        Route::get('form-service-group/{id}', 'ServiceGroupController@formSaveAction')->name('service-group.form-service-group');
    });

    // SERVICE GROUP
    Route::group(['prefix' => 'customer-source'], function () {
        Route::get('/', 'CustomerSourceController@indexAction')->name('customer-source');
        Route::post('change-status', 'CustomerSourceController@changeStatusAction')->name('customer-source.change-status');
        Route::post('list', 'CustomerSourceController@listAction')->name('customer-source.list');
        Route::post('remove/{id}', 'CustomerSourceController@removeAction')->name('customer-source.remove');
        Route::get('add', 'CustomerSourceController@addAction')->name('customer-source.add');
        Route::post('add', 'CustomerSourceController@submitAddAction')->name('customer-source.add');
        Route::get('edit/{customer_source_id}', 'CustomerSourceController@editAction')->name('customer-source.edit');
        Route::post('edit/{customer_source_id}', 'CustomerSourceController@submitEditAction')->name('customer-source.edit');
    });
    // SERVICE PACKAGE
    Route::group(['prefix' => 'service-package'], function () {
        Route::get('/', 'ServicePackageController@indexAction')->name('service-package');
        Route::post('change-status', 'ServicePackageController@changeStatusAction')->name('service-package.change-status');
        Route::post('list', 'ServicePackageController@listAction')->name('service-package.list');
        Route::post('remove/{id}', 'ServicePackageController@removeAction')->name('service-package.remove');
        Route::get('add', 'ServicePackageController@addAction')->name('service-package.add');
        Route::post('add', 'ServicePackageController@submitAddAction')->name('service-package.add');
        Route::get('edit/{service_package_id}', 'ServicePackageController@editAction')->name('service-package.edit');
        Route::post('edit/{service_package_id}', 'ServicePackageController@submitEditAction')->name('service-package.edit');
    });
    // SERVICE TYPE
    Route::group(['prefix' => 'service-type'], function () {
        Route::get('/', 'ServiceTypeController@indexAction')->name('service-type');
        Route::post('change-status', 'ServiceTypeController@changeStatusAction')->name('service-type.change-status');
        Route::post('list', 'ServiceTypeController@listAction')->name('service-type.list');
        Route::post('remove/{id}', 'ServiceTypeController@removeAction')->name('service-type.remove');
        Route::get('add', 'ServiceTypeController@addAction')->name('service-type.add');
        Route::post('add', 'ServiceTypeController@submitAddAction')->name('service-type.add');
        Route::get('edit/{service_type_id}', 'ServiceTypeController@editAction')->name('service-type.edit');
        Route::post('edit/{service_type_id}', 'ServiceTypeController@submitEditAction')->name('service-type.edit');
    });

    // PRODUCT UNIT
    Route::group(['prefix' => 'product-unit'], function () {
        Route::get('/', 'ProductUnitController@indexAction')->name('product-unit');
        Route::post('list', 'ProductUnitController@listAction')->name('product-unit.list');
        Route::post('remove/{id}', 'ProductUnitController@removeAction')->name('product-unit.remove');
        Route::get('add', 'ProductUnitController@addAction')->name('product-unit.add');
        Route::post('add', 'ProductUnitController@submitAddAction')->name('product-unit.submitadd');
        Route::get('edit/{id}', 'ProductUnitController@editAction')->name('product-unit.edit');
        Route::post('edit/{id}', 'ProductUnitController@submitEditAction')->name('product-unit.submitedit');
        Route::post('change-status', 'ProductUnitController@changeStatusAction')->name('product-unit.change-status');
    });

    // CUSTOMER GROUP
    Route::group(['prefix' => 'customer-group'], function () {
        Route::get('/', 'CustomerGroupController@indexAction')->name('customer-group');
        Route::post('change-status', 'CustomerGroupController@changeStatusAction')->name('customer-group.change-status');
        Route::post('list', 'CustomerGroupController@listAction')->name('customer-group.list');
        Route::post('remove/{id}', 'CustomerGroupController@removeAction')->name('customer-group.remove');
        Route::get('add', 'CustomerGroupController@addAction')->name('customer-group.add');
        Route::post('add', 'CustomerGroupController@submitAddAction')->name('customer-group.add');
        Route::get('edit/{customer_group_id}', 'CustomerGroupController@editAction')->name('customer-group.edit');
        Route::post('edit/{customer_group_id}', 'CustomerGroupController@submitEditAction')->name('customer-group.edit');
    });

    //PRODUCT ORIGIN
    Route::group(['prefix' => 'product-origin'], function () {

        Route::get('/', 'ProductOriginController@indexAction')->name('admin.product-origin');
        Route::post('list', 'ProductOriginController@listAction')->name('admin.product-origin.list');
        Route::post('remove/{id}', 'ProductOriginController@removeAction')->name('admin.product-origin.remove');

        Route::get('add', 'ProductOriginController@addAction')->name('admin.product-origin.add');
        Route::post('add', 'ProductOriginController@submitAddAction')->name('admin.product-origin.submitadd');

        Route::get('edit/{id}', 'ProductOriginController@editAction')->name('admin.product-origin.edit');
        Route::post('edit/{id}', 'ProductOriginController@submitEditAction')->name('admin.product-origin.submitedit');

        Route::post('change-status', 'ProductOriginController@changeStatusAction')->name('admin.product-origin.change-status');
    });


    // PRODUCT LABEL
    Route::group(['prefix' => 'product-label'], function () {
        Route::get('/', 'ProductLabelController@indexAction')->name('admin.product-label');
        Route::post('list', 'ProductLabelController@listAction')->name('admin.product-label.list');
        Route::post('remove/{id}', 'ProductLabelController@removeAction')->name('admin.product-label.remove');
        Route::get('add', 'ProductLabelController@addAction')->name('admin.product-label.add');
        Route::post('add', 'ProductLabelController@submitAddAction')->name('admin.product-label.submitadd');
        Route::post('change-status', 'ProductLabelController@changeStatusAction')->name('admin.product-label.change-status');
        Route::get('edit/{id}', 'ProductLabelController@editAction')->name('admin.product-label.edit');
        Route::post('edit/{id}', 'ProductLabelController@submitEditAction')->name('admin.product-label.submitedit');
    });

    //STAFF TITLE
    Route::group(['prefix' => 'staff-title'], function () {
        Route::get('/', 'StaffTitleController@indexAction')->name('admin.staff-title');
        Route::post('list', 'StaffTitleController@listAction')->name('admin.staff-title.list');

        Route::post('remove/{id}', 'StaffTitleController@removeAction')->name('admin.staff-title.remove');
        Route::get('add', 'StaffTitleController@addAction')->name('admin.staff-title.add');
        Route::post('add', 'StaffTitleController@submitAddAction')->name('admin.staff-title.submitadd');
        Route::get('edit/{id}', 'StaffTitleController@editAction')->name('admin.staff-title.edit');
        Route::post('edit/{id}', 'StaffTitleController@submitEditAction')->name('admin.staff-title.submitedit');
        Route::post('change-status', 'StaffTitleController@changeStatusAction')->name('admin.staff-title.change-status');
    });
    //Order Payment Type
    Route::group(['prefix' => 'order-payment-type'], function () {
        Route::get('/', 'OrderPaymentTypeController@indexAction')->name('order-payment-type');
        Route::post('change-status', 'OrderPaymentTypeController@changeStatusAction')->name('order-payment-type.change-status');
        Route::post('list', 'OrderPaymentTypeController@listAction')->name('order-payment-type.list');
        Route::post('remove/{id}', 'OrderPaymentTypeController@removeAction')->name('order-payment-type.remove');
        Route::get('add', 'OrderPaymentTypeController@addAction')->name('order-payment-type.add');
        Route::post('add', 'OrderPaymentTypeController@submitAddAction')->name('order-payment-type.add');
        Route::get('edit/{id}', 'OrderPaymentTypeController@editAction')->name('order-payment-type.edit');
        Route::post('edit/{id}', 'OrderPaymentTypeController@submitEditAction')->name('order-payment-type.edit');
    });

    //PRODUCT GROUP
    Route::group(['prefix' => 'product-group'], function () {


        Route::get('/', 'ProductGroupController@indexAction')->name('product-group');
        Route::post('list', 'ProductGroupController@listAction')->name('product-group.list');
        Route::post('remove/{id}', 'ProductGroupController@removeAction')->name('product-group.remove');
        Route::get('add', 'ProductGroupController@addAction')->name('product-group.add');
        Route::post('add', 'ProductGroupController@submitaddAction')->name('product-group.submitadd');
        Route::get('edit/{id}', 'ProductGroupController@editAction')->name('product-group.edit');
        Route::post('edit/{id}', 'ProductGroupController@submitEditAction')->name('product-group.submitedit');
        Route::post('change-status', 'ProductGroupController@changeStatusAction')->name('product-group.change-status');
        Route::post('uphinhnhoaz', 'ProductGroupController@uploadsAction')->name('product-group.upload');
        Route::post('xoahinh', 'ProductGroupController@xoahinhAction')->name('product-group.xoahinh');
    });


    Route::group(['prefix' => 'member-level'], function () {

        Route::get('/', 'MemberLevelController@indexAction')->name('member-level');
        Route::post('list', 'MemberLevelController@listAction')->name('member-level.list');
        Route::post('remove/{id}', 'MemberLevelController@removeAction')->name('member-level.remove');
        Route::get('add', 'MemberLevelController@addAction')->name('member-level.add');
        Route::post('add', 'MemberLevelController@submitaddAction')->name('member-level.submitadd');
        Route::get('edit/{id}', 'MemberLevelController@editAction')->name('member-level.edit');
        Route::post('edit/{id}', 'MemberLevelController@submitEditAction')->name('member-level.submitedit');
        Route::post('change-status', 'MemberLevelController@changeStatusAction')->name('member-level.change-status');
    });


    Route::group(['prefix' => 'order-delivery-status'], function () {

        Route::get('/', 'OrderDeliveryStatusController@indexAction')->name('order-delivery-status');
        Route::post('list', 'OrderDeliveryStatusController@listAction')->name('order-delivery-status.list');
        Route::post('remove/{id}', 'OrderDeliveryStatusController@removeAction')->name('order-delivery-status.remove');
        Route::get('add', 'OrderDeliveryStatusController@addAction')->name('order-delivery-status.add');
        Route::post('add', 'OrderDeliveryStatusController@submitaddAction')->name('order-delivery-status.submitadd');
        Route::get('edit/{id}', 'OrderDeliveryStatusController@editAction')->name('order-delivery-status.edit');
        Route::post('edit/{id}', 'OrderDeliveryStatusController@submitEditAction')->name('order-delivery-status.submitedit');
        Route::post('change-status', 'OrderDeliveryStatusController@changeStatusAction')->name('order-delivery-status.change-status');
    });

    //ODER STATUS
    Route::group(['prefix' => 'order-status'], function () {
        Route::get('/', 'OrderStatusController@indexAction')->name('admin.order-status');
        Route::post('list', 'OrderStatusController@listAction')->name('admin.order-status.list');

        Route::post('remove/{id}', 'OrderStatusController@removeAction')->name('admin.order-status.remove');
        Route::get('add', 'OrderStatusController@addAction')->name('admin.order-status.add');
        Route::post('add', 'OrderStatusController@submitAddAction')->name('admin.order-status.submitadd');
        Route::get('edit/{id}', 'OrderStatusController@editAction')->name('admin.order-status.edit');
        Route::post('edit/{id}', 'OrderStatusController@submitEditAction')->name('admin.order-status.submitedit');
        Route::post('change-status', 'OrderStatusController@changeStatusAction')->name('admin.order-status.change-status');
        Route::post('export', 'OrderStatusController@exportAction')->name('admin.order-status.export');
        Route::post('import', 'OrderStatusController@importAction')->name('admin.order-status.import');
    });

    // ORDER REASON CANCEL
    Route::group(['prefix' => 'order-reason-cancel'], function () {
        Route::get('/', 'OrderReasonCancelController@indexAction')->name('admin.order-reason-cancel');
        Route::post('list', 'OrderReasonCancelController@listAction')->name('admin.order-reason-cancel.list');
        Route::post('change-status', 'OrderReasonCancelController@changeStatusAction')->name('admin.order-reason-cancel.change-status');
        Route::get('add', 'OrderReasonCancelController@addAction')->name('admin.order-reason-cancel.add');
        Route::post('add', 'OrderReasonCancelController@submitAddAction')->name('admin.order-reason-cancel.submitadd');
        Route::get('edit/{order_reason_cancel_id}', 'OrderReasonCancelController@editAction')->name('admin.order-reason-cancel.edit');
        Route::post('edit/{order_reason_cancel_id}', 'OrderReasonCancelController@submitEditAction')->name('admin.order-reason-cancel.submitedit');
        Route::post('remove/{id}', 'OrderReasonCancelController@removeAction')->name('admin.order-reason-cancel.remove');
        Route::get('import-excel', 'OrderReasonCancelController@importExcelAction')->name('admin.oder-reason-cancel.import-excel');
        Route::post('import', 'OrderReasonCancelController@submitImportExcelAction')->name('admin.order-reason-cancel.submit-import-excel');
        Route::get('export-excel', 'OrderReasonCancelController@exportAction')->name('admin.order-reason-cancel.submit-export-excel');
    });

    //MEMBER LEVEL VERB
    Route::group(['prefix' => 'member-level-verb'], function () {
        Route::get('/', 'MemberLevelVerbController@indexAction')->name('admin.member-level-verb');
        Route::post('list', 'MemberLevelVerbController@listAction')->name('admin.member-level-verb.list');
        Route::post('change-status', 'MemberLevelVerbController@changeStatusAction')->name('admin.member-level-verb.change-status');
        Route::get('add', 'MemberLevelVerbController@addAction')->name('admin.member-level-verb.add');
        Route::post('add', 'MemberLevelVerbController@submitAddAction')->name('admin.member-level-verb.submitadd');
        Route::get('edit/{id}', 'MemberLevelVerbController@editAction')->name('admin.member-level-verb.edit');
        Route::post('edit/{id}', 'MemberLevelVerbController@submitEditAction')->name('admin.member-level-verb.submitedit');
        Route::post('remove/{id}','MemberLevelVerbController@removeAction')->name('admin.member-level-verb.remove');
        Route::post('export-excel','MemberLevelVerbController@exportExcelAction')->name('admin.member-level-verb.export-excel');
    });

    //STAFF DEPARTMENT
    Route::group(['prefix'=>'staff-department'],function (){
        Route::get('/', 'StaffDepartmentController@indexAction')->name('admin.staff-department');
        Route::post('list','StaffDepartmentController@listAction')->name('admin.staff-department.list');
        Route::post('change-status','StaffDepartmentController@changeStatusAction')->name('admin.staff-department.change-status');
        Route::get('add','StaffDepartmentController@addAction')->name('admin.staff-department.add');
        Route::post('add','StaffDepartmentController@submitAddAction')->name('admin.staff-department.submitadd');
        Route::get('edit/{id}','StaffDepartmentController@editAction')->name('admin.staff-department.edit');
        Route::post('edit/{id}','StaffDepartmentController@submitEditAction')->name('admin.staff-department.submitedit');
        Route::post('remove/{id}','StaffDepartmentController@removeAction')->name('admin.staff-department.remove');
    });

    //STORE
    Route::group(['prefix' => 'store'], function () {
        Route::get('/','StoreController@indexAction')->name('admin.store');
        Route::post('list','StoreController@listAction')->name('admin.store.list');

        Route::post('uploads','StoreController@uploadsAction')->name('admin.store.uploads');
        Route::post('deleteImage','StoreController@deleteTempFileAction')->name('admin.store.delete');

        Route::post('change-province','DistrictController@changeProvinceAction')->name('admin.store.change-province');
        Route::post('change-district','WardController@changeDistrictAction')->name('admin.store.change-district');
        Route::get('add','StoreController@addAction')->name('admin.store.add');
        Route::post('add','StoreController@submitAddAction')->name('admin.store.submitAdd');
        Route::post('remove/{id}','StoreController@removeAction')->name('admin.store.remove');
        Route::get('edit/{id}','StoreController@editAction')->name('admin.store.edit');
        Route::post('edit/{id}','StoreController@submitEditAction')->name('admin.store.submitedit');
        Route::post('change-status','StoreController@changeStatusAction')->name('admin.store.change-status');

        Route::post('export','StoreController@exportAction')->name('admin.store.export');

        Route::get('import','StoreController@importAction')->name('admin.store.import');
        Route::post('import','StoreController@submitImportAction')->name('admin.store.submitimport');
    });

    //TAX
    Route::group(['prefix' => 'tax'], function () {
        Route::get('/','TaxController@indexAction')->name('admin.tax');
        Route::post('list','TaxController@listAction')->name('admin.tax.list');
        Route::post('deleteImage','TaxController@deleteTempFileAction')->name('admin.tax.delete');
        Route::get('add','TaxController@addAction')->name('admin.tax.add');
        Route::post('add','TaxController@submitAddAction')->name('admin.tax.submitAdd');
        Route::post('remove/{id}','TaxController@removeAction')->name('admin.tax.remove');
        Route::get('edit/{id}','TaxController@editAction')->name('admin.tax.edit');
        Route::post('edit/{id}','TaxController@submitEditAction')->name('admin.tax.submitedit');
        Route::post('change-status','TaxController@changeStatusAction')->name('admin.tax.change-status');
        Route::get('export', 'TaxController@exportAction')->name('admin.tax.export');
        Route::get('import','TaxController@importAction')->name('admin.tax.import');
        Route::post('import', 'TaxController@submitImportAction')->name('admin.tax.submitimport');
    });

    Route::group(['prefix'=>'appointment'],function (){
        Route::get("/",'AppointmentController@indexAction')->name("admin.appointment");
        Route::post("/edit","AppointmentController@editAction")->name("admin.appointment.edit");
    });

});



