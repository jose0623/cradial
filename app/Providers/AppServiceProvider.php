<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\ReporteItem;
use App\Observers\ReporteItemObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        ReporteItem::observe(ReporteItemObserver::class);
    }
}
