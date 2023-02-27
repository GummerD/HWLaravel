<?php

namespace App\Services\Contract;


interface Parser
{
    public function setLink(string $string): self;
    public function saveParserData(): void;
}