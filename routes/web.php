<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\NewsControllerHW;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

// HW for 1 lesson:

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
    | Route for 2 exercise. - пока не работает
    | Subparagraph 1.3.:
    */
    Route::get('/links_on_all_news/{category}', [NewsControllerHW::class, 'links_on_all_news'])
        ->name('links_on_all_news');
    /*
    | Route for 2 exercise. - пока не работает
    | Subparagraph 1.4.:
    */
    Route::get('/links_on_news/{category}', [NewsControllerHW::class, 'links_on_news'])
        ->name('links_on_news');
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
