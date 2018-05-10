<?php

namespace Modules\Admin\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Admin\Models\StoreTable;
use Modules\Admin\Repositories\Appoinment\AppointmentRepository;
use Modules\Admin\Repositories\Appoinment\AppointmentRepositoryInterface;
use Modules\Admin\Repositories\CustomerGroup\CustomerGroupRepository;

use Modules\Admin\Repositories\CustomerSource\CustomerSourceRepository;
use Modules\Admin\Repositories\CustomerSource\CustomerSourceRepositoryInterface;

use Modules\Admin\Repositories\OrderPaymentType\OrderPaymentTypeRepository;
use Modules\Admin\Repositories\OrderPaymentType\OrderPaymentTypeRepositoryInterface;

use Modules\Admin\Repositories\OrderStatus\OrderStatusRepository;
use Modules\Admin\Repositories\OrderStatus\OrderStatusRepositoryInterface;

use Modules\Admin\Repositories\ProductOrigin\ProductOriginRepository;


use Modules\Admin\Repositories\ServiceGroup\ServiceGroupRepository;
use Modules\Admin\Repositories\ServiceGroup\ServiceGroupRepositoryInterface;
use Modules\Admin\Repositories\ServicePackage\ServicePackageRepository;
use Modules\Admin\Repositories\ServicePackage\ServicePackageRepositoryInterface;
use Modules\Admin\Repositories\CustomerGroup\CustomerGroupRepositoryInterface;
use Modules\Admin\Repositories\ServiceType\ServiceTypeRepository;
use Modules\Admin\Repositories\ServiceType\ServiceTypeRepositoryInterface;
use Modules\Admin\Repositories\ProductUnit\ProductUnitRepository;
use Modules\Admin\Repositories\ProductUnit\ProductUnitRepositoryInterface;
use Modules\Admin\Repositories\ProductLabel\ProductLabelRepositoryInterface;
use Modules\Admin\Repositories\ProductLabel\ProductLabelRepository;

use Modules\Admin\Repositories\ProductGroup\ProductGroupRepositoryInterface;
use Modules\Admin\Repositories\ProductGroup\ProductGroupRepository;

use Modules\Admin\Repositories\MemberLevel\MemberLevelRepositoryInterface;
use Modules\Admin\Repositories\MemberLevel\MemberLevelRepository;

use Modules\Admin\Repositories\OrderDeliveryStatus\OrderDeliveryStatusRepositoryInterface;
use Modules\Admin\Repositories\OrderDeliveryStatus\OrderDeliveryStatusRepository;


use Modules\Admin\Repositories\ProductOrigin\ProductOriginRepositoryInterface;
use Modules\Admin\Repositories\Staffs\StaffRepository;
use Modules\Admin\Repositories\Staffs\StaffRepositoryInterface;
use Modules\Admin\Repositories\StaffTitle\StaffTitleRepository;
use Modules\Admin\Repositories\StaffTitle\StaffTitleRepositoryInterface;
use Modules\Admin\Repositories\OrderDeliveryType\OrderDeliveryTypeRepository;
use Modules\Admin\Repositories\OrderDeliveryType\OrderDeliveryTypeRepositoryInterface;
use Modules\Admin\Repositories\OrderReasonCancel\OrderReasonCancelRepositoryInterface;
use Modules\Admin\Repositories\OrderReasonCancel\OrderReasonCancelRepository;
use Modules\Admin\Repositories\Store\StoreRepository;
use Modules\Admin\Repositories\Store\StoreRepositoryInterface;
use Modules\Admin\Repositories\MemberLevelVerb\MemberLevelVerbRepositoryInterface;
use Modules\Admin\Repositories\MemberLevelVerb\MemberLevelVerbRepository;
use Modules\Admin\Repositories\StaffDepartment\StaffDepartmentRepository;
use Modules\Admin\Repositories\StaffDepartment\StaffDepartmentRepositoryInterface;
use Modules\Admin\Repositories\Tax\TaxRepositoryInterface;
use Modules\Admin\Repositories\Tax\TaxRepository;


class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Khai báo cái repository ở đây
        // Khai báo cái repository ở đây
        $this->app->singleton(ServiceGroupRepositoryInterface::class, ServiceGroupRepository::class);
        $this->app->singleton(ServicePackageRepositoryInterface::class, ServicePackageRepository::class);
        $this->app->singleton(ServiceTypeRepositoryInterface::class, ServiceTypeRepository::class);
        $this->app->singleton(ServiceTypeRepositoryInterface::class, ServiceTypeRepository::class);
        $this->app->singleton(ProductUnitRepositoryInterface::class, ProductUnitRepository::class);
        $this->app->singleton(ProductUnitRepositoryInterface::class, ProductUnitRepository::class);
        $this->app->singleton(CustomerSourceRepositoryInterface::class, CustomerSourceRepository::class);
        $this->app->singleton(CustomerGroupRepositoryInterface::class, CustomerGroupRepository::class);
        $this->app->singleton(OrderPaymentTypeRepositoryInterface::class, OrderPaymentTypeRepository::class);
        $this->app->singleton(StaffRepositoryInterface::class, StaffRepository::class);

        //Son
        $this->app->singleton(ProductOriginRepositoryInterface::class, ProductOriginRepository::class);
        $this->app->singleton(StaffTitleRepositoryInterface::class, StaffTitleRepository::class);


        $this->app->singleton(ProductLabelRepositoryInterface::class, ProductLabelRepository::class);
        $this->app->singleton(OrderDeliveryTypeRepositoryInterface::class, OrderDeliveryTypeRepository::class);
        $this->app->singleton(OrderDeliveryTypeRepositoryInterface::class, OrderDeliveryTypeRepository::class);

        $this->app->singleton(OrderDeliveryStatusRepositoryInterface::class, OrderDeliveryStatusRepository::class);
        $this->app->singleton(MemberLevelRepositoryInterface::class, MemberLevelRepository::class);
        $this->app->singleton(ProductGroupRepositoryInterface::class, ProductGroupRepository::class);

        $this->app->singleton(OrderStatusRepositoryInterface::class, OrderStatusRepository::class);
        $this->app->singleton(ProductLabelRepositoryInterface::class, ProductLabelRepository::class);
        $this->app->singleton(OrderReasonCancelRepositoryInterface::class, OrderReasonCancelRepository::class);
        $this->app->singleton(MemberLevelVerbRepositoryInterface::class, MemberLevelVerbRepository::class);
        $this->app->singleton(StaffDepartmentRepositoryInterface::class, StaffDepartmentRepository::class);
        $this->app->singleton(StoreRepositoryInterface::class, StoreRepository::class);

        $this->app->singleton(\Modules\Admin\Repositories\Province\ProvinceRepositoryInterface::class, \Modules\Admin\Repositories\Province\ProvinceRepository::class);
        $this->app->singleton(\Modules\Admin\Repositories\District\DistrictRepositoryInterface::class, \Modules\Admin\Repositories\District\DistrictRepository::class);
        $this->app->singleton(\Modules\Admin\Repositories\Ward\WardRepositoryInterface::class, \Modules\Admin\Repositories\Ward\WardRepository::class);

        //Long
        $this->app->singleton(TaxRepositoryInterface::class, TaxRepository::class);

        //Huy
        $this->app->singleton(AppointmentRepositoryInterface::class, AppointmentRepository::class);
    }
}