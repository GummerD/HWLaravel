<?php

namespace App\Models;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HW_Sources extends Model
{
    use HasFactory;

    protected $table = 'h_w__sources';

    protected $fillable = [ 
        'source_name',
        'source_url',
    ];
}
