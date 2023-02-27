<?php

namespace App\Providers;

use App\Models\Category;
use App\Services\ParserService;
use App\Services\SocialService;
use App\Services\UploadService;
use App\Services\Contract\Parser;
use App\Services\Contract\Social;
use App\QueryBuilders\QueryBuilder;
use Illuminate\Pagination\Paginator;
use UniSharp\LaravelFilemanager\Lfm;
use App\QueryBuilders\NewsQueryBuilder;
use Illuminate\Support\ServiceProvider;
use App\QueryBuilders\SourcesQueryBuilder;
use App\QueryBuilders\CategoryQueryBuilder;
use Intervention\Image\ImageServiceProvider;
use App\QueryBuilders\HW\HWUsersQueryBuilder;
use App\QueryBuilders\HW\HWSourcesQueryBuilder;
use UniSharp\LaravelFilemanager\LaravelFilemanagerServiceProvider;

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

        //Servises
        $this->app->bind(
            Parser::class,
            ParserService::class
        );
        
        $this->app->bind(
            Social::class,
            SocialService::class
        );

        $this->app->bind(UploadService::class );
        $this->app->bind(LaravelFilemanagerServiceProvider::class);
        $this->app->bind(ImageServiceProvider::class);

        $this->app->bind(
            QueryBuilder::class,
            SourcesQueryBuilder::class
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
