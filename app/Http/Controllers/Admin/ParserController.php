<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Contract\Parser;
use Illuminate\Http\Request;
use Orchestra\Parser\Xml\Facade as XMLParser;

class ParserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Parser $parser)
    {
       
        $link = 'https://www.vedomosti.ru/rss/issue.xml';

        $load = $parser->setLink($link)->getParserData();

        dd($load);
    }
}
