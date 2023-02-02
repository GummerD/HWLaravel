<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    protected $fillable = [ // разрешить заполнение полей
        'title',
        'image',
        'author',
        'status',
        'description',
    ];


    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'create_has_news_has', 
        'news_id', 'category_id', 'id', 'id');
    }

    /*
    protected $guarded = [  // защищать поля - не давать изменять
        'id',
    ];
    */

    /* LW_5
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
    */

}
