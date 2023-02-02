<?php
namespace App\QueryBuilders\HW;

use App\Models\HW_Category;
use App\QueryBuilders\QueryBuilder;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;


final class HWCategoryQueryBuilder extends QueryBuilder
{
    public Builder $model;
	/**
	 * @return \Illuminate\Database\Eloquent\Collection
	 */

    public function __construct()
    {
        $this->model = HW_Category::query();
    }

     public function getAll(): Collection 
    {
        return $this->model->get();
	}

}