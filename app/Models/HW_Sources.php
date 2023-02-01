<?php

namespace App\Models;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HW_Sources extends Model
{
    use HasFactory;

    protected $table = 'h_w__sources';

    public function getAllNews(): Collection
    {   
       return \DB::table($this->table)->get();
    }

    public function getNewsBiId(int $id):mixed
    {
        return \DB::table($this->table)->find($id);
    }
}
