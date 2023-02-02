<?php

namespace App\Models;

use App\Models\HW_Category;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class HW_News extends Model
{
    use HasFactory;

    protected $table = 'h_w__news';

    protected $fillable = [ // разрешить заполнение полей
        'title',
        'image',
        'author',
        'status',
        'description',
    ];


    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(HW_Category::class, 'hw_categories_has_news', 
        'hw_news_id', 'hw_category_id', 'id', 'id');
    }

}
