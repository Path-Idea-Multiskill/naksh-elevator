<?php

namespace App\Providers;
use App\Models\ElevatorType;
use App\Models\WebsiteSetting;
use Illuminate\Support\Facades\View;

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
        View::composer(
            'frontend.*',
            function ($view) {

                $settings =
                    WebsiteSetting::first();

                $footerElevatorTypes =
                    ElevatorType::where('status', true)
                        ->orderBy('name')
                        ->take(5)
                        ->get();

                $view->with([
                    'settings' => $settings,
                    'footerElevatorTypes' =>
                        $footerElevatorTypes,
                ]);
            }
        );
    }
}
