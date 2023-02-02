<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\HW_News;
use Illuminate\Http\Request;
use App\QueryBuilders\HW\HWNewsQueryBuilder;
use App\QueryBuilders\HW\HWCategoryQueryBuilder;

class NewsControllerHW extends Controller
{
    // FOR HW_2:
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
    /*------------------------------------------------------------------------------------------------------------------*/

    //FOR HW_3:
    public function HW_3_show_preset_all_news($counter)
    {
        return \view('news.HW_3.storeg_news', [
            'news' => $this->storeg_news_counter($counter)
        ]);
    }

    public function HW_3_show_greeting_page()
    {
        //return "Greeting,{$name}!";
        return \view('news.HW_3.greeting_page');
    }

    public function HW_3_show_category_news()
    {
        return \view('news.HW_3.category_news', [
            'news' => $this->storeg_news()
        ]);
    }

    public function HW_3_links_on_all_news_title($category) 
    {
        return \view('news.HW_3.links_on_all_news_title', [
            'category' => $this->storeg_news($category)
        ]);
    }

    public function HW_3_links_on_text_news($category, $title)
    {
        return \view('news.HW_3.links_on_text_news', [
            'text' => $this->title_search($category, $title)
        ]);
    }

    public function HW_3_show_authorization_page()
    {
        return \view('news.HW_3.authorization_page');
    }

    public function HW_3_insert_news() 
    {
        return \view('news.HW_3.insert_news');
    }
    /*------------------------------------------------------------------------------------------------------------------*/

    //FOR HW_4:
    public function HW_4_show_preset_all_news($counter)
    {
        return \view('news.HW_4.storeg_news', [
            'news' => $this->storeg_news_counter($counter)
        ]);
    }

    public function HW_4_show_greeting_page()
    {
        return \view('news.HW_4.greeting_page');
    }

    public function HW_4_show_category_news()
    {
        return \view('news.HW_4.category_news', [
            'news' => $this->storeg_news()
        ]);
    }

    public function HW_4_links_on_all_news_title($category) 
    {
        return \view('news.HW_4.links_on_all_news_title', [
            'category' => $this->storeg_news($category)
        ]);
    }

    public function HW_4_links_on_text_news($category, $title)
    {
        return \view('news.HW_4.links_on_text_news', [
            'text' => $this->title_search($category, $title)
        ]);
    }

    public function HW_4_show_authorization_page()
    {
        return \view('news.HW_4.authorization_page');
    }

    public function HW_4_insert_news() 
    {
        return \view('news.HW_4.insert_news');
    }

    /*
    public function HW_4_feedback() 
    {
        return \view('news.HW_4.feedback');
    }
    */
     /*------------------------------------------------------------------------------------------------------------------*/

     //FOR HW_6:
     public function HW_6_show_preset_all_news(HWNewsQueryBuilder $hWNewsQueryBuilder, HWCategoryQueryBuilder $hWCategoryQueryBuilder)
    {
        return \view('news.HW_6.storeg_news', [
            'newslist' => $hWNewsQueryBuilder->getAll(),
            'categories' => $hWCategoryQueryBuilder->getAll()
        ]);
    }

    public function HW_6_show_greeting_page()
    {
        return \view('news.HW_4.greeting_page');
    }

    public function HW_6_show_category_news()
    {
        return \view('news.HW_4.category_news', [
            'news' => $this->storeg_news()
        ]);
    }

    public function HW_6_links_on_all_news_title($category) 
    {
        return \view('news.HW_4.links_on_all_news_title', [
            'category' => $this->storeg_news($category)
        ]);
    }

    public function HW_6_links_on_text_news(HW_News $news)
    {
        return \view('news.HW_6.links_on_text_news', [
            'text' => $news->description,
        ]);
    }

    public function HW_6_show_authorization_page()
    {
        return \view('news.HW_4.authorization_page');
    }


}   
