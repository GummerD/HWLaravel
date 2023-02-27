<?php

namespace App\Services;

use App\Models\News;
use App\Services\Contract\Parser;
use Illuminate\Support\Facades\Storage;
use Orchestra\Parser\Xml\Facade as XMLParser;

class ParserService implements Parser
{
    private string $link;
    
    public function setLink(string $link): self
    {
        $this->link = $link;
        return $this;
    }

    public function saveParserData(): void
    {
        $xml = XMLParser::load($this->link);

        $data = $xml->parse([
            'title' => [
                'uses' => 'channel.title'
            ],

            'link' =>[
                'uses' => 'channel.link'
            ],

            'description' =>[
                'uses' => 'channel.description'
            ],

            'image'=> [
                'uses' => 'channel.image.url'
            ],

            'news'=> [
                'uses' => 'channel.item[title,link,guid,description,pubDate]'
            ]

        ]);

        /*
        $e = \explode('/', $this->link);
        $fileName = end($e);
        $jsonEncode = json_encode($data);

        Storage::append('news/'. $fileName,  $jsonEncode);
        */

        foreach ($data["news"] as $news) {
            News::create([
                'title' => $news['title'],
                'description' => $news['description'],
            ]);
        }
    }
}