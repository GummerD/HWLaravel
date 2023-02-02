<?php

namespace App\QueryBuilders\HW;

use App\Models\HW_News;
use App\QueryBuilders\QueryBuilder;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

final class HWNewsQueryBuilder extends QueryBuilder
{
    public Builder $model;
    
	/**
	 */
	public function __construct()
    {
        $this->model = HW_News::query();
    }

    public function getAll(): Collection
    {
        return HW_News::query()->get();
    }

    public function getNewsByStatus(string  $status): Collection
    {
        return HW_News::query()->where('status', $status)->get();
    }

    public function getNewsWithPagination (int $quantity = 10): LengthAwarePaginator
    {
        return $this->model->with('categories')->paginate($quantity);
    }
}