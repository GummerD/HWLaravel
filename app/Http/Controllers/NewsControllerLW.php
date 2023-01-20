<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class NewsControllerLW extends Controller
{
    use NewsTrait;

    public function index():View
    {
        return \view('news.lesson_3.index', [
            'news' => $this->getNews(),
        ]);
    }

    public function show(int $id): View
    {
        return \view('news.lesson_3.show', 
            ['news' => $this->getNews($id)
        ]);
    }
}