<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\Setting;
use Illuminate\Support\Facades\View;

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
        Paginator::useBootstrap();

        // Share setting data globally
        $setting = Setting::where('id', 1)->first();

        // If no setting exists, create a default one
        if (!$setting) {
            $setting = Setting::create([
                'logo' => 'logo.png',
                'favicon' => 'favicon.png',
                'banner' => 'banner.jpg',
                'ticket_purchase_expire_date' => '2025-12-31',
                'theme_color' => 'e74c3c',
                'copyright' => '© 2025 Event Management. All Rights Reserved.',
            ]);
        }

        View::share('setting_data', $setting);
    }
}
