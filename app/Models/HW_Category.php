<?php

namespace App\Models;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class HW_Category extends Model
{
    use HasFactory;

    protected $table = 'h_w__categories';

    protected $fillable = [ 
        'title',
        'description',
    ];


    public function news(): BelongsToMany
    {
        return $this->belongsToMany(HW_News::class, 'hw_categories_has_news', 
        'category_id', 'news_id', 'id', 'id');
    }

}
