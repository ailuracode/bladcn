<?php

namespace AiluraCode\BladCN;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use AiluraCode\BladCN\Components\Button;
use AiluraCode\BladCN\Components\Input;
use AiluraCode\BladCN\Components\Card;

/**
 * BladCN Service Provider
 *
 * Registers all styled components from BladCN.
 * Components are NOT exposed to Laravel directly.
 * They are only accessible within the BladCN ecosystem.
 */
class BladCNServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Service provider registration logic
    }

    /**
     * Bootstrap any application services.
     *
     * Registers all BladCN components with private namespace.
     * Only <x-bladcn:*> prefix is exposed, not underlying BlaseUI components.
     */
    public function boot(): void
    {
        $this->loadViewsFrom(
            __DIR__ . '/../resources/views',
            'bladcn'
        );

        // Register styled components with 'bladcn:' prefix
        // BlaseUI components remain internal and not directly accessible
        Blade::component(Button::class, 'bladcn:button');
        Blade::component(Input::class, 'bladcn:input');
        Blade::component(Card::class, 'bladcn:card');

        // Publish views (optional)
        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/bladcn'),
        ], 'bladcn-views');
    }
}
