<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderFormHW extends Model
{
    use HasFactory;

    protected $table = 'order_form_h_w_s';

    protected $fillable = [ 
        'name',
        'phone',
        'email',
        'description',
    ];

}
