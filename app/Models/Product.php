<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'product_sku',
        'product_category',
        'product_description',
        'product_image',
    ];

    use SoftDeletes;

    protected $dates = ['deleted_at'];
}
