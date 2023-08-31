<?php

namespace App\Providers;

use Illuminate\Pagination\PaginationServiceProvider;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
// use Nette\Utils\Paginator;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);
        Paginator::useBootstrapFive();
    }
}
