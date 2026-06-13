<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Order; // 👈 add this

class Product extends Model
{
    protected $fillable = [
        'prod_img',
        'id',
        'category_id',
        'title_en',
        'title_ru',
        'title_ar',
        'description_en',
        'description_ru',
        'description_ar',
        'price',
        'quantity',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    // 👇 also add this to link product to its category
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}