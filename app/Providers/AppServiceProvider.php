<?php

namespace App\Providers;

use App\Models\Category;
use App\QueryBuilders\QueryBuilder;
use Illuminate\Pagination\Paginator;
use App\QueryBuilders\NewsQueryBuilder;
use Illuminate\Support\ServiceProvider;
use App\QueryBuilders\CategoryQueryBuilder;
use App\QueryBuilders\HW\HWSourcesQueryBuilder;
use App\QueryBuilders\HW\HWUsersQueryBuilder;

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

        $this->app->bind(
            QueryBuilder::class,
            HWCategoryQueryBuilder::class
        );

        $this->app->bind(
            QueryBuilder::class,
            HWNewsQueryBuilder::class
        );

        $this->app->bind(
            QueryBuilder::class,
            HWSourcesQueryBuilder::class
        );

        $this->app->bind(
            QueryBuilder::class,
            HWOrderFormQueryBuilder::class
        );

        $this->app->bind(
            QueryBuilder::class,
            HWUsersQueryBuilder::class
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
