<?php

namespace App\Providers;

use App\Models\Visitor;
use App\Observers\VisitorObserver;
use Illuminate\Support\ServiceProvider;

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
        Visitor::observe(VisitorObserver::class);


    }
}
