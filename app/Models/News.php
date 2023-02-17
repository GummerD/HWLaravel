<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Casts\Attribute;
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

    protected $casts = [ // приведение к опредленному типу, на выходе конвертирует в то, что нужно. Для вычленения нужного поля из БД.
        'categories_id' => 'array',
    ];

    protected function author(): Attribute // пример Акссесора, который делает поле автора с большой буквы, но если сделат сеттер, то в бащу будет внесено нужное значение.
    {
        return Attribute::make(
            get: fn($value): string =>strtoupper($value),
            set: fn($value): string =>strtolower($value)
        );
    }


    public function categories(): BelongsToMany // функция обеспечивает связь между таблицами категория и новости, с помощь таблицы "create_has_news_has"
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
