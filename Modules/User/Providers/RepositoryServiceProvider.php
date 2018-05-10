<?php
namespace Modules\User\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\User\Repositories\User\UserRepositoryInterface;
use Modules\User\Repositories\User\UserRepository;

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
        $this->app->singleton(UserRepositoryInterface::class, UserRepository::class);
    }
}