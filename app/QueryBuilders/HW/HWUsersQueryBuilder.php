<?php

namespace App\QueryBuilders\HW;

use App\Models\HW_Sources;
use App\Models\User;
use App\QueryBuilders\QueryBuilder;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

final class HWUsersQueryBuilder extends QueryBuilder
{
    public Builder $model;
    
	/**
	 */
	public function __construct()
    {
        $this->model = User::query();
    }

    public function getAll(): Collection
    {
        return $this->model->get();
    }

    public function getUserByEmail(string  $email): Collection
    {
        return $this->model->where('email', $email)->get();
    }

    public function getUsersWithPagination (int $quantity = 10): LengthAwarePaginator
    {
        return $this->model->paginate($quantity);
    }
}