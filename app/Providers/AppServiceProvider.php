<?php

namespace App\Providers;

use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;
use League\CommonMark\CommonMarkConverter;
use League\CommonMark\Environment\Environment;
use League\CommonMark\Extension\CommonMark\CommonMarkCoreExtension;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(CommonMarkConverter::class, function () {
            $environment = new Environment([
                'commonmark' => [
                    'renderer' => [
                        'soft_break' => "<br />\n", // Converts newlines to <br>
                    ],
                ],
            ]);

            $environment->addExtension(new CommonMarkCoreExtension());

            return new CommonMarkConverter([], $environment);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Vite::prefetch(concurrency: 3);
    }
}
