<?php

declare(strict_types=1);

namespace AiluraCode\Bladcn;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

final class BladcnServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Blade::anonymousComponentPath(__DIR__.'/../resources/views', 'bladcn');

        Route::get('/bladcn/bladcn.js', fn () => response()->file(
            __DIR__.'/../resources/js/bladcn.js',
            ['Content-Type' => 'application/javascript'],
        ))->name('bladcn.scripts');

        Blade::directive('bladcnScripts', fn (): string => '
                <!-- Bladcn Scripts -->
                <script src="<?php echo e(route(\'bladcn.scripts\')); ?>"></script>
                <?php echo $__env->yieldPushContent(\'bladcn-scripts\'); ?>
                ');

        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/bladcn'),
        ], 'bladcn-views');
    }
}
