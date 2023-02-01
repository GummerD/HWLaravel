<?php
namespace App\QueryBuilders;

use App\Models\Category;
use App\QueryBuilders\QueryBuilder;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;


final class CategoryQueryBuilder extends QueryBuilder
{
    public Builder $model;
	/**
	 * @return \Illuminate\Database\Eloquent\Collection
	 */

    public function __construct()
    {
        $this->model = Category::query();
    }

     public function getAll(): Collection 
    {
        return $this->model->get();
	}
}