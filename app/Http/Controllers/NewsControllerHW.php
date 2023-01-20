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

    public function links_on_all_news_title($category) // 20.01.2022 необходимо было передать параметр, все сделал.
    {
        return \view('news.HW_2.links_on_all_news_title', [
            'category' => $this->storeg_news($category)
        ]);
    }

    public function links_on_text_news($category, $title) // не забывать передавать параметры.
    {
        return \view('news.HW_2.links_on_text_news', [
            'text' => $this->title_search($category, $title)
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
