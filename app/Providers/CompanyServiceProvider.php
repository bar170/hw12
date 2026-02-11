<?php

namespace App\Providers;

use App\DDD\Application\Company\Service\CompanyServiceInterface;
use Illuminate\Support\ServiceProvider;

class CompanyServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind (
            CompanyServiceInterface::class,
            \App\DDD\Application\Company\Service\CompanyService::class
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
