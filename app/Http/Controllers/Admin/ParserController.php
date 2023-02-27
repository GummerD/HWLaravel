<?php

namespace App\Http\Controllers\Admin;

use App\Jobs\JobNewsParsing;
use Illuminate\Http\Request;
use App\Services\Contract\Parser;
use App\Http\Controllers\Controller;
use App\QueryBuilders\SourcesQueryBuilder;
use Orchestra\Parser\Xml\Facade as XMLParser;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class ParserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     /* Сохранение в файлы
     public function __invoke(Request $request, Parser $parser)
    {
        
        Сохранение в файлы:
        $urls = [
            'https://news.rambler.ru/rss/technology',
            'https://news.rambler.ru/rss/world',
            'https://news.rambler.ru/rss/tech',
            'https://www.vedomosti.ru/rss/issue',
        ];

        foreach($urls as $url)
        {
            \dispatch(new JobNewsParsing($url));
        }

        return 'Parsing complited';
 
    }
    */

    public function __invoke(SourcesQueryBuilder $sourcesQueryBuilder): View|Factory|Application
    {
        $urls = $sourcesQueryBuilder->getAll()->pluck('link');
        //dump($urls);

        foreach ($urls as $url){
            \dispatch(new JobNewsParsing($url));
        }

        return \view('admin.parser.index');
    }
}
