<?php


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsControllerHW;
use App\Http\Controllers\NewsControllerLW;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\IndexController as AdminController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    //dd(app());
    return view('welcome');
});

//ADMIN ROUTES
Route::group(['prefix' => 'admin', 'as' => 'admin.'], static function () {
    Route::get('/', AdminController::class)
        ->name('index');
    
    // On LW_4 23.01.2023
    Route::resource('categories', AdminCategoryController::class);
    Route::resource('news', AdminNewsController::class);
});
/*----------------------------------------------------------------------------------------------------------------*/

// HW FOR 1 LESSON:
Route::group(['prefix' => 'HW_1'], static function () {
    Route::get(
        '/greeting_page/{name}',
        static function (string $name): string {
            return "
                <!DOCTYPE HTML>
                <html>
                    <head>
                        <meta charset='utf-8'>
                        <title>This greeting page users</title>
                        <style type='text/css'>
                            body {
                                margin: 0;
                                padding: 0;
                                background-color:cyan;
                            }
                            div { 
                                display: flex;
                                justify-content: center;
                                font-size: 120%;
                                font-family: Verdana, Arial, Helvetica, sans-serif; 
                                color: #333366;
                            }
                            h1{
                                font-size: 100%;
                                font-family: Verdana, Arial, Helvetica, sans-serif; 
                                color: #333366;
                            }
                        </style>
                    </head> 
                    <body>
                        <div>
                            <h1>Hello, {$name}!</h1>
                        </div>
                        <div>This first page for first lesson 'Deep immersion in Laravel'</div>
                        
                    </body>
            </html>";
        }
    );

    Route::get(
        '/information_page',
        static function (): string {
            return "
        <!DOCTYPE HTML>
        <html>
            <head>
                <meta charset='utf-8'>
                <title>Page greeting user</title>
                <style type='text/css'>
                    body {
                        margin: 0;
                        padding: 0;
                        background-color:cyan;
                    }
                    div { 
                        display: flex;
                        justify-content: center;
                        font-size: 120%;
                        font-family: Verdana, Arial, Helvetica, sans-serif; 
                        color: #333366;
                    }
                    h1{
                        font-size: 100%;
                        font-family: Verdana, Arial, Helvetica, sans-serif; 
                        color: #333366;
                    }
                </style>
            </head> 
            <body>
                <div>
                    <h1>Это страница с информацией о проекте.</h1>
                </div>
                <div>
                    В рамках домашнего задания первого урока - изучения фреймворка Laravel, <br>
                    нам необходимо было установить рабочее окружение (Docker + Laravel)  <br>
                    Текущая информация подтверждает готовность домашнего задаяния.        
                </div>  
            </body>
        </html>";
        }
    );

    Route::get(
        '/news',
        static function (): string {
            return "
        <!DOCTYPE HTML>
        <html>
            <head>
                <meta charset='utf-8'>
                <title>Page greeting user</title>
                <style type='text/css'>
                    body {
                        margin: 0;
                        padding: 0;
                        background-color:cyan;
                    }
                    div { 
                        display: flex;
                        justify-content: center;
                        font-size: 120%;
                        font-family: Verdana, Arial, Helvetica, sans-serif; 
                        color: #333366;
                    }
                    h1{
                        font-size: 100%;
                        font-family: Verdana, Arial, Helvetica, sans-serif; 
                        color: #333366;
                    }
                </style>
            </head> 
            <body>
                <div>
                    <h2>Новостная страница.</h2>
                </div>
                <div>
                    <h1>Названы самые популярные у россиян в 2020 году породы кошек</h1>      
                </div> 
                <div>
                Самыми популярными в этом году породами кошек у россиян стали мейн-куны, британские и сибирские. 
                </div>    
            </body>
        </html>";
        }
    );
});
/*------------------------------------------------------------------------------------------------------------------*/


// HW FOR 2 LESSON:
Route::group(['prefix' => 'HW_2'], static function () {
    //Route::get('/controller_preset_news', [Controller::class, 'storeg_news']); 
    /*
    | Route for 1 exercise.
    */
    Route::get('/preset_news', [NewsControllerHW::class, 'show_preset_all_news'])
        ->name('preset_all_news');

    /*
    | Route for 2 exercise.
    | Subparagraph 1.1.:
    */
    Route::get('/greeting_page', [NewsControllerHW::class, 'show_greeting_page'])
        ->name('greeting_page');

    /*
    | Route for 2 exercise.
    | Subparagraph 1.2.:
    */
    Route::get('/category_news', [NewsControllerHW::class, 'show_category_news'])
        ->name('category_news');

    /*
    | Route for 2 exercise.
    | Subparagraph 1.3.:
    */
    Route::get('/category_news/{category}/links_on_all_news_title', [NewsControllerHW::class, 'links_on_all_news_title'])
        ->name('links_on_all_news_title');
    /*
    | Route for 2 exercise.
    | Subparagraph 1.4.:
    */
    Route::get('/links_on_all_news/{category}/{title}/links_on_text_news', [NewsControllerHW::class, 'links_on_text_news'])
        ->name('links_on_text_news');
    /*
    | Route for 2 exercise. 
    | Subparagraph 1.5.:
    */
    Route::get('/authorization_page', [NewsControllerHW::class, 'show_authorization_page'])
        ->name('authorization_page');
    /*
    | Route for 2 exercise. 
    | Subparagraph 1.6.:
    */
    Route::get('/insert_news', [NewsControllerHW::class, 'insert_news'])
        ->name('insert_news');
});
/*-----------------------------------------------------------------------------------------------------------------------------*/

//Lesson 3 from 17.01.2023:
Route::group(['prefix' => 'LW_3'], static function () {
    Route::get('/news', [NewsControllerLW::class, 'index'])
        ->name('news');
    Route::get('/news/{id}/show', [NewsControllerLW::class, 'show'])
        ->where('id', '\d+')
        ->name('news.show');
});
/*-----------------------------------------------------------------------------------------------------------------------------*/


// HW FOR 3 LESSON:
Route::group(['prefix' => 'HW_3'], static function () {

    Route::get('/{counter}/preset_news', [NewsControllerHW::class, 'HW_3_show_preset_all_news']) // через where предустановил количество div с выводимыми на главной странице новостями
        ->where('counter', 2)->name('preset_all_news');

    Route::get('/greeting_page', [NewsControllerHW::class, 'HW_3_show_greeting_page'])
        ->name('greeting_page');

    Route::get('/category_news', [NewsControllerHW::class, 'HW_3_show_category_news'])
        ->name('category_news');

    Route::get('/category_news/{category}/links_on_all_news_title', [NewsControllerHW::class, 'HW_3_links_on_all_news_title'])
        ->name('links_on_all_news_title');

    Route::get('/links_on_all_news/{category}/{title}/links_on_text_news', [NewsControllerHW::class, 'HW_3_links_on_text_news'])
        ->name('links_on_text_news');

    Route::get('/authorization_page', [NewsControllerHW::class, 'HW_3_show_authorization_page'])
        ->name('authorization_page');

    Route::get('/insert_news', [NewsControllerHW::class, 'HW_3_insert_news'])
        ->name('insert_news');
});
