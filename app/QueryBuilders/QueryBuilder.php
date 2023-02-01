<?php

namespace App\QueryBuilders;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

abstract class QueryBuilder
{
    abstract function getAll(): Collection;

}