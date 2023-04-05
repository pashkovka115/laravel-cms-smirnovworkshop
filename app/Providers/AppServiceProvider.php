<?php

namespace App\Providers;

use App\Models\CategoryProduct;
use App\Models\User;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        if ($this->app->isLocal()) {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        require base_path('app/Included/functions.php');
        $this->loadMigrationsFrom([
            'database/migrations/1_base',
            'database/migrations/2_categories_product',
            'database/migrations/3_products',
            'database/migrations/4_reviews',
            'database/migrations/5_feedback',
            'database/migrations/6_pages',
            'database/migrations/7_menu',
        ]);
    }
}
