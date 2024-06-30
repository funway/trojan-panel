<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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
        if (App::environment('local')) {
            // 当前是在开发环境
            // Log every database query.
            DB::listen(function ($query) {
                Log::info($query->sql, 
                    ['binding'=>$query->bindings, 'time'=>$query->time]);
            });
        }

        if (App::environment('production')) {
            // 当前是生产环境
        }
    }
}
