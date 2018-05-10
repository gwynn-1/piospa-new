<?php
namespace Modules\Staff\Providers;

use Illuminate\Support\ServiceProvider;

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
    }
}