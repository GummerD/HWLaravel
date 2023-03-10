<?php

namespace App\QueryBuilders;

use App\Models\News;
use App\QueryBuilders\QueryBuilder;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

final class NewsQueryBuilder extends QueryBuilder
{
    public Builder $model;
    
	/**
	 */
	public function __construct()
    {
        $this->model = News::query();
    }

    public function getAll(): Collection
    {
        return $this->model->get();
    }

    public function getNewsById($id): Collection
    {   
        //dd($this->model->find($id)->getAttributes());
        //dump($this->model->where('id','=',$id)->get());
        return $this->model->where('id','=',$id)->get();
        //return $this->model->find($id)->getAttributes();
    }

    public function getNewsByStatus(string  $status): Collection
    {
        return $this->model->where('status', $status)->get();
    }

    public function getNewsWithPagination (int $quantity = 10): LengthAwarePaginator
    {
        return $this->model->with('categories')->paginate($quantity);
    }
}