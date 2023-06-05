<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void{
      
        $this->app->bind(
            'App\Repositories\Contracts\AuthRepositoryInterface',
            'App\Repositories\Eloquent\Auth\AuthRepository'
          );
       $this->app->bind(
          'App\Repositories\Contracts\UserReadRepositoryInterface',
          'App\Repositories\Eloquent\UserRepository'
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
