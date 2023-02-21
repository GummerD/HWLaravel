<?php

namespace App\Services;

use App\Services\Contract\Parser;
use Orchestra\Parser\Xml\Facade as XMLParser;

class ParserService implements Parser
{
    private string $link;
    
    public function setLink(string $link): self
    {
        $this->link = $link;
        return $this;
    }

    public function getParserData(): array
    {
        $xml = XMLParser::load($this->link);

        return $xml->parse([
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

    }
}