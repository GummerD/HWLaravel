<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsControllerHW extends Controller
{
    public function show_preset_all_news()
    {
        return \view('news.HW_2.storeg_news', [
            'news' => $this->storeg_news()
        ]);
    }

    public function show_greeting_page()
    {
        //return "Greeting,{$name}!";
        return \view('news.HW_2.greeting_page');
    }

    public function show_category_news()
    {
        return \view('news.HW_2.category_news', [
            'news' => $this->storeg_news()
        ]);
    }

    public function links_on_all_news() // пока не работает
    {
        return \view('news.HW_2.links_on_all_news', [
            'category' => $this->storeg_news()
        ]);
    }

    public function links_on_news() // пока не работает
    {
        return \view('news.HW_2.links_on_news', [
            'category' => $this->storeg_news()
        ]);
    }

    public function show_authorization_page()
    {
        return \view('news.HW_2.authorization_page');
    }

    public function insert_news() 
    {
        return \view('news.HW_2.insert_news');
    }
}
