<?php

namespace App\Providers;

use App\DDD\Application\Company\Repository\CompanyRepoInterface;
use Illuminate\Support\ServiceProvider;

class RepoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            CompanyRepoInterface::class,
            \App\DDD\Infrastructure\Repository\CompanyRepo::class
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
