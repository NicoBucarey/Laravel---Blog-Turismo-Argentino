<?php

namespace App\Providers;

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
        // Log environment for debugging
        \Illuminate\Support\Facades\Log::info('Environment: ' . app()->environment());
        \Illuminate\Support\Facades\Log::info('APP_ENV: ' . env('APP_ENV', 'not-set'));
        
        // Force HTTPS in production - More aggressive approach
        \Illuminate\Support\Facades\URL::forceScheme('https');
        app()->instance('request', app('request')->setTrustedProxies(['*'], \Illuminate\Http\Request::HEADER_X_FORWARDED_ALL));
        
        \Illuminate\Support\Facades\Log::info('HTTPS forced');
    }
   

}
