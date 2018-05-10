<?php
namespace Modules\Customer\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Customer\Repositories\Customer\CustomerRepository;
use Modules\Customer\Repositories\Customer\CustomerRepositoryInterface;
/**
 * Created by PhpStorm.
 * User: WAO
 * Date: 29/03/2018
 * Time: 1:46 SA
 */
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
        //$this->app->singleton(ServiceGroupRepositoryInterface::class, ServiceGroupRepository::class);
        $this->app->singleton(CustomerRepositoryInterface::class,CustomerRepository::class);
    }
}