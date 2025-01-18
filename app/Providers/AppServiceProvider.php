<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Filament\Support\Facades\FilamentIcon;
use Filament\Navigation\NavigationGroup;
use Filament\Navigation\MenuItem;
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
        FilamentIcon::register([
            'panels::pages.dashboard.navigation-item' => 'heroicon-s-home', // Ikon pencarian
        ]);
    }

}
