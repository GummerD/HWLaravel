<?php
namespace App\QueryBuilders;

use App\Models\Sources;
use App\QueryBuilders\QueryBuilder;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;


final class SourcesQueryBuilder extends QueryBuilder
{
    public Builder $model;
	/**
	 * @return \Illuminate\Database\Eloquent\Collection
	 */

    public function __construct()
    {
        $this->model = Sources::query();
    }

     public function getAll(): Collection 
    {
        return $this->model->get();
	}

    public function getSourcesWithPagination(int $quantity = 5): LengthAwarePaginator
    {
        return $this->model->paginate($quantity);
    }
}