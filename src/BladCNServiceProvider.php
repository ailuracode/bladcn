<?php

namespace AiluraCode\BladCN;

use AiluraCode\BladCN\Components\Button;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\Component;
use AiluraCode\BlaseUi\Enums\Button\Type;

class BladCNServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Blade::component(Button::class, 'bladcn:button');
    }
}
