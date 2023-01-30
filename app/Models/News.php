<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    public function getAllNews(): Collection
    {
       //return \DB::select("SELECT * FROM {$this->table}");
       return \DB::table($this->table)->get();
    }

    public function getNewsBiId(int $id):mixed
    {
        //return \DB::selectOne("SELECT * FROM {$this->table} WHERE id = :id", [':id' => $id]);
        return \DB::table($this->table)->find($id);
    }


}
