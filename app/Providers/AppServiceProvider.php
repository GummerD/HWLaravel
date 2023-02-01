<?php

namespace App\Providers;

use App\Models\Category;
use App\QueryBuilders\QueryBuilder;
use Illuminate\Pagination\Paginator;
use App\QueryBuilders\NewsQueryBuilder;
use Illuminate\Support\ServiceProvider;
use App\QueryBuilders\CategoryQueryBuilder;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            QueryBuilder::class,
            CategoryQueryBuilder::class
        );

        $this->app->bind(
            QueryBuilder::class,
            NewsQueryBuilder::class   
        );

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrapFour();
    }
}
