<?php

namespace App\QueryBuilders\HW;

use App\Models\OrderFormHW;
use App\QueryBuilders\QueryBuilder;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

final class HWOrderFormQueryBuilder extends QueryBuilder
{
    public Builder $model;
    
	/**
	 */
	public function __construct()
    {
        $this->model = OrderFormHW::query();
    }

    public function getAll(): Collection
    {
        return $this->model->get();
    }

    public function getOrderFormHWByName(string  $name): Collection
    {
        return $this->model->where('name', $name)->get();
    }

    public function getOrderFormHWWithPagination (int $quantity = 10): LengthAwarePaginator
    {
        return $this->model->with('name')->paginate($quantity);
    }
}