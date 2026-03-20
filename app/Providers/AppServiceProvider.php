<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

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
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }

        // Auto-setup database if empty or incomplete
        try {
            if (\App\Models\Post::count() !== 18) {
                \Illuminate\Support\Facades\Artisan::call('migrate', ['--force' => true]);
                \Illuminate\Support\Facades\Artisan::call('db:seed', ['--class' => 'Database\Seeders\DefaultDataSeeder', '--force' => true]);
            }
        } catch (\Exception $e) {
            // Silently fail on boot to avoid crashes
        }
    }
   

}
