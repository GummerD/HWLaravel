<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HW_Category extends Model
{
    use HasFactory;

    protected $table = 'h_w__categories';

    public function getAllNews(): Collection
    {   
       return \DB::table($this->table)->get();
    }

    public function getNewsBiId(int $id):mixed
    {
        return \DB::table($this->table)->find($id);
    }
}
