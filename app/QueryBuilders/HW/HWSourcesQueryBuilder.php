<?php

namespace App\QueryBuilders\HW;

use App\Models\HW_Sources;
use App\QueryBuilders\QueryBuilder;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

final class HWSourcesQueryBuilder extends QueryBuilder
{
    public Builder $model;
    
	/**
	 */
	public function __construct()
    {
        $this->model = HW_Sources::query();
    }

    public function getAll(): Collection
    {
        return HW_Sources::query()->get();
    }

    public function getSourcesByName(string  $name): Collection
    {
        return HW_Sources::query()->where('name', $name)->get();
    }

    public function getSourcesWithPagination (int $quantity = 10): LengthAwarePaginator
    {
        return $this->model->with('sources')->paginate($quantity);
    }
}